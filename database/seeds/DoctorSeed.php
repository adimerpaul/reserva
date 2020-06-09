<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('doctors')->insert(['name' =>'Juan']);
        DB::table('doctors')->insert(['name' =>'Maria']);
        DB::table('doctors')->insert(['name' =>'Elizabet']);
    }
}
