<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use App\Models\User;
use App\Models\Company;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\SiteSetting;
use Stripe;
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
    
        $this->validate($request, [
            'email' => 'required|email|string',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        $company = Company::where('email','=',$request->email)->first();

        if(is_null($user) AND is_null($company))
        {
            Session::put('custom-error', "Sorry! We don't seem to have an account with that email address. Please try another email address.");
            return redirect()->route('login');
        }

        $remember = $request->has('remember') ? true : false;
 
        if($user) {
                # Candidate Login
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
                {
                    // $user = User::where('email', '=', $request->email)->first();
                    // $payments = Payment::where('user_id',$user->id)->where('status',1)->get();
                    // foreach($payments as $payment)
                    // {
                    //     if($payment->package->package_type == "basic")
                    //     {
                    //         if(date('Y-m-d',strtotime($payment->package_end_date)) < date('Y-m-d'))
                    //             {
                    //                 # date is past
                    //                 $stripe = new \Stripe\StripeClient(
                    //                 SiteSetting::first()->stripe_secret
                    //                 );
                    //                 $intent = $stripe->subscriptions->retrieve(
                    //                 $payment->sub_id,
                    //                 []
                    //                 );
                    //                 if($intent->status != "active")
                    //                 {
                    //                     return redirect()->back();
                    //                 }
                    //             }
                    //     }
                    // }
                    
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
                else {
                    Session::put('custom-error', "Sorry! The email & password do not match. Please try again.");
                    return redirect()->route('login');
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
                else {
                    Session::put('custom-error', "Sorry! The email & password do not match. Please try again.");
                    return redirect()->route('login');
                }
            }

        //Session::put('custom-error', "Sorry! We don't seem to have an account with that email address. Please try another email address.");
        //return redirect()->route('login');
    }

    public function logout()
    {
       auth()->logout();
       return redirect('/');
    }

}
