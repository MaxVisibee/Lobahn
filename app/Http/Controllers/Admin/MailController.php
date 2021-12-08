<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Mail;

class MailController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();
        $companies = Company::orderby('id','DESC')->get();
        return view('admin.mail.index',compact('users','companies'));
    }
    
    public function sendMail(Request $request)
    {
        $html = $request->body;
        \Mail::send([], [], function ($message) use ($html,$request) {
                    $message->to($request->mailto)
                ->subject($request->subject)
                ->setBody($html, 'text/html');
        });

        //dd("Email is Sent.");

        return redirect()->route('mail.index')->with('success','Mail has been sent!');

    }
}
