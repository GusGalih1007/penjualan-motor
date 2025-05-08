<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motors extends Model
{
    protected $table = 'tbl_motors';
    protected $primaryKey = 'motorId'; // Assuming 'ProductID' is the primary key

    protected $fillable = [
        'motorName',
        'color',
        'categoryId', // Foreign key for the Category relationship
        'engineId', // Foreign key for the Engine relationship
        'brandId', // Foreign key for the Brand relationship
        'numberPlate',
        'condition',
        'price',
        'stock',
        'photo'
    ];

    // Define the relationship to Category
    public function Category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }

    // Define the relationship to Engine
    public function Engine()
    {
        return $this->belongsTo(Engine::class, 'engineId', 'engineId');
    }

     // Define the relationship to Brand
     public function Brand()
     {
         return $this->belongsTo(Brand::class, 'brandId', 'brandId');
     }
}
