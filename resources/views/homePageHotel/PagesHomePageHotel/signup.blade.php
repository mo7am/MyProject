@extends('HomePageHotel.LayoutsHomePageHotel.appHomePageHotel')


@section('contentHomePageHotel')

    <div class="hero-wrap" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_1.jpg')}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{url('/index')}}">Home</a></span> <span>Sign Up</span></p>
	            <h1 class="mb-4 bread">Sign Up</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
         
         
         
          
        
            <div style="margin-left: 350px"  class="ml-md-6 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
             
                
                
                         <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            
                             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                <h1>Log in</h1> 
                        {{ csrf_field() }}
 <div class="cont_form_login">

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                           <p>
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                <input id="username"   type="email"  name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                </p>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>
 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                              <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password"   type="password"  name="password" required placeholder="Password">
                                 </p>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                       

 <p class="keeplogin"> 
                                    <input type="checkbox" name="remember" id="loginkeeping" value="loginkeeping"   {{ old('remember') ? 'checked' : '' }}/> 
                                    <label for="loginkeeping">Remember Me</label>
                                </p>

 <p class="login button"> 
                                    <input type="submit" value="Login" onclick="cambiar_login()"/> 
                                </p>
                       
                        

                               

                            <p class="change_link">
                                    Not a member yet?
                                    <a style="margin-right: -30px" href="#toregister" class="to_register">Join us</a>

                                    <a style="margin-right: 500px ; margin-top: -60px" class="btn btn-link" href="">
                                    Forgot Your Password?
                                </a>
                                </p>
                       

  </div>
</form>
                        </div>

                        <div id="register" class="animate form">







  <form  class="form-horizontal" method="POST" action="{{ route('register') }}" autocomplete="on">
    {{ csrf_field() }}
                                <h1> Sign up </h1> 
                 <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                   <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">First Name</label>
                                    <input value="{{ old('fname') }}" id="usernamesignup" name="fname" required="required" type="text" placeholder="First Name" />

                                     @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
<div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }}">
                                 <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Middel Name</label>
                                    <input value="{{ old('mname') }}" id="usernamesignup" name="mname" required="required" type="text" placeholder="Middle Name" />

                                     @if ($errors->has('mname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mname') }}</strong>
                                    </span>
                                @endif
                                </p>
</div>
<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                 <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Last Name</label>
                                    <input value="{{ old('lname') }}" id="usernamesignup" name="lname" required="required" type="text" placeholder="Last Name" />

                                     @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input value="{{ old('email') }}" id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 

                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
                 <div class="form-group{{ $errors->has('passwordsignup') ? ' has-error' : '' }}">
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </p>
                            </div>
                     <div class="form-group{{ $errors->has('passwordsconfirm') ? ' has-error' : '' }}">
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @if ($errors->has('passwordsconfirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passwordsconfirm') }}</strong>
                                    </span>
                                @endif
                                </p>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                  <p> 
                                    <label  class="uname" >Your Identity </label>
                                   <select value="{{ old('status') }}" name="status">
                                       <option value="2">Receptionist</option>
                                       <option value="3">Acountant</option>
                                       <option value="4">Housekeaping</option>
                                       <option value="5">Cheif</option>
                                       <option value="6">localguest</option>
                                       <option value="7">foreignguist</option>
                                   </select>
                                </p>
</div>

<p class="keeplogin"> 
                                    <input type="checkbox" name="remember" id="loginkeeping" value="loginkeeping"   {{ old('remember') ? 'checked' : '' }}/> 
                                    <label for="loginkeeping">Remember Me</label>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"  onclick="cambiar_sign_up()"/> 
								</p>

                  <p class="signin button"> 
                   <a href="{{url('redirect/facebock')}}"> Sign Up With Facebock </a>
                </p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>


















                        </div>
						
                    </div>
                </div> 
                
                <br><br><br><br><br><br><br><br>
                
                
            </div>
          </div>
        </div>
       
      </div>
    </section>
    <br><br><br><br><br><br>
      @endsection
