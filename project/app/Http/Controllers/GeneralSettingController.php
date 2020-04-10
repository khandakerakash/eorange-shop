<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generalsetting;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use Carbon\Carbon;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function logo()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.logo',compact('data'));
    }

    public function logoup(StoreValidationRequest $request)
    {
        $input = $request->all(); 
        $logo = Generalsetting::findOrFail(1);        
            if ($file = $request->file('logo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($logo->logo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$logo->logo)) {
                        unlink(public_path().'/assets/images/'.$logo->logo);
                    }
                }            
            $input['logo'] = $name;
            }         
        $logo->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-logo');
    }
    public function popup()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.popup',compact('data'));
    }

    public function popupup(StoreValidationRequest $request)
    {
        $input = $request->all(); 
        if ($request->is_subscribe == ""){
            $input['is_subscribe'] = 0;
        } 
        $logo = Generalsetting::findOrFail(1);        
            if ($file = $request->file('subscribe_image')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($logo->subscribe_image != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$logo->subscribe_image)) {
                        unlink(public_path().'/assets/images/'.$logo->subscribe_image);
                    }
                }            
            $input['subscribe_image'] = $name;
            }         
        $logo->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-popup');
    }
  public function fav()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.favicon',compact('data'));
    }

    public function favup(StoreValidationRequest $request)
    {
        $input = $request->all(); 
        $fav = Generalsetting::findOrFail(1);        
            if ($file = $request->file('favicon')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($fav->fav != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$fav->fav)) {
                        unlink(public_path().'/assets/images/'.$fav->fav);
                    }
                }            
            $input['favicon'] = $name;
            }         
        $fav->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-fav');
    }


    //Upadte FAQ Page Section Settings
    public function lungup(Request $request)
    {
        $page = Generalsetting::findOrFail(1);

        $input = $request->all();

        if ($request->is_language == ""){
            $input['is_language'] = 0;
        }
        $page->update($input);
        Session::flash('success', 'Language Status Upated Successfully.');
        return redirect()->route('admin-lang-index');;
    }

  public function reg()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.vendor.status',compact('data'));
    }

    public function regvendor($status)
    {


        $page = Generalsetting::findOrFail(1);
        $page->reg_vendor = $status;
        $page->update();
        Session::flash('success', 'Vendor Registration Status Upated Successfully.');
        return redirect()->route('admin-gs-reg');;
    }
    public function paypal($status)
    {
        
        $page = Generalsetting::findOrFail(1);
        $page->pcheck = $status;
        $page->update();
        Session::flash('success', 'Paypal Status Upated Successfully.');
        return redirect()->route('admin-gs-payments');;
    }
    public function rtl($status)
    {
        
        $page = Generalsetting::findOrFail(1);
        $page->rtl = $status;
        $page->update();
        Session::flash('success', 'RTL Status Upated Successfully.');
        return redirect()->back();
    }
    public function stripe($status)
    {
        
        $page = Generalsetting::findOrFail(1);
        $page->scheck = $status;
        $page->update();
        Session::flash('success', 'Stripe Status Upated Successfully.');
        return redirect()->route('admin-gs-payments');;
    }
    public function cod($status)
    {
        
        $page = Generalsetting::findOrFail(1);
        $page->ccheck = $status;
        $page->update();
        Session::flash('success', 'Cash On Delivery Status Upated Successfully.');
        return redirect()->route('admin-gs-payments');;
    }
    public function bgimg()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.backgroundimage',compact('data'));
    }

    public function bgimgup(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'bgimg' => 'mimes:jpeg,jpg,png'
           ],[ 
               'bgimg.mimes' => 'The Image type is invalid.'
            ]);
        $input = $request->all(); 
        $bgimg = Generalsetting::findOrFail(1);        
            if ($file = $request->file('bgimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($bgimg->bgimg != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$bgimg->bgimg)) {
                        unlink(public_path().'/assets/images/'.$bgimg->bgimg);
                    }
                }            
            $input['bgimg'] = $name;
            }         
        $bgimg->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-bgimg');
    }

    public function cimg()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.customerimg',compact('data'));
    }

    public function cimgup(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'cimg' => 'mimes:jpeg,jpg,png'
           ],[ 
               'cimg.mimes' => 'The Image type is invalid.'
            ]);
        $input = $request->all(); 
        $cimg = Generalsetting::findOrFail(1);        
            if ($file = $request->file('cimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cimg->cimg != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cimg->cimg)) {
                        unlink(public_path().'/assets/images/'.$cimg->cimg);
                    }
                }            
            $input['cimg'] = $name;
            }         
        $cimg->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-cimg');
    }

    public function countdown()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.count.index',compact('data'));
    }

    public function countdownup(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'count_image' => 'mimes:jpeg,jpg,png'
           ],[ 
               'count_image.mimes' => 'The Image type is invalid.'
            ]);
        $input = $request->all();
        $cimg = Generalsetting::findOrFail(1);
        if ($file = $request->file('count_image'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($cimg->count_image != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$cimg->count_image)) {
                        unlink(public_path().'/assets/images/'.$cimg->count_image);
                    }
            }
            $input['count_image'] = $name;
        }
        $input['count_date'] = Carbon::parse($input['count_date'])->format('Y/m/d');
        $cimg->update($input);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-countdown');
    }


    public function contents()
    {
        $data = Generalsetting::findOrFail(1);
        if($data->tags != null)
        {
            $tags = explode(',', $data->tags);            
        }
        return view('admin.generalsetting.websitecontent',compact('data','tags'));
    }

    public function contentsup(Request $request)
    {
        $this->validate($request, [
               'bimg' => 'mimes:jpeg,jpg,png'
           ],[ 
               'bimg.mimes' => 'The Image type is invalid.'
            ]);
        $content = Generalsetting::findOrFail(1);
        $data = $request->all();
        if (!empty($request->tags)) 
         {
            $data['tags'] = implode(',', $request->tags);       
         }  
        if (empty($request->tags)) 
         {
            $data['tags'] = null;       
         }
            if ($file = $request->file('bimg')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($content->bimg != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$content->bimg)) {
                        unlink(public_path().'/assets/images/'.$content->bimg);
                    }
                }            
            $data['bimg'] = $name;
            }
        if ($request->is_talkto == ""){
            $data['is_talkto'] = 0;
        }    
        $content->update($data);

        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-contents');
    }

    public function payments()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.payments',compact('data'));
    }

    public function paymentsup(Request $request)
    {
        $data = Generalsetting::findOrFail(1);
        if ($request->ship_info == ""){
            $data['ship_info'] = 0;
        }  
        if ($request->multiple_ship == ""){
            $data['multiple_ship'] = 0;
        }  
        $data->update($request->all());
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-payments');
    }

    public function about()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.about',compact('data'));
    }

    public function aboutup(Request $request)
    {
        $about = Generalsetting::findOrFail(1);
        $about->update($request->all());
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-about');
    }

    public function successm()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.success',compact('data'));
    }

    public function successmup(Request $request)
    {
        $address = Generalsetting::findOrFail(1);
        $address->update($request->all());
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-successm');
    }

    public function bginfo()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.bg-info',compact('data','tags'));
    }

    public function bginfoup(Request $request)
    {
        $bginfo = Generalsetting::findOrFail(1);
        $data = $request->all();
        if ($request->slider == ""){
            $data['slider'] = 0;
        } 
        if ($request->category == ""){
            $data['category'] = 0;
        } 
        if ($request->sb == ""){
            $data['sb'] = 0;
        } 
        if ($request->hv == ""){
            $data['hv'] = 0;
        } 
        if ($request->ftp == ""){
            $data['ftp'] = 0;
        } 
        if ($request->lp == ""){
            $data['lp'] = 0;
        } 
        if ($request->pp == ""){
            $data['pp'] = 0;
        } 
        if ($request->lb == ""){
            $data['lb'] = 0;
        } 
        if ($request->bs == ""){
            $data['bs'] = 0;
        } 
        if ($request->ts == ""){
            $data['ts'] = 0;
        } 
        if ($request->bl == ""){
            $data['bl'] = 0;
        } 
        $bginfo->update($data);
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('admin-gs-bginfo');
    }

    public function video()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.video',compact('data'));
    }

    public function videoup(Request $request)
    {
        $this->validate($request, [
               'vidimg' => 'mimes:jpeg,jpg,png'
           ],[ 
               'vidimg.mimes' => 'The Image type is invalid.'
            ]);
        $data = Generalsetting::findOrFail(1);
        $url = $request->vid;

        if ( (strpos($url, 'youtube') !== false) || (strpos($url, 'vimeo') !== false) ) 
        {
            $input = $request->all();
                if ($file = $request->file('vidimg')) 
                {    
                    $name = time().$file->getClientOriginalName();
                    $file->move('assets/images',$name);
                    if($data->vidimg != null)
                    {
                    if (file_exists(public_path().'/assets/images/'.$data->vidimg)) {
                        unlink(public_path().'/assets/images/'.$data->vidimg);
                    }
                    }            
                $input['vidimg'] = $name;
                } 
            $data->update($input);
            return redirect()->route('admin-video')->with('success','Data Updated Successfully.');
        }

        else
        {
        return redirect()->route('admin-video')->with('unsuccess','The URL is Invaild.');        
        }
    }
  public function load()
    {
        $data = Generalsetting::findOrFail(1);
        return view('admin.generalsetting.loader',compact('data'));
    }

    public function loadup(Request $request)
    {
        $this->validate($request, [
               'loader' => 'mimes:gif'
           ]);
        $input = $request->all(); 
        $fav = Generalsetting::findOrFail(1);        
            if ($file = $request->file('loader')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($fav->loader != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$fav->loader)) {
                        unlink(public_path().'/assets/images/'.$fav->loader);
                    }
                }            
            $input['loader'] = $name;
            }         
        $fav->update($input);
        Session::flash('success', 'Successfully updated the Loader');
        return redirect()->route('admin-gs-load');
    }
    
}
