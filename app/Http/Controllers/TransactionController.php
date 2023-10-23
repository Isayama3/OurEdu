<?php

namespace App\Http\Controllers;

use App\Models\Transaction as Model;
use App\Http\Resources\TransactionResource as Resource;
use App\Http\Requests\TransactionRequest as FormRequest;

class TransactionController extends Controller
{
    public function __construct(FormRequest $request, Model $model, $resource = Resource::class)
    {
        parent::__construct(
            $request,
            $model,
            $resource,
        );
    }

    public function relations(): array
    {
        return [];
    }
}
