<?php

use Illuminate\Database\Seeder;
use App\Recette;
class RecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recettes = factory(Recette::class, 10)->create();
    }
}
