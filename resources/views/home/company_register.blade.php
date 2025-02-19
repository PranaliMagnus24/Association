
      @include('home.includes.head')

   <style>

.step-container {
  position: relative;
  text-align: center;
  transform: translateY(-43%);
}

.step-circle {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid #007bff;
  line-height: 30px;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
  cursor: pointer;
}

.step-line {
  position: absolute;
  top: 16px;
  left: 50px;
  width: calc(100% - 100px);
  height: 2px;
  background-color: #007bff;
  z-index: -1;
}

#multi-step-form {
  overflow-x: hidden;
  margin-bottom: 50px;
}

select.form-select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  font-size: 15px !important;
}

.btn {
  padding: 10px 20px;
  font-size: 16px;
  margin-top: 10px;
}

.btn-primary {
  background-color: #007bff;
  border: none;
}

.btn-success {
  background-color: #28a745;
  border: none;
}

.text-danger {
  font-size: 0.875em;
}
.form-control {
        height: 50px;
        font-size: 16px;
    }

   </style>

      @include('home.includes.navbar')
      <div id="main_content" class="main-content">
         <!--==========================-->
         <!--=         Banner         =-->
         <!--==========================-->
         <section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Company Registration Form') }}</h1>
                        <p>
                        {{ __('messages.Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need') }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll"> Let&apos;s See'</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>




<!-- MultiStep Form -->
 <section>
<div id="container" class="container mt-5">
  <div class="progress px-1" style="height: 3px;">
    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <div class="step-container d-flex justify-content-between">
    <div class="step-circle" onclick="displayStep(1)">1</div>
    <div class="step-circle" onclick="displayStep(2)">2</div>
    <div class="step-circle" onclick="displayStep(3)">3</div>
  </div>

  <form action="{{ route('company.store')}}" method="POST" id="multi-step-form" enctype="multipart/form-data">
    @csrf
    <div class="step step-1">
          <!-- Step 1 form fields here -->
        <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Membership Type') }}<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select membership_type" aria-label="Default select example" name="membership_type" id="membership_type">
                    <option selected>{{ __('messages.Membership Type') }}</option>
                    @foreach($membershipstype as $membershiptype)
                    <option value="{{ $membershiptype->title }}"
                    @if(isset($data->membership_type) && $membershiptype->title == $data->membership_type)
                            selected="selected"
                    @endif>
                    {{ $membershiptype->title }}
                    </option>
                    @endforeach
                </select>
                @error('membership_type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <label class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Membership') }}<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select membership_year" aria-label="Default select example" name="membership_year" id="membershipYearSelect" onchange="updateRenewalDate()">
                    <option selected>{{ __('messages.Membership') }}</option>
                    @foreach($memberships as $membership)
                    <option value="{{ $membership->membership_year }}" data-default-year="{{ $membership->default_year }}" {{ $membership->id == 8 ? 'selected' : 'disabled' }}>
                    {{ $membership->membership_year}} - {{ $membership->default_year }}
                    </option>
                    @endforeach
                </select>
                <input type="hidden" name="default_year" id="defaultYearInput">
                @error('membership_year')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Company Type') }}  <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="company_type" id="companycategory-dropdown">
                    <option selected>-- Company Type --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @if(old('company_type', $data->company_type ?? '') == $category->id) selected @endif>
                    {{ $category->category_name }}
                    </option>
                    @endforeach
                    <option value="other" @if(old('company_type', $data->company_type ?? '') == 'other') selected @endif>Other</option>
                </select>
                @error('company_type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label">Subcategory</label>
            <div class="col-md-8 col-lg-3">
                <select name="subcategory_id" class="form-select" id="companysubcategory-dropdown">
                    <option value="">-- Subcategory --</option>
                    <option value="other">Other</option>
                </select>
                @error('subcategory_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!--------Hidden Other field----->
        <div class="row mb-3">
            <label for="companycategory_id" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-3 mt-2" id="other-category-input" style="display: none;">
                <input type="text" name="other_category" id="other-category" class="form-control" placeholder="Enter New Category" value="{{ old('other_category') }}">
                @error('other_category')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="other-subcategory" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-3 mt-2" id="other-subcategory-input" style="display: none;">
                <input type="text" name="other_subcategory" id="other-subcategory" class="form-control" placeholder="Enter New Subcategory" value="{{ old('other_subcategory') }}">
                @error('other_subcategory')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
         <!--------End Hidden Other field----->

        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Company Name') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="company_name" type="text" class="form-control" placeholder="your company name" value="{{ old('company_name', $data->company_name ?? '') }}">
                @error('company_name')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Registration No/Udyog Aadhaar No') }}.<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="aadharcard_number" type="text" class="form-control" id="aadhar" value="{{ old('aadharcard_number', $data->aadharcard_number ?? '') }}" placeholder="Registration or Aadhar number">
                @error('aadharcard_number')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="reg_date" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Registration Date') }}<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="registration_date" type="date" class="form-control" id="reg_date" value="{{ old('registration_date', $data->registration_date ?? now()->format('Y-m-d')) }}" readonly>
                @error('registration_date')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label" style="margin-bottom: 0;">{{ __('messages.Renewal Date') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="renewal_date" type="date" class="form-control renewal_date" id="ren_date" value="{{ old('renewal_date', $data->renewal_date ?? '') }}" readonly>
                @error('renewal_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Address') }}<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1" value="{{ old('address_one', $data->address_one ?? '') }}">
            </div>
                @error('address_one')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2" value="{{ old('address_two', $data->address_two ?? '') }}">
            </div>
        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-2 col-lg-3 col-form-label">{{ __('messages.Country') }}<span style="color: red">*</span></label>
    <div class="col-md-8 col-lg-3">
        <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example" value="{{ old('country') }}">
            <option value="">{{ __('messages.-- Select Country --') }}</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
            <label for="Job" class="col-md-2 col-lg-3 col-form-label">{{ __('messages.State') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select name="state" id="state-dropdown" class="form-select" aria-label="Default select example" value="{{ old('state')}}">
                    <option selected>{{ __('messages.Select State') }}</option>
                    <option value=""></option>
                </select>
                @error('state')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.City') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select id="city-dropdown" name="city" class="form-select" aria-label="Default select example" value="{{ old('city')}}">
                    <option selected>{{ __('messages.Select city') }}</option>
                    <option value=""></option>
                </select>
                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Zip code') }}</label>
            <div class="col-md-8 col-lg-3">
                <input name="zipcode" type="text" class="form-control" id="Job" placeholder="Zip code" value="{{ old('zipcode', $data->zipcode ?? '') }}">
                @error('zipcode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>

        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Landline') }}</label>
            <div class="col-md-8 col-lg-3">
                <input name="landline" type="text" class="form-control" id="Country" value="{{ old('landline', $data->landline ?? '') }}" placeholder="Landline or Mobile number">
                @error('landline')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label">{{ __('messages.Number Of Employees') }}</label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="employee_number" value="{{ old('employee_number')}}">
                    <option selected>{{ __('messages.Select number of employees') }}</option>
                    <option value="1-10">1-10</option>
                    <option value="11-50">11-50</option>
                    <option value="51-500">51-500</option>
                    <option value="500+">500+</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Company Establishment Year') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="company_year" type="text" class="form-control" id="Phone" value="{{ old('company_year', $data->company_year ?? '') }}" placeholder="Company Establishment Year">
                @error('company_year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>

        <div class="row mb-3">
        <label for="about_comp" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.About Company') }}<span style="color: red">*</span></label>
        <div class="col-md-8 col-lg-9">
        <textarea name="about_company" id="about_company" rows="3" class="mb-3 form-control" style="height: 150px; width: 883px;"> {{ old('about_company', $data->about_company ?? '') }}</textarea>
        </div>
           {{-- <div class="col-md-8 col-lg-9">
                    <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="about_company" id="quill-editor-area">
                    {{ old('about_company', $data->about_company ?? '') }}
                    </textarea>
            </div>--}}
               @error('about_company')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>

        <div class="row mb-3">
            <label for="services" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Services/Skills') }} <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
        <textarea name="services" id="services" rows="3" class="mb-3 form-control" style="height: 150px; width: 883px;">{{ old('services', $data->services ?? '') }}</textarea>
        </div>
            {{--<div class="col-md-8 col-lg-9">
                <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="services" id="quill-editor-area">
                    {{ old('services', $data->services ?? '') }}
                    </textarea>
            </div>--}}
            @error('services')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>

        <div class="row mb-3">
            <label for="web_url" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Website URL') }}</label>
            <div class="col-md-8 col-lg-9">
                <input name="website_url" type="text" class="form-control" id="web_url" value="{{ old('website_url', $data->website_url ?? '') }}" placeholder="Website URL">
                @error('website_url')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="logo" class="col-md-4 col-lg-3 col-form-label" style="margin-bottom: 0;">{{ __('messages.Company Logo') }}</label>
            <div class="col-md-8 col-lg-3">
                <input id="logo" name="company_logo" type="file" class="form-control" accept="image/*" value="{{ old('company_logo', $data->company_logo ?? '') }}">
                @if(!empty($data->company_logo))
      @if(file_exists('upload/'.$data->company_logo))<img src="{{url('upload/'.$data->company_logo)}}" style="height:100px; width:100px;">
      @endif
      @endif
            </div>
        </div>


      <button type="button" class="btn btn-primary next-step">{{ __('messages.Next') }}</button>
    </div>

    <div class="step step-2">
      <!-- Step 2 form fields here -->
      <!----------------------------------------------Documenst upload------------------->
      <div class="container">
  <h5 class="card-title text-center">{{ __('messages.Documents Upload') }}</h5>
  <br>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">{{  __('messages.Proof of company identity') }}</label>

    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_identity" value="{{ old('company_identity', $data->company_identity ?? '') }}">

      @if(isset($data) && $data->documents->where('file_type', 'company_identity')->first())
      @php
          $doc = $data->documents->where('file_type', 'company_identity')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" target="_blank">{{ __('messages.View PDF') }}</a>
      @else
          <img src="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Aadhar card/Pan card') }}</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="aadharcard" value="{{ old('aadharcard', $data->aadharcard ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'aadharcard')->first())
      @php
          $doc = $data->documents->where('file_type', 'aadharcard')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" target="_blank">{{ __('messages.View PDF') }}</a>
      @else
          <img src="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Proof of company address') }}</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_address" value="{{ old('company_address', $data->company_address ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'company_address')->first())
      @php
          $doc = $data->documents->where('file_type', 'company_address')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" target="_blank">{{ __('messages.View PDF') }}</a>
      @else
          <img src="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">{{ __('messages.Letter of authority') }}</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="authority_letter" value="{{ old('authority_letter', $data->authority_letter ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'authority_letter')->first())
      @php
          $doc = $data->documents->where('file_type', 'authority_letter')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" target="_blank">{{ __('messages.View PDF') }}</a>
      @else
          <img src="{{ url('upload/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
</div>
      <button type="button" class="btn btn-primary prev-step">{{ __('messages.Previous') }}</button>
      <button type="button" class="btn btn-primary next-step">{{ __('messages.Next') }}</button>
    </div>

    <div class="step step-3">
      <!-- Step 3 form fields here -->
      <div class="mb-3">
        <label for="field3" class="form-label">{{ __('messages.Payment') }}</label>
      </div>
      <button type="button" class="btn btn-primary prev-step">{{ __('messages.Previous') }}</button>
      <button type="submit" class="btn btn-success">{{ __('messages.Submit') }}</button>
    </div>


  </form>
</div>
</section>




</div>


<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

$(document).ready(function () {

    $('#country-dropdown').on('change', function () {

        var idCountry = this.value;

        $("#state-dropdown").html('');

        $.ajax({

            url: "{{url('api/fetch-states')}}",

            type: "POST",

            data: {

                country_id: idCountry,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (result) {

                $('#state-dropdown').html('<option value="">-- Select State --</option>');

                $.each(result.states, function (key, value) {

                    $("#state-dropdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

                $('#city-dropdown').html('<option value="">-- Select City --</option>');

            }

        });

    });


    $('#state-dropdown').on('change', function () {

        var idState = this.value;

        $("#city-dropdown").html('');

        $.ajax({

            url: "{{url('api/fetch-cities')}}",

            type: "POST",

            data: {

                state_id: idState,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (res) {

                $('#city-dropdown').html('<option value="">-- Select City --</option>');

                $.each(res.cities, function (key, value) {

                    $("#city-dropdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

            }

        });

    });



});


//Textarea
document.addEventListener('DOMContentLoaded', function () {
    const editors = document.querySelectorAll('[id^="quill-editor-area"]');

    editors.forEach((textarea, index) => {
        const quillEditorId = `quill-editor-${index}`;
        const quillContainer = textarea.previousElementSibling;
        quillContainer.id = quillEditorId;
        const editor = new Quill(`#${quillEditorId}`, {
            theme: 'snow',
        });
        editor.root.innerHTML = textarea.value;
        editor.on('text-change', function () {
            textarea.value = editor.root.innerHTML;
        });
        textarea.addEventListener('input', function () {
            editor.root.innerHTML = textarea.value;
        });
    });
});




//Renewal Date

function updateRenewalDate() {
    const membershipSelect = document.getElementById('membershipYearSelect');
    const selectedOption = membershipSelect.options[membershipSelect.selectedIndex];
    const renewalDateInput = document.getElementById('ren_date');

    if (!selectedOption || selectedOption.value === "Membership") {
        renewalDateInput.value = ""; // Clear the field if no valid membership is selected
        return;
    }

    const currentDate = new Date();
    const membershipValue = parseInt(selectedOption.value) || 0; // Membership duration
    const defaultValue = selectedOption.getAttribute('data-default-year'); // Membership type (Month/Year/Lifetime)

    if (defaultValue === "Month") {
        currentDate.setMonth(currentDate.getMonth() + membershipValue);
    } else if (defaultValue === "Year") {
        currentDate.setFullYear(currentDate.getFullYear() + membershipValue);
    } else if (defaultValue === "Lifetime") {
        currentDate.setFullYear(currentDate.getFullYear() + 10);
    }

    // Format date as YYYY-MM-DD
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');

    renewalDateInput.value = `${year}-${month}-${day}`;
}

// Add event listener for the membership dropdown
document.getElementById('membershipYearSelect').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const defaultYear = selectedOption.getAttribute('data-default-year');
    document.getElementById('defaultYearInput').value = defaultYear || '';
});

// Trigger updateRenewalDate on page load for the default selected value
window.addEventListener('load', function () {
    updateRenewalDate();
});



//next next
    var currentStep = 1;
var updateProgressBar;

function displayStep(stepNumber) {
  if (stepNumber >= 1 && stepNumber <= 3) {
    $(".step-" + currentStep).hide();
    $(".step-" + stepNumber).show();
    currentStep = stepNumber;
    updateProgressBar();
  }
}

  $(document).ready(function() {
    $('#multi-step-form').find('.step').slice(1).hide();

    $(".next-step").click(function() {
      if (currentStep < 3) {
        $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
        currentStep++;
        setTimeout(function() {
          $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
          $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
          updateProgressBar();
        }, 500);
      }
    });

    $(".prev-step").click(function() {
      if (currentStep > 1) {
        $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
        currentStep--;
        setTimeout(function() {
          $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
          $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
          updateProgressBar();
        }, 500);
      }
    });

    updateProgressBar = function() {
      var progressPercentage = ((currentStep - 1) / 2) * 100;
      $(".progress-bar").css("width", progressPercentage + "%");
    }
  });

  $(window).on("load", function() {
        var idCountry = $('#country-dropdown').val();
        //alert(idCountry);
        $("#state-dropdown").html('');

        $.ajax({

            url: "{{url('api/fetch-states')}}",

            type: "POST",

            data: {

                country_id: idCountry,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (result) {

                $('#state-dropdown').html('<option value="">-- Select State --</option>');

                $.each(result.states, function (key, value) {

                    $("#state-dropdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

                $('#city-dropdown').html('<option value="">-- Select City --</option>');

            }

        });
    });




    //Dependent Category
    var selectedCategory = $('#companycategory-dropdown').val();
    var selectedSubcategory = "{{ old('subcategory_id', $companyProfile->subcategory_id ?? '') }}";
    if(selectedCategory === 'other'){
        $('#other-category-input').show();
    } else {
        $('#other-category-input').hide();
    }
    function loadSubcategories(category_id, selectedSub) {
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option>');

        $.ajax({
            url: '/company-subcategory/' + category_id,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $.each(response, function (index, subcategory) {
                    var isSelected = (subcategory.id == selectedSub) ? ' selected' : '';
                    subcategoryDropdown.append('<option value="' + subcategory.id + '"' + isSelected + '>' + subcategory.subcategory_name + '</option>');
                });

                var otherSelected = (selectedSub == 'other') ? ' selected' : '';
                subcategoryDropdown.append('<option value="other"' + otherSelected + '>Other</option>');

                if(selectedSub === 'other'){
                    $('#other-subcategory-input').show();
                } else {
                    $('#other-subcategory-input').hide();
                }
            },
            error: function () {
                subcategoryDropdown.append('<option value="other">Other</option>');
            }
        });
    }

    if(selectedCategory && selectedCategory !== 'other'){
        loadSubcategories(selectedCategory, selectedSubcategory);
    } else {
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option><option value="other">Other</option>');
        if(selectedSubcategory === 'other'){
            $('#other-subcategory-input').show();
        } else {
            $('#other-subcategory-input').hide();
        }
    }

    $('#companycategory-dropdown').change(function () {
        var category_id = $(this).val();
        var subcategoryDropdown = $('#companysubcategory-dropdown');
        subcategoryDropdown.empty().append('<option value="">-- Subcategory --</option>');

        if (category_id === 'other') {
            $('#other-category-input').show().focus();
            subcategoryDropdown.append('<option value="other">Other</option>');
        } else {
            $('#other-category-input').hide();
            loadSubcategories(category_id, '');
        }
    });

    $('#companysubcategory-dropdown').change(function () {
        if ($(this).val() === 'other') {
            $('#other-subcategory-input').show().focus();
        } else {
            $('#other-subcategory-input').hide();
        }
    });



</script>
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

         <!----footer------>
         @include('home.includes.footer')

