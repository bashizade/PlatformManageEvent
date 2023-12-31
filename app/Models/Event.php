<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id','title','description','start_date','end_date','view','price','count','message','file_patch','status'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EventCategory::class,'event_id','id');
    }

    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EventFile::class,'event_id','id');
    }
}
