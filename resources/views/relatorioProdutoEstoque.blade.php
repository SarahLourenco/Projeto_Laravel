
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
                    <th>Nome</th>
                    <th >Descrição</th>
                    <th class="text-center">Quantidade</th>
                    <th>Custo</th>
                </tr>
            </thead>
            
            <tbody id="exibirMateriaPrima">
                @foreach($pages as $produto)
                <tr>                  
                    <td> {{$produto->nome}} </td>
                    <td> {{$produto->descricao}} </td>
                    <td class="text-center"> {{$produto->qtd}} </td>
                    <td> {{$produto->custo}} </td>            
                <tr>
                @endforeach
            </tbody>
        </table>
        
    {!!$pages->links()!!}

    </div>
</div>
@endsection