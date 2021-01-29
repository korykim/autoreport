<?php

namespace App\Admin\Repositories;

use App\Models\BuyerPeople as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class BuyerPeople extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
