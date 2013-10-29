$().ready(function(){
	
	$('.listUsuario').click(function(){
		
		var cliente = $(this).attr('id').split('-');
		
		$('#modalCliente').removeAttr('class');
		$('p.cliente').remove();
		$('#idCliente').remove();
		$('#modalCliente').attr('class', 'btn btn-large btn-info');
		$('#clienteServico').append('<p class=\'alert alert-success cliente\'>'+cliente[1]+'</p>');
		$('#MatriculaAddForm').append("<input id='idAtleta' type='hidden' name='data[Matricula][atletas_id]' value='"+cliente[0]+"' />");
                $('#GraduacaoAddForm').append("<input id='idAtleta' type='hidden' name='data[Graduacao][atletas_id]' value='"+cliente[0]+"' />");
		
	});
        
        
	
	$('.listProdutos').click(function(){
		
		var produto = $(this).attr('id').split('-');
		
		$('#produtosServico').append('<p class=\'alert alert-info itenProduto\'>'+produto[1]+'<input type=\'hidden\' name=\'produto[]\' value=\''+produto[0]+'\' /></p>');
		$('.itenProduto').click(function(){
			$(this).remove();
		});
		
	});
	

});