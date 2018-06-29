<div class="col-md-12">
    <h4>{!! $prestamo->cliente->full_name or null !!}</h4>
    <hr>
    <p><strong>id:</strong> {!! $prestamo->id!!}</p>
    <p><strong>Capital actual:</strong> $ {!! number_format($prestamo->monto_pendiente,'2','.',',')!!}</p>
    <p><strong>Capital inicial:</strong> $ {!! number_format($prestamo->monto,'2','.',',')!!}</p>
    <p><strong>Cuotas:</strong> {!! $prestamo->cuotas !!} </p>
    <p><strong>Interes:</strong> % {!! $prestamo->interes !!} </p>
    <p><strong>Amortizacion:</strong> {!! $prestamo->amortizacion->nombre !!} </p>
    <p><strong>Modalidad de pago:</strong> {!!$prestamo->modalidadPago->nombre!!} </p>
    <p><strong>Estado:</strong> {!!$prestamo->estadoPrestamo->nombre !!} </p>
    <p><strong>Fecha Inicio:</strong> {!! date("d-m-Y",strtotime($prestamo->fecha_inicio)) !!} </p>
    <p><strong>Fecha creado:</strong> {!! date("d-m-Y H:i:s",strtotime($prestamo->created_at)) !!} </p>
    <p><strong>Observacion:</strong> {!! $prestamo->observacion!!} </p>
</div>
