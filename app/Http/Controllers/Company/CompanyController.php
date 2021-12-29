<?php

namespace App\Http\Controllers\Company;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Validator;
use Image;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function index(){
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id',$company->id)->get()
        ];
        return view('company.dashboard',$data);
    }

    public function positionDetail($id){
        $data = [
            'listing' => Opportunity::where('id',$id)->first(),
        ];
        return view('company.position_detail',$data);
    }

    public function account()
    {
        return view('company.account');
    }
    public function settings()
    {
        return view('company.settings');
    }
    public function profile()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id',$company->id)->get()
        ];
        
        return view('company.profile',$data);
    }

    public function edit()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];
        
        return view('company.profile_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = Auth::guard('company')->user();
        
        $this->validate($request, [
            'company_name' => 'required',
            'user_name' => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
        ]);
       
        if (isset($request->company_logo)) {
            
            $photo = $_FILES['company_logo'];
            if (!empty($photo['name'])) {
                $file_name = $photo['name'] . '-' . time() . '.' . $request->file('company_logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/' . $file_name));
                $img->save(public_path('/uploads/company_logo/' . $file_name));

                $company->company_logo = $file_name;
            }
        }
        
        $company->company_name = $request->input('company_name');
        $company->user_name = $request->input('user_name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        // $company->website_address = $request->input('website_address');
        // $company->description = $request->input('description');
    
        $company->update();
        
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];
        
        return redirect()->route('company.profile.edit')->with('data');

    }

    /**
     * Update Detail the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update_detail(Request $request)
    {
        $company = Auth::guard('company')->user();
        $company->website_address = $request->input('website_address');
        $company->description = $request->input('description');
        $company->update();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return redirect()->route('company.profile.edit')->with('data');
    }

    public function activity()
    {
        return view('company.activity');
    }

    public function company_listing()
    {
        $data['companies']=Company::paginate(20);
        return view('company.listing')->with($data);
    }

    public function positionListing($id)
    {
        return view('company.position_listing');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);
    
        $company = Company::find(Auth::guard('company')->user()->id);
        $company->password = bcrypt($request->password);
        $company->save();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'errors' => $validator->errors(),
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return view('company.profile', $data);
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