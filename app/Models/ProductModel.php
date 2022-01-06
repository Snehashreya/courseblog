<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [

        'cate_id',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'image',

    ];


    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'cate_id','id');
    }


}


