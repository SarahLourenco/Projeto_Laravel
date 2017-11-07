<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\HistVenda;

class RegistrarVendasController extends Controller
{
    private $produtos;
    private $histvendas;
    private $totalPage;
    
    public function __construct(HistVenda $hist, Produto $produto) {
       $this->histvendas = $hist;
       $this->produtos = $produto; // para carregar a lista de produtos no formulário  
       $this->totalPage = 5;
    }
    
    public function index() {
        $produtos = $this->produtos->all();
        $histvendas = $this->histvendas->paginate($this->totalPage);
        return view('listar_histVendas', compact('histvendas','produtos'));
    }


    public function create()
    {
        $title = ' Empreendimento Mimo de Maria - Registro de Vendas';
        $acaoEscolhida = " Registrando";
        
        $produtos = $this->produtos->all();
        return view('form_registrar-editarVenda', compact('acaoEscolhida', 'produtos'), ['titulo' => $title]);
    }
    
    public function store(Request $request)
    { 
        $dadosForm = $request->except('_token');
       // $qtdVendido = $request->input('qtdVendido');
      
        $insert = $this->histvendas->create($dadosForm);      
        
        if($insert){
            redirect()->route('vendasRegistrar.index');
        } else{
            redirect()->route('vendasRegistrar.create');
        }        
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $histvendas = $this->histvendas->find($id);
        
        $title = " Empreendimento Mimo de Maria - Registros de vendas";
        $acaoEscolhida = " Editando";
        $hist = $this->histvendas->all();
        $produtos = $this->produtos->all();
        return view('form_registrar-editarVenda', compact('produtos', 'acaoEscolhida','title'), ['titulo' => $title]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
         $hist = $this->histvendas->find($id);
        //dd($produtos);
         $delete = $hist->delete();        
         
         if($delete)
            return redirect()->route('vendasRegistrar.index');
        else      
            return redirect()->route('vendasRegistrar.index',$id)->with(['errors'=> "Falha ao Excluir Registro de venda"]);
    }
    
    public function pesquisaMaisVendidosPorMes(){
        
    }
    
}
