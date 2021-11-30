<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CompanyPackageTrait;
use Hash;
use Image;

use App\Models\Package;
use App\Models\Industry;
use App\Models\Area;
use App\Models\District;
use App\Models\Country;

class CompanyController extends Controller
{
    use CompanyPackageTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderby('id','DESC')->get();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages   = Package::pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();

        return view('admin.companies.create', compact('packages','industries','countries','areas','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'name'      => 'required',
            'email'     => 'required|email|unique:companies,email',
            'password'  => 'required|min:6',
            'phone'     => 'required',
        ]);

        $company = new Company();
        /*         * **************************************** */
        
        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->logo = $file_name;
            }
        }
        /*         * ************************************** */
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->user_name = $request->input('user_name');
        $company->industry_id = $request->input('industry_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->no_of_employees = $request->input('no_of_employees');
        $company->phone = $request->input('phone');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');
        $company->save();
        /*         * ******************************* */
        $company->slug = str_slug($company->name, '-') . '-' . $company->id;
        /*         * ******************************* */
        $company->update();
        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addCompanyPackage($company, $package);
        }
        /*         * ************************************ */
        
        return redirect()->route('companies.index')->with('success', 'Company has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $packages   = Package::pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();

        return view('admin.companies.edit', compact('company','packages','industries','countries','areas','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'name'      => 'required',
            'email'     => 'required|email|unique:companies,email,'.$company->id,
            'phone'     => 'required',
        ]);

        // $company = Company::findOrFail($id);
        /*         * **************************************** */
        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->logo = $file_name;
            }
        }
        /*         * ************************************** */
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->user_name = $request->input('user_name');
        $company->industry_id = $request->input('industry_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->no_of_employees = $request->input('no_of_employees');
        $company->phone = $request->input('phone');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');

        $company->slug = str_slug($company->name, '-') . '-' . $company->id;
        $company->update();

        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            if ($company->package_id > 0) {
                $this->updateCompanyPackage($company, $package);
            } else {
                $this->addCompanyPackage($company, $package);
            }
        }
        /*         * ************************************ */
        
        return redirect()->route('companies.index')->with('success', 'Company has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company has been deleted!');
    }
}
