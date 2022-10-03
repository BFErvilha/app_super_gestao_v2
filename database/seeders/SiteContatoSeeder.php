<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $contato = new SiteContato();
//
//        $contato->nome=' Sistema SG';
//        $contato->telefone=' (11) 99999-8888';
//        $contato->email='contato@sg.com.br';
//        $contato->motivo=1;
//        $contato->mensagem='Seja bem-vindo ao sistema Super Gestão';
//        $contato->save();

        \App\Models\SiteContato::factory(100)->create();
    }
}
