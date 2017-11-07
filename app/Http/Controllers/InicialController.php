<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class InicialController extends Controller {

    public function index() {
        $title = 'Pagina inicial - Empreendimento Mimo de Maria';
        $produtos = Produto::all();
       
        $custoProdQtd = 0;
        $valorVendaTotal = 0;
        $saldoBruto = 0;
        
        foreach ($produtos as $prod) {
            $custoProdQtd += $prod->qtd * $prod->custo;
            $valorVendaTotal += $prod->valor * $prod->qtd;
        }
        
        $saldoBruto = $valorVendaTotal - $custoProdQtd;
        return view('inicial', ['titulo' => $title, 
                                'custo' => $custoProdQtd,
                                'aqui' => $valorVendaTotal,
                                'bruto' => $saldoBruto]);
        
    }
}
