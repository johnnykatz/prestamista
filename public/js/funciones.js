function inicializarFecha() {
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        language: "es",
        autoclose: true
    });
}

function inicializarDatetimepicker() {
    $('#dateTime').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY HH:mm:ss',
        ignoreReadonly: true,
        locale: 'es'
    });
}

function inicializarDateRange() {
    $('.daterange').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aceptar",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "autoUpdateInput": false

    }, function (start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    });
    $('.daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
    $('.daterange').on('cancel.daterangepicker', function () {
        $(this).val('');
    });
}
