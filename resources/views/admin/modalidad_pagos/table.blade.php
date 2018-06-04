<table class="table table-responsive" id="modalidadPagos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modalidadPagos as $modalidadPago)
        <tr>
            <td>{!! $modalidadPago->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.modalidadPagos.destroy', $modalidadPago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.modalidadPagos.show', [$modalidadPago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.modalidadPagos.edit', [$modalidadPago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>