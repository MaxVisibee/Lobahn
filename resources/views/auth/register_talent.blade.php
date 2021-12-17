@extends('layouts.master')
@push('css')
<style>
    #msform fieldset:not(:first-of-type) {
        display: none;
    }
    #msform fieldset{
        background: none !important;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
    {{-- {!! Form::open(array('route' => 'company.register', 'method'=>'POST', 'files'=>true, 'id'=>'msform', 'name'=>'msform')) !!} --}}
    <form action="{{ route('company.register') }}" method="POST" files="true" id="msform" name="msform"
        enctype="multipart/form-data" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" autocomplete="off">
        <input type="hidden" name="company_id" id="company_id" value="{{$company->id}}">
            <fieldset>
                {{-- <div class="previous-wrapper">
                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div> --}}
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR PASSWORD</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="user_name" id="user_name" placeholder="Username*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" required />
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="password" id="password" placeholder="Password*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" required />
                                <img src="/./img/sign-up/eye-lash.svg" alt="eye lash icon" class="cursor-pointer eye-lash-icon absolute right-0"/>
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Comfirm Password.*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" required />
                                <img src="/./img/sign-up/eye-lash.svg" alt="eye lash icon" class="cursor-pointer eye-lash-icon absolute right-0"/>
                            </div>
                        </div>                
                        {{-- <button type="button" name="previous" class="btn btn-warning btn-sm previous action-button-previous" value="Previous" id="signup_step2">Next</button> --}}
                        <button type="button" name="next" class="next action-button text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange" >Next</button>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">PLEASE UPLOAD YOUR PHOTO</h1>
                        <h6 class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note upload-accepted-file-note--width">Recommended format:<span class="block">300x300px, .jpg, not larger than 200kb</span></h6>
                        <div class="image-upload upload-photo-box  mb-8 relative">
                            <label for="file-input" class="relative cursor-pointer block">
                                <img src="/./img/sign-up/upload-photo.png" alt="sample photo image" class="upload-photo-box__photo" id="sample-photo"/>
                                <img src="/./img/sign-up/upload-file.svg" alt="upload icon" class="upload-photo-box__icon absolute top-1/2 left-1/2"/>
                            </label>                          
                            <input id="file-input" name="logo" type="file" accept="image/*;capture=camera,.jpg,.png,.jpeg" class="sample-photo" data-allowed-file-extensions="jpg jpeg png"/>
                            {{--                           
                            <input type="file" name="logo" class="dropify" id="logo" accept="image/*;capture=camera,.jpg,.png,.jpeg" data-allowed-file-extensions="jpg jpeg png"/>
                            --}}
                          </div>
                        <button type="button" class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange action-button next" >
                            Next
                        </button>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <input type="file" name="logo" class="dropify" id="logo" accept="image/*;capture=camera,.jpg,.png,.jpeg" data-allowed-file-extensions="jpg jpeg png"/>
                </div>                
                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button> -->
            </fieldset>
                    
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">COMPANY PROFILE</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="website" id="website" placeholder="Website Address*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide required"/>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" placeholder="Main industries*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"/>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" placeholder="Main sub-sectors*" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"/>
                            </div>
                        </div>
                        <button type="button" class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button" >
                            Next
                        </button>
                    </div>
                </div>
                <!-- <h4>Company Information</h4>
                <div class="form-group">
                    <input type="text" name="website" id="website" class="form-control" placeholder="Website Address">
                </div>
                <div class="form-group">
                    <select name="industry_id" id="industry_id" class="form-control">
                        <option value="">Select Main Industries</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="sub_sector_id" id="sub_sector_id" class="form-control">
                        <option value="">Select Main sub-sectors</option>
                    </select>
                </div>                
                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button> -->
            </fieldset>

            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">HIRING PREFERENCES</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Preferred Schools</span>
                                            <svg class="arrow transition-all mr-4"xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18" transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#bababa" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                              </svg>                                              
                                        </div>
                                        <div class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Preferred Schools">Preferred Schools</span>
                                            <span
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                 data-value="example">example</span>
                                            <span
                                                class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                 data-value="example">example</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Target Employers</span>
                                            <svg class="arrow transition-all mr-4"xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18" transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#bababa" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                              </svg>                                              
                                        </div>
                                        <div class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span class="custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="Target Employers">Target Employers</span>
                                            <span class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example">example</span>
                                            <span class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                            data-value="example">example</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button"> Next</button>
                    </div>
                </div>

                <!-- <h4>Preference</h4>
                <div class="form-group">
                    <select name="preferred_school" id="preferred_school" class="form-control" placeholder="Preferred schools">
                        <option value="">Preferred Schools</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="target_employer" id="target_employer" class="form-control" placeholder="Target employers">
                        <option value="">Target employers</option>
                    </select>
                </div>                
                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button> -->
            </fieldset>

            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--corporate-height sign-up-card-section__explore--corporate-description-width flex flex-col items-center justify-center bg-gray-light m-2 rounded-md pt-16 pb-20 xl:pt-20 xl:pb-24">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">COMPANY DESCRIPTION</h1>
                        <div class="sign-up-form sign-up-form--description-width mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <textarea name="description" id="description" placeholder="Please provide a short description of your company (250 characters or less)." class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide short-description-box"></textarea>
                            </div>
                        </div>
                        <button type="button" class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">Next</button>
                    </div>
                </div>
                <!-- <h4>Company Description</h4>
                <div class="form-group">
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>                
                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button> -->
            </fieldset>
                    
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">SELECT MEMBERSHIP</h1>
                    <div class="sign-up-form mb-5">
                        <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                            <li class="w-full bg-white active-fee sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                Monthly Plan<span class="block text-gray font-book">$1,295 per month</span>
                            </li>
                            <li class="w-full bg-white cursor-pointer sign-up-form__fee hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                One-year plan <span class="block text-gray font-book">$970 per month</span>
                                <span class="block text-gray font-book">billed at $11,640 annually</span>
                            </li>
                            <li class="w-full bg-white cursor-pointer sign-up-form__fee text-gray hover:bg-lime-orange pl-8 pr-4 py-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                Two-year plan <span class="block text-gray font-book">$450 per month</span>
                                <span class="block text-gray font-book">billed at $10,800 every two years</span>
                            </li>
                        </ul>               
                    </div>
                    <button type="button" class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">Next</button>
                </div>
            </div>
                <!-- <h4>Select Membership</h4>
                <div class="form-group">
                    <label for="monthly"><input type="radio" name="package_id" id="monthly"> Monthly $3,800</label> 
                </div>
                <div class="form-group">
                    <label for="quarterly"><input type="radio" name="package_id" id="quarterly"> Quarterly $8,500</label> 
                </div>
                <div class="form-group">
                    <label for="annually"><input type="radio" name="package_id" id="annually"> Annually $11,400</label> 
                </div>                
                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button> -->
            </fieldset>

            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">PAYMENT</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <button class="focus:outline-none w-full bg-gray text-gray-pale py-4 rounded-md tracking-wide">
                                    <img src="/./img/sign-up/ipay.svg" alt="i pay icon" class="mx-auto ipay-image">
                                </button>
                            </div>
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with  card</p>
                              </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" placeholder="Card number" class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide"/>
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="MM/YY" class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide"/>                       
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="CVV" class="text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray pl-8 pr-4 py-4 rounded-md tracking-wide"/>
                                </div>
                            </div>               
                        </div>
                        <button type="button" class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange" onclick="openModalBox('#corporate-successful-popup')">
                            Next
                        </button>
                    </div>
                </div>
                <!-- <h4>Payment</h4>
                <div class="form-group">
                    <input type="text" name="pay" id="pay" class="form-control" placeholder="Pay">
                </div>
                <div class="divider-wrapper text-center">
                    <div class="divider-left d-inline"></div>
                    <div class="divider-label d-inline">or pay with card</div>
                    <div class="divider-left d-inline"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Card number">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="card_expiry" id="card_expiry" class="form-control" placeholder="MM/YY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="card_cvv" id="card_cvv" class="form-control" placeholder="CVV">
                        </div>
                    </div>
                </div>                
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#saveProfileModal">Next</button> -->

                <!-- Modal -->
                <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="corporate-successful-popup">   
                    <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                        <div class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-16 pb-8 relative">
                            <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR NOW!</h1>
                            <p class="text-gray-pale popup-text-box__description mb-4">Get ready to receive well-matched profiles of Individual Members who fit your criteria!</p>
                            <p class="text-gray-pale popup-text-box__description popup-text-box__description--second-width mb-4">For best results, optimize your Position Listing now.</p>
                            <div class="sign-up-form sign-up-form--individual-success my-5">
                                <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                                    <li class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-3">
                                        Optimize your position listing
                                    </li>
                                    <li class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-3">
                                        Not now
                                    </li>
                                </ul>               
                            </div>
                        </div>
                    </div>  
                </div>
                <!-- <div class="modal fade" id="saveProfileModal" tabindex="-1" role="dialog" aria-labelledby="saveProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h3>THAT'S ALL FOR NOW!</h3>
                                <p>Get ready to receive well-matched career opportunities that fit YOUR criteria!</p>
                                <p>Would you like to be introduced to better career opportunities faster?</p>
                                <p>If yes, optimize your profile now!</p>

                                <button type="submit" class="btn btn-warning btn-sm" id="save_profile_btn">Submit a position opening</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Not Now</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </fieldset>                    
            {{-- {!! Form::close() !!} --}}
        </form>
                    
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    /*#msform {
        position: relative;
        margin-top: 20px
    }

    #msform fieldset .row {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-sizing: border-box;
        position: relative
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform fieldset .row {
        text-align: left;
        color: #9E9E9E
    }

    #msform input,
    #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid skyblue;
        outline-width: 0
    }
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue
    }

    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }*/
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function(){

        current_fs = $(this).closest("fieldset");
        console.log(current_fs);
        next_fs = $(this).closest("fieldset").next();

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){

        current_fs = $(this).closest("fieldset");
        previous_fs = $(this).closest("fieldset").prev();

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $("#btn_complete").click(function() {
        $("#msform").submit();
    });

});
</script>
<script>
    $(document).ready((function(){
        $(".eye-lash-icon").click((function(){
            var e=$(this).siblings(".profile-password");
            "password"===e.attr("type")?(e.attr("type","text"),$(this).attr("src",(function(){return"/./img/sign-up/eye-lash.svg"}))):(e.attr("type","password"),$(this).attr("src",(function(){return"/./img/sign-up/eye-lash-off.svg"})))

        })
    )
</script>
@endpush