<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExercisesController extends Controller
{
    public function show()
    {
        $exercises = Exercise::all();
        return view('exercises.exercises')->with(array('exercises'=>$exercises));
    }

    public function add(Request $request)
    {
        if ($request->has('add')) {
            $exercise = new Exercise();
            $exercise->name = $request['name'];
            if ($request['deadline'] == null)
                $exercise->deadline = 'None';
            else
                $exercise->deadline = Carbon::parse($request['deadline'])->toDayDateTimeString();
            $exercise->description = $request['description'];
            $exercise->filepath = '';
            $exercise->save();
            //Update filepath and move file
            $filename = $exercise->id.'_'.$request->file->getClientOriginalName();
            $request->file->storeAs('exercises',$filename);
            $exercise->filepath = 'storage/exercises/'.$filename;
            $exercise->save();
            //Make submission directory
            Storage::makeDirectory('submissions/'.$exercise->id);

            return redirect()->route('exercises/info',['id'=>$exercise->id]);
        }
    }

    public function submit(Request $request, $id){
        if ($request->has('submit')){
            $submission = new Submission();
            $submission->user_id = Auth::user()->id;
            $submission->exercise_id = $id;
            $submission->submit_time = Carbon::now()->toDayDateTimeString();
            $submission->filepath = '';
            $submission->save();
            //Upadte filepath and move file
            $filename = Auth::user()->username.'_'.$request->file->getClientOriginalName();
            $request->file->storeAs('submissions/'.$id,$filename);
            $submission->filepath = 'storage/submissions/'.$id.'/'.$filename;
            $submission->save();
            return redirect()->route('exercises');
        }
    }

    public function submissions($id){
        $submissions = Submission::where('exercise_id',$id)->get();
        return view('exercises.submissions')->with(array('submissions'=>$submissions));
    }
}
