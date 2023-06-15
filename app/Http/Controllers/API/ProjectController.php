<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GrahamCampbell\ResultType\Success;
use Nette\Utils\Json;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type', 'user'])->orderByDesc('id')->paginate(6);

        return response()->json([
            'succes' => true,
            'project' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['technologies', 'type', 'user'])->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'Success' => true,
                'result' => $project,
            ]);
        } else {
            return response()->json([
                'Success' => false,
                'result' => 'page not found 404',
            ]);
        }
    }
}
