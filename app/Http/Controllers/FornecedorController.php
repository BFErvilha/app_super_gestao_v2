<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index (){
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
                'cnpj' => '000000000000',
                'ddd' => '16'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'N',
                'cnpj' => '000000000002',
                'ddd' => '35'
            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'N',
                'cnpj' => '000000000003',
                'ddd' => '21'
            ],
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
