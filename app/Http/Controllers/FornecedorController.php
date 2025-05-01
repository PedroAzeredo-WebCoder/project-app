<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'F',
                'cnpj' => '12345678901234',
                'ddd' => '51',
                'telefone' => '994442101',
                'categorias' => ['eletronicos', 'informatica'],
                'atendimento' => ['RS', 'SC', 'PR']
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'T',
                'cnpj' => '12345678901235',
                'ddd' => '11',
                'telefone' => '999999999',
                'categorias' => ['informatica', 'moveis'],
                'atendimento' => ['SP', 'RJ', 'MG']
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'cnpj' => NULL,
                'ddd' => NULL,
                'telefone' => NULL,
                'categorias' => ['informatica', 'moveis'],
                'atendimento' => ['SP', 'RJ', 'MG']
            ]
        ];

        return view('admin.fornecedor.index', compact('fornecedores'));
    }
}
