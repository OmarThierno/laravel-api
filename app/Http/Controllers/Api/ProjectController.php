<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::with(['type', 'technologys'])->get();
        $data = [
            'results' => $projects,
            'success' => true,
        ];

        return response()->json($data);
    }

    public function show(string $slug) {
        $project = Project::with('type', 'technologys', 'user')->where('slug', $slug)->first();

        if (!$project) {
            return response('Post non trovato', 404);
        }

        $data = [
            'results'=> $project,
            'success'=> true
        ];

        return response()->json($data);
    }
}
