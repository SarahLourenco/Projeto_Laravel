<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>{{ $titulo or 'Empreendiento Mimo de Maria' }}</title>  
        @stack('css')
    </head>
    <body>
        @yield('nav')
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/inicial">LOGO</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/inicial">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                
                                 <li><a href="{{url('/vendasRegistrar')}}">Registro das vendas</a></li> 
                                <li class="divider"></li>
                                
                                <li><a href="{{url('/sugestaoCriacao')}}">Sugestão de criação de produtos</a></li>
                                 <li><a href="{{url('/produtos/estoque')}}">Produtos com estoque em baixa</a></li>
                                 <li><a href="{{url('/materia/estoque')}}">Matéria prima com estoque em baixa</a></li>
                                <li class="divider"></li>
                                
                                <li><a href="{{url('/relatorioMensal')}}">Venda Mensal</a></li> 
                                 <!--<li><a href="#">Os mais vendidos</a></li>-->
                                <li><a href="{{url('/produto')}}">Produtos aguardando venda</a></li>
                                <li class="divider"></li>
                                
                            </ul>
                        </li>
                         <li><a href="{{url('/materiaPrima')}}">Gestão de Matéria Prima</a></li>
                          <li><a href="{{url('/produto')}}">Gestão de Produto </a></li>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
<!--                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pesquisar">
                        </div>
                        <button type="submit" class="btn btn-default">Pesquisar</button>
                    </form>-->
                    <ul class="nav navbar-nav navbar-right"> <!--   PARTE DE LOGOUT NO MENU -->   
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> <!-- final do navbar -->
        @yield('content')
       
        @yield('footer')
        <footer>
            <!-- Aqui e a area do footer -->
            <div class="container">
                <div class="row">
                    <div id="linksImportantes" class="col-md-3">
                        <h4>Fornecedoes</h4>
                        <ul>
                            <li><a href="#">Link1</a></li>
                            <li><a href="#">Link2</a></li>
                            <li><a href="#">Link3</a></li>
                            <li><a href="#">Link4</a></li>
                        </ul>
                    </div>
                    <!-- Aqui e a area dos links importantes -->
                    <div id="redesSociais" class="col-md-3">
                        <h4>Redes Sociais</h4>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Googleplus</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                    </div>
                    <!-- Aqui e a area das redes socPiais -->
                    <div id="logoFooter" class="col-md-offset-3 col-md-3">
                        <h2>Meu site</h2>
                    </div>
                    <!-- Aqui e a area da logo do rodape -->
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>&copy; Todos os direitos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    @stack('scripts')
    </body>
</html>

