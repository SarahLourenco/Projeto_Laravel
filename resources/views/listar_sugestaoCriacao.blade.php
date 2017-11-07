
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
                    <th> <h2> Produtos sugeridos para criação </h2> </th>             
            </tr>
            </thead>
            <tbody id="exibirMateriaPrima">
                @foreach($sugestao as $item)
                <tr class="text-center">    
                    <td>{{ $item->nome}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!!$sugestao->links()!!}
@endsection