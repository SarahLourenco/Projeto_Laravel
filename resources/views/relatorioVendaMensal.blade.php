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
       <div class="form-group">
        <form  class="form" id="form_relatorio" method="post" action="{{url('/relatorioMensal')}}">
        {!! csrf_field() !!}   
        <br><br><br><br> <label>Selecione um mês:</label>
            <select class="form-control" name="mesSelecionado">
                <option value="">Selecione</option>
                <option value="1">Janeiro</option>
                <option value="2">Fevereiro</option>
                <option value="3">Março</option>
                <option value="4">Abril</option>
                <option value="5">Maio</option>
                <option value="6">Junho</option>
                <option value="7">Julho</option>
                <option value="8">Agosto</option>
                <option value="9">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
                
            </select>
        </form>
           <div class="resumo">
               <!--// trazer o mes q esta se falando-->        
            
               <b>Mes Atual</b> <br>
               <br>Lucro:                           {{$saldo}}
               <br>Custo total de confeção:         {{$custoTotal}}
               <br>Valor total para venda:          {{$valorTotal}}               
               <br>Quantidade de prodtuos vendida:  {{$qtd}} <br><br>
           </div>
       </div>
            
        <br><br><br> <br><br><br>
        <table class="table table-hover" >
            <thead >
                <tr >
                    <th>Produto</th>
                    <th >Custo unitário</th>
                    <th>Valor Unitário</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center" >Lucro </th>                    
                </tr>
            </thead>
            
             <tbody id="exibirMateriaPrima">
                @foreach($relatorio as $produto)
                <tr>                  
                    <td> {{$produto->nome}} </td>
                    <td> {{$produto->custo}} </td>
                    <td> {{$produto->valor}} </td>
                    <td class="text-center"> {{$produto->QuantidadeVendidos}} </td>
                    <td class="text-center"> {{$produto->LucroObtido}} </td>
                <tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection