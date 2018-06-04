<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateAmortizacionRequest;
use App\Http\Requests\Admin\UpdateAmortizacionRequest;
use App\Repositories\Admin\AmortizacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AmortizacionController extends AppBaseController
{
    /** @var  AmortizacionRepository */
    private $amortizacionRepository;

    public function __construct(AmortizacionRepository $amortizacionRepo)
    {
        $this->amortizacionRepository = $amortizacionRepo;
    }

    /**
     * Display a listing of the Amortizacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->amortizacionRepository->pushCriteria(new RequestCriteria($request));
        $amortizacions = $this->amortizacionRepository->all();

        return view('admin.amortizacions.index')
            ->with('amortizacions', $amortizacions);
    }

    /**
     * Show the form for creating a new Amortizacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.amortizacions.create');
    }

    /**
     * Store a newly created Amortizacion in storage.
     *
     * @param CreateAmortizacionRequest $request
     *
     * @return Response
     */
    public function store(CreateAmortizacionRequest $request)
    {
        $input = $request->all();

        $amortizacion = $this->amortizacionRepository->create($input);

        Flash::success('Amortizacion saved successfully.');

        return redirect(route('admin.amortizacions.index'));
    }

    /**
     * Display the specified Amortizacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $amortizacion = $this->amortizacionRepository->findWithoutFail($id);

        if (empty($amortizacion)) {
            Flash::error('Amortizacion not found');

            return redirect(route('admin.amortizacions.index'));
        }

        return view('admin.amortizacions.show')->with('amortizacion', $amortizacion);
    }

    /**
     * Show the form for editing the specified Amortizacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $amortizacion = $this->amortizacionRepository->findWithoutFail($id);

        if (empty($amortizacion)) {
            Flash::error('Amortizacion not found');

            return redirect(route('admin.amortizacions.index'));
        }

        return view('admin.amortizacions.edit')->with('amortizacion', $amortizacion);
    }

    /**
     * Update the specified Amortizacion in storage.
     *
     * @param  int              $id
     * @param UpdateAmortizacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAmortizacionRequest $request)
    {
        $amortizacion = $this->amortizacionRepository->findWithoutFail($id);

        if (empty($amortizacion)) {
            Flash::error('Amortizacion not found');

            return redirect(route('admin.amortizacions.index'));
        }

        $amortizacion = $this->amortizacionRepository->update($request->all(), $id);

        Flash::success('Amortizacion updated successfully.');

        return redirect(route('admin.amortizacions.index'));
    }

    /**
     * Remove the specified Amortizacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $amortizacion = $this->amortizacionRepository->findWithoutFail($id);

        if (empty($amortizacion)) {
            Flash::error('Amortizacion not found');

            return redirect(route('admin.amortizacions.index'));
        }

        $this->amortizacionRepository->delete($id);

        Flash::success('Amortizacion deleted successfully.');

        return redirect(route('admin.amortizacions.index'));
    }
}
