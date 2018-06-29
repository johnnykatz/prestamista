@extends('layouts.app')
@section("scripts")
    <script src="{!! asset("js/prestamos.js") !!}"></script>

    <script>
        $(document).ready(function () {
            inicializarFecha();
            $(document).ready(function () {
                $("#mora").keyup(function (event) {
                    if( $("#pagar").val()=="cuota"){
                        $("#total_pago").val(Number($("#monto").val()) + Number($("#mora").val()));
                    }else{
                        $("#total_pago").val(Number($("#interes").val()) + Number($("#mora").val()));
                    }
                    $("#descuento").val("");
                })
                $("#descuento").keyup(function (event) {
                    if( $("#pagar").val()=="cuota"){
                        $("#total_pago").val(Number($("#monto").val()) - Number($("#descuento").val()));
                    }else{
                        $("#total_pago").val(Number($("#interes").val()) - Number($("#descuento").val()));
                    }
                    $("#mora").val("");
                })
            });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Pago
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.pagos.store']) !!}

                    @include('admin.pagos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
