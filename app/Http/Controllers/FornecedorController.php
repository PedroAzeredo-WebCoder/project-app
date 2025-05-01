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
                'cnpj' => '12345678901234'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'T',
                'cnpj' => '12345678901235'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => NULL,
                'cnpj' => '12345678901236'
            ]
        ];

        return view('admin.fornecedor.index', compact('fornecedores'));
    }
}
