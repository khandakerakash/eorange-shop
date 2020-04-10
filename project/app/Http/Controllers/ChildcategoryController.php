<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\EorangeCategory;
use App\Childcategory;
//use Illuminate\Support\Facades\Cache;
use \Cache;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $childcats =EorangeCategory::with('subCategory.subCategory')->whereNull('parent_id')->orderBy('id','desc')->get();
        return view('admin.childcategory.index',compact('childcats'));
    }

    public function create()
    {
        $cats = EorangeCategory::whereNull('parent_id')->get();
        return view('admin.childcategory.create',compact('cats'));
    }

    public function status($id1,$id2)
    {
        $cat = EorangeCategory::findOrFail($id1);
        $cat->status = $id2;
        $cat->update();
        Session::flash('success', 'Successfully Updated The Status.');
        return redirect()->route('admin-childcat-index');
    }

    public function store(StoreValidationRequest $request)
    {
        $cat = new EorangeCategory;
        $input = $request->all();

        $mother = EorangeCategory::find($request->mother_id);
        $cat->photo = $mother->photo;
        $cat->slider_1 = $mother->slider_1;
        $cat->slider_2 = $mother->slider_2;
        $cat->slider_3 = $mother->slider_3;
        $cat->cat_bg = $cat->cat_bg;
        $cat->fill($input)->save();
        \Cache::forget('catsubchild');
        Session::flash('success', 'New Child Category added successfully.');
        return redirect()->route('admin-childcat-index');
    }

    public function edit($id)
    {
        $cats = EorangeCategory::whereNull('parent_id')->get();

        $childcat = EorangeCategory::findOrFail($id);

        $subcats = EorangeCategory::where('id',$childcat->parent_id)->first();
        $subcatList = EorangeCategory::where('parent_id',$subcats->parent_id)->get();
        $selectedCatId = $subcatList[0]->parent_id;


        return view('admin.childcategory.edit',compact('childcat','cats','subcats','subcatList','selectedCatId'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'slug' => 'required|unique:category_new,slug,' . $id
        ]);
        $cat = EorangeCategory::findOrFail($id);


        $mother = EorangeCategory::find($request->mother_id);
        $cat->photo = $mother->photo;
        $cat->slider_1 = $mother->slider_1;
        $cat->slider_2 = $mother->slider_2;
        $cat->slider_3 = $mother->slider_3;
        $cat->cat_bg = $mother->cat_bg;
        $input = $request->all();
        $cat->update($input);
        \Cache::forget('catsubchild');
        Session::flash('success', 'Child Category updated successfully.');
        return redirect()->route('admin-childcat-index');
    }

    public function destroy($id)
    {
        $cat = EorangeCategory::with('products')->findOrFail($id);
        if($cat->products->count()>0)
        {
            Session::flash('unsuccess', 'Remove the products first !!!!');
            return redirect()->route('admin-childcat-index');
        }
        $cat->delete();
        \Cache::forget('catsubchild');
        Session::flash('success', 'Child Category deleted successfully.');
        return redirect()->route('admin-childcat-index');
    }
}
