<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateFormaPagoRequest;
use App\Http\Requests\Admin\UpdateFormaPagoRequest;
use App\Repositories\Admin\FormaPagoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FormaPagoController extends AppBaseController
{
    /** @var  FormaPagoRepository */
    private $formaPagoRepository;

    public function __construct(FormaPagoRepository $formaPagoRepo)
    {
        $this->formaPagoRepository = $formaPagoRepo;
    }

    /**
     * Display a listing of the FormaPago.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formaPagoRepository->pushCriteria(new RequestCriteria($request));
        $formaPagos = $this->formaPagoRepository->all();

        return view('admin.forma_pagos.index')
            ->with('formaPagos', $formaPagos);
    }

    /**
     * Show the form for creating a new FormaPago.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.forma_pagos.create');
    }

    /**
     * Store a newly created FormaPago in storage.
     *
     * @param CreateFormaPagoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagoRequest $request)
    {
        $input = $request->all();

        $formaPago = $this->formaPagoRepository->create($input);

        Flash::success('Forma Pago saved successfully.');

        return redirect(route('admin.formaPagos.index'));
    }

    /**
     * Display the specified FormaPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago not found');

            return redirect(route('admin.formaPagos.index'));
        }

        return view('admin.forma_pagos.show')->with('formaPago', $formaPago);
    }

    /**
     * Show the form for editing the specified FormaPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago not found');

            return redirect(route('admin.formaPagos.index'));
        }

        return view('admin.forma_pagos.edit')->with('formaPago', $formaPago);
    }

    /**
     * Update the specified FormaPago in storage.
     *
     * @param  int              $id
     * @param UpdateFormaPagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagoRequest $request)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago not found');

            return redirect(route('admin.formaPagos.index'));
        }

        $formaPago = $this->formaPagoRepository->update($request->all(), $id);

        Flash::success('Forma Pago updated successfully.');

        return redirect(route('admin.formaPagos.index'));
    }

    /**
     * Remove the specified FormaPago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formaPago = $this->formaPagoRepository->findWithoutFail($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago not found');

            return redirect(route('admin.formaPagos.index'));
        }

        $this->formaPagoRepository->delete($id);

        Flash::success('Forma Pago deleted successfully.');

        return redirect(route('admin.formaPagos.index'));
    }
}
