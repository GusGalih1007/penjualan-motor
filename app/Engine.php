<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $table = 'tbl_engine';
    protected $primaryKey = 'engineId';

    protected $fillable = [
        'cc',
    ];

    public function Motors()
    {
        return $this->hasMany(Motors::class, 'motorId', 'motorId'); // Assuming you have a Product model
    }
}
