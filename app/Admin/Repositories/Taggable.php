<?php

namespace App\Admin\Repositories;

use App\Models\Taggable as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Taggable extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
