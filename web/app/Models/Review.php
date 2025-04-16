<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReviewType;
class Review extends Model
{
    use HasFactory;
    protected $table ='reviews';
    protected $fillable = ['id','order_id','rating','type'];

    public function review_type() {
        return  $this->belongsTo(ReviewType::class, 'type', 'id');
     }
}
