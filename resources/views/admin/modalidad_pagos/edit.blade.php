@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modalidad Pago
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($modalidadPago, ['route' => ['admin.modalidadPagos.update', $modalidadPago->id], 'method' => 'patch']) !!}

                        @include('admin.modalidad_pagos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection