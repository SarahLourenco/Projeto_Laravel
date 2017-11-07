
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
                    <th>Tipo</th>
                    <th class="text-center">Quantidade</th>
                    <th>Custo</th>
                    <th class="text-center">Atualizar</th>
                    <th class="text-center">Excluir</th>
                </tr>

            </thead>
            <tbody id="exibirMateriaPrima">

                @foreach($materias as $materia)
                <tr>
                    <td> {{$materia->id}} </td>
                    <td> {{$materia->nome}} </td>
                    <td> {{$materia->descricao}} </td>
                    <td> {{$materia->tipo}} </td>
                    <td th class="text-center"> {{$materia->qtd}} </td>
                    <td> {{$materia->custo}} </td>

                    <td class="text-center">
                        <a href="{{route('materiaPrima.edit',$materia->id)}}"> 
                            <button class="btn primary delete btn-editar_materiaPrima" type="button">
                                <i class="fa fa-refresh fa-lg" aria-hidden="true"></i>	
                                
                            </button>	
                        </a>
                    </td>

           
                    <td class="text-center">
                            {!! Form::open(['route' => ['materiaPrima.destroy', $materia->id], 'method' =>'DELETE', 'class' => 'confirmDelete' ]) !!}
                             {!! Form::button('<i class="fa fa-trash fa-lg" aria-hidden="true" > </i>', ['type' => 'submit', 'class' => 'btn primary delete btn-excluir_materiaPrima']) !!}
                            {!!Form::close()!!}
                           
                    </td>                  
<tr>
                @endforeach
            </tbody>
        </table>
{!!$materias->links()!!}
    </div>

</div>

@endsection