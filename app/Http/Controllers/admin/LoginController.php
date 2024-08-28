<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    // This method will show the Admin login page for customers or User.
    public function index(){
        return view('admin.login');
    }

    // This method will show the Admin Authenticate.
    public function authenticate(Request $request){
        $validate = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);

        if($validate->passes()){
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                if(Auth::guard('admin')->user()->role != 'admin'){
                    Auth::guard('admin')->logout();
                    return redirect()
                    ->route('admin.login')
                    ->with('error','You are not authirized to access this page.');
                }
                return redirect()->route('admin.dashboard');

            }else{
                return redirect()
                ->route('admin.login')
                ->with('error','Eighter email address and password is incorrect.');
            }
        }else{
            return redirect()
            ->route('admin.login')
            ->withInput()
            ->withErrors($validate);
        }
    }

    // This method will show the Admin Logout.
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
}
