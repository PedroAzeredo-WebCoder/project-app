<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {
        echo "O valor de p1 é: $p1 <br>";
        echo "O valor de p2 é: $p2 <br>";
        return 'A soma de ' . $p1 . ' + ' . $p2 . ' é: ' . ($p1 + $p2);
    }
}
