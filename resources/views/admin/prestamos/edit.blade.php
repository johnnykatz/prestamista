@extends('layouts.app')
@section("scripts")
    <script>
        $(document).ready(function () {
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
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prestamo, ['route' => ['admin.prestamos.update', $prestamo->id], 'method' => 'patch']) !!}

                        @include('admin.prestamos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection