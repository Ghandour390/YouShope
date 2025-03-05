<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sucategorie extends Model
{
    protected $fillable = ['name','categorie_id','description'];

    protected $table = 'sucategorie';


    public function categorie(){return $this->belongsTo(categorie::class);}
    public function produit(){return $this->hasMany(produit::class);}
}
