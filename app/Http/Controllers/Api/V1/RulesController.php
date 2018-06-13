<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Rule as RuleResource;

class RulesController extends Controller
{
    public function index()
    {
        $permissions = auth('api')->user()->role()->get()
            ->pluck('permission')
            ->flatten()
            ->pluck('title');

        return new RuleResource($permissions);
    }
}
