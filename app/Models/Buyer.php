<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $guarded = []; //黑名单-》设定不要被批量写入的字段，如果是空允许所有字段批量写入
    //protected $fillable = []; //白名单-》可以设定批量写入的字段

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function buyerpeoples(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BuyerPeople::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
