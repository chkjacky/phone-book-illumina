@extends('layouts.layout')

@section('content')
    
    <!-- main content -->
    <section class="form-box">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <img src="https://thumbs.dreamstime.com/b/thai-child-traditional-dress-thai-child-traditional-dress-thai-boy-style-portrait-120360189.jpg" width="50%"/></div>

                <div class="col-xl-8 text-left">
                    <form action="/profile/update" method="post">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control required" placeholder="Full Name" value="{{$name}}">
                            </div>
                            <div class="col">
                                <label>Email</label>
                                <input type="text" class="form-control required" placeholder="Email" value="{{$email}}"  readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="form-group mb-2">
                                <label>Password: </label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <span class="text-danger">@error('password') {{$message}} @enderror </span>

                            <div class="form-group mb-3">
                                <label>Confirm Password: </label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                            </div>
                            <span class="text-danger">@error('confirm_password') {{$message}} @enderror </span>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-wizard-buttons">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- main content -->

    <script>
        $(document).ready(function(){
            $("#password").change(function() {
                $password = $("#password").val();

                if($password != "") {
                    $("#confirm_password").prop("required",true);
                }
                else {
                    $("#confirm_password").prop("required",false);
                }
            });

            $("#confirm_password").change(function() {
                $confirm_password = $("#confirm_password").val();

                if($confirm_password != "") {
                    $("#password").prop("required",true);
                }
                else {
                    $("#password").prop("required",false);
                }
            });
        });
    </script>
    
@endsection