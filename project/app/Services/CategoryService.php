<?php
/**
 * Created by PhpStorm.
 * User: tapos
 * Date: 2/21/2019
 * Time: 7:51 PM
 */

namespace App\Services;


use App\Banner;
use App\Blog;
use App\Currency;
use App\EorangeCategory;
use App\Generalsetting;
use App\Language;
use App\Page;
use App\Pagesetting;
use App\Seotool;
use App\Sociallink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function getCatetory()
    {

        return  Cache::rememberForever('catsubchild', function () {
          return  EorangeCategory::with(['subCategory.subCategory'])
                ->whereNull('parent_id')->where('id','!=',578)->orderBy('position', 'asc')->get();
        });

    }

    public function getCatetoryAdmin()
    {


          return  EorangeCategory::with(['subCategory.subCategory'])
                ->whereNull('parent_id')->orderBy('position', 'asc')->get();


    }

    public function getGeneralSettings()
    {

        return  Cache::rememberForever('generateSettings', function () {
            return  Generalsetting::find(1);
        });

    }
    //Banner::findOrFail(1)

    public function getBanner()
    {

        return  Cache::rememberForever('banner', function () {
            return  Banner::findOrFail(1);
        });

    }
    public function getSociallink()
    {

        return  Cache::rememberForever('Sociallink', function () {
            return  Sociallink::find(1);
        });

    }
    public function getSeotool()
    {

        return  Cache::rememberForever('Seotool', function () {
            return  Seotool::find(1);
        });

    }
    public function getPagesetting()
    {

        return  Cache::rememberForever('Pagesetting', function () {
            return  Pagesetting::find(1);
        });

    }

    public function getLangulage($id)
    {

        return  Cache::rememberForever('appLanguage', function () use($id) {
           return  Language::find($id);
        });

    }

    public function getCurrency($id)
    {

        return  Cache::rememberForever('appcurrency', function () use($id) {
            return  Currency::find($id);
        });

    }

    public function getBlog()
    {

        return  Cache::rememberForever('appblog', function ()  {
            return  Blog::orderBy('created_at', 'desc')->limit(10)->get();
        });

    }

    public function getPage()
    {

        return  Cache::rememberForever('apppage', function () {
            return  Page::orderBy('pos','asc')->get();
        });

    }

    public function defaultCurrency()
    {
        return  Cache::rememberForever('defaultCurrency', function () {
            return  Currency::where('is_default','=',1)->first();
        });

    }


}
