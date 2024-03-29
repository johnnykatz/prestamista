<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Identificador</th>
            <th>Fecha Inicio</th>
            {{--<th>Amortizacion</th>--}}
            <th>Capital Prestado</th>
            <th>Capital Pendiente</th>
            <th>Interes</th>
            <th>Cuotas</th>
            <th>Pago</th>
            <th>Deuda</th>
            <th>Proximo vencimiento</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            @php
                $class = '';
                if ($prestamo->estado_prestamo_id == 1) {
                    if ($prestamo->deuda['cuotas_deuda'] > 0) {
                        $class = 'bg-yellow-active color-palette';
                    } else {
                        $class = 'hola';
                    }
                } elseif ($prestamo->estado_prestamo_id == 2) {
                    $class = 'bg-gray-active color-palette';
                } else {
                    $class = 'bg-red-active color-palette';
                }
            @endphp

            <tr class="{{ $class }}">
                <td>{!! $prestamo->cliente->full_name !!}</td>
                <td>{!! $prestamo->nombre_identificador!!}</td>
                <td>{!! date("d-m-Y", strtotime($prestamo->fecha_inicio)) !!}</td>
                {{--                <td>{!! $prestamo->amortizacion->nombre or null !!}</td>--}}
                <td>$ {!! $prestamo->monto !!}</td>
                <td>${!! $prestamo->monto_pendiente !!}</td>
                <td>% {!! $prestamo->interes !!}</td>
                <td>{!! $prestamo->cuotas !!}</td>
                <td>{!! $prestamo->modalidadPago->nombre or null !!}</td>
                <td>{!! $prestamo->deuda['cuotas_deuda']." - $". number_format($prestamo->deuda['monto_deuda'],0,",",".") !!}</td>
                <td>{!! ($prestamo->deuda['proximo_vencimiento'])?date("d-m-Y",strtotime($prestamo->deuda['proximo_vencimiento'])):null!!}</td>
                <td>{!! $prestamo->estadoPrestamo->nombre or null !!}</td>

                <td>
                    {!! Form::open(['route' => ['admin.prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.prestamos.show', [$prestamo->id]) !!}" class='btn btn-success'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        {{--<a href="{!! route('admin.prestamos.edit', [$prestamo->id]) !!}" class='btn btn-warning'><i--}}
                        {{--class="glyphicon glyphicon-edit"></i></a>--}}
                        {{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>