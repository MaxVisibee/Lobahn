<div class="main-content">

  <section class="forget-password">
    @if ($message = Session::get('success'))
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="custom-alerts alert alert-success">{!! $message !!}</div>
        </div>
      </div>
    @endif
    @if ($message = Session::get('error'))
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="custom-alerts alert alert-danger">{!! $message !!}</div>
        </div>
      </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6 resetpsw-div">
          <h5 style="margin-bottom: 1em;">Reset New Password</h5>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>
        <div class="col-md-6 col-lg-6 resetpassform">
          <h5>RESET NEW PASSWORD</h5>
          <form name="" id="resetpwdform" action="{{route('doResetPassword')}}" method="post" data-parsley-validate="true">   
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="control-group mb-0 pb-2">
                  <input type="hidden" name="code" value="{{$code}}">
                  <input type="password" class="form-control lc-form m-b-15" placeholder="New Password *" id="new_password" name="new_password" data-parsley-maxlength="45" data-parsley-required="true"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*()_+\-=\[\]{};':]).{8,}" >
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="control-group mb-0 pb-2">
                  <input type="password" name="confirm_password" class="form-control lc-form m-b-15 confirmpass" placeholder="Confirm Password *" data-parsley-maxlength="45" data-parsley-required="true" data-parsley-equalto='#new_password'>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="control-group mb-0 pb-2">
                  <div class="form-group">
                      <label for="passstrength">Password strength ( passwords must contain symbols, letters, numbers,length:8 )</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-frogot-password btn-xl" id="sendMessageButton">Reset Password<span class="arrow"><i class="fas fa-long-arrow-alt-right ms-3"></i></span></button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>      
  </section>
</div>