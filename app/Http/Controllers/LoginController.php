<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function process(Request $request)
    {
        try {
            $email = $request->get('email');
            $password = $request->get('password');
            $admin = LoginModel::where('email', $email)->where('password', $password)
                ->firstOrFail();
            $request->session()->put('id', $admin->id);
            return Redirect::route('Lab.index');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Sai email hoặc password');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
