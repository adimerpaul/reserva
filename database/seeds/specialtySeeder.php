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
        DB::table('specialtys')->insert(['name'=>'Medicina general','color'=>'#ef9a9a']);
        DB::table('specialtys')->insert(['name'=>'Emergencias','color'=>'#f48fb1']);
        DB::table('specialtys')->insert(['name'=>'Ginecología y obstetricia','color'=>'#ce93d8']);
        DB::table('specialtys')->insert(['name'=>'Pediatría','color'=>'#b39ddb']);
        DB::table('specialtys')->insert(['name'=>'Neonatología','color'=>'#9fa8da']);
        DB::table('specialtys')->insert(['name'=>'Cirugía','color'=>'#90caf9']);
        DB::table('specialtys')->insert(['name'=>'Cirugía maxilofacial','color'=>'#81d4fa']);
        DB::table('specialtys')->insert(['name'=>'Odontología','color'=>'#80deea']);
        DB::table('specialtys')->insert(['name'=>'Medicina interna','color'=>'#80cbc4']);
        DB::table('specialtys')->insert(['name'=>'Neurocirugía','color'=>'#a5d6a7']);
        DB::table('specialtys')->insert(['name'=>'Gastroenterología','color'=>'#c5e1a5']);
        DB::table('specialtys')->insert(['name'=>'Endocrinología','color'=>'#e6ee9c']);
        DB::table('specialtys')->insert(['name'=>'Dermatología','color'=>'#fff59d']);
        DB::table('specialtys')->insert(['name'=>'Oftalmología','color'=>'#ffe082']);
        DB::table('specialtys')->insert(['name'=>'Fisioterapia','color'=>'#ffcc80']);
        DB::table('specialtys')->insert(['name'=>'Nutrición','color'=>'#ffab91']);
        DB::table('specialtys')->insert(['name'=>'Psicología','color'=>'#bcaaa4']);
        DB::table('specialtys')->insert(['name'=>'Cardiología','color'=>'#eeeeee']);
        DB::table('specialtys')->insert(['name'=>'Urología','color'=>'#b0bec5']);
        DB::table('specialtys')->insert(['name'=>'Nefrología','color'=>'#e57373']);
        DB::table('specialtys')->insert(['name'=>'Hematología','color'=>'#f06292']);
        DB::table('specialtys')->insert(['name'=>'Neumología','color'=>'#64b5f6']);
        DB::table('specialtys')->insert(['name'=>'Proctología','color'=>'#4fc3f7']);
        DB::table('specialtys')->insert(['name'=>'Psiquiatría','color'=>'#4dd0e1']);
        DB::table('specialtys')->insert(['name'=>'Oncología','color'=>'#4db6ac']);
        DB::table('specialtys')->insert(['name'=>'Anestesiología','color'=>'#81c784']);
        DB::table('specialtys')->insert(['name'=>'Geriatría','color'=>'#aed581']);
        DB::table('specialtys')->insert(['name'=>'Terapia intensiva','color'=>'#dce775']);
    }
}
