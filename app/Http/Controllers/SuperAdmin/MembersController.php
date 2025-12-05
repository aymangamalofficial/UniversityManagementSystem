<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;

class MembersController extends Controller
{
    public function index()
    {
        $Instructors = Instructor::latest('created_at')->get()?? collect([]);
        // dd($Instructors);
        return view('admins.members',compact('Instructors'));
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

        $member = new Instructor();
        $member->name = $request->name;
        $member->national_id = $request->national_id;
        $member->code = $request->code;
        $member->role_id = $request->role_id;
        $member->save();

        return redirect()->back()->with('msg','تمت اضافة '.$request->name.' بنجاح');
    }
    public function edit(Request $request)
    {dd($request);

        $member = Instructor::find($request->id);
        $member->name = $request->name;
        $member->national_id = $request->national_id;
        $member->code = $request->code;
        $member->role_id = $request->role_id;
        $member->save();

        return redirect()->back()->with('msg','تمت تعديل بيانات '.$request->name.' بنجاح');
    }
    public function del(Request $request)
    {
        $instructor = Instructor::find($request->instructor_id);
        $instructor->delete();
        return redirect()->back()->with('msg','تمت حذف '.$instructor->name.' بنجاح');
    }
}
