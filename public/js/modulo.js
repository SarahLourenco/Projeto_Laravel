//var LISTAR = (function(){
//	
//	var iniciarApp = function(){
//     var url = 'gerandoJson.php';
//     requisicao(url,"", listarMateriaPrima);
//	};
//
//	var listarMateriaPrima = function(data){
//		var exibir = $('#exibirMateriaPrima');
//		var template = $('#templatelistarMateriaPrima').html();
//		var html = "";
//
//		$.each(data,function(index, item){
//			html = template.replace(/{{getIdMateriaPrima}}/gi,item.id)
//							.replace(/{{getNome}}/gi,item.nome)
//							.replace(/{{getqtd}}/gi,item.qtd)
//							.replace(/{{getDescricao}}/gi,item.descricao)
//							.replace(/{{getCusto}}/gi,item.custo)
//							.replace(/{{getTipo}}/gi,item.tipo);
//           exibir.append(html);
//
//		});
//	};
//
//	var requisicao = function(url,dados,cb){
//
//		$.ajax({
//	      type: 'POST',
//	      url: url,
//	      data: dados,
//	      success: function(response) {
//	      	cb(response);
//	      }
//	    }); // fecha o ajax
//	};
//
//
//	var init = function(){
//		iniciarApp();
//	};
//
//
//	return{
//		iniciar : init
//	};
//
//})();
//
//LISTAR.iniciar();
