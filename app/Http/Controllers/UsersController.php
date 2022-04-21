<?php

namespace App\Http\Controllers;

use App\Mail\NotificationToUser;
use App\Mail\StaffUsersNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Jobs\SendEmailsToStaffUsers;
use App\Jobs\SendSmsToStaffUsers;
use Illuminate\Support\Facades\Hash;

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

        $user->assignRole($role->name);

        return redirect('/users/create')->with('success', 'User successfully created');
    }

    public function userProfile($id)
    {
        return view('users.profile', [
            
            'users' => User::find($id),
        ]);
    }

    public function changePasswordForm()
    {
        return view('users.change-password');
    }

    public function changePassword()
    {
        if(!Hash::check(request()->get('current-password'), Auth::user()->password)){

            return redirect()->back()->with('error','Your current password does not match our records.');
        }

        if(strcmp(request()->get('current-password'), request()->get('new-password')) == 0){

            return redirect()->back()->with('error','New Password cannot be same as your current password.');

        }

        request()->validate([

            'current-password' => 'required',

            'new-password' => 'required'
        ]);

        $user = Auth::user();

        $user->password = bcrypt(request()->get('new-password'));

        dd($user);

        $user->save();

        return redirect('/login')->with('success','Password successfully changed');

    }

    public function showEditForm($id)
    {
        $user = User::find($id);

        $roles = Role::all();

        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }

    public function updateUser($id)
    {
        request()->validate([

            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
    
        $input = request()->all();
       
        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole(request()->input('roles'));
    
        return redirect('/users')->with('success','User updated successfully');
    }

    public function deleteUserDetails($id)
    {
        $user = User::find($id);

        if(count($user->levels) > 0) {
         
            return redirect('/users')->with('error', 'This user contains several roles, please remove all role before deleting');
        }

        $user->delete();

        return redirect('/users')->with('success','User deleted successfully');
    }

    public function showEmailForm($id)
    {
        $userEmail = User::select('email', 'id')->find($id);

        return view('users.custom-email', compact('userEmail'));
    }

    public function sendCustomEmailToUser($id)
    {
        $userEmail = User::select('email')->find($id);

        $mailValidation = request()->validate([

            'subject' => 'required',

            'content' => 'required'
        ]);

        $subject = $mailValidation['subject'];

        $emailContent = $mailValidation['content'];

        Mail::to($userEmail)->send(new NotificationToUser($subject,$emailContent));

        return redirect('/users')->with('success', 'Email successfully sent');
    }

    public function emailsNotificationForm()
    {
        return view('emails.all-staff');
    }

    public function smsNotificationForm()
    {
        return view('sms.all-staff');
    }

    public function mailNotificationToStaff()
    {
        $emailContent = request()->validate([

            'subject' => 'required',

            'content' => 'required'
        ]);

        $mailSubject = $emailContent['subject'];

        $message = $emailContent['content'];

        $users = User::all();

        foreach($users as $user){

            dispatch(new SendEmailsToStaffUsers($mailSubject, $message, $user));
        }

        return redirect('/users/notifications/email')->with('success', 'Emails are successfully sent');
    }

    public function smsNotificationToStaff()
    {
        $sms = request()->validate([

            'content' => 'required'
        ]);

        $messageContent = $sms['content'];

        $users = User::select('phone_number')->get();

        $contacts = [];

        foreach ($users as $key => $user) {
            
            array_push($contacts, ['recipient_id' => $key, 'dest_addr' => $user->phone_number]);
        }

        dispatch(new SendSmsToStaffUsers($contacts, $messageContent));

        return redirect('/users/notifications/sms')->with('success', 'SMS successfully sent to all staff');
    }
}
