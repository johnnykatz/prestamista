<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name', 'Nombre para mostrar:') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('permissions', 'Permisos:') !!}
    {!! Form::select('permissions[]', $permissions,(isset($permissionsCurrent))?$permissionsCurrent:null, ['class' => 'form-control multiple','multiple'=>'multiple']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.roles.index') !!}" class="btn btn-default">Cancelar</a>
</div>
