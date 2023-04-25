<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPassController extends Controller
{
    public function forget($locale)
    {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('authenticate.forget-pass',compact('locale'));
    }

    public function forgetPass(Request $request, $locale)
    {if (! in_array($locale, ['en', 'fa'])) {
        abort(400);
    }
        App::setLocale($locale);

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::send('email.forgetPass', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }


    public function showResetPasswordForm($locale,$token) {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('authenticate.forgetPasswordLink', ['locale' => $locale ,'token' => $token]);
    }


    public function submitResetPasswordForm(Request $request, $locale)
    {
        if (! in_array($locale, ['en', 'fa'])) {
            abort(400);
        }
        App::setLocale($locale);
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect("$locale/login-user")->with('message', 'Your password has been changed!');
    }
}
