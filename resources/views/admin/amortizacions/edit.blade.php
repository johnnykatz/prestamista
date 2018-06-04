@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Amortizacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($amortizacion, ['route' => ['admin.amortizacions.update', $amortizacion->id], 'method' => 'patch']) !!}

                        @include('admin.amortizacions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection