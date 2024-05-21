<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function check(Request $request)
    {
        // dd(Hash::make($request->password));
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            if($user->role == 1){
                session()->put('success_message', 'You are logged in successfully.');
                return redirect()->route('admin_dashboard');
            }else{
                session()->put('error_message', 'Invalid credentials or insufficient permissions. Please try again..');
                return redirect()->back()->withInput($request->only('email'));
            }
        } else {
            session()->put('error_message', 'Invalid credentials. Please try again.');
            return redirect()->back()->withInput($request->only('email'));
        }
    }
    public function logout()
    {
        Auth::logout();
        session()->forget(['admin_id', 'admin_email', 'admin_name', 'success_message']);
        session()->flush();
        session()->put('logout', 'Logged Out.');
        return redirect()->route('admin_login');
    }
}
