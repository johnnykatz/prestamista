<table class="table table-responsive" id="estadoPrestamos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estadoPrestamos as $estadoPrestamo)
        <tr>
            <td>{!! $estadoPrestamo->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.estadoPrestamos.destroy', $estadoPrestamo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.estadoPrestamos.show', [$estadoPrestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.estadoPrestamos.edit', [$estadoPrestamo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>