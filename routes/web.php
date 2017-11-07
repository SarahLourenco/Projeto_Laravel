<?php

Route::get('/', function () {
    return redirect('/login'); //ao entrar na barra vai para page de login.
                                //da página de login vai para /home "agora vc esta loado"
});                               // por isso tem q redirecionar a /home para /inicial

Auth::routes();
Route::get('/home', 'InicialController@index'); 

Route::group(['middleware' => 'auth'], function () {
    Route::get('/inicial', 'InicialController@index');
    Route::resource('/materiaPrima', 'MateriaPrimaController');
    Route::resource('/produto', 'ProdutoController');
    Route::resource('/vendasRegistrar', 'RegistrarVendasController');
    Route::get('/materia/estoque','MateriaPrimaController@poucaMateria');
    Route::get('/produtos/estoque','ProdutoController@poucoProduto');
    Route::get('/sugestaoCriacao','ProdutoController@sugestaoCriacao');
    Route::get('/esta','InicialController@estatistica');
    Route::any('/relatorioMensal', 'ProdutoController@relatorioMensal');
});


//testes
Route::get('/ondetamateria', 'ProdutoController@ondetamateria');
Route::get('/inserir', 'ProdutoController@inserir');
Route::get('/teste2','ProdutoController@trazendoProdutoMaisMateria');
Route::get('/teste1','ProdutoController@produtoComMateria');
