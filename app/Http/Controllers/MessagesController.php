<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MessagesController extends Controller
{
    public function show($id)
    {
        $messages = Message::where([['send_id', '=', Auth::user()->id],['receive_id', '=', $id]])
            ->orWhere([['receive_id', '=', Auth::user()->id],['send_id', '=', $id]])
            ->orderBy('send_time','desc')
            ->get();
        return view('messages.messages',['id'=>$id])->with(array('messages'=>$messages));
    }

    public function new(Request $request, $id)
    {
        if ($request->has('send')) {
            $message = new Message();
            $message->message = $request['message'];
            $message->send_id = Auth::user()->id;
            $message->receive_id = $id;
            $message->send_time = Carbon::now('Asia/Ho_Chi_Minh');
            $message->send_time_string = Carbon::now('Asia/Ho_Chi_Minh')->toDayDateTimeString();
            $message->save();
            return redirect()->route('members/messages',['id'=>$id]);
        }
    }

//    public function editProfile(Request $request){
//        if ($request->has('save')){
//            $user = User::find(Auth::user()->id);
//            if ($request['new_password']!='')
//                $user->password = $request['new_password'];
//            $user->email = $request['new_email'];
//            $user->phone = $request['new_phone'];
//            $user->save();
//            return redirect()->route('profile');
////            return view('members.profile',['id'=>$user->id]);
//        }
//    }
//
//    public function editStudentProfile(Request $request, $id){
//        if ($request->has('save')){
//            $user = User::find($id);
//            $user->username = $request['new_username'];
//            $user->name = $request['new_name'];
//            if ($request['new_password']!='')
//                $user->password = $request['new_password'];
//            $user->email = $request['new_email'];
//            $user->phone = $request['new_phone'];
//            $user->save();
//            return redirect()->route('members/profile',['id'=>$user->id]);
////            return view('members.profile',['id'=>$user->id]);
//        }
//    }
//
//    public function deleteStudent(Request $request, $id){
//        if ($request->has('save')){
//            $user = User::find($id);
//            if ($user != null) {
//                $user->delete();
//                return redirect()->route('members')->with(['message' => 'Successfully deleted!!']);
//            }
//            else
//                return redirect()->route('members');
//        }
//    }
}
