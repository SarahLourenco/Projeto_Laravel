
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
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <a href="{{url('/inicial')}}">   
        <button class="btn primary btn-voltar" type="button">
            <i class="fa fa-arrow-left fa-lg" aria-hidden="true" ></i>					  
        </button>
    </a>
    
    @if( isset($produtos) )
    <form  class="form" id="cadastrar_materiaPrima" method="post" action="{{route('produto.update', $produtos->id)}}">
        {!!method_field('PUT')!!}    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @else
        <form  class="form" id="cadastrar_materiaPrima" method="post" action="{{route('produto.store')}}">        
            {!! csrf_field() !!}
    @endif
    
            <h2>  {{ $acaoEscolhida }} Produto </h2>

            @if(isset($errors) && count($errors) > 0)
            <div class='alert-danger'>
                @foreach($errors->all() as $error )
                <p>{{$error}}</p>
                @endforeach
            </div> 
            @endif
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>  Nome: </label>
                    <input type="text" placeholder="nome" name="nome" maxlength="40" class="form-control" value="{{$produtos->nome or old('nome')}}">
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="descricao" placeholder="Descrição" rows="4" cols="40" maxlength="120" class="form-control" > {{$produtos->descricao or old('descricao')}} </textarea>
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" name="qtd" maxlength="8" class="form-control" value="{{$produtos->qtd or old('qtd')}}">
                </div> <!-- /.form-group -->
            </div>
            
            <div class="col-md-6">

                <div class="form-group">
                    <label> Composição: </label>
                    <select name="materias[]" multiple class="form-control"  value="{{$produtos->nome or  old('nome')}}">
                       
                        @foreach ($materias as $materia)  
                        <option id="optionAumentaCaixaMateriaProduto"
                                @if( isset($produtos) )
                                    @foreach ($produtos->materias or old('materias') as $index )
                                        @if($index->nome === $materia->nome)
                                          selected="selected"
                                        @endif
                                    @endforeach
                                @endif
                                value="{{$materia->id}}"> {{$materia->nome}}  /  Valor: {{$materia->custo}}
                            </option>
                        @endforeach                        
                        <!--                    // verificar se vai vir do banco-->
                    </select>
                </div> <!-- /.form-group -->
                

                <div class="form-group">
                    <label>Valor unitário:</label>
                    <input type="number" name="valor" maxlength="8" class="form-control" value="{{$produtos->valor or old('valor')}}">
                </div> <!-- /.form-group -->

            </div>
            <div class="form-group">            
                <button class="btn btn-primary btn-lg btn-block btn-cadastrar_materiaPrima"> Enviar </button>
            </div>

        </form><!-- /.cadastrar_Produto -->

</div><!-- /.container -->

@endsection