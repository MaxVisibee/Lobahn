<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Image;
use Carbon\Carbon;

use App\Models\Area;
use App\Models\District;
use App\Models\Industry;
use App\Models\Country;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();

        return view('admin.seekers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        // $districts  = District::pluck('district_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();

        return view('admin.seekers.create', compact('areas', 'countries', 'industries'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
        ]);

        $user = new User();
        /*         * **************************************** */
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photo/'.$file_name));
                $img->save(public_path('/uploads/profile_photo/'.$file_name));

                $user->image = $file_name;
            }
        }
        /*         * ************************************** */
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->father_name = $request->input('father_name');
        $user->dob = $request->input('dob')? Carbon::createFromFormat('d/m/Y', $request->get('dob'))->format('Y-m-d'):null;
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->nric = $request->input('nric');
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->job_experience_id = $request->input('job_experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        $user->street_address = $request->input('street_address');
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active = $request->input('is_active');
        $user->verified = $request->input('verified');
        $user->save();

        /*         * *********************** */
        $user->name = $user->getName();
        $user->update();

        /*         * *********************** */

        return redirect()->route('seekers.index')->with('success','Seeker has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = User::find($id);
        return view('admin.seekers.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        // $districts  = District::pluck('district_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
    
        return view('admin.seekers.edit',compact('user', 'areas', 'countries', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
    
        $user = User::findOrFail($id);
        /*         * **************************************** */
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photo/'.$file_name));
                $img->save(public_path('/uploads/profile_photo/'.$file_name));

                $user->image = $file_name;
            }
        }
        /*         * ************************************** */
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        /*         * *********************** */
        $user->name = $user->getName();
        /*         * *********************** */
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->father_name = $request->input('father_name');
        $user->dob = $request->input('dob')? Carbon::createFromFormat('d/m/Y', $request->get('dob'))->format('Y-m-d'):null;
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->nric = $request->input('nric');
        
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->job_experience_id = $request->input('job_experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        
        $user->street_address = $request->input('street_address');
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active = $request->input('is_active');
        $user->verified = $request->input('verified');
        $user->update();

        /*         * ************************************ */

        return redirect()->route('seekers.index')->with('success','Seeker has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('seekers.index')
                        ->with('success','Seeker has been deleted!');
    }
}
