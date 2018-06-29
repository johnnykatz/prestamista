@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Prestamos</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('admin.prestamos.create') !!}">Nuevo Prestamo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Filtros</h3>

                @include('admin.prestamos.filtros')

            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.prestamos.table')
                <div class="text-center">
                    {!! $prestamos->appends(Request::all())->render() !!}
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

