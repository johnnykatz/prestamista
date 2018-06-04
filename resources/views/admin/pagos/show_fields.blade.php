<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pago->id !!}</p>
</div>

<!-- Capital Field -->
<div class="form-group">
    {!! Form::label('capital', 'Capital:') !!}
    <p>{!! $pago->capital !!}</p>
</div>

<!-- Total Pago Field -->
<div class="form-group">
    {!! Form::label('total_pago', 'Total Pago:') !!}
    <p>{!! $pago->total_pago !!}</p>
</div>

<!-- Interes Field -->
<div class="form-group">
    {!! Form::label('interes', 'Interes:') !!}
    <p>{!! $pago->interes !!}</p>
</div>

<!-- Descuento Field -->
<div class="form-group">
    {!! Form::label('descuento', 'Descuento:') !!}
    <p>{!! $pago->descuento !!}</p>
</div>

<!-- Mora Field -->
<div class="form-group">
    {!! Form::label('mora', 'Mora:') !!}
    <p>{!! $pago->mora !!}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $pago->fecha !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $pago->estado !!}</p>
</div>

<!-- Forma Pago Id Field -->
<div class="form-group">
    {!! Form::label('forma_pago_id', 'Forma Pago Id:') !!}
    <p>{!! $pago->forma_pago_id !!}</p>
</div>

<!-- Creado Por Field -->
<div class="form-group">
    {!! Form::label('creado_por', 'Creado Por:') !!}
    <p>{!! $pago->creado_por !!}</p>
</div>

<!-- Prestamo Id Field -->
<div class="form-group">
    {!! Form::label('prestamo_id', 'Prestamo Id:') !!}
    <p>{!! $pago->prestamo_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pago->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pago->updated_at !!}</p>
</div>

