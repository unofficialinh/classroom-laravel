<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChallengesController extends Controller
{
    public function show(){
        $challenges = Challenge::all();
        return view('challenges.challenges')->with(array('challenges'=>$challenges));
    }

    public function add(Request $request){
        if ($request->has('add')){
            if ($request->file->getClientOriginalExtension() == 'txt') {
                $challenge = new Challenge();
                $challenge->name = $request['name'];
                if ($request['deadline'] == null)
                    $challenge->deadline = 'None';
                else
                    $challenge->deadline = Carbon::parse($request['deadline'])->toDayDateTimeString();
                $challenge->hint = $request['hint'];
                $challenge->save();

                $filename = $challenge->id . '_' . $request->file->getClientOriginalName();
                $request->file->storeAs('challenges', $filename);

                return redirect()->route('challenges');
            }
            else{
                 return view('challenges.newChallenge',
                    ['message'=>'Your file are not text file, please try again with .txt file!']);
            }
        }
    }

    public function submit(Request $request, $id){
        if ($request->has('submit')){
            $answer = $request['answer'];
            $filepath = 'storage/challenges/'.$id.'_'.$answer.'.txt';
            if (File::exists($filepath)){
                return view('challenges.result',['result'=>$filepath]);
            }
            else
                return view('challenges.result',['result'=>'wrong']);
        }
    }
}
