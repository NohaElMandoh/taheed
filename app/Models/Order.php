<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'order_number', 'total_amount', 'status','motorcycles_count','distribution_status','aggrement_status','receipt_number'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
