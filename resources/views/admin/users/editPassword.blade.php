@extends('layouts.app')
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
@section('scripts')

    <script>
        $(document).ready(function () {

        });

    </script>
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Cambiar password
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.users.updatePassword']) !!}
                    <div class="form-group col-sm-12">
                        {!! Form::label('password_actual', 'Password actual:') !!}
                        {!! Form::password('password_actual',  ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('password_nuevo1', 'Password nuevo:') !!}
                        {!! Form::password('password_nuevo1', ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('password_nuevo2', 'Repita el password:') !!}
                        {!! Form::password('password_nuevo2', ['class' => 'form-control','required']) !!}
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {{--<a href="{!! route('admin.users.index') !!}" class="btn btn-default">Volver</a>--}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
