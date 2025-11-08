<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    // list all the activities
    public function index(){
        return response()->json(Activity::all(), 200);
    }

    // create activity
    public function store(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "status" => "required|in:pending, completed"
        ]);

        $activity = Activity::create($request->all());

        return response()->json(Activity::all(), 201);

        
    }

    // view single activity
     public function show($id){
        $activity = Activity::find($id);

        if(!$activity){
            return response()->json(["message" => "Activity not found"], 404);
        }

        return response()->json($activity, 200);
    }

    // update activity
    public function update(Request $request, $id){
        $activity = Activity::find($id);

         if(!$activity){
            return response()->json(["message" => "Activity not found"], 404);
        }

        $activity->update($request->all());

        return response()->json($activity, 200);
    }
    // delete activity
     public function delete($id){
        $activity = Activity::find($id);

         if(!$activity){
            return response()->json(["message" => "Activity not found"], 404);
        }

        $activity->delete($request->all());

        return response()->json($activity, 200);
    }

}
