<?php

namespace App\Http\Controllers\Api\V1;

use App\ClientStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientStatus as ClientStatusResource;
use App\Http\Requests\Admin\StoreClientStatusesRequest;
use App\Http\Requests\Admin\UpdateClientStatusesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ClientStatusesController extends Controller
{
    public function index()
    {
        

        return new ClientStatusResource(ClientStatus::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('client_status_view')) {
            return abort(401);
        }

        $client_status = ClientStatus::with([])->findOrFail($id);

        return new ClientStatusResource($client_status);
    }

    public function store(StoreClientStatusesRequest $request)
    {
        if (Gate::denies('client_status_create')) {
            return abort(401);
        }

        $client_status = ClientStatus::create($request->all());
        
        

        return (new ClientStatusResource($client_status))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateClientStatusesRequest $request, $id)
    {
        if (Gate::denies('client_status_edit')) {
            return abort(401);
        }

        $client_status = ClientStatus::findOrFail($id);
        $client_status->update($request->all());
        
        
        

        return (new ClientStatusResource($client_status))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('client_status_delete')) {
            return abort(401);
        }

        $client_status = ClientStatus::findOrFail($id);
        $client_status->delete();

        return response(null, 204);
    }
}
