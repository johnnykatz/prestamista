<table class="table table-responsive" id="clientes-table">
    <thead>
        <tr>
            <th>Apellido</th>
        <th>Nombre</th>
        <th>Dni</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Telefono Otro</th>
        <th>Observacion</th>
        <th>Mail</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{!! $cliente->apellido !!}</td>
            <td>{!! $cliente->nombre !!}</td>
            <td>{!! $cliente->dni !!}</td>
            <td>{!! $cliente->direccion !!}</td>
            <td>{!! $cliente->telefono !!}</td>
            <td>{!! $cliente->telefono_otro !!}</td>
            <td>{!! $cliente->observacion !!}</td>
            <td>{!! $cliente->mail !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.clientes.show', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.clientes.edit', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>