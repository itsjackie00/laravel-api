<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
Use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
{
    
    $projects = Project::all();
    //dd($projects);
    //$projects = Project::paginate();
    return response()->json([
        'status' => 'success',
        'message' => 'ok',
        'results'=> $projects
    ], 200);
}
public function show($slug)
{
    $project = Project::where('slug', $slug)->with('category')->first() ;
    if($project){
        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'results'=> $project
        ]);
    }else{
        return response()->json([
            'status'=> 'success',
            'message' =>'error'
            ]);
    }
}
}