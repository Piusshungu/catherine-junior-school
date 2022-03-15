<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {

        return view('users.index', [

            'users' => User::orderBy('first_name')->filter(request(['search']))
            
            ->paginate(10)->withQueryString(),
        ]);
    }

    public function showLoginForm()
    {

        return view('users.login');
    }

    
    public function userLogin()
    {

        request()->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        $loginCredentials = request()->only('email', 'password');

        if(Auth::attempt($loginCredentials)){

            return redirect('/dashboard')->with('success', 'Logged In');
        }

        else return redirect('/login')->with('error', 'Incorrect email or password');
    }

    public function userLogout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function createForm()
    {

        return view('users.create', [

            'roles' => Role::all(),
        ]);
    }

    public function createUser()
    {
        $password =  request()->last_name;

        request()->merge(['password' => $password]);

        $userDetails = request()->validate([

            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'phone_number' => 'required|max:12',
            'type' => 'required',
            'gender' => 'required',
            'password' => 'required'
           
        ]);

        if(request()->has('avatar') && !is_null(request()->avatar))
        {
            $avatarName = request()->file('avatar')->getClientOriginalName();

            $path = request()->file('avatar')->store('public/images');
    
            $saveAvatar = new User;
    
            $saveAvatar->avatarName = $avatarName;
    
            $saveAvatar->path = $path;

            $userDetails = array_merge($userDetails, ['avatar'=> $path]);
        }

        $role = Role::findByName(request()->type);

        $user = User::create($userDetails);

        $user->assignRole($role->id);

        return redirect('/users/create')->with('success', 'User successfully created');
    }

    public function showEditForm($id)
    {
        $user = User::find($id);

        $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function updateUser(Request $request, $id)
    {
        $userDetails = request()->validate([

            'email' => 'required|email|unique',
            'name' => 'required|max:255',
            'password' => 'required|same:confirm-password|min:6',
            'roles' => 'required',
        ]);
    
        $input = request()->all();

        if(!empty($input['password'])){ 

            $input['password'] = bcrypt($input['password']);
        }
        
        else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect('/users')->with('success','User updated successfully');
    }

    public function deleteUserDetails($id)
    {

        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success','User deleted successfully');
    }
}
