<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Translate;
use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;
use Storage;
use Image;
use League\Flysystem\Config;
//use Illuminate\Contracts\Routing\ResponseFactory;
//use Illuminate\Routing\Controller;

class AdminArticlesController extends Controller {

	/* List articles - Display a listing of the Articles */

	public function index($type)
	{



		$admin_category = Category::where("link","=",$type)->first();
		$admin_category_parent = $admin_category->category_parent()->first();
		$admin_category_children = $admin_category->category_children()->get();
		/*dd($admin_category_parent);*/
		$admin_articles = $admin_category->articles;
		return view('backend.articles.list')->with(compact('admin_category','admin_articles','type','admin_category_children','admin_category_parent'));

	}

	/* Optimize images - Minimize uploaded files @return Response */

	public function fileoptimize(Request $request, $id)
	{
		App::setLocale('ua');
		if (isset($id)){
			$articles = [Article::find($id)];
		}
		else {
			$articles = Article::all();
		}

		foreach($articles as $article){
			$files = Storage::Files('upload/articles/'.$article->id.'/images/');

			foreach($files as $key => $file){
				try{
					Image::make($file)
						->resize(1200, null, function ($constraint) { $constraint->aspectRatio();})
						->save($file, 90);

					echo $file . ' > resized <br />';
				}catch(\Exeption $e){
					echo '<span style="color:red">'. $file . ' > error ' . $e->getMessage() . ' </span><br />';
				}

			}
		}
		exit;
	}

	/*Show the form for creating a new Article.*/

	public function create($type)
	{
		$langs = Lang::all();
		$admin_category = Category::where("link","=","$type")->first();

		//Get group attributes for article_parent
		$article_group =  Article::where('category_id',$admin_category['article_parent'])->get();

		//list of base and attributes from Category
		$fields = json_decode($admin_category->fields);

		//list of attributes from Category
		$attributes_fields = $fields->attributes;

		return view('backend.articles.edit',[
			'langs'=>$langs,
			'admin_category'=>$admin_category,
			'action_method' => 'post',
			'attributes_fields' => $attributes_fields,
			'article_group' => $article_group,
		]);
	}

	/* Store a newly created Article in storage.*/

	public function store(Request $request, $type)
	{
		$langs = Lang::all();

		//validation rules
		foreach($langs as $lang){
			$this->validate($request, [
				'title_'.$lang['lang'] => 'required|max:255',
				'img' => 'mimes:jpeg,jpg,png,bmp,gif|max:5000'
			]);
		}
		//$all = $request->all();
		$all = $request->except(['attributes','saved-files-path']);

		// Get current category ID
		$category = Category::where('link',$type)->first();

		$all['category_id'] = $category->id;
		//$all['article_id'] = $category->article_parent;

		//add img
		$article_img = $request->file('img');

		//Create new entry in DB
		$article = Article::create($all);
		//dd($article);
		$all = $request->all();
		//add category img and save in file
		if($article_img){
			$extension = $article_img->getClientOriginalExtension();
			$name_img = $article->id  . '-' . time() . '.' . $extension;
			Storage::put('upload/articles/' .$article->id   .'/main/' . $name_img, file_get_contents($article_img));
			$all['img'] = 'upload/articles/' .$article->id .'/main/' . $name_img;
		}
		//dd($all['attributes']);
		if (isset($all['attributes'])) {
			$attributes = $all['attributes'];
			//dd($all['saved-files-path']);
			//dd($attributes);
			//Storage::deleteDirectory('upload/articles/' . $article->id . '/img');

			foreach ($attributes  as $key => $attribute ) {
				if (is_object($attribute) && $attribute){
					$extension = $attribute->getClientOriginalExtension();
					$name_img = $article->id . '-' . uniqid()  . '.' . $extension;
					//dd($extension);
					Storage::put('upload/articles/' . $article->id . '/img/' . $name_img, file_get_contents($attribute));
					//$all['img'] = 'upload/articles/' . $article->id . '/main/' . $name_img;
					$attributes[$key] = 'upload/articles/' . $article->id . '/img/' . $name_img;
					//dd($attributes);
					//$all['attributes'] = $attributes;

				}
				elseif(!$attributes[$key] AND isset($all['saved-files-path']) AND $all['saved-files-path'] AND isset($all['saved-files-path'][$key]) AND $all['saved-files-path'][$key]){
					$attributes[$key] = $all['saved-files-path'][$key];
				}
			}
			//dd($attributes);
			unset($all['saved-files-path']);
			//dd($attributes);

			$all['attributes'] = $attributes;
		}
		if (isset($all['attributes'])){
			$all['attributes'] = json_encode($this->prepareAttributesData($all['attributes']));
		}

		// Сreate array for multilanguage (example- (ua|ru|en))
		$all = $this->prepareArticleData($all);
		//Encode attributes from request

		//update $all after save imgs
		$article->update($all);

		//JSON respons when entry in DB successfully
		return response()->json([
			"status" => 'success',
			"message" => 'Успешно сохранено',
			"redirect" => URL::to('/adminIde8e/articles/'.$type)
		]);
	}

	/*Show the form for editing the Article. (@param  int  $id @return Response*/

	public function edit($type, $id)
	{
		//Создание папки соответсвующие id
		Storage::makeDirectory('upload/articles/' . $id, '0777', true, true);

		$langs = Lang::all();
		$admin_article = Article::where("id","=","$id")->first();

		//Var article_id
		$article_id = $admin_article['article_id'];

		//Decode attributes from articles DB
		$attributes = json_decode($admin_article->attributes, true);
		//dd($attributes);
		//$attributes = json_decode($admin_article->attributes);

		$admin_category = Category::where("link","=","$type")->first();

		//Get group attributes for article_parent
		$article_group =  Article::where('category_id',$admin_category['article_parent'])->get();
		//dd($article_group);

		//Decode base and attributes from categories DB
		$fields = json_decode($admin_category->fields);

		//Decode attributes from categories DB
		$attributes_fields = $fields->attributes;

		return view('backend.articles.edit',[
			'admin_article'=>$admin_article,
			'admin_category' => $admin_category,
			'type'=>$type,
			'langs'=>$langs,
			'action_method' => 'put',
			'attributes_fields' => $attributes_fields,
			'attributes' => $attributes,
			'article_group' => $article_group,
			'article_id' => $article_id
		]);
	}

	/* Update the Article in storage.(@param  int  $id,@return Response*/

	public function update(Request $request, $type, $id)
	{
		$langs = Lang::all();

		//validation rules
		foreach($langs as $lang){
			$this->validate($request, [
				'title_'.$lang['lang'] => 'required|max:255',
				'img' => 'mimes:jpeg,jpg,png,bmp,gif|max:5000'
			]);
		}
		$article = Article::where('id', $id)->first();
		$article_attributes = json_decode($article->attributes, true);
		//dd($article_attributes);
		/*foreach($article_attributes as $article_attribute){
			$arr = explode("@|;", $article_attribute);
		}*/

		//create var all for date from request
		$all = $request->all();
		//dd($all);
		//add img
		$article_img = $request->file('img');

		//add category img and save in file
		if($article_img){
			$extension = $article_img->getClientOriginalExtension();
			$name_img = $article->id . '-' . time() . '.' . $extension;
			Storage::deleteDirectory('upload/articles/' . $article->id . '/main');
			Storage::put('upload/articles/' . $article->id . '/main/' . $name_img, file_get_contents($article_img));
			$all['img'] = 'upload/articles/' . $article->id . '/main/' . $name_img;
		}
		elseif($all['img_status'] == 'false'){
			$all['img'] = null;
			Storage::deleteDirectory('upload/articles/' . $article->id . '/main');

		}

		//Pull imgs from folder and present in JSON format
		$files = Storage::Files('upload/articles/'.$id.'/images/');

		Storage::deleteDirectory('upload/articles/' . $id . '/min');
		Storage::deleteDirectory('upload/articles/' . $id . '/full');

		Storage::makeDirectory('upload/articles/' . $id . '/min', '0777', true, true);
		Storage::makeDirectory('upload/articles/' . $id . '/full', '0777', true, true);

		foreach($files as $key => $file){
			$savePathMin = str_replace('/'.$id.'/images/', '/'.$id.'/min/', $file);
			$savePathFull = str_replace('/'.$id.'/images/', '/'.$id.'/full/', $file);
			try{
				$image = Image::make($file)
					->resize(1200, null, function ($constraint) { $constraint->aspectRatio();})
					->save($savePathFull, 80)
					->resize(320, null, function ($constraint) { $constraint->aspectRatio(); })
					->save($savePathMin, 80);

				$files[$key] = [
					'full' => $savePathFull,
					'min' => $savePathMin
				];
			}catch(\Exception $e){
				$files[$key] = [
					'full' => $file,
					'min' => $file
				];
			}
		}
		if (isset($all['attributes'])) {
			$attributes = $all['attributes'];
			//dd($attributes);
			//Storage::deleteDirectory("upload/articles/1/img/1-58f53369005cf.png");
				foreach ($attributes  as $key => $attribute ) {

					if (is_object($attribute) && $attribute){
						/*Rewrite img*/
						$key_without_langs = stristr($key, '_', true);
						if($key_without_langs){
							$key_data = $article_attributes[$key_without_langs];
							$lang_data = substr($key, -2);
							$img_data = explode("@|;", $key_data);
							foreach($langs as $i => $lang){
								if($lang->lang == $lang_data AND $img_data[$i]){
									Storage::delete($img_data[$i]);
								}
							}
							/*if ($lang_data == 'ru') {
								if ($img_data[0]){
									Storage::delete($img_data[0]);
								}
							}
							else{
								if ($img_data[1]){
									Storage::delete($img_data[1]);
								}
							}*/
						}
						else{
							Storage::deleteDirectory('upload/articles/' . $article->id . '/img');
						}
						/*Rewrite img*/
						$extension = $attribute->getClientOriginalExtension();
						$name_img = $article->id . '-' . uniqid()  . '.' . $extension;
						//dd($attribute);
						Storage::put('upload/articles/' . $article->id . '/img/' . $name_img, file_get_contents($attribute));
						//$all['img'] = 'upload/articles/' . $article->id . '/main/' . $name_img;
						$attributes[$key] = 'upload/articles/' . $article->id . '/img/' . $name_img;
						//dd($attributes);
						//$all['attributes'] = $attributes;

					}
					elseif(!$attributes[$key] AND isset($all['saved-files-path']) AND $all['saved-files-path'] AND isset($all['saved-files-path'][$key]) AND $all['saved-files-path'][$key]){

						$attributes[$key] = $all['saved-files-path'][$key];
					}
				}

			unset($all['saved-files-path']);
			//dd($attributes);

			$all['attributes'] = $attributes;
			//dd($all['attributes']);
		}

		//Encode attributes from request
		if (isset($all['attributes'])){
			$all['attributes'] = json_encode($this->prepareAttributesData($all['attributes']));
		}
		//dd($all['attributes']);

		//Encode images from request
		$all['imgs'] = json_encode($files);

		// Сreate array for multilanguage (example- (ua|ru|en))
		$all = $this->prepareArticleData($all);

		//Update all data in DB
		$article->update($all);

		//Save all data in DB
		$article->save();

		//JSON respons when entry in DB successfully
		return response()->json([
			"status" => 'success',
			"message" => 'Успешно сохранено',
			"redirect" => URL::to('/adminIde8e/articles/'.$type)
		]);
	}

	/*Remove the Article from storage.(@param  int  $id, @return Response */

	public function destroy($type, $id)
	{
		$article = Article::where('id', '=', $id)->first();
		if($article AND $article->delete()){
			Storage::deleteDirectory('upload/articles/' . $id);
			return response()->json([
				"status" => 'success',
				"message" => 'Успешно удалено'
			]);
		}
		else{
			return response()->json([
				"status" => 'error',
				"message" => 'Виникла помилка при видаленні'
			]);
		}
	}
	/* Сreate array for multilanguage (example- (ua|ru|en)) */
	private function prepareArticleData($all){
		$langs = Lang::all();
		$all['title'] = '';
		$all['short_description'] = '';
		$all['description'] = '';
		$all['meta_title'] = '';
		$all['meta_description'] = '';
		$all['meta_keywords'] ='';


		//Change format DATE
		if (isset($all['date']))
			$all['date'] = date('Y-m-d H:i:s',strtotime($all['date']));

		// Removing gaps at the beginning and end of each field
		foreach($all as $key => $value){
			$all[$key] = trim($value);
		}

		// Сreate array example (ua|ru|en)
		foreach($langs as $lang){
			$all['title'] .= $all["title_{$lang['lang']}"] .'@|;';
			$all['short_description'] .= (isset($all["short_description_{$lang['lang']}"]) ? $all["short_description_{$lang['lang']}"] : '') .'@|;';
			$all['description'] .= (isset($all["description_{$lang['lang']}"]) ? $all["description_{$lang['lang']}"] : '') .'@|;';
			$all['meta_title'] .= (isset($all["meta_title_{$lang['lang']}"]) ? $all["meta_title_{$lang['lang']}"] : '') .'@|;';
			$all['meta_description'] .= (isset($all["meta_description_{$lang['lang']}"]) ? $all["meta_description_{$lang['lang']}"] : '') .'@|;';
			$all['meta_keywords'] .= (isset($all["meta_keywords_{$lang['lang']}"]) ? $all["meta_keywords_{$lang['lang']}"] : '') .'@|;';

			//Delete var title_ua,title_ru,title_en
			unset($all["title_{$lang['lang']}"]);
			unset($all["short_description_{$lang['lang']}"]);
			unset($all["description_{$lang['lang']}"]);
			unset($all["meta_title_{$lang['lang']}"]);
			unset($all["meta_description_{$lang['lang']}"]);
			unset($all["meta_keywords_{$lang['lang']}"]);
		}
		return $all;
	}

	/* Сreate array for multilanguage (example- (ua|ru|en)) */
	private function prepareAttributesData($all){
		$langs = Lang::all();
		$first_lang = $langs->first()['lang'];
		//dd($first_lang);
		foreach($all as $key => $value){
			if(stristr($key, '_'.$first_lang) !== FALSE){
				$key_without_lang = str_replace("_{$first_lang}", '', $key);
				//dd($key_without_lang);

				$all[$key_without_lang] = '';


				foreach($langs as $lang){
					$all[$key_without_lang] .= $all[$key_without_lang . "_{$lang['lang']}"] .'@|;';
					unset($all[$key_without_lang . "_{$lang['lang']}"]);
				}


			}
		}



		return $all;
	}
}
