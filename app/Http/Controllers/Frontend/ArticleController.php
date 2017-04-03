<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
//use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Order;
use App\Models\Text;
use App;
use Illuminate\Support\Facades\Response;
//use Illuminate\Contracts\View\View;
use Mail;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lang, $type = 'main')
	{
		/*$product = null;
		$cooperation = null;
		$news = null;
		$about_us = null;
		$contact = null;
		$slides = null;
		;
		switch($type){
			case 'main':
				$slides = Category::where('link','slider')
					->first()
					->articles()
					->where('active', 1)
					->get()
					->sortByDesc("priority");

				break;
			case 'company':
				break;
			case 'news':
				break;
			case 'work':
				break;
			case 'gallery':
				break;
			case 'slider':
				break;
		}
*/
		/*$meta = view()->share('meta', Article::where('name', '=', 'meta.'.$type)->first());*/


		return view('frontend.'. $type);
			/*->with(compact('slides'));*/
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($lang, $type)
	{

		$product_category = Category::where('link', $type)
		->first();
		$products = $product_category
		->articles()
		->where('active', '1')
		->orderBy("priority", 'desc')
		->paginate(5);
		return view('frontend.products')
			->with(compact('products', 'product_category'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function show_new($lang, $type, $id)
	{
		$new_single = Article::where('id',$id)->first();
		return view('frontend.new')
			->with(compact('new_single'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function contact(Request $request)
	{
		if ($request ->isMethod('post')){
			/*get [] from request*/
			$all = $request->all();

			/*make rules for validation*/
			$rules = [
				'name' => 'required|max:50',
				'phone' => 'required|numeric',
				'comment' => 'required|max:600'
			];

			/*validation [] according to rules*/
			$validator = Validator::make($all, $rules);

			/*send error message after validation*/
			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'message' => $validator->messages()->first()
				));
			}

			//Send item on admin email address
			Mail::send('emails.contact', $all, function($message){
				$email = getSetting('config.email');
				$message->to($email, 'Будматеріали')->subject('Повідомлення про зворотній зв\'язок з сайту "Будматеріали" ');
			});
			return response()->json([
				'success' => 'true'
			]);
		}
	}

}
