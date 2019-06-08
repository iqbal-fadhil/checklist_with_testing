<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;


class ChecklistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $checklists = Checklist::all();

     return response()->json($checklists);

    }

     public function create(Request $request)
     {
        $checklist = new Product;

       $checklist->type= $request->type;
       $checklist->id = $request->id;
       $checklist->object_domain= $request->object_domain;
       $checklist->object_id= $request->object_id;
       $checklist->description= $request->description;
       $checklist->is_completed= $request->is_completed;
       
       $checklist->save();

       //$product = Product::create($request->all());

       return response()->json($checklist);
     }

     public function show($id)
     {
        $checklist = Product::find($id);

        return response()->json($checklist);
     }

     public function update(Request $request, $id)
     { 
        $checklist= Product::find($id);
        

       $checklist->type= $request->input('type');
       $checklist->id = $request->input('id');
       $checklist->object_domain= $request->input('object_domain');
       $checklist->object_id= $request->input('object_id');
       $checklist->description= $request->input('description');
       $checklist->is_completed= $request->input('is_completed');
        $checklist->save();
        return response()->json($checklist);
     }

     public function destroy($id)
     {
        $checklist = Checklist::find($id);
        $checklist->delete();

         return response()->json('Checklist removed successfully');
     }


    }

    

