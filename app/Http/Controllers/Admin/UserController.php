<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $roles = Role::pluck('name', 'id');
        $rolesCurrent = array();
        foreach ($user->roles as $rol) {
            array_push($rolesCurrent, $rol->id);
        }
        return view('admin.users.edit')->with(['user' => $user, 'roles' => $roles, '$rolesCurrent' => $rolesCurrent]);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        if ($request['password'] == "") {
            unset($request['password']);
            unset($request['password_autorization']);
        } else {
            $request['password'] = bcrypt($request['password']);
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.users.index'));
    }

    public function editPassword($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.editPassword')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        if ($request['password_nuevo1'] != $request['password_nuevo2']) {
            Flash::error('Los password ingresados no coinciden');
            return redirect(route('admin.users.editPassword',[Auth::user()->id]));
        }
        $user = User::find(Auth::user()->id);
        if (Hash::check(trim($request['password_actual']), $user->password)) {
            $user->password = bcrypt(trim($request['password_nuevo1']));
            $user->save();
            Flash::success('El password fue actualizado con éxito.');
            return redirect(route('admin.users.editPassword',[Auth::user()->id]));
//            return redirect('/home');
        } else {
            Flash::error('El password ingresado no es correcto');
            return redirect(route('admin.users.editPassword',[Auth::user()->id]));
        }
    }
}
