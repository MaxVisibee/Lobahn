<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        $remember = $request->has('remember') ? true : false;
 
        if($user) {
                # Candidate Login
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
                {
                    
                    $user = Auth::user();
                    if($user->package_end_date < date('Y-m-d'))
                    {
                        # date is past
                        return redirect()->route('make-payment');
                    }
                    
                    if(!Auth::user()->is_active) 
                    {
                        Session::put('error', "Your account is locked");
                        auth()->logout();
                        return redirect()->back();
                    }
                    # if try to access from membership
                    if(isset($_COOKIE["MembershipCookie"]))
                    {
                        unset( $_COOKIE["MembershipCookie"] );
                        return redirect('career-partner-parchase');
                    }
                    # if try to access from community
                    elseif(isset($_COOKIE["CommunityCookie"]))
                    {
                        unset( $_COOKIE["CommunityCookie"] );
                        return redirect('community');
                    }
                    # normal login
                    else return redirect('/home'); 
                }
        }
        else {
                # Company Login
                if(Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $remember))
                {
                    $user = Auth::guard('company')->user();
                    if($user->package_end_date < date('Y-m-d'))
                    {
                        # date is past
                        return redirect()->route('make-payment');
                    }

                    if(!Auth::guard('company')->user()->is_active) 
                    {
                        auth()->logout();
                        return redirect()->back();
                    }
                    # if try to access from membership
                    if(isset($_COOKIE["MembershipCookie"]))
                    {
                        unset( $_COOKIE["MembershipCookie"] );
                        return redirect('talent-discovery-parchase');
                    }
                    # if try to access from community
                    elseif(isset($_COOKIE["CommunityCookie"]))
                    {
                        unset( $_COOKIE["CommunityCookie"] );
                        return redirect('community');
                    }
                    # notmal login
                    else return redirect('/company-home');
                }
            }

        Session::put('err-email', $request->email);
        return redirect()->route('login');
    }

    public function logout()
    {
       auth()->logout();
       return redirect('/');
    }

}
