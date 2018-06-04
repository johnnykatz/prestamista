<table class="table table-responsive" id="pagos-table">
    <thead>
        <tr>
            <th>Capital</th>
        <th>Total Pago</th>
        <th>Interes</th>
        <th>Descuento</th>
        <th>Mora</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Forma Pago Id</th>
        <th>Creado Por</th>
        <th>Prestamo Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pagos as $pago)
        <tr>
            <td>{!! $pago->capital !!}</td>
            <td>{!! $pago->total_pago !!}</td>
            <td>{!! $pago->interes !!}</td>
            <td>{!! $pago->descuento !!}</td>
            <td>{!! $pago->mora !!}</td>
            <td>{!! $pago->fecha !!}</td>
            <td>{!! $pago->estado !!}</td>
            <td>{!! $pago->forma_pago_id !!}</td>
            <td>{!! $pago->creado_por !!}</td>
            <td>{!! $pago->prestamo_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.pagos.show', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.pagos.edit', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>