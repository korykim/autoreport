<?php

namespace App\Admin\Repositories;

use App\Models\Contact as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Contact extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
