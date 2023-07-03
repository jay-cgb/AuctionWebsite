<?php

namespace App\Http\Controllers;

use App\Models\User;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $formFields =  $request->validate ([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            // generate a session id
            $request->session()->regenerate();

            return redirect(route('admin.dashboard'));
        }
        // if it fails
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }

   
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }





    // public function showRegisterForm(){
    //     return view('register');
    // }

    // public function create(Request $request){
    //     // form validation
    //     $formFields =  $request->validate ([
    //         'name' => ['required', 'min:3'], 
    //         'email' => ['required', 'email', 'unique:users'],
    //         'password' => ['required', 'confirmed', Password::min(6)]
    //     ]);

    //     //Hash Password
    //     $formFields['password'] = bcrypt($formFields['password']);

    //     // Ceate user
    //     $user = User::create($formFields);

    //     return redirect(route('login-form')); 
    // }
}
