<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Identificador</th>
            <th>Fecha Inicio</th>
            <th>Amortizacion</th>
            <th>Capital Prestado</th>
            <th>Capital Pendiente</th>
            <th>Interes</th>
            <th>Cuotas</th>
            <th>Pago</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            @php($calse)
            <tr class="@php(($prestamo->estado_prestamo_id==1)?print "hola":($prestamo->estado_prestamo_id==2)?print 'bg-gray-active color-palette':print "bg-red-active color-palette")">
                <td>{!! $prestamo->cliente->full_name !!}</td>
                <td>{!! $prestamo->nombre_identificador!!}</td>
                <td>{!! date("d-m-Y", strtotime($prestamo->fecha_inicio)) !!}</td>
                <td>{!! $prestamo->amortizacion->nombre or null !!}</td>
                <td>$ {!! $prestamo->monto !!}</td>
                <td>${!! $prestamo->monto_pendiente !!}</td>
                <td>% {!! $prestamo->interes !!}</td>
                <td>{!! $prestamo->cuotas !!}</td>
                <td>{!! $prestamo->modalidadPago->nombre or null !!}</td>
                <td>{!! $prestamo->estadoPrestamo->nombre or null !!}</td>

                <td>
                    {!! Form::open(['route' => ['admin.prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.prestamos.show', [$prestamo->id]) !!}" class='btn btn-success'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.prestamos.edit', [$prestamo->id]) !!}" class='btn btn-warning'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>