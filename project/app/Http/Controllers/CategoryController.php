<?php

namespace App\Http\Controllers;

use App\EorangeCategory;
use Illuminate\Http\Request;
use App\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
//use Illuminate\Support\Facades\Cache;
use \Cache;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cats =EorangeCategory::whereNull('parent_id')->orderBy('id','desc')->get();
        return view('admin.category.index',compact('cats'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function status($id1,$id2)
    {
        $cat = EorangeCategory::findOrFail($id1);
        $cat->status = $id2;
        $cat->update();
        Session::flash('success', 'Successfully Updated The Status.');
        \Cache::forget('catsubchild');
        return redirect()->route('admin-cat-index');
    }

    public function store(StoreValidationRequest $request)
    {



        $cat = new EorangeCategory;
        $input = $request->all();

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
                $input['photo'] = $name;
            }

        if ($file = $request->file('catbg'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            $input['cat_bg'] = $name;
        }

        if (count($request->slider)>0)
        {

            $slider = $request->slider;
            foreach ($slider as $key=> $slide){


                $name = time().$slide->getClientOriginalName();
                $slide->move('assets/images',$name);
                $input['slider_'.($key+1)] = $name;
            }

        }
        $cat->fill($input)->save();
        \Cache::forget('catsubchild');
        Session::flash('success', 'New Category added successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function edit($id)
    {
        $cat = EorangeCategory::findOrFail($id);
        return view('admin.category.edit',compact('cat'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'slug' => 'required|unique:category_new,slug,' . $id,
            'photo' => 'mimes:jpeg,jpg,png,svg',
        ]);

        $cat = EorangeCategory::findOrFail($id);
        $input = $request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cat->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->photo)) {
                        unlink(public_path().'/assets/images/'.$cat->photo);
                    }
                }            
            $input['photo'] = $name;
            }


        if ($file = $request->file('catbg'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($cat->cat_bg != null)
            {
                if (file_exists(public_path().'/assets/images/'.$cat->cat_bg)) {
                    unlink(public_path().'/assets/images/'.$cat->cat_bg);
                }
            }
            $input['cat_bg'] = $name;
        }


        if (count($request->slider)>0)
        {

            $slider = $request->slider;
            foreach ($slider as $key => $slide){


                $name = time().$slide->getClientOriginalName();
                $slide->move('assets/images',$name);
                $info = "slider_".($key+1);
                if($cat->$info != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->$info)) {
                        unlink(public_path().'/assets/images/'.$cat->$info);
                    }
                }
                $input['slider_'.($key+1)] = $name;
            }

        }



        $cat->update($input);
        \Cache::forget('catsubchild');
        Session::flash('success', 'Category updated successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function destroy($id)
    {
        $cat = EorangeCategory::with(["subCategory.subCategory","products"])->findOrFail($id);

        if($cat->subCategory->count()>0)
        {
            if($cat->subCategory->subCategory->count()>0){
                Session::flash('unsuccess', 'Remove the child category first !!!!');
                return redirect()->route('admin-cat-index');
            }
            Session::flash('unsuccess', 'Remove the subcategories first !!!!');
            return redirect()->route('admin-cat-index');
        }

        if($cat->products->count()>0)
        {
            Session::flash('unsuccess', 'Remove the products first !!!!');
            return redirect()->route('admin-cat-index');
        }
        if($cat->photo == null){
         $cat->delete();
        Session::flash('success', 'Category deleted successfully.');
        return redirect()->route('admin-cat-index');
        }
                    if (file_exists(public_path().'/assets/images/'.$cat->photo)) {
                        unlink(public_path().'/assets/images/'.$cat->photo);
                    }
        $cat->delete();
        \Cache::forget('catsubchild');
        Session::flash('success', 'Category deleted successfully.');
        return redirect()->route('admin-cat-index');
    }
}
