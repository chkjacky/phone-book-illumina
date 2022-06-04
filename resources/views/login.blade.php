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
                    
                    <form role="form" action="/auth/login" method="post">
                        @csrf

                        <h3>Login</h3>
                        <hr>
                        <fieldset>
                            <div class="form-group mb-2">
                                <label>Email: </label>
                                <input type="email" name="email" placeholder="Email" class="form-control required">
                                <span class="text-danger">@error('email') {{$message}} @enderror </span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password: </label>
                                <input type="password" name="password" placeholder="Password" class="form-control required">
                                <span class="text-danger">@error('password') {{$message}} @enderror </span>
                            </div>

                            @if(session()->has('failed'))
                                <div class="alert alert-danger">
                                    {{session()->get('failed')}}
                                </div>
                            @endif

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-wizard-buttons">
                                <button type="submit" class="btn btn-submit">Login</button>
                            </div>
                        </fieldset>
                    
                    </form>
                    
                    </div>
                    <!-- Form Wizard -->
                </div>
            </div>
                
        </div>
    </section>
    <!-- main content -->

@endsection