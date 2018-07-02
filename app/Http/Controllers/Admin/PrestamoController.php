<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePrestamoRequest;
use App\Http\Requests\Admin\UpdatePrestamoRequest;
use App\Models\Admin\Amortizacion;
use App\Models\Admin\Cliente;
use App\Models\Admin\EstadoPrestamo;
use App\Models\Admin\ModalidadPago;
use App\Models\Admin\Pago;
use App\Models\Admin\Prestamo;
use App\Repositories\Admin\PrestamoRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PrestamoController extends AppBaseController
{
    /** @var  PrestamoRepository */
    private $prestamoRepository;

    public function __construct(PrestamoRepository $prestamoRepo)
    {
        $this->prestamoRepository = $prestamoRepo;
    }

    /**
     * Display a listing of the Prestamo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $prestamos = $this->prestamoRepository->getPrestamosFilter($request);
        return view('admin.prestamos.index')
            ->with('filtro', $request->all())
            ->with('prestamos', $prestamos);
    }

    /**
     * Show the form for creating a new Prestamo.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre', 'ASC')->get()->pluck('full_name', 'id');
        $amortizaciones = Amortizacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $modalidades = ModalidadPago::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

        return view('admin.prestamos.create')->with([
            'clientes' => $clientes,
            'amortizaciones' => $amortizaciones,
            'modalidades' => $modalidades,
        ]);
    }

    /**
     * Store a newly created Prestamo in storage.
     *
     * @param CreatePrestamoRequest $request
     *
     * @return Response
     */
    public function store(CreatePrestamoRequest $request)
    {
        DB::beginTransaction();
        $request['creado_por'] = Auth::user()->id;
        $request['estado_prestamo_id'] = 1; //activo
        $request['monto_pendiente'] = $request['monto'];
        if ($request['fecha_inicio'] == null) {
            $request['fecha_inicio'] = date("Y-m-d H:i:s");
        } else {
            $request['fecha_inicio'] = Carbon::createFromFormat('d-m-Y', $request['fecha_inicio'])->toDateString();
        }
        $input = $request->all();
        $prestamo = $this->prestamoRepository->create($input);

        $amortizacion = $this->prestamoRepository->getAmortizacion($request);
        foreach ($amortizacion as $dato) {
            $pago = new Pago();
            $pago->creado_por = $request['creado_por'];
            $pago->prestamo_id = $prestamo->id;
            $pago->capital = $dato['capital_cuota'];
            $pago->interes = $dato['interes'];
            $pago->total_pago = $dato['total_pago'];
            $pago->numero_cuota = $dato['cuota'];
            $pago->fecha_vencimiento = $dato['fecha_vencimiento'];
            $pago->estado = false;
            $pago->save();

        }
        DB::commit();

        Flash::success('Prestamo saved successfully.');

        return redirect(route('admin.prestamos.index'));
    }

    /**
     * Display the specified Prestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('admin.prestamos.index'));
        }
        $pagos = Pago::where('prestamo_id', $prestamo->id)->orderBy('fecha_vencimiento', 'asc')->orderBy('numero_cuota', 'asc')->get();
        return view('admin.prestamos.show')->with([
            'prestamo' => $prestamo,
            'pagos' => $pagos,
        ]);
    }

    /**
     * Show the form for editing the specified Prestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('admin.prestamos.index'));
        }
        $clientes = Cliente::orderBy('nombre', 'ASC')->get()->pluck('full_name', 'id');
        $amortizaciones = Amortizacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $modalidades = ModalidadPago::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('admin.prestamos.edit')->with([
            'prestamo' => $prestamo,
            'clientes' => $clientes,
            'amortizaciones' => $amortizaciones,
            'modalidades' => $modalidades,
        ]);
    }

    /**
     * Update the specified Prestamo in storage.
     *
     * @param  int $id
     * @param UpdatePrestamoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrestamoRequest $request)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('admin.prestamos.index'));
        }

        $prestamo = $this->prestamoRepository->update($request->all(), $id);

        Flash::success('Prestamo updated successfully.');

        return redirect(route('admin.prestamos.index'));
    }

    /**
     * Remove the specified Prestamo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('admin.prestamos.index'));
        }

        $this->prestamoRepository->delete($id);

        Flash::success('Prestamo deleted successfully.');

        return redirect(route('admin.prestamos.index'));
    }

    public function getAmortizacion(Request $request)
    {
        $datos = $this->prestamoRepository->getAmortizacion($request);
        return view('admin.prestamos.amortizacion_modal')->with([
            'datos' => $datos
        ]);

    }

    public function cancelar($id)
    {
        $prestamo = Prestamo::find($id);
        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('admin.prestamos.index'));
        }
        $prestamo->estado_prestamo_id = 3;
        $prestamo->save();
        Flash::success('Prestamo cancelado con exito.');

        return redirect(route('admin.prestamos.index'));
    }
}
