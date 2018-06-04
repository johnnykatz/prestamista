@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Prestamo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoPrestamo, ['route' => ['admin.estadoPrestamos.update', $estadoPrestamo->id], 'method' => 'patch']) !!}

                        @include('admin.estado_prestamos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection