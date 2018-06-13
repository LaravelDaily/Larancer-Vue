<?php

namespace App\Http\Controllers\Api\V1;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Resources\Document as DocumentResource;
use App\Http\Requests\Admin\StoreDocumentsRequest;
use App\Http\Requests\Admin\UpdateDocumentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class DocumentsController extends Controller
{
    public function index()
    {
        

        return new DocumentResource(Document::with(['project'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('document_view')) {
            return abort(401);
        }

        $document = Document::with(['project'])->findOrFail($id);

        return new DocumentResource($document);
    }

    public function store(StoreDocumentsRequest $request)
    {
        if (Gate::denies('document_create')) {
            return abort(401);
        }

        $document = Document::create($request->all());
        
        if ($request->hasFile('file')) {
            $document->addMedia($request->file('file'))->toMediaCollection('file');
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateDocumentsRequest $request, $id)
    {
        if (Gate::denies('document_edit')) {
            return abort(401);
        }

        $document = Document::findOrFail($id);
        $document->update($request->all());
        
        if (! $request->input('file') && $document->getFirstMedia('file')) {
            $document->getFirstMedia('file')->delete();
        }
        if ($request->hasFile('file')) {
            $document->addMedia($request->file('file'))->toMediaCollection('file');
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('document_delete')) {
            return abort(401);
        }

        $document = Document::findOrFail($id);
        $document->delete();

        return response(null, 204);
    }
}
