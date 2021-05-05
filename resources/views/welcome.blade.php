@extends('layouts.layout_navigation')
@section('welcome')
<section class="mt-4">
    <div class="container-fluid">
        @if(Session::has('msgLastdate'))
            <div class="alert alert-danger">{{Session::get('msgLastdate')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-xl-2 text-center">
                <h2 class="text-break color-mg"><strong>Welcome to Application for S-ILF Scholarships</strong></h2>
            </div>
           
            <div class="col-xl-10 offset-xl-1 text-center mb-4">
                <hr class="cs-hr" />
            </div>
            @if (!Auth::check())
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 offset-lg-0 offset-xl-0 mb-2 pr-1">
                <div class="home-tabs">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><strong>HHDLS Scholarship</strong></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><strong>Nursing Scholarship</strong></a></li>
                        <!-- <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3"><strong>One Year Scholarship</strong></a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active p-3" role="tabpanel" id="tab-1">
                            <h5 class="text-break mb-3 color-mg"><a href="/application-form/HHDLS"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for HHDLS Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                            <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="{{asset('assets/files/Instructions-for-HHDL-Scholarship-Programme.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for HHDLS Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?>  &nbsp;</strong><i class="fa fa-download"></i></h5>
                            <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="{{asset('assets/files/Guidelines-HHDL-2021-22.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Guidelines for HHDLS Scholarship <?php echo date("Y");?> -<?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                        </div>
                        <div class="tab-pane p-3" role="tabpanel" id="tab-2">
                            <h5 class="text-break mb-3 color-mg"><a href="/application-form/Nursing"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for Nursing Scholarship <?php echo date("Y");?> - <?php echo date("Y")+1; ?> &nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                            <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-nur"><a href="{{asset('assets/files/Instructions-for-Nursing-Scholarship-Programme.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for Nursing Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                            <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-nur"><a href="{{asset('assets/files/Guidelines-Nursing-2021-22.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Guidelines for Nursing Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                        </div>
                        <!-- <div class="tab-pane p-3" role="tabpanel" id="tab-3">
                            <h5 class="text-break mb-3 color-mg"><a href="add-new-hhdl-scholarship-application.html"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                            <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="#"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-download"></i></h5>
                            <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="#"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download FAQ for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-download"></i></h5>
                        </div> -->
                        
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-4 offset-xl-0">
                <div class="login-box">
                @if(Session::has('message'))
                     <div class="alert alert-success">{{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                  @endif
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <h6 class="text-center color-mg mb-4"><strong>Login to apply for scholarship</strong></h6>
                        <div class="form-group mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your registered email address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                         @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <input class="form-control @error('password') is-invalid @enderror" minlength="8" type="password" id="password" name="password" placeholder="Enter your 8 character login password" required autocomplete="current-password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                                <div class="input-group-append">
                                <button class="btn btn-sm btn-mg" type="button"><i class="fa fa-eye" id="togglePassword"></i></button>
                             </div>
                             
                            </div>
                        </div>
                        <div class="form-group text-center mb-4">
                        <button class="btn btn-block btn-sm btn-mg" type="submit"><strong>{{ __('Login') }}</strong></button>
                        </div>
                        <div class="form-group mb-0">
                            <p class="text-muted font-md mb-0"><strong>If you do not have a login account </strong><a href="{{ route('register') }}"><strong>click here</strong></a>&nbsp;to register</p>
                            <p class="text-muted font-md mb-0"><strong>forgot your password? </strong><a href="{{ route('password.request') }}"><strong>click here</strong></a>&nbsp;to reset password</p>
                            
                        </div>
                    </form>
                </div>
            </div>
           @else
           <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 offset-lg-0 offset-xl-0 mb-2 pr-1">
                    <div class="home-tabs">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><strong>HHDLS Scholarship</strong></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><strong>Nursing Scholarship</strong></a></li>
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3"><strong>One Year Scholarship</strong></a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" role="tabpanel" id="tab-1">
                                <h5 class="text-break mb-3 color-mg"><a href="/application-form/HHDLS"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for HHDLS Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                                <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="{{asset('assets/files/Instructions-for-HHDL-Scholarship-Programme.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for HHDLS Scholarship <?php echo date("Y");?> - <?php echo date("Y")+1; ?>&nbsp;</strong><i class="fa fa-download"></i></h5>
                                <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="{{asset('assets/files/Guidelines-HHDL-2021-22.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Guidelines for HHDLS Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                            </div>
                            <div class="tab-pane p-3" role="tabpanel" id="tab-2">
                                <h5 class="text-break mb-3 color-mg"><a href="/application-form/Nursing"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for Nursing Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                                <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-nur"><a href="{{asset('assets/files/Instructions-for-Nursing-Scholarship-Programme.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for Nursing Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                                <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-nur"><a href="{{asset('assets/files/Guidelines-Nursing-2021-22.pdf')}}"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Guidelines for Nursing Scholarship <?php echo date("Y");?> - <?php echo substr(date("Y")+1,2); ?> &nbsp;</strong><i class="fa fa-download"></i></h5>
                            </div>
                            <!-- <div class="tab-pane p-3" role="tabpanel" id="tab-3">
                                <h5 class="text-break mb-3 color-mg"><a href="add-new-hhdl-scholarship-application.html"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to Apply for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-sign-in"></i></h5>
                                <h5 class="text-break mb-3 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="#"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download Instructions for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-download"></i></h5>
                                <h5 class="text-break mb-2 color-mg" data-toggle="modal" data-target="#dw-gdl-hhdl"><a href="#"><strong><span style="text-decoration: underline;">Click here</span></strong></a><strong> to View/Download FAQ for One Year Scholarship 2021 - 22&nbsp;</strong><i class="fa fa-download"></i></h5>
                            </div> -->
                        </div>
                    </div>
                    <div class="login-box mt-2 pb-2">
                    <form method="POST" action="{{url('/change-password') }}">
                        @csrf 

                        <!-- <input type="hidden" name="current_password" value = "{{Auth::user()->password}}"> -->
                            <h6 class="color-mg mb-2"><strong>Update Password</strong></h6>
                            @if(Session::has('msg'))
                                <div class="alert alert-success">{{Session::get('msg')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                            @endif

                            @if(Session::has('msgError'))
                                <div class="alert alert-danger">{{Session::get('msgError')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                            @endif

                            <div class="form-row">
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm"><input class="form-control" type="password" id="password" name="current_password" placeholder="Current Password" minlength="8">
                                            <div class="input-group-append"><button class="btn btn-sm btn-mg" type="button"><i class="fa fa-eye" id="togglePassword"></i></button></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm"><input class="form-control form-control-sm" type="password" id="password1" name="new_password" placeholder="New password" minlength="8">
                                            <div class="input-group-append"><button class="btn btn-sm btn-mg" type="button"><i class="fa fa-eye" id="togglePassword1"></i></button></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm"><input class="form-control form-control-sm" type="password" id="password2" name="new_password_confirm" placeholder="Confirm password" minlength="8">
                                            <div class="input-group-append"><button class="btn btn-sm btn-mg" type="button"><i class="fa fa-eye" id="togglePassword2"></i></button></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-3">
                                    <div class="form-group"><button class="btn btn-block btn-sm btn-mg" type="submit"><strong>Update</strong></button></div>
                                </div>
                            </div>
                            <br>
                            <!-- <br>
                            <div class="form-group mb-0">
                            <p class="text-muted font-md mb-0"><strong>forgot your password? </strong><a href="{{ route('password.request') }}"><strong>click here</strong></a>&nbsp;to reset password</p>
                            </div> -->
                        </form>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-xl-4 offset-xl-0 pl-1">
                    <form action="{{ url('/update-profile-photo') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="form-group mb-0">
                            <div class="login-box pb-3">
                                <h6 class="color-mg pb-1"><strong>Profile Details of:&nbsp;</strong><span><strong>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</strong></span></h6>
                                <div class="table-responsive">
                                    <table class="table color-mg">
                                        <tbody>
                                        
                                            <!-- <tr>
                                                <td><strong>Profile Photo</strong></td>
                                                <td class="text-nowrap text-truncate text-break w-15x" colspan="2">
                                                @if(empty($user->profilePhoto))
                                                <img class="img-fluid mb-2 mr-2" src="assets/img/avatar_2x.png" width="80px" height="90px">
                                                @else
                                                <img class="img-fluid mb-2 mr-2" src="{{ asset('storage/uploads/profilephoto/'.$user->profilePhoto) }}" width="80px" height="90px">
                                                @endif
                                                <button class="btn btn-sm btn-custom font-xs" type="submit"><strong>Update</strong></button><br>
                                                <input class="form-control-file font-xs" name="profilePhoto" type="file"  accept="image/*" required></td>
                                                <td><br></td>
                                            </tr> -->
                                            <tr>
                                                <td><strong>Email ID</strong></td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Contact Number</strong></td>
                                                <td>{{$user->contactno}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gender</strong></td>
                                                <td>{{$user->gender}}</td>
                                            </tr>
                                            <!-- <tr>
                                                <td><strong>Last Login</strong></td>
                                               
                                            </tr> -->
                                           
                                        </tbody>
                                    </table>
                                    <!-- <br>
                                    <br>
                                    <br>
                                    <br> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
           @endif
    </div>
</section>

<script>
          
          const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#password');
      
          togglePassword.addEventListener('click', function (e) {
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          this.classList.toggle('fa-eye-slash');
          });

          const togglePassword1 = document.querySelector('#togglePassword1');
          const password1 = document.querySelector('#password1');
      
          togglePassword1.addEventListener('click', function (e) {
          const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
          password1.setAttribute('type', type);
          this.classList.toggle('fa-eye-slash');
          });

          const togglePassword2 = document.querySelector('#togglePassword2');
          const password2 = document.querySelector('#password2');
      
          togglePassword2.addEventListener('click', function (e) {
          const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
          password2.setAttribute('type', type);
          this.classList.toggle('fa-eye-slash');
          });
      
      
      
        </script>
 @endsection
