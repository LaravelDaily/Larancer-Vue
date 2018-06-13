<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class UsersController extends Controller
{
    public function index()
    {
        if (Gate::denies('user_access')) {
            return abort(401);
        }

        return new UserResource(User::with(['role'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('user_view')) {
            return abort(401);
        }

        $user = User::with(['role'])->findOrFail($id);

        return new UserResource($user);
    }

    public function store(StoreUsersRequest $request)
    {
        if (Gate::denies('user_create')) {
            return abort(401);
        }

        $user = User::create($request->all());
        $user->role()->sync($request->input('role', []));
        

        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        if (Gate::denies('user_edit')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->role()->sync($request->input('role', []));
        
        

        return (new UserResource($user))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('user_delete')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return response(null, 204);
    }
}
