<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateModalidadPagoRequest;
use App\Http\Requests\Admin\UpdateModalidadPagoRequest;
use App\Repositories\Admin\ModalidadPagoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ModalidadPagoController extends AppBaseController
{
    /** @var  ModalidadPagoRepository */
    private $modalidadPagoRepository;

    public function __construct(ModalidadPagoRepository $modalidadPagoRepo)
    {
        $this->modalidadPagoRepository = $modalidadPagoRepo;
    }

    /**
     * Display a listing of the ModalidadPago.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modalidadPagoRepository->pushCriteria(new RequestCriteria($request));
        $modalidadPagos = $this->modalidadPagoRepository->all();

        return view('admin.modalidad_pagos.index')
            ->with('modalidadPagos', $modalidadPagos);
    }

    /**
     * Show the form for creating a new ModalidadPago.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.modalidad_pagos.create');
    }

    /**
     * Store a newly created ModalidadPago in storage.
     *
     * @param CreateModalidadPagoRequest $request
     *
     * @return Response
     */
    public function store(CreateModalidadPagoRequest $request)
    {
        $input = $request->all();

        $modalidadPago = $this->modalidadPagoRepository->create($input);

        Flash::success('Modalidad Pago saved successfully.');

        return redirect(route('admin.modalidadPagos.index'));
    }

    /**
     * Display the specified ModalidadPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modalidadPago = $this->modalidadPagoRepository->findWithoutFail($id);

        if (empty($modalidadPago)) {
            Flash::error('Modalidad Pago not found');

            return redirect(route('admin.modalidadPagos.index'));
        }

        return view('admin.modalidad_pagos.show')->with('modalidadPago', $modalidadPago);
    }

    /**
     * Show the form for editing the specified ModalidadPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modalidadPago = $this->modalidadPagoRepository->findWithoutFail($id);

        if (empty($modalidadPago)) {
            Flash::error('Modalidad Pago not found');

            return redirect(route('admin.modalidadPagos.index'));
        }

        return view('admin.modalidad_pagos.edit')->with('modalidadPago', $modalidadPago);
    }

    /**
     * Update the specified ModalidadPago in storage.
     *
     * @param  int              $id
     * @param UpdateModalidadPagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModalidadPagoRequest $request)
    {
        $modalidadPago = $this->modalidadPagoRepository->findWithoutFail($id);

        if (empty($modalidadPago)) {
            Flash::error('Modalidad Pago not found');

            return redirect(route('admin.modalidadPagos.index'));
        }

        $modalidadPago = $this->modalidadPagoRepository->update($request->all(), $id);

        Flash::success('Modalidad Pago updated successfully.');

        return redirect(route('admin.modalidadPagos.index'));
    }

    /**
     * Remove the specified ModalidadPago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modalidadPago = $this->modalidadPagoRepository->findWithoutFail($id);

        if (empty($modalidadPago)) {
            Flash::error('Modalidad Pago not found');

            return redirect(route('admin.modalidadPagos.index'));
        }

        $this->modalidadPagoRepository->delete($id);

        Flash::success('Modalidad Pago deleted successfully.');

        return redirect(route('admin.modalidadPagos.index'));
    }
}
