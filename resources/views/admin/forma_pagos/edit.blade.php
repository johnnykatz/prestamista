@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forma Pago
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formaPago, ['route' => ['admin.formaPagos.update', $formaPago->id], 'method' => 'patch']) !!}

                        @include('admin.forma_pagos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection