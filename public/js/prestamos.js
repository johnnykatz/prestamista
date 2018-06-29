/**
 * Created by cesarkatz on 25/6/18.
 */

function getAmortizacion(url) {
    $.ajax({
        type: 'GET',
        url: url,
        data: $('#form_cuerpo').serialize(),
        success: function (data) {
            $('#cuerpo_modal').html(data);
            $('#amortizacion_modal').modal('show');
        }
    });

}

function seleccionarPagar(){
    if($('#pagar').val()=='cuota'){
        $('#total_pago').val($('#monto').val());
    }else{
        $('#total_pago').val($('#interes').val());
    }
    $("#descuento").val("");
    $("#mora").val("");
}