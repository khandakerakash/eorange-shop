<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $datas = Language::orderBy('id','desc')->get(['id','language']);
        return view('admin.language.index',compact('datas'));
    }


    public function create()
    {
        return view('admin.language.create');
    }


    public function store(Request $request)
    {
        $lang = new Language();
        $data = $request->all();
        $lang->fill($data)->save();
        return redirect()->route('admin-lang-index')->with('success','Language Stored Successfully.');
    }

    public function edit($id)
    {
        $data = Language::findOrFail($id);
        return view('admin.language.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $lang = Language::findOrFail($id);
        $data = $request->all();
        $lang->update($data);
        return redirect()->route('admin-lang-index')->with('success','Language Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Language::findOrFail($id);
        if($data->id == 1)
        {
    return redirect()->route('admin-lang-index')->with('unsuccess','You can not delete the primary language.');
        }
        $data->delete();
    return redirect()->route('admin-lang-index')->with('success','Language Deleted Successfully.');
    }
}
