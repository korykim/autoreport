<?php

namespace App\Admin\Repositories;

use App\Models\CustomerPeople as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class CustomerPeople extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
