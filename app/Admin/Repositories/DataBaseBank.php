<?php

namespace App\Admin\Repositories;

use App\Models\DataBaseBank as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DataBaseBank extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
