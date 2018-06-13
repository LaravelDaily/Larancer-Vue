<?php

namespace App\Http\Controllers\Api\V1;

use App\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectStatus as ProjectStatusResource;
use App\Http\Requests\Admin\StoreProjectStatusesRequest;
use App\Http\Requests\Admin\UpdateProjectStatusesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ProjectStatusesController extends Controller
{
    public function index()
    {
        

        return new ProjectStatusResource(ProjectStatus::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('project_status_view')) {
            return abort(401);
        }

        $project_status = ProjectStatus::with([])->findOrFail($id);

        return new ProjectStatusResource($project_status);
    }

    public function store(StoreProjectStatusesRequest $request)
    {
        if (Gate::denies('project_status_create')) {
            return abort(401);
        }

        $project_status = ProjectStatus::create($request->all());
        
        

        return (new ProjectStatusResource($project_status))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProjectStatusesRequest $request, $id)
    {
        if (Gate::denies('project_status_edit')) {
            return abort(401);
        }

        $project_status = ProjectStatus::findOrFail($id);
        $project_status->update($request->all());
        
        
        

        return (new ProjectStatusResource($project_status))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('project_status_delete')) {
            return abort(401);
        }

        $project_status = ProjectStatus::findOrFail($id);
        $project_status->delete();

        return response(null, 204);
    }
}
