<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('technologies', 'type')->paginate(5);

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show( $slug ){

        $projects = Project::with('technologies', 'type')->where( 'slug', $slug )->first();
    
        if($projects){
            return response()->json([
                'success' => true,
                'project' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Il progetto non esiste'
            ]);
        }
    }


}
