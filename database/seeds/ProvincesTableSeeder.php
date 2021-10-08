<?php

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('provinces')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        factory(Province::class, 30)->create();
    }
}
