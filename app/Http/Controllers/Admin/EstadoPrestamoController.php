<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateEstadoPrestamoRequest;
use App\Http\Requests\Admin\UpdateEstadoPrestamoRequest;
use App\Repositories\Admin\EstadoPrestamoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadoPrestamoController extends AppBaseController
{
    /** @var  EstadoPrestamoRepository */
    private $estadoPrestamoRepository;

    public function __construct(EstadoPrestamoRepository $estadoPrestamoRepo)
    {
        $this->estadoPrestamoRepository = $estadoPrestamoRepo;
    }

    /**
     * Display a listing of the EstadoPrestamo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoPrestamoRepository->pushCriteria(new RequestCriteria($request));
        $estadoPrestamos = $this->estadoPrestamoRepository->all();

        return view('admin.estado_prestamos.index')
            ->with('estadoPrestamos', $estadoPrestamos);
    }

    /**
     * Show the form for creating a new EstadoPrestamo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.estado_prestamos.create');
    }

    /**
     * Store a newly created EstadoPrestamo in storage.
     *
     * @param CreateEstadoPrestamoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoPrestamoRequest $request)
    {
        $input = $request->all();

        $estadoPrestamo = $this->estadoPrestamoRepository->create($input);

        Flash::success('Estado Prestamo saved successfully.');

        return redirect(route('admin.estadoPrestamos.index'));
    }

    /**
     * Display the specified EstadoPrestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoPrestamo = $this->estadoPrestamoRepository->findWithoutFail($id);

        if (empty($estadoPrestamo)) {
            Flash::error('Estado Prestamo not found');

            return redirect(route('admin.estadoPrestamos.index'));
        }

        return view('admin.estado_prestamos.show')->with('estadoPrestamo', $estadoPrestamo);
    }

    /**
     * Show the form for editing the specified EstadoPrestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoPrestamo = $this->estadoPrestamoRepository->findWithoutFail($id);

        if (empty($estadoPrestamo)) {
            Flash::error('Estado Prestamo not found');

            return redirect(route('admin.estadoPrestamos.index'));
        }

        return view('admin.estado_prestamos.edit')->with('estadoPrestamo', $estadoPrestamo);
    }

    /**
     * Update the specified EstadoPrestamo in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoPrestamoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoPrestamoRequest $request)
    {
        $estadoPrestamo = $this->estadoPrestamoRepository->findWithoutFail($id);

        if (empty($estadoPrestamo)) {
            Flash::error('Estado Prestamo not found');

            return redirect(route('admin.estadoPrestamos.index'));
        }

        $estadoPrestamo = $this->estadoPrestamoRepository->update($request->all(), $id);

        Flash::success('Estado Prestamo updated successfully.');

        return redirect(route('admin.estadoPrestamos.index'));
    }

    /**
     * Remove the specified EstadoPrestamo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoPrestamo = $this->estadoPrestamoRepository->findWithoutFail($id);

        if (empty($estadoPrestamo)) {
            Flash::error('Estado Prestamo not found');

            return redirect(route('admin.estadoPrestamos.index'));
        }

        $this->estadoPrestamoRepository->delete($id);

        Flash::success('Estado Prestamo deleted successfully.');

        return redirect(route('admin.estadoPrestamos.index'));
    }
}
