@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
                <form action="#" method="post" id="msform">
                    @csrf
                    
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>COMPLIMENTARY 90 DAYS</h2>
                                <h2>FOR NEW MEMBERS</h2>
                                <P>1/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <div class="profile-title">YOUR PROFILE</div>

                                <h4>Which area(s) would you like members to seek you for advice?</h4>

                                <div class="form-group">
                                    <input type="text" name="function_area[]" id="function_area_1" class="form-control" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="function_area[]" id="function_area_1" class="form-control" placeholder="2">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="function_area[]" id="function_area_1" class="form-control" placeholder="3">
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step9">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step9_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>COMPLIMENTARY 90 DAYS</h2>
                                <h2>FOR NEW MEMBERS</h2>
                                <P>1/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <div class="profile-title">YOUR PROFILE</div>

                                <h4>Can you indicate your event preferences?</h4>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="virtual" id="virtual"> Virtual
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="offline" id="offline"> Offline
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="weekday" id="weekday"> Weekday
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="weekend" id="weekend"> Weekend
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="breakfast_time" id="breakfast_time"> Breakfast time
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="launch_time" id="launch_time"> Launch time
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="tea_time" id="tea_time"> Tea time
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="non_office_hours" id="non_office_hours"> Non-office hours
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="once_a_month" id="once_a_month"> Once a month
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="checkbox" name="twice_a_month" id="twice_a_month">Twice a month
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step10">Next</button>
                                <button type="button" class="btn btn-secondary btn-sm next action-button" id="signup_step10_skip">Skip</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>COMPLIMENTARY 90 DAYS</h2>
                                <h2>FOR NEW MEMBERS</h2>
                                <P>1/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <div class="profile-title">YOUR PROFILE</div>

                                <h2>SIGN UP</h2>
                                <P>By signing up with Lobahn, you agree to receive our invitations to events, promotions and ember updates.</P>
                                
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="accept" id="accept"> I understand and accept Terms and Conditions
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step11">Next</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h2>COMPLIMENTARY 90 DAYS</h2>
                                <h2>FOR NEW MEMBERS</h2>
                                <P>1/3</P>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="previous-wrapper">
                                    <button type="button" class="previous action-button-previous"><i class="fas fa-long-arrow-alt-left"></i></button>
                                </div>

                                <div class="profile-title">YOUR PROFILE</div>

                                <h2>SIGN UP</h2>
                                <P>System will send you a verify amail to your mailbox, please check out and click the attached URL to verify your email address.</P>
                                
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="accept" id="accept"> I understand and accept Terms and Conditions
                                </div>
                                
                                <button type="button" class="btn btn-warning btn-sm next action-button" id="signup_step11">Next</button>
                            </div>
                        </div>
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

    $(".submit").click(function(){
        return false;
    })

});
</script>
@endpush