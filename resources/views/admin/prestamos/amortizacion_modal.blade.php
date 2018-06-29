<div class="modal fade" id="amortizacion_modal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{--<div class="modal-header">--}}
            {{--<button type="button" class="close"--}}
            {{--data-dismiss="modal"--}}
            {{--aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span></button>--}}
            {{--<h4 class="modal-title"--}}
            {{--id="favoritesModalLabel">The Sun Also Rises</h4>--}}
            {{--</div>--}}
            <div class="modal-body">
                <table class="table" id="prestamos-table">
                    <thead>
                    <tr>
                        <th align="center">Cuota</th>
                        <th align="center">Capital restante</th>
                        <th align="center">Abono capital</th>
                        <th align="center">Interés</th>
                        <th align="center">Total pago</th>
                        <th align="center">Vencimiento</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datos as $dato)
                        <tr>
                            <td align="center"> {!! $dato['cuota'] !!}</td>
                            <td align="right">$ {!! number_format($dato['capital_restante'],'2','.',',') !!}</td>
                            <td align="right">$ {!! number_format($dato['capital_cuota'],'2','.',',') !!}</td>
                            <td align="right">$ {!! number_format($dato['interes'],'2','.',',') !!}</td>
                            <td align="right">$ {!! number_format($dato['total_pago'],'2','.',',') !!}</td>
                            <td align="center"> {!! date("d-m-Y",strtotime($dato['fecha_vencimiento'])) !!}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>