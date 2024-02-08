<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
        <tr>
            <th>Cuota</th>
            <th>Fecha vencimiento</th>
            <th>Fecha</th>
            <th>Capital</th>
            <th>Interes</th>
            <th>Mora</th>
            <th>Descuento</th>
            <th>Total Pagado</th>
            <th>Capital Restante</th>
            <th>Obs</th>
            {{--<th colspan="3">Acciones</th>--}}
        </tr>
        </thead>
        <tbody>
        @php($pendiente=$prestamo->monto)
        @php($i=0)
        @foreach($pagos as $pago)
            @php($pendiente=($pago->capital>0)?$pendiente-$pago->capital:$pendiente)
            @php($i++)
            <tr class="{!! ($pago->estado ? 'bg-gray-active color-palette' : (strtotime($pago->fecha_vencimiento) < strtotime(date('Y-m-d')) ? 'bg-red disabled color-palette' : '')) !!}">

            {{--            <tr class="{!! ($pago->estado)?print 'bg-gray-active color-palette':(strtotime($pago->fecha_vencimiento)<strtotime(date('Y-m-d')))?print'bg-red disabled color-palette':'' !!}">--}}
                <td align="center">{!! $pago->numero_cuota !!}</td>
                <td>{!! ($pago->fecha_vencimiento)?date("d-m-Y",strtotime($pago->fecha_vencimiento)):null !!}</td>
                <td>{!! ($pago->fecha)?date("d-m-Y",strtotime($pago->fecha)):null !!}</td>
                <td>${!! number_format($pago->capital,'2','.',',') !!}</td>
                <td>${!! number_format($pago->interes,'2','.',',') !!}</td>
                <td>${!! number_format($pago->mora,'2','.',',') !!}</td>
                <td>${!! number_format($pago->descuento,'2','.',',') !!}</td>
                <td>${!! number_format($pago->total_pago,'2','.',',') !!}</td>
                <td>${!! number_format($pendiente,'2','.',',') !!}</td>
                <td>
                    @if($pago->observacion!="")
                        <span class='btn btn-default btn-xs' title="{!! $pago->observacion !!}"><i
                                    class="glyphicon glyphicon-eye-open"></i></span>
                    @endif
                </td>
                {{--<td></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>