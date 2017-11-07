
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
<div class= "container">
    
     <a href="{{url('/inicial')}}">   
        <button class="btn primary btn-voltar" type="button">
            <i class="fa fa-arrow-left fa-lg" aria-hidden="true" ></i>					  
        </button>
     </a>

    <h2>  {{ $acaoEscolhida }} Vendas </h2>

    @if(isset($errors) && count($errors) > 0)
    <div class='alert-danger'>
        @foreach($errors->all() as $error )
        <p>{{$error}}</p>
        @endforeach
    </div> 
    @endif

    <div class="container col-md-6 registroVendas"> 
                
    @if( !empty($hist) )
    <form  class="form" id="cadastrar_materiaPrima" method="post" action="{{route('vendasRegistrar.update', $hist->id)}}">
        {!!method_field('PUT')!!}   
    @else
        <form class="form" method="post" action="{{route('vendasRegistrar.store')}}">
            {!! csrf_field() !!}
    @endif


        

            <div class="form-group">
                <label> Produto: </label>
                <select name="produto_id" class="form-control" value="{{$produtos->nome or  old('nome')}}">
                    @foreach ($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>
            </div> <!-- /.form-group -->

            <div class="form-group">
                <label>quantidade de Itens vendido:</label>
                <input type="number" name="qtd_vendido" maxlength="8" class="form-control" value="{{ old('qtdvenda')}}">
            </div> <!-- /.form-group -->

            <div class="form-group">
                <label>Data da venda:</label>
                <input type="date" name="data_venda" maxlength="8" class="form-control" value="{{$hist->datavenda or old('data_venda')}}">
            </div> <!-- /.form-group -->

            <div class="form-group text-center">            
                <button class="btn btn-primary btn-lg  btn-registrarVendas"> Enviar </button>
            </div>

        </form><!-- formulario registar venda-->

    </div>
</div><!-- /.container -->
@endsection