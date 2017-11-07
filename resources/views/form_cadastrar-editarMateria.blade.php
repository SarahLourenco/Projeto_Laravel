
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
    <a href="{{route('materiaPrima.index')}}">   
        <button class="btn primary btn-voltar" type="button">
            <i class="fa fa-arrow-left fa-lg" aria-hidden="true" ></i>					  
        </button>
    </a>

    @if( isset($materias) )
    <form  class="form" id="cadastrar_materiaPrima" method="post" action="{{route('materiaPrima.update', $materias->id)}}">
        {!!method_field('PUT')!!}        
        @else
        <form  class="form" id="cadastrar_materiaPrima" method="post" action="{{route('materiaPrima.store')}}">        
            @endif

            <h2>  {{ $acaoEscolhida }} Matéria Prima</h2>

            @if(isset($errors) && count($errors) > 0)
            <div class='alert-danger'>
                @foreach($errors->all() as $error )
                <p>{{$error}}</p>
                @endforeach
            </div> 
            @endif

            {!! csrf_field() !!}
            <div class="col-md-6">
                <div class="form-group">
                    <label>  Nome: </label>
                    <input type="text" placeholder="nome" name="nome" maxlength="40" class="form-control" value="{{$materias->nome or old('nome')}}">
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="descricao" placeholder="Descrição" rows="4" cols="40" maxlength="120" class="form-control" > {{$materias->descricao or old('descricao')}} </textarea>
                </div> <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" name="qtd" maxlength="8" class="form-control" value="{{$materias->qtd or old('qtd')}}">
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label> Tipo: </label>
                    <select name="tipo" class="form-control" value="{{$materias->tipo or  old('tipo')}}">

                        @foreach($tipos as $tipo)
                        <option value="{{$tipo}}"                        
                                @if(isset($materias) && $materias->tipo == $tipo)
                                selected
                                @endif

                                > {{$tipo}} </option>
                        @endforeach
                        <!--                    // verificar se vai vir do banco-->
                    </select>
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label>Custo:</label>
                    <input type="number" name="custo" maxlength="8" class="form-control" value="{{$materias->custo or old('custo')}}">
                </div> <!-- /.form-group -->
            </div>
            <div class="form-group">            
                <button class="btn btn-primary btn-lg btn-block btn-cadastrar_materiaPrima"> Enviar </button>
            </div>

        </form><!-- /.cadastrar_materiaPrima -->

</div><!-- /.container -->

@endsection