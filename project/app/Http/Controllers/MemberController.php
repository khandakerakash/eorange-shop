<?php

namespace App\Http\Controllers;



use App\Member;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
    	$user = Auth::guard('user')->user();

    }


    public function create()
    {
        $user = Auth::guard('user')->user();

        return view('user.member-request', compact('user'));
    }


    public function store(Request $request)
    {


        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->dob = $request->dob;
        $member->point = 0;
        $member->current_point = 0;
        $member->type = 0;

        $member->membership_number = time().rand(0, 999);



        $member->save();



        Session::flash('success', 'Successfully Sent The Request.');
        return redirect()->back();
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }



    public function update(Request $request, $id)
    {

    }





    public function destroy($id)
    {

    }


}
