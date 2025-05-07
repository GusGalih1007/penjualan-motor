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
}
