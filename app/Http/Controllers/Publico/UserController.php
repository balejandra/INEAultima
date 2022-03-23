<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publico\CreateUserRequest;
use App\Http\Requests\Publico\UpdateUserRequest;
use App\Models\Publico\Capitania;
use App\Models\Publico\CapitaniaUser;
use App\Models\Publico\Saime_cedula;
use App\Models\User;
use App\Repositories\Publico\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;


        $this->middleware('permission:listar-usuario', ['only'=>['index'] ]);
        $this->middleware('permission:crear-usuario', ['only'=>['create','store']]);
        $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);
        $this->middleware('permission:consultar-usuario', ['only'=>['show'] ]);
        $this->middleware('permission:eliminar-usuario', ['only'=>['destroy'] ]);
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('publico.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id');
        $capitanias=Capitania::pluck('nombre','id');
        return view('publico.users.create')
            ->with('roles',$roles)
            ->with('capitanias',$capitanias);
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
      //  dd($request);
        $data= new User();
        $data->email= $request->email;
        $data->nombres = $request->nombres;
        $data->password = Hash::make($request->password);
        $data->tipo_usuario=$request->tipo_usuario;
        $data->email_verified_at= now();
        $data->save();
        $input = $request->all();

        $roles=$request->input('roles', []);
        $data->roles()->sync($roles);
        $rol=Role::select('name')->where('id',$request->roles)->get();

        $cap_user= new CapitaniaUser();
        $cap_user->cargo=$rol[0]->name;
        $cap_user->user_id=$data->id;
        $cap_user->capitania_id=$request->capitanias;
        $cap_user->save();
        Flash::success('Usuario guardado exitosamente.');

        return redirect(route('users.index'));
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
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('publico.users.show')->with('user', $user);
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
        $roles=Role::pluck('name','id');
        $capitanias=Capitania::pluck('nombre','id');
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('publico.users.edit')
            ->with('user', $user)
            ->with('roles',$roles)
            ->with('capitanias',$capitanias);
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
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);
        $roles=$request->roles ;
        $user->roles()->sync($roles);
        $rol=Role::select('name')->where('id',$request->roles)->get();

        $cap_user= new CapitaniaUser();
        $cap_user->cargo=$rol[0]->name;
        $cap_user->user_id=$id;
        $cap_user->capitania_id=$request->capitanias;
        $cap_user->save();

        Flash::success('Usuario actualizado con éxito.');

        return redirect(route('users.index'));
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

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuario eliminado exitosamente.');

        return redirect(route('users.index'));
    }

    public function consulta(Request $request){
        $cedula=$_REQUEST['cedula'];
        $fecha=$_REQUEST['fecha'];
        $newDate = date("d/m/Y", strtotime($fecha));
        $data= Saime_cedula::where('cedula',$cedula)
            ->where('fecha_nacimiento',$newDate)
            ->get();
        if (is_null($data->first())) {
            dd('error');
            $data=response()->json([
                'status'=>3,
                'msg' => $exception->getMessage(),
                'errors'=>[],
            ], 200);
        }
            echo json_encode($data);
    }
}
