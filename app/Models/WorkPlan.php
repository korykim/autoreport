<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $guarded = [];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function buyers()
    {
        return $this->belongsTo(Buyer::class);
    }
}
