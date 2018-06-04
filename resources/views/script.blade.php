@extends('layouts.app')
@section('scripts')
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--inicializarFecha();--}}
    {{--})--}}
    {{--</script>--}}

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Importar agentes
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'script','files'=>true]) !!}


                    {{--<div class="form-group col-sm-6">--}}
                    {{--{!! Form::label('distribuidor_id', ' Seleccione Distribuidor:',['class'=>'col-sm-6 control-label']) !!}--}}

                    {{--{!! Form::select('distribuidor_id',$distribuidores,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}--}}
                    {{--</div>--}}
                    <div class="form-group col-sm-6">

                        {!! Form::label('archivo', 'Archivo:') !!}

                        {!! Form::file('archivo') !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
