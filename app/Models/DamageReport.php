<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{

    protected $primaryKey = 'report_id';

    protected $table = 'damage_reports';

    public $timestamps = false;


    protected $fillable = [
    'user_id',
    'item_id',
    'description',
    'photo',];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
