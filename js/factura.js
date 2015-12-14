/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cantidades(){
     var cant = 0;
    $('.input-cantidad').each(function(){    
        cant = parseFloat($(this).text());  
    });
    var val = 0;
    $('.input-valor').each(function(){     
        val = parseFloat($(this).text());
    });
    var tot= cant * val;
    $(".preview-cant").text(tot);  
}


function calc_total(){
    var sum = 0;
    $('.input-total').each(function(){
        sum += parseFloat($(this).text());
    });
    $(".preview-total").text(sum);    
}


//function calc_iva(){
//   var iva =0;
//  $('.input-iva').each(function(){
//        iva =  calc_total * 19 / 100($(this).text());
//    });
//    $(".preview-iva").text(iva);
//    
//}

$(document).on('click', '.input-remove-row', function(){ 
    var tr = $(this).closest('tr');
    tr.fadeOut(200, function(){
    	tr.remove();
	   	calc_total()
              
	});
});

$(function(){
    $('.preview-add-button').button().click(function(){
        var form_data = {};
        form_data["codMaterial"] = $('.payment-form input[name="codMaterial"]').val();
        form_data["producto"] = $('.payment-form #producto option:selected').text();
        form_data["cantidad"] = parseFloat($('.payment-form input[name="cantidad"]').val());
        form_data["valor"] = parseFloat($('.payment-form input[name="valor"]').val());
        form_data["total"] = parseFloat($('.payment-form input[name="total"]').val());
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function( type, value ) {
            $('<td class="input-'+type+'"></td>').html(value).appendTo(row);
        });
        $('.preview-table > tbody:last').append(row); 
        calc_total();
//        calc_iva();
        cantidad();
    });  
});
