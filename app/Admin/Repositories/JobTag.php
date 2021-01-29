<?php

namespace App\Admin\Repositories;

use App\Models\JobTag as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class JobTag extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
