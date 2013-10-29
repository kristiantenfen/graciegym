/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
   
    $('.pagamento').live('click', function(e){        
        var idMensalidade;        
        idMensalidade = $(this).attr('id');
        
        $.post('/'+baseUrl+'/mensalidades/pagar',{idMensalidade: idMensalidade}, function(data) {
            if(data){

                
                var currentTime = new Date();
                var month = currentTime.getMonth() + 1;
                var day = currentTime.getDate();
                var year = currentTime.getFullYear();
                var date = day + "/" + month + "/" + year;

               $('.'+idMensalidade).parent().parent().find('.status').html('Pago');
               $('.'+idMensalidade).parent().parent().find('.data').html(date);
                $('.'+idMensalidade).remove();
//                alert(data);
            }else{
                alert('Pagamento não pode ser efetuado! Tende novamente');
            }
            
        });
        
                e.preventDefault();
    });
    
     $('.anular').live('click', function(e){        
        var idMensalidade;        
        idMensalidade = $(this).prev().attr('id');
        $.post('/'+baseUrl+'/mensalidades/anular',{idMensalidade: idMensalidade}, function(data) {
            
            if(data){
                
                var currentTime = new Date();
                var month = currentTime.getMonth() + 1;
                var day = currentTime.getDate();
                var year = currentTime.getFullYear();
                var date = day + "/" + month + "/" + year;

               $('.'+idMensalidade).parent().parent().find('.status').html('Anulada');
               $('.'+idMensalidade).parent().parent().find('.data').html(date);
                $('.'+idMensalidade).remove();
                
                $(this).parent().parent().remove();
              //  thpai.prevAll().html('Pago');
                $('.'+idMensalidade).remove();
//               removerLink.remove('a');
                
            }else{
                alert('Pagamento não pode ser efetuado! Tende novamente');
            }
            
        });
        
                e.preventDefault();
    });
    
    
    
});
