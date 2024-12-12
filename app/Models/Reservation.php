<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $primaryKey = 'reservation_id';
    
    protected $fillable = ['user_id',
    'item_id',
    'quantity',
    'status',
    'start_date',
    'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
