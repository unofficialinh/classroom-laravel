<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
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
        if ($request->has('save')) {
            $exercise = new Exercise();
            $exercise->name = $request['name'];
            $exercise->deadline = $request['deadline'];
            $exercise->description = $request['description'];
            $exercise->filepath = $request['new_phone'];
            $exercise->save();
            return redirect()->route('exercises/info',['id'=>$exercise->id]);
        }
    }

    public function submit(Request $request, $id){

    }

    public function submissions($id){

    }
}
