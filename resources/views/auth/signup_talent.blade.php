@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {{-- {{substr(md5(time()), 0, 20)}} --}}
                <form action="{{route('signup_talent_store')}}" method="post" id="msform">
                    @csrf

                    <h2>SIGN UP</h2>

                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position_title" id="position_title" class="form-control" placeholder="Position Title" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Office Telephone +852" required>
                    </div>

                    <div class="form-group">
                        <label for="talent_agreement" class="w-100"> <input type="checkbox" name="talent_agreement" id="talent_agreement" required> I understand and accept <span class="text-warning">Terms and Conditions</span> </label>
                    </div>
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-warning btn-sm">Confirm</button>
                    </div>
                </form>
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


});
</script>
@endpush