<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // This method will show the login page for customers or User.
    public function index(){
        return view('login');
    }

    // This method will show the Authenticate.
    public function authenticate(Request $request){
        $validate = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);

        if($validate->passes()){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('account.dashboard');
            }else{
                return redirect()
                ->route('account.login')
                ->with('error','Eighter email address and password is incorrect.');
            }
        }else{
            return redirect()
            ->route('account.login')
            ->withInput()
            ->withErrors($validate);
        }
    }

    // This method will show the register page for customers or User.
    public function register(){
        return view('register');
    }

    // This method will show the process registertion for customers or User.
    public function processRegister(Request $request){

        $validate = Validator::make($request->all(),[
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        if($validate->passes()){
            
            $user = new User();
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user ->password = Hash::make($request->password);
            $user ->role = 'customer';
            $user ->save();

            return redirect()
            ->route('account.login')
            ->with('success', 'You have successfully registered.');
        }else{
            return redirect()
            ->route('account.register')
            ->withInput()
            ->withErrors($validate);
        }
    }

    // This method will show the logout page for customers or User.
    public function logout(){
        Auth::logout();
        return redirect()
        ->route('account.login')
        ->with('success', 'You have successfully logged out.');
    }
}
