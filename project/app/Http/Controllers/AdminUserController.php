<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('admin.user.index',compact('users'));
    }

  public function status($id1,$id2)
    {
        $user = User::findOrFail($id1);
        $user->active = $id2;
        $user->featured = $id2;
        $user->update();
        if($id2 == 1)
        Session::flash('success', 'Successfully Activated The HandyMan.');
            else
        Session::flash('success', 'Successfully Deactivated The HandyMan.');

        return redirect()->route('admin-user-index');
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create',compact('cats'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.details',compact('user'));
    }

    public function email($id)
    {
         $user = User::findOrFail($id);
        return view('admin.user.email',compact('user'));
    }

    public function emailsub(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect()->route('admin-user-index')->with('success','Email Send Successfully');
    }

    public function store(StoreValidationRequest $request)
    {
        $user = new User;
        $input = $request->all();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            } 

            if($request->featured == "")
            {
                $input['featured'] = 0;
            }

            if(in_array(null, $request->title) || in_array(null, $request->details))
            {
                $input['title'] = null;  
                $input['details'] = null;
            }
            else 
            {             
                $input['title'] = implode(',', $request->title);  
                $input['details'] = implode(',', $request->details);                 
            }
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Session::flash('success', 'New HandyMan added successfully.');
        return redirect()->route('admin-user-index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cats = Category::all();
        if($user->title!=null && $user->details!=null)
        {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        return view('admin.user.edit',compact('user','cats','title','details'));
    }

    public function update(UpdateValidationRequest $request,$id)
    {

        $input = $request->all(); 
        $user = User::findOrFail($id);  
        if(!in_array(null, $request->title) && !in_array(null, $request->details))
        {             
            $input['title'] = implode(',', $request->title);  
            $input['details'] = implode(',', $request->details);                 
        }
        else
        {
            if(in_array(null, $request->title) || in_array(null, $request->details))
            {
                $input['title'] = null;  
                $input['details'] = null;
            }
            else
            {
                $title = explode(',', $user->title);
                $details = explode(',', $user->details);
                $input['title'] = implode(',', $title);  
                $input['details'] = implode(',', $details);
            }
        }      
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($user->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
                }            
            $input['photo'] = $name;
            } 

        if(!empty($input['password'])){
        $input['password'] = bcrypt($request['password']);

        }
        else{
         $input['password'] = $user->password;    
        } 
        if($request->featured == "")
        {
            $input['featured'] = 0;
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated the HandyMan');
        return redirect()->route('admin-user-index');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        if($user->reviews->count() > 0)
        {
            foreach ($user->reviews as $gal) {
                $gal->delete();
            }
        }
        if($user->wishlists->count() > 0)
        {
            foreach ($user->wishlists as $gal) {
                $gal->delete();
            }
        }
        if($user->photo == null){
         $user->delete();
        Session::flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin-user-index');
        }

                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
        $user->delete();
        Session::flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin-user-index');
    }
}


