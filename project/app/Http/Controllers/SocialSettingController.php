<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sociallink;
use Illuminate\Support\Facades\Session;

class SocialSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.socialsetting',compact('socialdata'));
    }

    public function update(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        if ($request->f_status == ""){
            $input['f_status'] = 0;
        }
        if ($request->t_status == ""){
            $input['t_status'] = 0;
        }

        if ($request->g_status == ""){
            $input['g_status'] = 0;
        }

        if ($request->l_status == ""){
            $input['l_status'] = 0;
        }

        $socialdata->update($input);
        Session::flash('success', 'Social links updated successfully.');
        return redirect()->route('admin-social-index');
    }
    public function facebook()
    {
        $socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.facebook',compact('socialdata'));
    }
    public function facebookupdate(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        if ($request->fcheck == ""){
            $input['fcheck'] = 0;
        }
        $socialdata->update($input);
        Session::flash('success', 'Data updated successfully.');
        return redirect()->route('admin-social-facebook');
    }
    public function google()
    {
        $socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.google',compact('socialdata'));
    }
    public function googleupdate(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        if ($request->gcheck == ""){
            $input['gcheck'] = 0;
        }
        $socialdata->update($input);
        Session::flash('success', 'Data updated successfully.');
        return redirect()->route('admin-social-google');
    }
}
