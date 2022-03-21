<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;
use Illuminate\Support\Facades\Session;

class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.pages.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $role = Role::where('id', '<>', 1)->orderBy('id', 'asc')->pluck('name', 'id');

        if($request->ajax()) {
            if($request->type == '3') {
                $location = Kecamatan::select('id', 'name')->whereParentId(0)->orderBy('id', 'asc')->get();
                return response()->json($location);
            } else {
                $location = Desa::select('id', 'name')->where('parent_id', '>', 0)->orderBy('id', 'asc')->get();
                return response()->json($location);
            }
        }


        return view('admin.pages.users.create')
            ->with('role', $role);
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
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'location_id' => isset($request->location) ? $request->location : 0,
            'is_active' => 1
        ];

        $role = null;
        if(!empty($request->role)) {
            $role = $request->role;
            unset($request->role);
        }

        $user = $this->userRepository->create($input);

        if($user) {
            $user = User::find($user->id);
            if($role) {
                $user->syncRoles($role);
            }
        }

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.pages.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $role = Role::where('id', '<>', 1)->orderBy('id', 'asc')->pluck('name', 'id');
        return view('admin.pages.users.edit')->with('user', $user)
            ->with('role', $role);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {   
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'location_id' => isset($request->location) ? $request->location : 0,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $role = null;
        if(!empty($request->role)) {
            $role = $request->role;
            unset($request->role);
        }

        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            unset($request->password);
        }

        $user = $this->userRepository->update($input, $id);

        if($user) {
            $user = User::find($user->id);
            if($role) {
                $user->syncRoles($role);
            }
        }

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.users.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->userRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
