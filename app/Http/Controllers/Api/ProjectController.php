<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Restituisce la lista dei progetti in formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Recupera tutti i progetti dal database
        $projects = Project::all();

        // Restituisce i progetti in formato JSON
        return response()->json($projects);
    }
}

