<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

            $filename = $exercise->id.'_'.$request->file->getClientOriginalName();
            $request->file->storeAs('exercises',$filename);
            $exercise->filepath = 'app/public/exercises/'.$filename;
            $exercise->save();

            return redirect()->route('exercises/info',['id'=>$exercise->id]);
        }
    }

    public function submit(Request $request, $id){

    }

    public function submissions($id){

    }
}
