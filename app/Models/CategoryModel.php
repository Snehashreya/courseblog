<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'metatitle',
        'metadesc',
        'metakeyword',
        'navstatus',
        'status	',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(ProductModel::class,'id','cate_id');
    }
}
