<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('settings')->insert([
            'nome' => 'Ibero Brinde',
            'contacto1' => '912 776 909',
            'contacto2' => '912 776 909',
            'rua' => 'Rua Maria Martins, 15',
            'localidade' => 'Adaúfe',
            'codigopostal' => '4710-481',
            'cidade' => 'Porto',
            'latitude' => '41.581237',
            'longitude' => '-8.405879',
            'email1' =>  'geral@iberobrinde.com',
            'email2' =>  'geral@iberobrinde.com',
            'website' =>  'www.iberobride.pt'
        ]);

    }
}
