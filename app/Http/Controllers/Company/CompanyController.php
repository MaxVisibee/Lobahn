<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function index()
    {
        return view('frontend.company_home');
    }

    public function company_listing()
    {
        $data['companies']=Company::paginate(20);
        return view('company.listing')->with($data);
    }

    // public function companyProfile()
    // {
    //     $countries = DataArrayHelper::defaultCountriesArray();
    //     $industries = DataArrayHelper::defaultIndustriesArray();
    //     $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
    //     $company = Company::findOrFail(Auth::guard('company')->user()->id);
    //     return view('company.edit_profile')
    //                     ->with('company', $company)
    //                     ->with('countries', $countries)
    //                     ->with('industries', $industries)
    //                     ->with('ownershipTypes', $ownershipTypes);
    // }

    // public function companyDetail(Request $request, $company_slug)
    // {
    //     $company = Company::where('slug', 'like', $company_slug)->firstOrFail();
    //     /*         * ************************************************** */
    //     $seo = $this->getCompanySEO($company);
    //     /*         * ************************************************** */
    //     return view('company.detail')
    //                     ->with('company', $company)
    //                     ->with('seo', $seo);
    // }

    // public function sendContactForm(Request $request)
    // {
    //     $msgresponse = Array();
    //     $rules = array(
    //         'from_name' => 'required|max:100|between:4,70',
    //         'from_email' => 'required|email|max:100',
    //         'subject' => 'required|max:200',
    //         'message' => 'required',
    //         'to_id' => 'required',
    //         'g-recaptcha-response' => 'required|captcha',
    //     );
    //     $rules_messages = array(
    //         'from_name.required' => __('Name is required'),
    //         'from_email.required' => __('E-mail address is required'),
    //         'from_email.email' => __('Valid e-mail address is required'),
    //         'subject.required' => __('Subject is required'),
    //         'message.required' => __('Message is required'),
    //         'to_id.required' => __('Recieving Company details missing'),
    //         'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
    //         'g-recaptcha-response.captcha' => __('Captcha error! try again'),
    //     );
    //     $validation = Validator::make($request->all(), $rules, $rules_messages);
    //     if ($validation->fails()) {
    //         $msgresponse = $validation->messages()->toJson();
    //         echo $msgresponse;
    //         exit;
    //     } else {
    //         $receiver_company = Company::findOrFail($request->input('to_id'));
    //         $data['company_id'] = $request->input('company_id');
    //         $data['company_name'] = $request->input('company_name');
    //         $data['from_id'] = $request->input('from_id');
    //         $data['to_id'] = $request->input('to_id');
    //         $data['from_name'] = $request->input('from_name');
    //         $data['from_email'] = $request->input('from_email');
    //         $data['from_phone'] = $request->input('from_phone');
    //         $data['subject'] = $request->input('subject');
    //         $data['message_txt'] = $request->input('message');
    //         $data['to_email'] = $receiver_company->email;
    //         $data['to_name'] = $receiver_company->name;
    //         $msg_save = CompanyMessage::create($data);
    //         $when = Carbon::now()->addMinutes(5);
    //         Mail::send(new CompanyContactMail($data));
    //         $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
    //         echo json_encode($msgresponse);
    //         exit;
    //     }
    // }
}
