<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    protected $fillable = [
        "id",
        "name",
        "slug",
        "parentID",
        "status",
        
    ];
    public function producttype()
    {
       return $this->hasMany('App\Models\producttype','categori_id','id');
    }
}