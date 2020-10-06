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

    public function edit(Request $request, $id){
        if ($request->has('save')){
            $message = Message::find($id);
            $message->message = $request['message'];
            $message->save();
            return redirect()->route('members/messages', ['id'=>$message->receive_id]);
        }
    }

    public function delete(Request $request, $id){
        if ($request->has('save')){
            $message = Message::find($id);
            $user_id = $message->receive_id;
            if ($message != null) {
                $message->delete();
                return redirect()->route('members/messages', ['id'=>$user_id]);
            }
            else
                return redirect()->route('members/messages', ['id'=>$user_id]);
        }
    }
}
