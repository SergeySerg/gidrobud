<?php namespace App\Http\Middleware;

use Closure;
use App;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Models\Category;
use App\Models\Text;
use App\Models\Lang;
use League\Flysystem\Config;
//use DB;

class FrontendInit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Get current lang object from db
		$currentLang = Lang::where('lang',"=", $request->lang)
			->first();

		if (!$currentLang){
			abort('404');
		}
		// Locale setting
		App::setLocale($request->lang);

		$texts = new Text();
		if(is_null($request->type)){
			$request->type = 'main';
		}
		$categories = Category::where('parent_id',0)
			->where('active', 1)
			->get();
		$category = Category::where("link",$request->type)->first();
		$category_parent = $category->category_parent()->first();
		$category_children = $category->category_children()->get();
		$slides = Category::where('link','slider')
			->first()
			->articles()
			->where('active', 1)
			->get()
			->sortByDesc("priority");
		$news = Category::where('link','news')
			->first()
			->articles()
			->where('active','=', '1')
			->orderBy("priority", 'desc')
			->paginate(4);
		$last_news = Category::where('link','=', 'news')
			->first()
			->articles()
			->where('active','=', '1')
			->orderBy("priority", 'desc')
			->take(5)
			->get();

		// Share to views global template variables
		view()->share('langs', Lang::all());
		view()->share('texts', $texts->init());
		view()->share('categories', $categories);
		view()->share('category', $category);
		view()->share('category_parent', $category_parent);
		view()->share('category_children', $category_children);
		view()->share('slides', $slides);
		view()->share('news', $news);
		view()->share('last_news', $last_news);
		//dd($meta);
		view()->share('version', config('app.version'));

		return $next($request);
	}

}
