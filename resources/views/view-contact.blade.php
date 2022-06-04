@extends('layouts.layout')

@section('content')
    <!-- main content -->
    <section class="form-box">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 align-items-center mx-auto my-auto">
                
                    <!-- Form Wizard -->
                    <div class="form-wizard form-header-modarn form-body-material">
                    <!-- 
                    Just change the class name for make it with different style of design.

                    Use anyone class "form-header-classic" or "form-header-modarn" or "form-header-stylist" for set your form header design.
                    
                    Use anyone class "form-body-classic" or "form-body-material" or "form-body-stylist" for set your form element design.
                    -->
                    

                    <h3>View - Contact</h3>
                    @foreach ($contacts as $contact)
                    <!-- Form progress -->
                    <div class="form-wizard-steps form-wizard-tolal-steps-1">
                        <div class="form-wizard-progress">
                            <div class="form-wizard-progress-line" data-now-value="100" data-number-of-steps="1" style="width: 100%;"></div>
                        </div>
                        <!-- Step 1 -->
                        <div class="form-wizard-step active">
                            <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <p> {{$contact->name}}</p>
                        </div>
                        <!-- Step 1 -->
                        
                    </div>
                    <!-- Form progress -->
                    
                    
                    <!-- Form Step 1 -->
                    <fieldset>
                        <div class="row mb-2" >
                            <div class="col">
                                <label>Email</label>
                                @if(empty($contact->email))
                                    <input type="email" name="email" class="form-control required" placeholder="N/A" disabled>
                                @else
                                    <input type="email" name="email" class="form-control required" placeholder="{{$contact->email}}" disabled>
                                @endif
                            </div>
                        </div>

                        @foreach ($contact->phoneNumber as $phone)
                        <div class="row mb-2 contact-field" >
                            <div class="col-lg-3">
                                <label>Type</label>
                                <input type="email" name="type" class="form-control required" placeholder="{{ucfirst($phone->type)}}" disabled>
                            </div>
                            <div class="col">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number[]" class="form-control required" placeholder="{{$phone->phone_number}}" disabled>
                            </div>
                        </div>
                        @endforeach

                        <div class="row mb-2">
                            <div class="col">
                                <label>Contact Address Line 1</label>
                                <input type="text" id="contact_address_1" name="contact_address_1" placeholder="{{ (empty($contact->address_line_1)) ? 'N/A' : $contact->address_line_1 }}" class="form-control" disabled>
                            </div>
                            <div class="col">
                                <label>Contact Address Line 2</label>
                                <input type="text" id="contact_address_2" name="contact_address_2" placeholder="{{ (empty($contact->address_line_2)) ? 'N/A' : $contact->address_line_2 }}" class="form-control" disabled>
                            </div>
                            
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label>Contact Address Postcode</label>
                                <input type="text" id="contact_postcode" name="contact_postcode" placeholder="{{ (empty($contact->postcode)) ? 'N/A' : $contact->postcode }}" class="form-control" disabled>
                            </div>
                            <div class="col">
                                <label>Contact Address City</label>
                                <input type="text" id="contact_city" name="contact_city" placeholder="{{ (empty($contact->city)) ? 'N/A' : $contact->city }}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label>Contact Address State</label>
                                <input type="text" id="contact_state" name="contact_state" placeholder="{{ (empty($contact->state)) ? 'N/A' : $contact->state }}" class="form-control" disabled>
                            </div>
                            <div class="col">
                                <label>Contact Address Country</label>
                                <input type="text" id="contact_country" name="contact_country" placeholder="{{ (empty($contact->country)) ? 'N/A' : $contact->country }}" class="form-control" disabled>
                            </div>
                        </div>
                        
                    </fieldset>
                    <!-- Form Step 1 -->

                    @endforeach
                    </div>
                    <!-- Form Wizard -->
                </div>
            </div>
                
        </div>
    </section>
    <!-- main content -->

@endsection