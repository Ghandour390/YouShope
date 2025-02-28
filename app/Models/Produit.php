<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

   protected $table = 'produits';
  protected $fillable = ['name','image','descrition','prix','quantitue','sucategorie_id'];

      public function sucategorie(){$this->belongsTo(sucategorie::class);}

}
