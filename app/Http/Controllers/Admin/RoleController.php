<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Permission;
use App\Repositories\Admin\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roleRepository->pushCriteria(new RequestCriteria($request));
        $roles = $this->roleRepository->all();

        return view('admin.roles.index')
            ->with(['roles' => $roles]);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');

        return view('admin.roles.create')->with(['permissions' => $permissions]);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }
        $permissions = Permission::pluck('name', 'id');
        $permissionsCurrent = array();
        foreach ($role->perms as $perm) {
            array_push($permissionsCurrent, $perm->id);
        }
        return view('admin.roles.edit')->with(['role' => $role, 'permissions' => $permissions, 'permissionsCurrent' => $permissionsCurrent]);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        $role->perms()->sync($request['permissions']);
        Flash::success('Role updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'));
    }
}
