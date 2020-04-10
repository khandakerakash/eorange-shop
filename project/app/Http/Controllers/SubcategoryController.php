<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\EorangeCategory;
use App\Subcategory;
//use Illuminate\Support\Facades\Cache;
use \Cache;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $catu = EorangeCategory::with('subCategory')->whereNull('parent_id')->orderBy('id','desc')->get();

        return view('admin.subcategory.index',compact('catu'));
    }

    public function create()
    {
    	$cats = EorangeCategory::whereNull('parent_id')->get();
        return view('admin.subcategory.create',compact('cats'));
    }

    public function status($id1,$id2)
    {
        $cat = EorangeCategory::findOrFail($id1);
        $cat->status = $id2;
        $cat->update();
        Session::flash('success', 'Successfully Updated The Status.');
        return redirect()->route('admin-subcat-index');
    }

    public function store(StoreValidationRequest $request)
    {
        $this->validate($request,[

            'slug' => 'required|unique:category_new,slug',
        ]);
        $subcat = new EorangeCategory;
        $input = $request->all();
        $cat = EorangeCategory::find($request->parent_id);
        $subcat->photo = $cat->photo;
        $subcat->slider_1 = $cat->slider_1;
        $subcat->slider_2 = $cat->slider_2;
        $subcat->slider_3 = $cat->slider_3;
        $subcat->cat_bg = $cat->cat_bg;
        $subcat->fill($input)->save();
        \Cache::forget('catsubchild');
        Session::flash('success', 'New Sub Category added successfully.');
        return redirect()->route('admin-subcat-index');
    }

    public function edit($id)
    {
    	$cats = EorangeCategory::whereNull('parent_id')->get();
        $subcat = EorangeCategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('subcat','cats'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'slug' => 'required|unique:category_new,slug,' . $id,
        ]);
        $subcat = EorangeCategory::findOrFail($id);
        $input = $request->all();
        $subcat->update($input);
        \Cache::forget('catsubchild');
        Session::flash('success', 'Sub Category updated successfully.');
        return redirect()->route('admin-subcat-index');
    }

    public function destroy($id)
    {
        $subcat = EorangeCategory::with('subCategory','products')->findOrFail($id);
        if($subcat->subCategory->count()>0)
        {
            Session::flash('unsuccess', 'Remove the Child Categories first !!!!');
            return redirect()->route('admin-subcat-index');
        }
        if($subcat->products->count()>0)
        {
            Session::flash('unsuccess', 'Remove the products first !!!!');
            return redirect()->route('admin-subcat-index');
        }
        $subcat->delete();
        \Cache::forget('catsubchild');
        Session::flash('success', 'Sub Category deleted successfully.');
        return redirect()->route('admin-subcat-index');
    }
}
