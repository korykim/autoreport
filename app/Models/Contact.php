<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = [];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function job_tags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobTag::class);
    }
}
