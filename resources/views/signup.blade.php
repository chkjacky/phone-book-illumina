@extends('layouts.layout')

@section('content')
    <!-- main content -->
    <section class="form-box">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 align-items-center mx-auto my-auto">
                
                    <!-- Form Wizard -->
                    <div class="form-wizard form-header-classic form-body-classic">
                    <!-- 
                    Just change the class name for make it with different style of design.

                    Use anyone class "form-header-classic" or "form-header-modarn" or "form-header-stylist" for set your form header design.
                    
                    Use anyone class "form-body-classic" or "form-body-material" or "form-body-stylist" for set your form element design.
                    -->
                    
                    <form role="form" action="/auth/signup" method="post">
                        @csrf

                        <h3>Sign Up An Account</h3>
                        <p>Fill all form field to go next step</p>
                        
                        <!-- Form progress -->
                        <div class="form-wizard-steps form-wizard-tolal-steps-1">
                            <div class="form-wizard-progress">
                                <div class="form-wizard-progress-line" data-now-value="100" data-number-of-steps="1" style="width: 100%;"></div>
                            </div>
                            <!-- Step 1 -->
                            <div class="form-wizard-step active">
                                <div class="form-wizard-step-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                                <p>Account</p>
                            </div>
                            <!-- Step 1 -->
                        </div>
                        <!-- Form progress -->
                        
                        
                        <!-- Form Step 1 -->
                        <fieldset>
                            
                            <h4>Personal Information : <span>Step 1 - 1</span></h4>
                            <div class="form-group mb-2">
                                <label>Full Name: <span>*</span></label>
                                <input type="text" name="name" placeholder="Full Name" class="form-control required">
                                <span class="text-danger">@error('name') {{$message}} @enderror </span>
                            </div>
                            <div class="form-group mb-2">
                                <label>Email: <span>*</span></label>
                                <input type="email" name="email" placeholder="Email" class="form-control required">
                                <span class="text-danger">@error('email') {{$message}} @enderror </span>
                            </div>
                            <div class="form-group mb-2">
                                <label>Password: <span>*</span></label>
                                <input type="password" name="password" placeholder="User Password" class="form-control required">
                                <span class="text-danger">@error('password') {{$message}} @enderror </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password: <span>*</span></label>
                                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control required">
                                <span class="text-danger">@error('confirm_password') {{$message}} @enderror </span>
                            </div>
                            
                            <div class="form-wizard-buttons">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>

                        </fieldset>
                        <!-- Form Step 1 -->
                    
                    </form>
                    
                    </div>
                    <!-- Form Wizard -->
                </div>
            </div>
                
        </div>
    </section>
    <!-- main content -->
@endsection