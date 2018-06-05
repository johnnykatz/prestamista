<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::select('cliente_id',$clientes,null,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}

</div>
<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_identificador', 'Nombre Identificador:') !!}
    {!! Form::text('nombre_identificador',null,['class'=>'form-control']) !!}
</div>
<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto a prestar:') !!}
    {!! Form::text('monto', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Interes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', 'Interes:') !!}
    {!! Form::text('interes', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Cuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuotas', 'Cuotas:') !!}
    {!! Form::number('cuotas', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Amortizacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amortizacion_id', 'Amortizacion:') !!}
    {!! Form::select('amortizacion_id',$amortizaciones,null,['class'=>'form-control','required']) !!}

</div>

<!-- Modalidad Pago Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modalidad_pago_id', 'Modalidad Pago:') !!}
    {!! Form::select('modalidad_pago_id',$modalidades,null,['class'=>'form-control','required']) !!}

</div>
<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::text('fecha_inicio',(isset($prestamo['fecha_inicio']))? $prestamo['fecha_inicio']:'',['class'=>'form-control datepicker', 'readonly']) !!}
</div>
<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control','size'=>'30x5']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.prestamos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
