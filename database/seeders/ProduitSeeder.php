<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
            // 'name' => str()::random(10),
            // 'description' => str()::random(10),
            // 'prix'=>floatValue()::random(10),
            // 'quantitue'=>integerValue()::random(10),
            Produit::factory()
        ->count(50)
        // ->hasPosts(1)
        ->create();
        
    }
}
