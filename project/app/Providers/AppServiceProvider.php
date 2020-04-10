<?php

namespace App\Providers;

use App\Admin;
use App\Advertise;
use App\Banner;
use App\Blog;
use App\Category;
use App\Generalsetting;
use App\Language;
use App\Page;
use App\Pagesetting;
use App\Product;
use App\Seotool;
use App\Services\CategoryService;
use App\Sociallink;
use App\Currency;
use Illuminate\Support\Facades\Schema;
use Session;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryService $categoryService)
    {
        Schema::defaultStringLength(191);
        Admin::auth_admins();
        view()->composer('*',function($settings) use($categoryService){
            $settings->with('gs', $categoryService->getGeneralSettings());
            $settings->with('banner', $categoryService->getBanner());
            $settings->with('sl', $categoryService->getSociallink());
            $settings->with('seo', $categoryService->getSeotool());
            $settings->with('ps', $categoryService->getPagesetting());

            if (Session::has('language'))
            {
                $settings->with('lang', $categoryService->getLangulage(Session::get('language')));
            }
            else
            {
                $settings->with('lang', $categoryService->getLangulage(1));
            }
            if (!Session::has('popup'))
            {
                $settings->with('visited', 1);
            }
            Session::put('popup' , 1);
            if (Session::has('currency')) 
            {
                $settings->with('curr', $categoryService->getCurrency(Session::get('currency')));
            }
            else
            {
                $settings->with('curr', $categoryService->defaultCurrency());
            }
            $settings->with('categories', $categoryService->getCatetory());
            $settings->with('lblogs', $categoryService->getBlog());
           // $settings->with('prdcts', Product::where('status','=',1)->get());
            $settings->with('pages', $categoryService->getPage());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
