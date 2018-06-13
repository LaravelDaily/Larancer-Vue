<?php

namespace App\Http\Controllers\Api\V1;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\Client as ClientResource;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ClientsController extends Controller
{
    public function index()
    {
        

        return new ClientResource(Client::with(['client_status'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('client_view')) {
            return abort(401);
        }

        $client = Client::with(['client_status'])->findOrFail($id);

        return new ClientResource($client);
    }

    public function store(StoreClientsRequest $request)
    {
        if (Gate::denies('client_create')) {
            return abort(401);
        }

        $client = Client::create($request->all());
        
        

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateClientsRequest $request, $id)
    {
        if (Gate::denies('client_edit')) {
            return abort(401);
        }

        $client = Client::findOrFail($id);
        $client->update($request->all());
        
        
        

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('client_delete')) {
            return abort(401);
        }

        $client = Client::findOrFail($id);
        $client->delete();

        return response(null, 204);
    }
}
