@extends('layouts.layout')
@section('content')
<div class="row login_page justify-content-center p-5">
   <div class="col-md-6 border-right">
      <div class="login_banner_image">
         <img src="image/loginbg.png" alt="">
      </div>
   </div>
   <div class="col-xl-6 col-lg-12 col-md-6">
      <div class="card o-hidden border-0 count">
         <div class="card-body py-5">
   <!-- Session Status -->
   <x-auth-session-status class="mb-4" :status="session('status')" />

   <!-- Validation Errors -->
   <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Nested Row within Card Body -->
            <div class="row">
               <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
               <div class="col-lg-12">
                  <div class="">
                     <div class="form_content">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <!-- <form class="user" class="profile_form"> -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                           <!-- <div class="login_icons text-center">
                              <span class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                              <span class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></span>
                              <span class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                           </div> -->
                           <div class="form-group">
                              <input type="email" class="form-control contact_input form-control-user"
                              id="email" aria-describedby="emailHelp" placeholder=" " name="email" :value="old('email')" required autofocus >
                              <label for="email" class="flow" :value="__('Email')" >Email</label>
                           </div>
                           <div class="form-group">
                              <input type="password"
                              class="form-control contact_input form-control-user"
                              id="password" placeholder=" " name="password" :value="old('password')" required autofocus>
                              <label for="password" class="flow" :value="__('Password')" >Password</label>
                           </div>
                           <div class="d-flex forgot_line">
                              <div class="form-group">
                                 <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input"
                                    id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">Remember
                                    Me</label>
                                 </div>
                              </div>
                              <div class="float-right">
                                 <a class="small" href="{{ route('ForgetPasswordGet') }}">Forgot Password?</a>
                              </div>
                           </div>
                           <!-- <button type="submit" class="btn btn-primary btn-user btn-block"> -->
                           <button type="submit"
                              class="btn btn-primary btn-user btn-block">
                              Login
                           </button>
                           <!-- </button> -->
                           <!-- <hr> -->
                           <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                              <i class="fab fa-google fa-fw"></i> Login with Google
                           </a>
                           <a href="index.html" class="btn btn-facebook btn-user btn-block">
                              <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                           </a> -->
                           <!-- <hr> -->
                        </form>
                        <!-- <div class="text-center">
                           <a class="small" href="register.html">Create an Account!</a>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection