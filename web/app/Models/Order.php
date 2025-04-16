<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

class Order extends Model
{
    use HasFactory;

    public function setting() {
        return $this->belongsTo(Setting::class,'session_id','session_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class,'order_id','order_id');
    }
}
