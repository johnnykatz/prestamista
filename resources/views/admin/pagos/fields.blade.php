<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha',(isset($pago['fecha']))? $pago['fecha']:date("d-m-Y"),['class'=>'form-control datepicker', 'readonly']) !!}
    {!! Form::text('prestamo_id',$prestamo->id,['class'=>'form-control hidden',]) !!}
    {!! Form::text('capital',$datos['cuota'],['class'=>'form-control hidden',]) !!}
    {!! Form::text('interes',$datos['interes'],['class'=>'form-control hidden',]) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_pago', 'Monto a Pagar:') !!}
    {!! Form::text('total_pago', number_format($datos['total_pago'],2,',','.'), ['class' => 'form-control','required']) !!}
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

<!-- Forma Pago Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma_pago_id', 'Forma Pago:') !!}
    {!! Form::select('forma_pago_id',$formasPagos,null,['class'=>'form-control','required']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.prestamos.show',['id'=>$prestamo->id]) !!}" class="btn btn-default">Cancelar</a>
</div>
