<?php

namespace App\Http\Controllers\Api\V1;

use App\TransactionType;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionType as TransactionTypeResource;
use App\Http\Requests\Admin\StoreTransactionTypesRequest;
use App\Http\Requests\Admin\UpdateTransactionTypesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TransactionTypesController extends Controller
{
    public function index()
    {
        

        return new TransactionTypeResource(TransactionType::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('transaction_type_view')) {
            return abort(401);
        }

        $transaction_type = TransactionType::with([])->findOrFail($id);

        return new TransactionTypeResource($transaction_type);
    }

    public function store(StoreTransactionTypesRequest $request)
    {
        if (Gate::denies('transaction_type_create')) {
            return abort(401);
        }

        $transaction_type = TransactionType::create($request->all());
        
        

        return (new TransactionTypeResource($transaction_type))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTransactionTypesRequest $request, $id)
    {
        if (Gate::denies('transaction_type_edit')) {
            return abort(401);
        }

        $transaction_type = TransactionType::findOrFail($id);
        $transaction_type->update($request->all());
        
        
        

        return (new TransactionTypeResource($transaction_type))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('transaction_type_delete')) {
            return abort(401);
        }

        $transaction_type = TransactionType::findOrFail($id);
        $transaction_type->delete();

        return response(null, 204);
    }
}
