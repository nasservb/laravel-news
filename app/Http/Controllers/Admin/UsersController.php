<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;

use App\Repositories\usersRepository;
use App\Http\Controllers\Admin\AppBaseController;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
 

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class usersController extends AppBaseController
{
    use RegistersUsers;

    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->usersRepository->all();
       

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        $roles =Role::all(); 
        //$roles =Role::all(); 

        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();


        if ( !Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]))
        {
            return back()->withErrors(['err'=>'نام، ایمیل یا رمز عبورصحیح وارد نشده است.'])->withInput();
        }

        $users =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);



        //$users = $this->usersRepository->create($input);


        $user = Auth::user($users->id); 

        $user->syncRoles(array_values($input['roles']) );

        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles =Role::all(); 

        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users)->with('roles', $roles);
    }

    /**
     * Update the specified users in storage.
     *
     * @param int $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }



        if (!Validator::make($input, [
            'name' => ['required', 'string', 'max:255'] ]))
        {
            return back()->withErrors(['err'=>'نام صحیح وارد نشده است.'])->withInput();
        }



        if (isset($input['password']) && $input['password'] != '')
        {
            if(!Validator::make($input, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]))
            {
                return back()->withErrors(['err'=>' ایمیل یا رمز عبورصحیح وارد نشده است.'])->withInput();
            }



            $input['password']= Hash::make($input['password']);

        } 
        else 
        {
            $input['password']= Hash::make($users->password);
        }



        
        $users = $this->usersRepository->update($input, $id);

        $user = Auth::user($users->id); 
        

        $user->syncRoles(array_values($input['roles']) );


        Flash::success('Users updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
}
