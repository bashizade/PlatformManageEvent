<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','event_id','patch_file','number','date','agent','status'
    ];

    public function event()
    {
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
