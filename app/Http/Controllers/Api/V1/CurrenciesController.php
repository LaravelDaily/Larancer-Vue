<?php

namespace App\Http\Controllers\Api\V1;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Resources\Currency as CurrencyResource;
use App\Http\Requests\Admin\StoreCurrenciesRequest;
use App\Http\Requests\Admin\UpdateCurrenciesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CurrenciesController extends Controller
{
    public function index()
    {
        

        return new CurrencyResource(Currency::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('currency_view')) {
            return abort(401);
        }

        $currency = Currency::with([])->findOrFail($id);

        return new CurrencyResource($currency);
    }

    public function store(StoreCurrenciesRequest $request)
    {
        if (Gate::denies('currency_create')) {
            return abort(401);
        }

        $currency = Currency::create($request->all());
        
        

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCurrenciesRequest $request, $id)
    {
        if (Gate::denies('currency_edit')) {
            return abort(401);
        }

        $currency = Currency::findOrFail($id);
        $currency->update($request->all());
        
        
        

        return (new CurrencyResource($currency))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('currency_delete')) {
            return abort(401);
        }

        $currency = Currency::findOrFail($id);
        $currency->delete();

        return response(null, 204);
    }
}
