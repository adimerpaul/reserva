<?php

use Illuminate\Database\Seeder;

class specialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialtys')->insert(['name'=>'Medicina general']);
        DB::table('specialtys')->insert(['name'=>'Emergencias']);
        DB::table('specialtys')->insert(['name'=>'Ginecología y obstetricia']);
        DB::table('specialtys')->insert(['name'=>'Pediatría']);
        DB::table('specialtys')->insert(['name'=>'Neonatología']);
        DB::table('specialtys')->insert(['name'=>'Cirugía']);
        DB::table('specialtys')->insert(['name'=>'Cirugía maxilofacial']);
        DB::table('specialtys')->insert(['name'=>'Odontología']);
        DB::table('specialtys')->insert(['name'=>'Medicina interna']);
        DB::table('specialtys')->insert(['name'=>'Neurocirugía']);
        DB::table('specialtys')->insert(['name'=>'Gastroenterología']);
        DB::table('specialtys')->insert(['name'=>'Endocrinología']);
        DB::table('specialtys')->insert(['name'=>'Dermatología']);
        DB::table('specialtys')->insert(['name'=>'Oftalmología']);
        DB::table('specialtys')->insert(['name'=>'Fisioterapia']);
        DB::table('specialtys')->insert(['name'=>'Nutrición']);
        DB::table('specialtys')->insert(['name'=>'Psicología']);
        DB::table('specialtys')->insert(['name'=>'Cardiología']);
        DB::table('specialtys')->insert(['name'=>'Urología']);
        DB::table('specialtys')->insert(['name'=>'Nefrología']);
        DB::table('specialtys')->insert(['name'=>'Hematología']);
        DB::table('specialtys')->insert(['name'=>'Neumología']);
        DB::table('specialtys')->insert(['name'=>'Proctología']);
        DB::table('specialtys')->insert(['name'=>'Psiquiatría']);
        DB::table('specialtys')->insert(['name'=>'Oncología']);
        DB::table('specialtys')->insert(['name'=>'Anestesiología']);
        DB::table('specialtys')->insert(['name'=>'Geriatría']);
        DB::table('specialtys')->insert(['name'=>'Terapia intensiva']);
    }
}
