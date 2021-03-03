<?php

namespace App\Admin\Repositories;

use App\Models\WorkPlan as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WorkPlan extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
