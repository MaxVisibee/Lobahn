@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
                {!! Form::open(array('route' => 'register', 'method'=>'POST', 'files'=>true, 'id'=>'msform', 'name'=>'msform')) !!}
                    
                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

                    <fieldset>
                        
                        <h2>PROFILE</h2>

                        <div class="form-group">
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                        
                        <button type="button" name="next" class="btn btn-warning btn-sm next action-button">Next</button>
                    </fieldset>
                    <fieldset>
                        <h4>PREFERENCES</h4>

                        <div class="form-group">
                            <select name="location_id" id="location_id" class="form-control" placeholder="Desired location *">
                                <option value="">Desired Location</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="position_title_id" id="position_title_id" class="form-control" placeholder="Desired position titles *">
                                <option value="">Desired Position titles</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="industry_id" id="industry_id" class="form-control" placeholder="Desired industries *">
                                <option value="">Desired industries</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="sub_sector_id" id="sub_sector_id" class="form-control" placeholder="Desired sub sectors *">
                                <option value="">Desired sub sectors</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="functional_area_id" id="functional_area_id" class="form-control" placeholder="Desired functions *">
                                <option value="">Desired functions</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="specialty_id" id="specialty_id" class="form-control" placeholder="Desired specialties">
                                <option value="">Desired specialties</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="employer_id" id="employer_id" class="form-control" placeholder="Desired employers">
                                <option value="">Desired employers</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="contract_term_id" id="contract_term_id" class="form-control" placeholder="Desired contract terms *">
                                <option value="">Desired contract terms</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="pay_id" id="pay_id" class="form-control" placeholder="Desired pay *">
                                <option value="">Desired pay</option>
                            </select>
                        </div>
                        
                        <button type="button" class="btn btn-warning btn-sm next action-button">Next</button>
                    </fieldset>

                    <fieldset>
                        <h4>UPLOAD CV</h4>
                        <p>Accepted file types: .pdf, .docs</p>
                        <p>Maximum file size: 1mb</p>

                        <div class="form-group">
                            <input type="file" name="cv" class="dropify" id="cv" accept=".pdf,.docs" data-allowed-file-extensions="pdf docs"/>
                        </div>
                        
                        <button type="button" class="btn btn-warning btn-sm next action-button">Next</button>
                    </fieldset>
                    <fieldset>
                        <h4>UPLOAD PHOTO</h4>
                        <p>Recommended format:</p>
                        <p>300 x 300px, .jpg, no longer than 200kb</p>

                        <div class="form-group">
                            <input type="file" name="image" class="dropify" id="image" accept="image/*;capture=camera,.jpg,.png,.jpeg" data-allowed-file-extensions="jpg jpeg png"/>
                        </div>
                        
                        <button type="button" class="btn btn-warning btn-sm next action-button">Next</button>
                    </fieldset>

                    <fieldset>
                        <h4>Select Membership</h4>

                        <div class="form-group">
                            <label for="monthly"><input type="radio" name="package_id" id="monthly"> Monthly $3,800</label> 
                        </div>
                        <div class="form-group">
                            <label for="quarterly"><input type="radio" name="package_id" id="quarterly"> Quarterly $8,500</label> 
                        </div>
                        <div class="form-group">
                            <label for="annually"><input type="radio" name="package_id" id="annually"> Annually $11,400</label> 
                        </div>
                        
                        <button type="button" class="btn btn-warning btn-sm next action-button">Next</button>
                    </fieldset>
                    
                    <fieldset>
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
                        
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#saveProfileModal">Next</button>

                        <!-- Modal -->
                        <div class="modal fade" id="saveProfileModal" tabindex="-1" role="dialog" aria-labelledby="saveProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <h3>THAT'S ALL FOR NOW!</h3>
                                    <p>Get ready to receive well-matched profiles of Member Professionals who fit your criterial!</p>

                                    <button type="submit" class="btn btn-warning btn-sm" id="save_profile_btn">Edit or complete the position's preferences</button>
                                    <button type="submit" class="btn btn-secondary btn-sm">Optimize your results with Lobahn's Talent Discovery<sup>TM</sup> </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    </fieldset>
                    
                {!! Form::close() !!}
                    
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    #msform {
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