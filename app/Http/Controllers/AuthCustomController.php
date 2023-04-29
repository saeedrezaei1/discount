<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomLoginRequest;
use App\Http\Requests\CustomRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthCustomController extends Controller
{
    public function index($locale)
    {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);

        return view('authenticate.login',compact('locale'));
    }

    public function customLogin(CustomLoginRequest $request, $locale)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("$locale/dashboard-user")
                ->withSuccess('Signed in');
        }

            return redirect($locale."/login-user")->withSuccess('Login details are not valid');
    }


    public function registration($locale)
    {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('authenticate.register',compact('locale'));
    }

    public function customRegistration(CustomRegisterRequest $request, $locale)
    {

        $data = $request->all();
        $check = $this->create($data);
        Auth::login($check);
        return redirect("$locale/dashboard-user")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function dashboard($locale)
    {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);
        if(Auth::check()){
            return view('authenticate.dashboard',compact('locale'));
        }

        return redirect("$locale/login-user")->withSuccess('You are not allowed to access');
    }
    public function signOut($locale) {
        Session::flush();
        Auth::logout();
        return Redirect("$locale/login-user");
    }



}
