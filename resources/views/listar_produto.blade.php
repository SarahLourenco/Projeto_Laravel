
@extends('templates.main')

@push('css')
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/estilo.css" rel="stylesheet" type="text/css">
<link href="/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/modulo.js" type="text/javascript"></script>
<script src="/js/mimoMaria.js" type="text/javascript"></script>   
@endpush

@section('content')

<div id="corpo">
    <div class="container">
           <a href="{{url('/inicial')}}">   
        <button class="btn primary btn-voltar" type="button">
            <i class="fa fa-arrow-left fa-lg" aria-hidden="true" ></i>					  
        </button>
    </a>

        <table class="table table-hover" >
            <thead >
                <tr >
                    <th>Id</th>
                    <th>Nome</th>
                    <th >Descrição</th>
                    <th class="text-center">Custo Unitário</th>
                    <th class="text-center">Quantidade</th>
                    <th>Valor</th>
                    <th class="text-center">Detalhes</th>
                    <th class="text-center">Excluir</th>
                </tr>

            </thead>
            <tbody id="exibirMateriaPrima">

                @foreach($produtos as $produto)
                <tr>
                    <td> {{$produto->id}} </td>
                    <td> {{$produto->nome}} </td>
                    <td> {{$produto->descricao}} </td>
                    <td class="text-center"> {{$produto->custo}} </td>
                    <td th class="text-center"> {{$produto->qtd}} </td>
                    <td> {{$produto->valor}} </td>

                    <td class="text-center">
                        <a href="{{route('produto.edit',$produto->id)}}"> 
                            <button class="btn primary delete btn-editar_materiaPrima" type="button">
                                <i class="fa fa-refresh fa-lg" aria-hidden="true"></i>	

                            </button>	
                        </a>
                    </td>

                    <td class="text-center">
                        {!! Form::open(['route' => ['produto.destroy', $produto->id], 'method' =>'DELETE', 'class' => 'confirmDelete' ]) !!}
                        {!! Form::button('<i class="fa fa-trash fa-lg" aria-hidden="true" > </i>', ['type' => 'submit', 'class' => 'btn primary delete btn-excluir_materiaPrima']) !!}
                        {!!Form::close()!!}
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        {!!$produtos->links()!!}
    </div>
</div>

@endsection