<?php

namespace App\Http\Controllers\Api\V1;

use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Requests\Admin\StoreProjectsRequest;
use App\Http\Requests\Admin\UpdateProjectsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ProjectsController extends Controller
{
    public function index()
    {
        

        return new ProjectResource(Project::with(['client', 'project_status'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('project_view')) {
            return abort(401);
        }

        $project = Project::with(['client', 'project_status'])->findOrFail($id);

        return new ProjectResource($project);
    }

    public function store(StoreProjectsRequest $request)
    {
        if (Gate::denies('project_create')) {
            return abort(401);
        }

        $project = Project::create($request->all());
        
        

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProjectsRequest $request, $id)
    {
        if (Gate::denies('project_edit')) {
            return abort(401);
        }

        $project = Project::findOrFail($id);
        $project->update($request->all());
        
        
        

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('project_delete')) {
            return abort(401);
        }

        $project = Project::findOrFail($id);
        $project->delete();

        return response(null, 204);
    }
}
