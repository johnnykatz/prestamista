@extends('layouts.app')
@section("scripts")
    <script src="{!! asset("js/prestamos.js") !!}"></script>

    <script>
        $(document).ready(function () {
            $('#cliente_id').select2();
            inicializarFecha();
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Prestamo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div id="cuerpo_modal">

        </div>

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.prestamos.store','id'=>'form_cuerpo']) !!}

                        @include('admin.prestamos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
