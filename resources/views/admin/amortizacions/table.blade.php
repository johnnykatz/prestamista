<table class="table table-responsive" id="amortizacions-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($amortizacions as $amortizacion)
        <tr>
            <td>{!! $amortizacion->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.amortizacions.destroy', $amortizacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.amortizacions.show', [$amortizacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.amortizacions.edit', [$amortizacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>