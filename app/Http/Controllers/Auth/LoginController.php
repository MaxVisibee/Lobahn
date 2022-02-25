<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Company;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        $remember = $request->has('remember') ? true : false;
 
        if($user) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
            {
                if(isset($_COOKIE["MembershipCookie"]))
                {
                    unset( $_COOKIE["MembershipCookie"] );
                    return redirect('career-partner-parchase');
                }
                elseif(isset($_COOKIE["CommunityCookie"]))
                {
                    unset( $_COOKIE["CommunityCookie"] );
                    return redirect('community');
                }
                else return redirect('/home');
                
            }
        }else {
            if(Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $remember))
            {
                if(isset($_COOKIE["MembershipCookie"]))
                {
                    unset( $_COOKIE["MembershipCookie"] );
                    return redirect('talent-discovery-parchase');
                }
                elseif(isset($_COOKIE["CommunityCookie"]))
                {
                    unset( $_COOKIE["CommunityCookie"] );
                    return redirect('community');
                }
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
