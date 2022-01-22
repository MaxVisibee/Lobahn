<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\Company;
use Session;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/company-home';


    public function __construct()
    {
        $this->middleware('company.guest');
    }
  
    public function showResetForm(Request $request, $token = null)
    {
        return view('company_auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $company = Company::where('email',$request->email)->first();
        $company->password = bcrypt($request->password);
        $company->save();
        $company = Auth::guard('company')->user();
        Session::put('success', 'success');
    }

    public function broker()
    {
        return Password::broker('companies');
    }

    protected function guard()
    {
        return Auth::guard('company');
    }
}