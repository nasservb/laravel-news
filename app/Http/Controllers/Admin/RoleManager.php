<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Admin\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManager extends AppBaseController
{
    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles =Role::all(); 

        return view('role.index')
                 ->with('roles', $roles);
    }


    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('role.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();


        if ( !Validator::make($input, [
                    'name' => ['required', 'string', 'max:255','unique:roles'],
                ]))
        {
            return back()->withErrors(['err'=>'نام صحیح وارد نشده است.'])->withInput();
        }
 
        $role = Role::create(['name' => $input['name']]);

        Flash::success('Role saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $users = $this->usersRepository->find($id);

        // if (empty($users)) {
        //     Flash::error('Users not found');

        //     return redirect(route('users.index'));
        // }

        // return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Role.
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



        if (isset($input['password']))
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




        
        $users = $this->usersRepository->update($request->all(), $id);

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
