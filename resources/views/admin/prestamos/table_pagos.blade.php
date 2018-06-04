<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
        <tr>
            <th>Cuota</th>
            <th>Fecha</th>
            <th>Capital</th>
            <th>Interes</th>
            <th>Mora</th>
            <th>Descuento</th>
            <th>Total Pagado</th>
            <th>Capital Restante</th>
            {{--<th colspan="3">Acciones</th>--}}
        </tr>
        </thead>
        <tbody>
        @php($pendiente=$prestamo->monto)
        @php($i=0)
        @foreach($pagos as $pago)
            @php($pendiente=$pendiente-$pago->capital)
            @php($i++)
            <tr>
                <td>{!! $i !!}</td>
                <td>{!! date("d-m-Y",strtotime($pago->fecha)) !!}</td>
                <td>${!! $pago->capital !!}</td>
                <td>${!! $pago->interes !!}</td>
                <td>${!! $pago->mora !!}</td>
                <td>${!! $pago->descuento !!}</td>
                <td>${!! $pago->total_pago !!}</td>
                <td>{!! $pendiente !!}</td>
                {{--<td></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>