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
                    
                    @foreach ($contacts as $contact)
                    <form role="form" action="/update-contact" method="post">
                        @csrf

                        <h3>Edit Contact</h3>
                        
                        <input type="hidden" name="contactId" value="{{$contact->id}}">

                        <!-- Form progress -->
                        <div class="form-wizard-steps form-wizard-tolal-steps-1">
                            <div class="form-wizard-progress">
                                <div class="form-wizard-progress-line" data-now-value="100" data-number-of-steps="1" style="width: 100%;"></div>
                            </div>
                            <!-- Step 1 -->
                            <div class="form-wizard-step active">
                                <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <p> {{$contact->name}} </p>
                            </div>
                            <!-- Step 1 -->
                            
                        </div>
                        <!-- Form progress -->
                        
                        
                        <!-- Form Step 1 -->
                        <fieldset>
                            <h4>Edit {{$contact->name}} : <span>Step 1 - 1</span></h4>

                            <div class="row mb-2" >
                                <div class="col">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control required" placeholder="Contact Name" value="{{$contact->name}}">
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Contact Email" value="{{$contact->email}}">
                                </div>
                            </div>

                            <hr>

                            @php
                                $i = 0;
                            @endphp
                            @foreach ($contact->phoneNumber as $phone)
                            
                            @if($i >= 1)
                            <div class="row mb-2 contact-field_{{$i}}" >
                            <div class="col-lg-3"> 
                                <label> Delete </label>
                                <a type="button" class="btn btn-danger" id="remove_contact_field_{{$i}}"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                            </div> 
                            @else
                            <div class="row mb-2 contact-field" >
                            @endif
                               
                                <div class="col-lg-3">
                                    <label>Type</label>
                                    <select name="type[]" class="form-control required">
                                        @if ($phone->type == "home")
                                            <option value="home" selected>Home</option>
                                            <option value="mobile">Mobile</option>
                                            <option value="work">Work</option>

                                        @elseif ($phone->type == "mobile")
                                            <option value="home">Home</option>
                                            <option value="mobile" selected>Mobile</option>
                                            <option value="work">Work</option>

                                        @elseif ($phone->type == "work")
                                            <option value="home">Home</option>
                                            <option value="mobile" >Mobile</option>
                                            <option value="work" selected>Work</option>

                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number[]" class="form-control required" placeholder="Phone Number" value="{{$phone->phone_number}}">
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                            @endforeach

                            <div class="text-center">
                                <a type="button" class="btn btn-primary" id="add_contact_field"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                            </div>

                            <hr>

                            <div class="row mb-2">
                                <div class="col">
                                    <label>Contact Address Line 1</label>
                                    <input type="text" id="contact_address_1" name="contact_address_1" placeholder="Address Line 1" class="form-control" value="{{$contact->address_line_1}}">
                                </div>
                                <div class="col">
                                    <label>Contact Address Line 2</label>
                                    <input type="text" id="contact_address_2" name="contact_address_2" placeholder="Address Line 2" class="form-control" value="{{$contact->address_line_2}}">
                                </div>
                                
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label>Contact Address Postcode</label>
                                    <input type="text" id="contact_postcode" name="contact_postcode" placeholder="Postcode" class="form-control" value="{{$contact->postcode}}">
                                </div>
                                <div class="col">
                                    <label>Contact Address City</label>
                                    <input type="text" id="contact_city" name="contact_city" placeholder="City" class="form-control" value="{{$contact->city}}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <label>Contact Address State</label>
                                    <input type="text" id="contact_state" name="contact_state" placeholder="State" class="form-control" value="{{$contact->state}}">
                                </div>
                                <div class="col">
                                    <label>Contact Address Country</label>
                                    <select id="contact_country" name="contact_country" class="form-control" >
                                        <option value=""></option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                    <script>
                                        $(document).ready(function() {
                                            $('#contact_country option[value="{{$contact->country}}"]').attr("selected", "selected");
                                        });
                                    </script>
                                </div>
                            </div>

                            <hr>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-wizard-buttons">
                                <button type="submit" class="btn btn-next">Submit</button>
                            </div>
                        </fieldset>
                        <!-- Form Step 1 -->


                    </form>
                    @endforeach

                    </div>
                    <!-- Form Wizard -->
                </div>
            </div>
                
        </div>
    </section>
    <!-- main content -->


    <script>
        $(document).ready(function(){
            var i = 1;

            $("#add_contact_field").click(function(){
                $('<div class="row mb-2 contact-field-'+i+'"><div class="col-lg-3"> <label> Delete </label><a type="button" class="btn btn-danger" id="remove_contact_field"><i class="fa fa-trash" aria-hidden="true"></i></a> </div> </div>').insertAfter(".contact-field");

                $(".contact-field").children().clone().appendTo(".contact-field-"+i);
                
                $(".contact-field-"+i+" input").val("");
                $(".contact-field-"+i+" select option:eq(1)").attr("selected", "selected");;

                i++;

                $("#remove_contact_field").on('click', function(){
                    $(this).parent().parent().remove();
                });
            });

            $("a[id^='remove_contact_field'").on('click', function(){
                $(this).parent().parent().remove();
            });

        });
    </script>
@endsection