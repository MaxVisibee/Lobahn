<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\User;
use Redirect;
use Session;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function searchEmail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|string',
            ],
            [ 'email.required' => 'This field can not be blank value.']);

        $user = User::where('email', '=',$request->email)->first();
        
        if($user) {
            return $this->sendResetLinkEmail($request);
        }else {
            $company = Company::where('email', '=',$request->email)->first();
            if($company) {
                return Redirect::route('company.get-email', $request);
            }else{
                $message = "We couldn't find an account associated with ". $request->email . ". Please try with an alternate email.";
            }
        }


        // return Redirect::back()->withErrors(['msg' => $message]);
        return redirect('/password/reset')->withErrors(['msg' => $message]);

    }
}
