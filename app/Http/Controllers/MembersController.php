<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class MembersController extends Controller
{
    public function show()
    {
        $members = User::all();
        return view('members.members')->with(array('members'=>$members));
    }

    public function addNewStudent(Request $request)
    {
        if ($request->has('save')) {
            $student = new User();
            $student->username = $request['new_username'];
            $student->name = $request['new_name'];
            $student->password = $request['new_password'];
            $student->email = $request['new_email'];
            $student->phone = $request['new_phone'];
            $student->save();
            return view('members.profile',['id'=>$student->id]);
        }
    }

    public function editProfile(Request $request){
        if ($request->has('save')){
            $user = User::find(Auth::user()->id);
            if ($request['new_password']!='')
                $user->password = $request['new_password'];
            $user->email = $request['new_email'];
            $user->phone = $request['new_phone'];
            $user->save();
            return view('members.profile',['id'=>$user->id]);
        }
    }

    public function editStudentProfile(Request $request, $id){
        if ($request->has('save')){
            $user = User::find($id);
            $user->username = $request['new_username'];
            $user->name = $request['new_name'];
            if ($request['new_password']!='')
                $user->password = $request['new_password'];
            $user->email = $request['new_email'];
            $user->phone = $request['new_phone'];
            $user->save();
            return view('members.profile',['id'=>$user->id]);
        }
    }
}