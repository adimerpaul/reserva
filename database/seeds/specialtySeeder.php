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
        DB::table('specialtys')->insert(['name'=>'Medicina general','descripcion'=>'Disciplina médica que se encarga de mantener la salud en todos los aspectos','color'=>'#ef9a9a']);
        DB::table('specialtys')->insert(['name'=>'Emergencias','descripcion'=>'una situación fuera de control que se presenta por el impacto de un desastre.','color'=>'#f48fb1']);
        DB::table('specialtys')->insert(['name'=>'Ginecología y obstetricia','descripcion'=>'Especialidad médica dedicada a los campos de la obstetricia y la ginecología a través de un único programa de formación académica.','color'=>'#ce93d8']);
        DB::table('specialtys')->insert(['name'=>'Pediatría','descripcion'=>'estudia al niño y sus enfermedades','color'=>'#b39ddb']);
        DB::table('specialtys')->insert(['name'=>'Neonatología','descripcion'=>'lorem impus','color'=>'#9fa8da']);
        DB::table('specialtys')->insert(['name'=>'Cirugía','descripcion'=>'lorem impus','color'=>'#90caf9']);
        DB::table('specialtys')->insert(['name'=>'Cirugía maxilofacial','descripcion'=>'lorem impus','color'=>'#81d4fa']);
        DB::table('specialtys')->insert(['name'=>'Odontología','descripcion'=>'lorem impus','color'=>'#80deea']);
        DB::table('specialtys')->insert(['name'=>'Medicina interna','descripcion'=>'lorem impus','color'=>'#80cbc4']);
        DB::table('specialtys')->insert(['name'=>'Neurocirugía','descripcion'=>'lorem impus','color'=>'#a5d6a7']);
        DB::table('specialtys')->insert(['name'=>'Gastroenterología','descripcion'=>'lorem impus','color'=>'#c5e1a5']);
        DB::table('specialtys')->insert(['name'=>'Endocrinología','descripcion'=>'lorem impus','color'=>'#e6ee9c']);
        DB::table('specialtys')->insert(['name'=>'Dermatología','descripcion'=>'lorem impus','color'=>'#fff59d']);
        DB::table('specialtys')->insert(['name'=>'Oftalmología','descripcion'=>'lorem impus','color'=>'#ffe082']);
        DB::table('specialtys')->insert(['name'=>'Fisioterapia','descripcion'=>'lorem impus','color'=>'#ffcc80']);
        DB::table('specialtys')->insert(['name'=>'Nutrición','descripcion'=>'lorem impus','color'=>'#ffab91']);
        DB::table('specialtys')->insert(['name'=>'Psicología','descripcion'=>'lorem impus','color'=>'#bcaaa4']);
        DB::table('specialtys')->insert(['name'=>'Cardiología','descripcion'=>'lorem impus','color'=>'#eeeeee']);
        DB::table('specialtys')->insert(['name'=>'Urología','descripcion'=>'lorem impus','color'=>'#b0bec5']);
        DB::table('specialtys')->insert(['name'=>'Nefrología','descripcion'=>'lorem impus','color'=>'#e57373']);
        DB::table('specialtys')->insert(['name'=>'Hematología','descripcion'=>'lorem impus','color'=>'#f06292']);
        DB::table('specialtys')->insert(['name'=>'Neumología','descripcion'=>'lorem impus','color'=>'#64b5f6']);
        DB::table('specialtys')->insert(['name'=>'Proctología','descripcion'=>'lorem impus','color'=>'#4fc3f7']);
        DB::table('specialtys')->insert(['name'=>'Psiquiatría','descripcion'=>'lorem impus','color'=>'#4dd0e1']);
        DB::table('specialtys')->insert(['name'=>'Oncología','descripcion'=>'lorem impus','color'=>'#4db6ac']);
        DB::table('specialtys')->insert(['name'=>'Anestesiología','descripcion'=>'lorem impus','color'=>'#81c784']);
        DB::table('specialtys')->insert(['name'=>'Geriatría','descripcion'=>'lorem impus','color'=>'#aed581']);
        DB::table('specialtys')->insert(['name'=>'Terapia intensiva','descripcion'=>'lorem impus','color'=>'#dce775']);
    }
}
