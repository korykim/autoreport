<?php

namespace App\Admin\Repositories;

use App\Models\Buyer as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Buyer extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
