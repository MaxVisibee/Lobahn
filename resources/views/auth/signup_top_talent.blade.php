@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
                <form action="{{route('company.register')}}" method="post" id="msform">
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6 text-center">
                                <h2>CORPORATE MEMBER</h2>
                                <P>1/3</P>
                            </div>
                            <div class="col-sm-6 col-6 text-center">
                                <h2>SIGN UP</h2>

                                <input type="hidden" name="page" value="signup-step1">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="position_title" id="position_title" class="form-control" placeholder="Position Title">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Office Telephone +852">
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" name="next" id="signup_step1">Next</button>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>2/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div>
                                
                                {{-- <button type="button" name="previous" class="btn btn-warning btn-sm previous action-button-previous" value="Previous" id="signup_step2">Next</button> --}}
                                <button type="button" name="next" class="btn btn-warning btn-sm next action-button" id="signup_step2">Next</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Upload your company logo</h4>
                                <p>Recommended format:</p>
                                <p>300 x 300px, .jpg, no longer than 200kb</p>

                                <div class="form-group">
                                    <input type="file" name="company_logo" class="dropify" id="company_logo" accept="image/*;capture=camera,.jpg,.png,.jpeg" data-allowed-file-extensions="jpg jpeg png"/>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    {{-- <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <div class="form-group">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Role</option>
                                    </select>
                                    <p>This field is required in order to match accurately your profile to new career opportunities being offered by our Corporate Members. </p>
                                </div>
                                
                                <button type="button" name="next" class="btn btn-warning btn-sm next action-button" id="signup_step3">Next</button>
                            </div>
                        </div>
                    </fieldset> --}}
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Company Information</h4>

                                <div class="form-group">
                                    <input type="text" name="website_address" id="website_address" class="form-control" placeholder="Website Address">
                                </div>
                                <div class="form-group">
                                    <select name="main_industries" id="main_industries" class="form-control">
                                        <option value="">Select Main Industries</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="main_sub_sectors" id="main_sub_sectors" class="form-control">
                                        <option value="">Select Main sub-sectors</option>
                                    </select>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step4">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step4_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Preference</h4>

                                <div class="form-group">
                                    <select name="preferred_schools" id="preferred_schools" class="form-control" placeholder="Preferred schools">
                                        <option value="">Preferred Schools</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="target_employers" id="target_employers" class="form-control" placeholder="Target employers">
                                        <option value="">Target employers</option>
                                    </select>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step4">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step4_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Company Description</h4>

                                <div class="form-group">
                                    <textarea name="company_description" id="company_description" class="form-control" rows="5"></textarea>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step4">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step4_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    {{-- <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>What kind of hours do you seek?</h4>

                                <div class="form-group">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Seek</option>
                                    </select>
                                    <p>This field is required in order to match accurately your profile to new career opportunities being offered by our Corporate Members. </p>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step4">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step4_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset> --}}
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Upload your portrait</h4>
                                <p>Recommended format</p>
                                <p>300 x 300px, .jpg, no longer than 200kb</p>

                                <div class="form-group">
                                    <input type="file" name="profile_photo" class="dropify" id="profile_photo" accept="image/*;capture=camera,.jpg" data-allowed-file-extensions="jpg"/>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step5">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step5_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Select Membership</h4>

                                <div class="form-group">
                                    <label for="monthly"><input type="radio" name="membership" id="monthly"> Monthly $3,800</label> 
                                </div>
                                <div class="form-group">
                                    <label for="quarterly"><input type="radio" name="membership" id="quarterly"> Quarterly $8,500</label> 
                                </div>
                                <div class="form-group">
                                    <label for="annually"><input type="radio" name="membership" id="annually"> Annually $11,400</label> 
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step6">Next</button>
                                {{-- <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step6_skip">Skip</button> --}}
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Payment</h4>

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
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step7">Next</button>
                                {{-- <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step7_skip">Skip</button> --}}
                            </div>
                        </div>
                    </fieldset>
                    {{-- <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Your two most outstanding qualities</h4>

                                <div class="form-group">
                                    <textarea name="outstanding_qualities" id="outstanding_qualities" rows="5" class="form-control"></textarea>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step7">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step7_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset> --}}
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>CORPORATE MEMBER</h2>
                                <P>3/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <h4>Upload your CV</h4>

                                <div class="form-group">
                                    <input type="file" name="cv" class="dropify" id="cv" accept="image/*;.pdf,.doc,.docx,.xls,.xlsx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.ppt, .pptx, application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.slideshow" data-allowed-file-extensions="jpg jpeg png pdf doc docx xls xlsx ppt pptx"/>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm" id="signup_step8" data-toggle="modal" data-target="#submitCorporateMember">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step8_skip">Skip</button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="submitCorporateMember" tabindex="-1" role="dialog" aria-labelledby="submitCorporateMemberLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                <h3>THAT'S ALL FOR NOW!</h3>
                                <p>Get ready to received well-matched profiles of Member</p>
                                <p>Professionals who fit your criterial</p>
                                <button type="button" id="btn_complete" class="btn btn-warning btn-sm next action-button" data-dismiss="modal">Edit or complete the position's preferences</button>
                                <button type="button" id="btn_optimize_result" class="btn btn-secondary btn-sm next action-button" data-dismiss="modal">Optimize your results with Labahn's Talent Discovery<sup>TM</sup></button>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- <div class="modal fade" id="submitCorporateMember" tabindex="-1" role="dialog" aria-labelledby="submitCorporateMemberLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                <h3>THAT'S ALL FOR NOW!</h3>
                                <p>Get ready to received well-matched career opportunities that fit YOUR criteria!</p>
                                <p>Would you like to be introduced to better career opportunities faster?</p>
                                <p>If yes, optimize your profile now!</p>
                                <button class="btn btn-warning btn-sm next action-button" data-dismiss="modal">Submit a position opening</button>
                                <button class="btn btn-secondary btn-sm next action-button" data-dismiss="modal">Not now</button>
                                </div>
                            </div>
                            </div>
                        </div> --}}

                    </fieldset>
                    
                </form>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    #msform {
        text-align: center;
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
        width: 100%;
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

    /* #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    } */

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
    }

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
@endpush