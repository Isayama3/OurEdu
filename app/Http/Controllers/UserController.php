<?php

namespace App\Http\Controllers;

use App\Models\User as Model;
use App\Http\Resources\UserResource as Resource;
use App\Http\Requests\UserRequest as FormRequest;

class UserController extends Controller
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
