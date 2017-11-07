<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiaprima;
use App\Http\Requests\MateriaFormRequest;

class MateriaPrimaController extends Controller {

    private $materias;
    private $totalPage = 5;

    public function __construct(MateriaPrima $materia) {
        $this->materias = $materia;
    }

    public function index() {
        $title = ' Empreendimento Mimo de Maria - Lista de Matéria prima';
        $materias = $this->materias->paginate($this->totalPage);
        return view('listar_materiaPrima', compact('materias'), ['titulo' => $title]);
    }

    public function create() {
        $title = ' Empreendimento Mimo de Maria - Cadastro de Matéria prima';
        $acaoEscolhida = " Cadastrando";
        $tipos = ['Unidade', 'Lote', 'Metro'];
        return view('form_cadastrar-editarMateria', compact('tipos', 'acaoEscolhida'), ['titulo' => $title]);
    }

    public function store(MateriaFormRequest $request) {
        // pega todos os dados que vem do formulario
        $dadosForm = $request->all();

        $result = $this->materias->create($dadosForm);
        // dd($request->all()); // mostra em forma de array

        if ($result)
        //return "inserido com sucesso";
            return redirect()->route('materiaPrima.index');
        else
            return redirect()->back();
    }

    public function show($id) {
        return 'todos as materias UMA' . $id;
    }

    public function edit($id) {
        //  recupera o objeto materia compelto
        $materias = $this->materias->find($id);

        $title = " Empreendimento Mimo de Maria - Editando  Matéria prima {$materias->nome}";
        $acaoEscolhida = " Editando";
        $tipos = ['Unidade', 'Lote', 'Metro'];
        return view('form_cadastrar-editarMateria', compact('tipos', 'materias', 'acaoEscolhida', 'title'), ['titulo' => $title]);
    }

    public function update(MateriaFormRequest $request, $id) {
        $dadosForm = $request->all();
        $materias = $this->materias->find($id);
        $update = $materias->update($dadosForm);

        if ($update)
            return redirect()->route('materiaPrima.index');
        else
            return redirect()->route('materiaPrima.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id) {
        $materias = $this->materias->find($id);
        $delete = $materias->delete();

        if ($delete)
            return redirect()->route('materiaPrima.index');
        else
            return redirect()->route('materiaPrima.index', $id)->with(['errors' => "Falha ao Excluir a materia prima $materias->nome"]);
    }

    public function poucaMateria() { // trazendo produto e materia
        $title = ' Empreendimento Mimo de Maria - Estoque de matéria prima em baixa';
        $m = $this->materias->all(); 
        
        $pages = MateriaPrima::where('qtd', '<=', 9)->paginate($this->totalPage);
    
        return view('relatorioMateriaEstoque', compact('pages'), ['titulo' => $title]);
    }
}
