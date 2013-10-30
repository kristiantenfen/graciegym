/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    $(".date, #filterVencimento-between, #filterPagamento-between").datepicker({
        
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
        ],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'
        ],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
        ],
        monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
            'Outubro','Novembro','Dezembro'
        ],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
            'Out','Nov','Dez'
        ],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
    $("#filterData-between").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
        ],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'
        ],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
        ],
        monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
            'Outubro','Novembro','Dezembro'
        ],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
            'Out','Nov','Dez'
        ],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
    
    $(".fone").mask("(99) 9999-9999");
    $(".cpf").mask("999.999.999-99");
    $(".data").mask("99/99/9999");

    $(".valor").maskMoney({
        symbol : 'R$ ',
        thousands: '.',
        decimal: ','
    });
    
    
    	
	$('.buscarData').click(function(e){
		if($('#dataDe').val() == '' || $('#dataAte').val() == '' ){
			e.preventDefault();
			alert('Preencha as datas!');
		}
	});
	
	jQuery('input').attr('autocomplete','off');
	

	$(".valor").maskMoney({decimal:",",thousands:"."});
	$('#campoBusca').keyup(function(){
		var valor = $('#campoBusca').val();
		
		$.post('/'+baseUrl+'/atletas/busca',{nome: valor, status: true}, function(data) {
			$('#resultadoBusca').html(data);
			});
	});
	
	$('#campoBuscaProdutos').keyup(function(){
		var valor = $('#campoBuscaProdutos').val();
		
		$.post('/'+baseUrl+'/produtos/busca',{nome: valor, tipo: 1}, function(data) {
			$('#resultadoBuscaProdutos').html(data);
			});
	});
	
	$('#savaMatricula').click(function(e){
		if(!$('#idAtleta').length){
			alert('Selecione o atleta!');
			e.preventDefault();
		}
	});
        
        $('#savaGraduacao').click(function(e){
		if(!$('#idAtleta').length){
			alert('Selecione o atleta!');
			e.preventDefault();
		}
	});
	
	
	 $( ".calendar" ).datepicker({ altFormat: "(d-m-Y)", buttonImage: "/images/datepicker.gif" });
         
         
         
	
    
    
});
