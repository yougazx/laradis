<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('cities')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        factory(City::class, 10)->create();
    }
}
