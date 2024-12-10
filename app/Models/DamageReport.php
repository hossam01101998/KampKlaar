<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $fillable = [
    'item_id',
    'description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
