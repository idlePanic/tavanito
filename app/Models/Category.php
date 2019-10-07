<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "categories";
    protected $fillable = ['name' , 'category_id'];



    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id')->where('parent_id',0)->with('parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'category_id')->with('children');
    }
}
