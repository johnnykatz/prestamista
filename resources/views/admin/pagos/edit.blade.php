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
            Pago
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pago, ['route' => ['admin.pagos.update', $pago->id], 'method' => 'patch']) !!}

                        @include('admin.pagos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection