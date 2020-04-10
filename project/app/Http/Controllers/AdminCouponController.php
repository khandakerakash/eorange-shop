<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Coupon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $datas = Coupon::orderBy('id','desc')->get();
        $today = (int)date('d');
        foreach ($datas as $data) {
            $to = (int)date('d',strtotime($data->end_date));
            if($today > $to)
            {
                $data->status = 0;
            }
        }
        return view('admin.coupon.index',compact('datas'));
    }


    public function create()
    {
        return view('admin.coupon.create');
    }

    public function status($id1,$id2)
    {
        $data = Coupon::findOrFail($id1);
        $data->status = $id2;
        $data->update();
        return redirect()->route('admin-cp-index')->with('success','Successfully Updated The Status.');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
               'code' => 'unique:coupons',
           ]);
        $data = new Coupon();
        $datas = $request->all();
        $datas['start_date'] = Carbon::parse($datas['start_date'])->format('Y-m-d');
        $datas['end_date'] = Carbon::parse($datas['end_date'])->format('Y-m-d');
        $data->fill($datas)->save();
    return redirect()->route('admin-cp-index')->with('success','New Coupon Added Successfully.');
    }

    public function edit($id)
    {
        $data = Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $codes = Coupon::all()->except($id);
        foreach($codes as $cd)
        {
        if($cd->code == $request->code)
        {
    return redirect()->route('admin-cp-edit',$id)->with('unsuccess','This coupon has already been taken.');    }
        }
        $data = Coupon::findOrFail($id);
        $datas = $request->all();
        $datas['start_date'] = Carbon::parse($datas['start_date'])->format('Y-m-d');
        $datas['end_date'] = Carbon::parse($datas['end_date'])->format('Y-m-d');
        $data->update($datas);
        return redirect()->route('admin-cp-index')->with('success','Coupon Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Coupon::findOrFail($id);
        $data->delete();
        return redirect()->route('admin-cp-index')->with('success','Coupon Deleted Successfully.');
    }
}
