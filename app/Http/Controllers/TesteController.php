<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(string $tipo, int $p1, int $p2)
    {
        $nomeTipo = $tipo;
        if ($tipo == 'echo') {
            echo "<h2> $nomeTipo </h2>";
            echo "O valor de p1 é: $p1 <br>";
            echo "O valor de p2 é: $p2 <br>";
            return 'A soma de ' . $p1 . ' + ' . $p2 . ' é: ' . ($p1 + $p2);
        } else if ($tipo == 'array') {
            echo "<h2> $nomeTipo </h2>";
            return view('site.teste', ['p1' => $p1, 'p2' => $p2, 'tipo' => $tipo]);
        } else if ($tipo == 'compact') {
            echo "<h2> $nomeTipo </h2>";
            return view('site.teste', compact('p1', 'p2', 'tipo'));
        } else if ($tipo == 'with') {
            echo "<h2> $nomeTipo </h2>";
            return view('site.teste', compact('p1', 'p2', 'tipo'))->with('p1', $p1)->with('p2', $p2)->with('tipo', $tipo);
        }
    }
}
