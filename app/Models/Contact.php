<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = [];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function job_tags(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobTag::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function buyers()
    {
        return $this->belongsTo(Buyer::class);
    }
}
