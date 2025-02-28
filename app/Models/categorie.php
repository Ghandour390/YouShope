<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['name','description'];

    public function categorie(){return $this->hasMany(sucategorie::class);}
}
