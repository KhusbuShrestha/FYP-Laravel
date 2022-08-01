<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDescription extends Model
{
    use HasFactory;
    protected $table = 'order_descriptions';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'amount',
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
