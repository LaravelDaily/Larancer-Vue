<?php

namespace App\Http\Controllers\Api\V1;

use App\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction as TransactionResource;
use App\Http\Requests\Admin\StoreTransactionsRequest;
use App\Http\Requests\Admin\UpdateTransactionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TransactionsController extends Controller
{
    public function index()
    {
        

        return new TransactionResource(Transaction::with(['project', 'transaction_type', 'income_source', 'currency'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('transaction_view')) {
            return abort(401);
        }

        $transaction = Transaction::with(['project', 'transaction_type', 'income_source', 'currency'])->findOrFail($id);

        return new TransactionResource($transaction);
    }

    public function store(StoreTransactionsRequest $request)
    {
        if (Gate::denies('transaction_create')) {
            return abort(401);
        }

        $transaction = Transaction::create($request->all());
        
        

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTransactionsRequest $request, $id)
    {
        if (Gate::denies('transaction_edit')) {
            return abort(401);
        }

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
        
        
        

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('transaction_delete')) {
            return abort(401);
        }

        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response(null, 204);
    }
}
