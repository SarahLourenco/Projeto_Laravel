
@extends('templates.main')

@push('css')
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <!--<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>-->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/modulo.js" type="text/javascript"></script>
    <script src="js/mimoMaria.js" type="text/javascript"></script>  
@endpush

@section('content')
<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="conteudo" class="col-md-9">
                <div class="artigo" role="article">
                    <div class="row indexMiolo">

                        <div class="col-md-4">
                                <!-- <span class=" glyphicon glyphicon-grain"></span> -->
                            <h2><a href="{{route('materiaPrima.create')}}">Cadastrar Matéria Prima</h2>
                            <img src="img/img1.jpg" alt=""></a>
                        </div>

                        <div class="col-md-4">
                            <h2><a href="{{route('materiaPrima.index')}}">Lista de Matéria Prima</a></h2>
                            <img src="img/img2.jpg" alt="">
                        </div>

                        <div class="col-md-4">
                            <h2><a href="{{route('produto.create')}}">Cadastrar produto</a></h2>
                            <img src="img/img3.jpg" alt="">
                        </div>

                    </div>
                    <!-- div row conteudo -->
                </div>
                <div class="artigo indexMiolo" role="article">
                    <div class="row">
                        <div class="col-md-4">
                            <h2><a href="{{route('produto.index')}}">Produtos em estoque</a></h2>
                            <img src="img/img3.jpg" alt="">
                           
                        </div>
                        <div class="col-md-4">
                            <h2><a href="{{route('vendasRegistrar.create')}}">Registrar venda</a></h2>
                            <img src="img/img2.jpg" alt="">                           
                        </div>
                        <div class="col-md-4">
                            <h2><a href="{{url('/sugestaoCriacao')}}">Sugestão de Criação</a></h2>
                            <img src="img/img1.jpg" alt="">                          
                        </div>
                    </div>
                    <!-- div row conteudo -->
                </div>

            </div>
            <!-- div conteudo -->

            <!-- Sidebar -->
            <div id="sidebar" class="col-md-3">
                <div class="widget">
                    <h3>Estátisticas<br><br></h3>
                    <div class="form-group">
                        <ul>
                            <li> Total confecção de produtos:   {{$custo}} <br></li>
                            <li> Valor total de venda: {{$aqui}} <br></li>
                            <li> Total Lucro:   {{$bruto}}<br><br><br></li>
                        </ul>
                        <!-- quando vender todos os produtos -->

                        
                    </div>
<!--                     <button type="submit" class="btn btn-success">ver relatório completo</button> -->
                </div>
                <div class="widget">
                    <h3>Relatórios<br><br></h3>
                    <ul>
                        <li><a href="">Os mais vendidos</a></li>
                        <li><a href="{{url('/relatorioMensal')}}">Venda Mensal</a></li>

                        <li><a href="{{url('/produtos/estoque')}}">Produtos com pouco estoque</a></li>
                        <li><a href="{{url('/materia/estoque')}}">Matéria prima com pouco estoque</a></li>
                        <!-- add campo limite de estoque -- comparar com o total e ve se esta no limite -->
                        <li><a href="{{url('/produto')}}">Produtos aguardando venda </a></li>
                        <!-- checkbox para marcar produto vendido. -->
                        <li><a href="{{url('/vendasRegistrar')}}">Registros de vendas</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- div row container -->
    </div>
    <!-- div container -->
</div>
@endsection

 