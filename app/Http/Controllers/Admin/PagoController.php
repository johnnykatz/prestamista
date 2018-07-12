<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePagoRequest;
use App\Http\Requests\Admin\UpdatePagoRequest;
use App\Models\Admin\FormaPago;
use App\Models\Admin\Pago;
use App\Models\Admin\Prestamo;
use App\Repositories\Admin\PagoRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Admin\PrestamoRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PagoController extends AppBaseController
{
    /** @var  PagoRepository */
    private $pagoRepository;

    public function __construct(PagoRepository $pagoRepo)
    {
        $this->pagoRepository = $pagoRepo;
    }

    /**
     * Display a listing of the Pago.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagoRepository->pushCriteria(new RequestCriteria($request));
        $pagos = $this->pagoRepository->all();

        return view('admin.pagos.index')
            ->with('pagos', $pagos);
    }

    /**
     * Show the form for creating a new Pago.
     *
     * @return Response
     */
    public function create($id)
    {
        $prestamo = Prestamo::find($id);
        $pago = $this->pagoRepository->getDatosProximoPago($prestamo);
        $formasPagos = FormaPago::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('admin.pagos.create')->with([
            'formasPagos' => $formasPagos,
            'pago' => $pago,
            'prestamo' => $prestamo,
        ]);
    }

    /**
     * Store a newly created Pago in storage.
     *
     * @param CreatePagoRequest $request
     *
     * @return Response
     */
    public function store(CreatePagoRequest $request)
    {
        $prestamo = Prestamo::find($request['prestamo_id']);
        $pago = Pago::find($request['pago_id']);
        $fecha_vencimiento = $pago->fecha_vencimiento;
        if ($request['pagar'] == 'cuota') {
            $pago->estado = true;
            $pago->fecha = Carbon::createFromFormat('d-m-Y', $request['fecha'])->toDateString();
            $pago->total_pago = $request['total_pago'];
            $pago->mora = ($request['mora'] != null) ? $request['mora'] : 0;
            $pago->descuento = ($request['descuento'] != null) ? $request['descuento'] : 0;
            $pago->forma_pago_id = $request['forma_pago_id'];
            $pago->save();

            $prestamo->monto_pendiente = $prestamo->monto_pendiente - $request['capital'];

            if ($pago->numero_cuota == $prestamo->cuotas) {
                $prestamo->estado_prestamo_id = 2;//terminado
            }
            $prestamo->save();
        } else {
            $pago = new Pago();
            $pago->creado_por = Auth::user()->id;
            $pago->prestamo_id = $prestamo->id;
            $pago->fecha_vencimiento = $fecha_vencimiento;
            $pago->estado = true;
            $pago->interes = $request['interes'];
            $pago->total_pago = $request['total_pago'];
            $pago->fecha = Carbon::createFromFormat('d-m-Y', $request['fecha'])->toDateString();
            $pago->forma_pago_id = $request['forma_pago_id'];
            $pago->mora = ($request['mora'] != null) ? $request['mora'] : 0;
            $pago->descuento = ($request['descuento'] != null) ? $request['descuento'] : 0;
            $pago->save();
            $pagos_pendientes = Pago::where('prestamo_id', $prestamo->id)->where('estado', false)->get();
            foreach ($pagos_pendientes as $pago) {
                $fecha_vencimiento = $this->pagoRepository->getVencimiento($pago->fecha_vencimiento, $prestamo->modalidad_pago_id);
                $pago->fecha_vencimiento = $fecha_vencimiento;
                $pago->save();
            }
        }


        $input = $request->all();

        Flash::success('Pago saved successfully.');

        return redirect(route('admin.prestamos.show', ['id' => $pago->prestamo_id]));
    }

    /**
     * Display the specified Pago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('admin.pagos.index'));
        }

        return view('admin.pagos.show')->with('pago', $pago);
    }

    /**
     * Show the form for editing the specified Pago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('admin.pagos.index'));
        }

        return view('admin.pagos.edit')->with('pago', $pago);
    }

    /**
     * Update the specified Pago in storage.
     *
     * @param  int $id
     * @param UpdatePagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagoRequest $request)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('admin.pagos.index'));
        }

        $pago = $this->pagoRepository->update($request->all(), $id);

        Flash::success('Pago updated successfully.');

        return redirect(route('admin.pagos.index'));
    }

    /**
     * Remove the specified Pago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('admin.pagos.index'));
        }

        $this->pagoRepository->delete($id);

        Flash::success('Pago deleted successfully.');

        return redirect(route('admin.pagos.index'));
    }
}
