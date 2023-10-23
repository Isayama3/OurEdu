<?php

namespace App\Http\Controllers;

use App\Traits\SendResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterSort;

class Controller extends BaseController
{
    use SendResponse;

    protected $request;
    protected $model;
    protected $resource;

    public function __construct(
        FormRequest $request,
        Model $model,
        $resource,
    ) {
        $this->request = $request;
        $this->model = $model;
        $this->resource = $resource;
    }

    public function relations(): array
    {
        return [];
    }

    public function filter()
    {
        $filters  = [];
        foreach ($this->model->filterColumns() as $key => $value) {
            if (is_object($value)) {
                $filters[] = $value->getName();
            } else {
                $filters[] = $value;
            }
        }
        return $filters;
    }

    public function index()
    {
        if (in_array(FilterSort::class, class_uses_recursive($this->model))) {
            $record = $this->model->setFilters()->defaultSort('-created_at');
        } else {
            $record = $this->model->latest();
        }

        if (!empty($this->relations()))
            $record = $record->with(...$this->relations());

        $record = $record->paginate($this->request->per_page ?? 10);
        
        return $this->sendResponse(
            $this->resource::collection($record),
            withmeta: true,
            filter: $this->filter(),
        );
    }
}
