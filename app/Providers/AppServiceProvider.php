<?php

namespace App\Providers;

use App\ArticleCategory;
use App\Cart;
use App\Category;
use App\Menu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

	    \Schema::defaultStringLength(191);

	    view()->composer('*', function ($view) {
			if(\Request::route())
			{
		        $current_route_name = \Request::route()->getName();
		        $view->with('current_route_name', $current_route_name);
			}
	    });

	 /*   view()->composer('*', function ($view) {

		    $socials = Social::all();
		    $view->with('socials', $socials);
		    $menus = $menus=Menu::orderBy('order','asc')->get();

		    $article_categories=ArticleCategory::all();
		    $view->with('socials', $socials);
		    $view->with('menus', $menus);

		    $view->with('article_categories', $article_categories);
	    });*/

/*	    view()->composer('*', function ($view) {
		    $cart_count='';
		    if(\Auth::guard('web')->check())
		    {
			    $cart_count=Cart::Where('user_id','=',\Auth::guard('web')->user()->id)->count();
		    }
		    $view->with('cart_count', $cart_count);
	    });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
	    if ($this->app->environment() !== 'production') {
		    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
	    }
		$this->app->register('Collective\Html\HtmlServiceProvider');
		$this->app->register('Joselfonseca\ImageManager\ImageManagerServiceProvider');
    }
}
