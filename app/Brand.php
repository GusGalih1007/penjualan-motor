<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brandId';

    protected $fillable = [
        'brandName',
    ];

    public function Motors()
    {
        return $this->hasMany(Motors::class, 'motorId', 'motorId'); // Assuming you have a Product model
    }
}
