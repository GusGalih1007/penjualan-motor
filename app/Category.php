<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_category';
    protected $primaryKey = 'categoryId';

    protected $fillable = [
        'categoryName',
    ];

    // Example of a relationship
    public function Motors()
    {
        return $this->hasMany(Motors::class, 'motorId', 'motorId'); // Assuming you have a Product model
    }
}
