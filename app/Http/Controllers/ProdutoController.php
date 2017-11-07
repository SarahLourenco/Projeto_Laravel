<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Materiaprima;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller {

    private $produtos;
    private $totalPage = 5;

    public function __construct(Produto $produto) {
        $this->produtos = $produto;
    }

    public function index() { // trazendo produto e materia
        $produtos = $this->produtos->paginate($this->totalPage);
        return view('listar_produto', compact('produtos'));
    }

    public function create() {
        $title = ' Empreendimento Mimo de Maria - Cadastro de Produto';
        $acaoEscolhida = " Cadastrando";

        $materias = materiaprima::all();
        $produtos = $this->produtos->all();
        return view('form_cadastrar-editarProduto', compact('acaoEscolhida', 'materias'), ['titulo' => $title]);
    }

    public function store(Request $request) {

        $dadosForm = $request->except('_token', 'materias'); // pegando apaenas campos do produto
        $materiaDoProduto = $request->input('materias'); // para pegar o array com as materias  
        $prod = new Produto($dadosForm); // criando obj para salvar no banco e retornar a chave

        $custoProdtuo = 0;
        foreach ($materiaDoProduto as $mat) {
            $m = materiaprima::find($mat); // pesquisa na lista de materia            
            if ($m->qtd < $prod->qtd) { // verifica a qtd no estoque.
                echo " Nao foi possível criar o produto! matéria {$m->nome}, com baixa qtd no estoque.";
                return redirect()->back();
            } else {
                $m->qtd -= $prod->qtd; // diminuindo no estoque a materia prima
                $custoProdtuo += $m->custo;  
                $m->update();
            }            
         }

        $prod->custo = $custoProdtuo;
        $prod->save(); // salvando no banco
        $id = $prod->getKey(); // pegando a chave do produto criado
        $prod = Produto::find($id); // pegando id do produto que esta sendo criado
        $prod->materias()->sync($materiaDoProduto); // fazendo a conexao

        $m->save();   // criando o produto no banco, se sucesso  
        return redirect()->route('produto.index');
    }

    public function edit($id) {
        $produtos = $this->produtos->find($id);

        $title = " Empreendimento Mimo de Maria - Editando  Produto {$produtos->nome}";
        $acaoEscolhida = " Editando";
        $materias = materiaprima::all();
        return view('form_cadastrar-editarProduto', compact('materias', 'produtos', 'acaoEscolhida', 'title'), ['titulo' => $title]);
    }

    public function update(Request $request, $id) {

        $materiaDoProduto = $request->input('materias'); // para pegar o array com as materias          
        $dadosForm = $request->all();
        $produtos = $this->produtos->find($id);

        $update = $produtos->update($dadosForm);

        if ($update) {
            $prod = Produto::find($id); // pegando id do produto que esta sendo criado
            $prod->materias()->sync($materiaDoProduto); // fazendo a conexao
            return redirect()->route('produto.index');
        } else
            return redirect()->route('materiaPrima.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id) {
        $produtos = $this->produtos->find($id);
        //dd($produtos);
        $delete = $produtos->delete();

        if ($delete)
            return redirect()->route('produto.index');
        else
            return redirect()->route('produto.index', $id)->with(['errors' => "Falha ao Excluir a materia prima $materias->nome"]);
    }

    public function poucoProduto() { // trazendo produto e materia
        $title = ' Empreendimento Mimo de Maria - Estoque de Produto em baixa';
        $m = $this->produtos->all();

        $pages = Produto::where('qtd', '<=', 3)->paginate($this->totalPage);

        return view('relatorioProdutoEstoque', compact('pages'), ['titulo' => $title]);
    }

    public function ondetamateria() {
        $materia = Materiaprima::where('nome', 'capa')->get()->first();
        echo "A matéria prima<b> {$materia->nome} </b> está no produto: <br>";

        $produtos = $materia->produtos;
        foreach ($produtos as $produto) {
            echo " {$produto->nome}<br>";
        }
    }

    public function produtoComMateria($id) { // esse metodo listar só os produtos. no proximo coloca esse mtd completo
        $produto = Produto::find($id);
        echo "<b> {$produto->nome}: </b> <br>";

        $materias = $produto->materias;
        foreach ($materias as $materia) {
            echo "{$materia->nome}<br>";
        }
    }

    public function inserir($id, $dataForm) {
// primeiro criar o produto. guardar o resto dos dados.
// vincular mateira ao produto depois de criado
// $dataForm = [1, 2]; // vai vir do formulario o id das materia prima selecionadas
        $produto = Produto::find($id); // pegando id do produto que esta sendo criado???? tera q criar primeiro o produto ?
        echo "<b> {$produto->nome}:</b><br><br>";
//$produto->materias()->attach($dataForm);// insere sem parar
        $produto->materias()->sync($dataForm); // insere sincronizando dados
//$produto->materias()->detach($dataForm);// vazio remove td, com id remove id
        $materias = $produto->materias;
        foreach ($materias as $materia) {
            echo "{$materia->nome}<br>";
        }
    }

    public function trazendoProdutoMaisMateria() { // trazendo produto e materia
        $produtos = $this->produtos->all();

        foreach ($produtos as $prod) {
            echo "<br><br><b> {$prod->nome}: </b> <br>";

            $materias = $prod->materias;
            foreach ($materias as $materia) {
                echo "{$materia->nome} {$materia->qtd}<br>";
            }
        }
    }

    public function sugestaoCriacao() {

        $sugestao = Produto::select('produtos.nome')
                        ->join('materiaprima_produto', 'produtos.id', '=', 'materiaprima_produto.produto_id')
                        ->join('materia_prima', 'materia_prima.id', '=', 'materiaprima_produto.materiaprima_id')
                        ->where('materia_prima.qtd', '>', 0)->paginate($this->totalPage);

        return view('listar_sugestaoCriacao', compact('sugestao'));
    }
    
    public function relatorioMensal(Request $request) {
        $dadosForm = $request->input('mesSelecionado');
        //$relatorio = DB::table('produtos')->
        $relatorio = Produto::
                select(
                        'produtos.nome', 'produtos.custo', 'produtos.valor', DB::raw('SUM(produtos.valor - produtos.custo) as LucroObtido'), DB::raw('COUNT(hist_vendas.qtd_vendido) as QuantidadeVendidos')
                )
                ->join('hist_vendas', 'produtos.id', '=', 'hist_vendas.produto_id')
                ->groupBy('produtos.nome', 'produtos.custo', 'produtos.valor')
                ->where(DB::raw('MONTH(hist_vendas.data_venda)'), '=', $dadosForm)
                ->get();

        $custoTotal = 0;
        $valorTotal = 0;
        $saldo = 0;
        $qtd = 0;

        foreach ($relatorio as $prod) {
            $custoTotal += $prod->QuantidadeVendidos * $prod->custo;
            $valorTotal += $prod->valor * $prod->QuantidadeVendidos;
            $qtd += $prod->QuantidadeVendidos;
        }
        
        $saldo = $valorTotal - $custoTotal;
        
        return view('relatorioVendaMensal', compact('relatorio', 'custoTotal', 'valorTotal', 'saldo', 'qtd', 'mes'));
    }

}
                