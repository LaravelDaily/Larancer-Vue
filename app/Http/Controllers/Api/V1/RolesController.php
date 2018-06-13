<?php

namespace App\Http\Controllers\Api\V1;

use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class RolesController extends Controller
{
    public function index()
    {
        if (Gate::denies('role_access') && Gate::denies('user_access')) {
            return abort(401);
        }

        return new RoleResource(Role::with(['permission'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('role_view')) {
            return abort(401);
        }

        $role = Role::with(['permission'])->findOrFail($id);

        return new RoleResource($role);
    }

    public function store(StoreRolesRequest $request)
    {
        if (Gate::denies('role_create')) {
            return abort(401);
        }

        $role = Role::create($request->all());
        $role->permission()->sync($request->input('permission', []));
        

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateRolesRequest $request, $id)
    {
        if (Gate::denies('role_edit')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permission()->sync($request->input('permission', []));
        
        

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('role_delete')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);
        $role->delete();

        return response(null, 204);
    }
}
