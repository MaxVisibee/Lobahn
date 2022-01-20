<?php

namespace App\Http\Controllers\Candidate\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Session;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view("candidate_auth.reset-password")->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        Session::forget('verified', 'verified');
        Session::put('success', 'success');
    }

    public function broker()
    {
        return Password::broker('users');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
}