<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Producto extends Model
{
    protected $fillable = ['name','description','price', 'size', 'category_id','image'];
}
