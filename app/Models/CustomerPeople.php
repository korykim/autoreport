<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPeople extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';

    public function customers(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
