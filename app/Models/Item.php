<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'inventory';

    protected $primaryKey = 'item_id';

    protected $fillable = ['name',
    'description',
    'quantity',
    'youth_movement',
    'place'];


    public function reservations()
    {

        return $this->hasMany(Reservation::class, 'item_id');
    }

    public function damageReports()

    {
        return $this->hasMany(DamageReport::class, 'item_id');
    }

}
