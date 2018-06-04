@extends('layouts.app')
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Rol
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.roles.store']) !!}

                        @include('admin.roles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
