<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total',
        'deliveryCharge',
        'grandTotal',
    ];

    public function order_descriptions(){
        return $this->hasMany(OrderDescription::class);
    }
}


