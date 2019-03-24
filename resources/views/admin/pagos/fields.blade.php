<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha',(isset($pago['fecha']))? $pago['fecha']:date("d-m-Y"),['class'=>'form-control datepicker', 'readonly']) !!}
    {!! Form::text('prestamo_id',$prestamo->id,['class'=>'form-control hidden',]) !!}
    {!! Form::text('pago_id',$pago->id,['class'=>'form-control hidden',]) !!}
    {!! Form::text('monto',$pago->total_pago,['class'=>'form-control hidden','id'=>'monto']) !!}
    {!! Form::text('interes',$pago->interes,['class'=>'form-control hidden','id'=>'interes']) !!}
    {!! Form::text('capital',$pago->capital,['class'=>'form-control hidden',]) !!}
    {{--    {!! Form::text('interes',$datos['interes'],['class'=>'form-control hidden',]) !!}--}}
</div>

<!-- Forma Pago Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagar', 'Pagar:') !!}
    {!! Form::select('pagar',["cuota"=>"Cuota","interes"=>"Interes"],null,['class'=>'form-control','required','onchange'=>'seleccionarPagar()']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mora', 'Mora:') !!}
    {!! Form::text('mora', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descuento', 'Descuento:') !!}
    {!! Form::text('descuento', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('total_pago', 'Monto a Pagar:') !!}
    {!! Form::text('total_pago', $pago->total_pago, ['class' => 'form-control','required','readonly']) !!}
</div>

<!-- Forma Pago Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma_pago_id', 'Forma Pago:') !!}
    {!! Form::select('forma_pago_id',$formasPagos,null,['class'=>'form-control','required']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control','size'=>'30x5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.prestamos.show',['id'=>$prestamo->id]) !!}" class="btn btn-default">Cancelar</a>
</div>
