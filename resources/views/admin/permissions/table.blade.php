<table class="table table-responsive" id="permissions-table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Nombre para mostrar</th>
        <th>Descripcion</th>
        <th colspan="3">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($permissions as $permission)
        <tr>
            <td>{!! $permission->name !!}</td>
            <td>{!! $permission->display_name !!}</td>
            <td>{!! $permission->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.permissions.show', [$permission->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.permissions.edit', [$permission->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>