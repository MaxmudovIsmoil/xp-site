<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    // trait
    use HttpResponses;


    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(LoginUserRequest $request)
    {

        $request->validated($request->all());


        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            return redirect()->route('login')->withErrors(['Login yoki parolda xatolik mavjud.']);


        $request->session()->regenerate();

        return view('admin.dashboard');
    }




    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');

    }


}
