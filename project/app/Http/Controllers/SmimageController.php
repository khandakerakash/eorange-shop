<?php

namespace App\Http\Controllers;

use App\Smimage;
use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;


class SmimageController extends Controller
{
public function __construct()
    {
        $this->middleware('auth:admin');
    }

  	public function index()
    {
        $ads = Smimage::orderBy('id','desc')->get();
        return view('admin.smimage.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.smimage.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Smimage();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
            return redirect()->route('admin-img2-index')->with('success','New Image Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Smimage::findOrFail($id);
        return view('admin.smimage.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Smimage::findOrFail($id);
        $data = $request->all();

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
                }            
            $data['photo'] = $name;
            } 
            else
            {
            	$data['photo'] = $ad->photo;
            }
        $ad->update($data);
        return redirect()->route('admin-img2-index')->with('success','Image Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Smimage::findOrFail($id);
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
        $ad->delete();
        return redirect()->route('admin-img2-index')->with('success','Image Deleted Successfully.');
    }
}
