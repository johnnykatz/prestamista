@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Prestamo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.prestamos.show_fields')
                    <a href="{!! route('admin.pagos.create',['id'=>$prestamo->id]) !!}" class="btn btn-success">Registrar Pago</a>
                    <a href="{!! route('admin.prestamos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.prestamos.table_pagos')
            </div>
        </div>
    </div>
@endsection
