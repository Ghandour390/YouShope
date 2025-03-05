<?php

namespace App\Models;

use App\Models\sucategorie;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['name','description'];

    public function sucategories(){return $this->hasMany(sucategorie::class);}
}
