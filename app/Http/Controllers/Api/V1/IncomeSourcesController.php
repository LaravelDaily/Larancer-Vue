<?php

namespace App\Http\Controllers\Api\V1;

use App\IncomeSource;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomeSource as IncomeSourceResource;
use App\Http\Requests\Admin\StoreIncomeSourcesRequest;
use App\Http\Requests\Admin\UpdateIncomeSourcesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class IncomeSourcesController extends Controller
{
    public function index()
    {
        

        return new IncomeSourceResource(IncomeSource::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('income_source_view')) {
            return abort(401);
        }

        $income_source = IncomeSource::with([])->findOrFail($id);

        return new IncomeSourceResource($income_source);
    }

    public function store(StoreIncomeSourcesRequest $request)
    {
        if (Gate::denies('income_source_create')) {
            return abort(401);
        }

        $income_source = IncomeSource::create($request->all());
        
        

        return (new IncomeSourceResource($income_source))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateIncomeSourcesRequest $request, $id)
    {
        if (Gate::denies('income_source_edit')) {
            return abort(401);
        }

        $income_source = IncomeSource::findOrFail($id);
        $income_source->update($request->all());
        
        
        

        return (new IncomeSourceResource($income_source))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('income_source_delete')) {
            return abort(401);
        }

        $income_source = IncomeSource::findOrFail($id);
        $income_source->delete();

        return response(null, 204);
    }
}
