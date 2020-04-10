<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;

class AdminVendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
	
        $users = User::where('is_vendor','=',2)->orWhere('is_vendor','=',1)->orderBy('id','desc')->get();
        $pendings = User::where('is_vendor','=',1)->get()->count();
        return view('admin.vendor.index',compact('users','pendings'));
    }

    public function pending()
    {
        $users = User::where('is_vendor','=',1)->orderBy('id','desc')->get();
        return view('admin.vendor.pendings',compact('users'));
    }

  public function status($id1,$id2)
    {
        $user = User::findOrFail($id1);
        if($id2 == 1)
        {
        	$user->is_vendor = 2;
        	$user->update();
        	mail($user->email,'Your Vendor Account Activated','Your Vendor Account Activated Successfully. Please Login to your account and build your own shop.');
        	return redirect()->route('admin-vendor-pending')->with('success','Vendor Accepted Successfully');
        }
        if($id2 == 0)
        {
        	$user->is_vendor = 0;
        	$user->update();
        	mail($user->email,'Your Vendor Registration Rejected','Your Vendor Account Registration Rejected. Please Contact Admin for further details.');   
        	return redirect()->route('admin-vendor-pending')->with('success','Vendor Rejected Successfully'); 	
        }

    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create',compact('cats'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.vendor.details',compact('user'));
    }

    public function email($id)
    {
         $user = User::findOrFail($id);
        return view('admin.vendor.email',compact('user'));
    }

    public function emailsub(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect()->route('admin-user-index')->with('success','Email Send Successfully');
    }
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->is_vendor = 0;
        $user->update();
        Session::flash('success', 'Vendor Removed Successfully');
        return redirect()->route('admin-vendor-index');
    }
    public function withdraws()
    {
        $withdraws = Withdraw::where('type','=','vendor')->orderBy('id','desc')->get();
        $pending = Withdraw::where('status','=','pending')->get()->count();
        return view('admin.vendor.withdraws',compact('withdraws','pending'));
    }

    public function pendings()
    {
        $withdraws = Withdraw::where('status','=','pending')->where('type','=','vendor')->orderBy('id','desc')->get();
        return view('admin.vendor.pending-withdraws',compact('withdraws'));
    }

    public function withdrawdetails($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('admin.vendor.withdraw-details',compact('withdraw'));
    }

    public function accept($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $data['status'] = "completed";
        $withdraw->update($data);

        return redirect()->route('admin-vendor-wt')->with('success','Withdraw Accepted Successfully');
    }

    public function reject($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $account = User::findOrFail($withdraw->user->id);
        $account->current_balance = $account->current_balance + $withdraw->amount + $withdraw->fee;
        $account->update();

        $data['status'] = "rejected";
        $withdraw->update($data);
        return redirect()->route('admin-vendor-wt')->with('success','Withdraw Rejected Successfully');
    }
    public function userwithdraws()
    {
        $withdraws = Withdraw::where('type','=','affilate')->orderBy('id','desc')->get();
        $pending = Withdraw::where('status','=','pending')->get()->count();
        return view('admin.user.withdraws',compact('withdraws','pending'));
    }

    public function userpendings()
    {
        $withdraws = Withdraw::where('status','=','pending')->where('type','=','affilate')->orderBy('id','desc')->get();
        return view('admin.user.pending-withdraws',compact('withdraws'));
    }

    public function userwithdrawdetails($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('admin.user.withdraw-details',compact('withdraw'));
    }

    public function useraccept($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $data['status'] = "completed";
        $withdraw->update($data);

        return redirect()->route('admin-vendor-wtt')->with('success','Withdraw Accepted Successfully');
    }

    public function userreject($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $account = User::findOrFail($withdraw->user->id);
        $account->affilate_income = $account->affilate_income + $withdraw->amount + $withdraw->fee;
        $account->update();

        $data['status'] = "rejected";
        $withdraw->update($data);
        return redirect()->route('admin-vendor-wtt')->with('success','Withdraw Rejected Successfully');
    }
}
