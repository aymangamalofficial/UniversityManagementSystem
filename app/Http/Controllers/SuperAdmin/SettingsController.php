<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function index()
    {
        $admins = User::latest('created_at')->get()?? collect([]);
        // dd($Instructors);
        return view('admins.settings',compact('admins'));
    }

    public function add(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:50',
        //     'national_id' => 'required|max:14|unique:instructors,national_id',
        //     'code' => 'required|unique:instructors,code',
        //     'role_id' => 'required|integer',
        // ]);
        // if ($validator->fails()):
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // endif;

        $admin = new User();
        $admin->name = $request->name;
        $admin->national_id = $request->national_id;
        $admin->code = $request->code;
       
        $admin->save();

        return redirect()->back()->with('msg','تمت اضافة '.$request->name.' بنجاح');
    }
    public function edit(Request $request)
    {dd($request);

        $admin = User::find($request->id);
        $admin->name = $request->name;
        $admin->national_id = $request->national_id;
        $admin->code = $request->code;
        $admin->role_id = $request->role_id;
        $admin->save();

        return redirect()->back()->with('msg','تمت تعديل بيانات '.$request->name.' بنجاح');
    }
}


