<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() {
        return view('admin.login.register');
    } 

    public function storeRegister(Request $request) {
        $request->validate([
            'username' =>'required',
            'password' =>'required'
        ]);

        $user = new admin(); 
        $user->name = $request->username;
        $user->password = bcrypt($request->password);
    
        $user->save(); 

        return redirect()->back(); 
    } 

    public function showLogin() {
        return view('admin.login.index');
    } 

    public function login(Request $request) {

        $auth = Auth::guard('admin');

        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard){
            if ($auth->attempt(['name' => $request->username, 'password' => $request->password])) {
                return redirect()->route('admin-home');
            } else {
                return redirect()->route('admin-login')->with('Fail', 'Incorrect credentials');

            }
        }
    } 

    public function logout()
    {
        $auth = Auth::guard('admin');
        
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard){
            $auth->logout(); 
        }

        return redirect()->route('admin-login');
    }
}