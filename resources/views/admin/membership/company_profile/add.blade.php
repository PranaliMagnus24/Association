<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!------Add Company----->
    <div class="container">
        <div class="text-end mb-3">
            <a href="{{ url('admin/companylist')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Company Registration</h5>
                @if (isset($data))
                <form action="{{ route('company.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @else
                    <form action="{{ route('company.register')}}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-lg-3 col-form-label">Member's Name<span style="color: red">*</span></label>
                            <div class="col-md-8 col-lg-3">
                                <select class="form-select member_name" aria-label="Default select example" name="member_name" id="member_name">
                                    <option selected>Name</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if((isset($user_id) && $user->id == $user_id) || (isset($data->user_id) && $user->id == $data->user_id)) selected="selected" @endif>
                                        {{ $user->first_name }}&nbsp;{{ $user->last_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('membership_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label class="col-md-4 col-lg-3 col-form-label">Membership Type<span style="color: red">*</span></label>
                            <div class="col-md-8 col-lg-3">
                                <select class="form-select membership_type" aria-label="Default select example" name="membership_type" id="membership_type">
                                    <option selected>Membership Type</option>
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
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Company Type</label>
                        <div class="col-md-8 col-lg-3">
                            <select class="form-select" aria-label="Default select example" name="company_type" id="companycategory-dropdown">
                                <option selected>-- Company Type --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                @if(isset($data->company_type) && $category->id == $data->company_type) selected="selected"
                                @endif>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                            <option value="other" @if(isset($data->company_type) && $data->company_type === 'other') selected="selected" @endif>Other</option>
                        </select>
                        @error('company_type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label">Subcategory</label>
                    <div class="col-md-8 col-lg-3">
                        <select name="subcategory_id" class="form-control" id="companysubcategory-dropdown">
                            <option value="">-- Subcategory --</option>
                            <option value="other">Other</option>
                        </select>
                        @error('subcategory')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Hidden input field for "Other" category -->
                 <div class="row mb-3">
                    <label for="companycategory_id" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-3 mt-2" id="other-category-input" style="display: none;">
                        <input type="text" name="other_category" id="other-category" class="form-control" placeholder="Enter New Category" value="{{ old('other_category') }}">
                        @error('other_category')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Hidden input field for "Other" SubCategory -->
                     <label for="other-subcategory" class="col-md-4 col-lg-3 col-form-label"></label>
                     <div class="col-md-8 col-lg-3 mt-2" id="other-subcategory-input" style="display: none;">
                        <input type="text" name="other_subcategory" id="other-subcategory" class="form-control" placeholder="Enter New Subcategory" value="{{ old('other_subcategory') }}">
                        @error('other_subcategory')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Membership<span style="color: red">*</span></label>
                    <div class="col-md-8 col-lg-3">
                        <select class="form-select membership_year" aria-label="Default select example" name="membership_year" id="membershipYearSelect" onchange="updateRenewalDate()">
                            <option selected>Membership</option>
                            @foreach($memberships as $membership)
                            <option value="{{ $membership->membership_year }}" data-default-year="{{ $membership->default_year }}" {{ (old('membership_year') == $membership->membership_year || (isset($data) && $data->membership_year == $membership->membership_year)) ? 'selected' : '' }}>
                                {{ $membership->membership_year }} - {{ $membership->default_year }}
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
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Company Name <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="company_name" type="text" class="form-control" placeholder="your company name" value="{{ old('company_name', $data->company_name ?? '') }}">
                @error('company_name')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">Registration No/Udyog Aadhaar No. <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="aadharcard_number" type="text" class="form-control" id="aadhar" value="{{ old('aadharcard_number', $data->aadharcard_number ?? '') }}" placeholder="Registration or Aadhar number">
                @error('aadharcard_number')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="reg_date" class="col-md-4 col-lg-3 col-form-label">Registration Date <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="registration_date" type="date" class="form-control" id="reg_date" value="{{ old('registration_date', $data->registration_date ?? now()->format('Y-m-d')) }}">
                @error('registration_date')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label" style="margin-bottom: 0;">Renewal Date <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="renewal_date" type="date" class="form-control renewal_date" id="ren_date" value="{{ old('renewal_date', $data->renewal_date ?? '') }}">
                @error('renewal_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1" value="{{ old('address_one', $data->address_one ?? '') }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2" value="{{ old('address_two', $data->address_two ?? '') }}">
            </div>
        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-2 col-lg-3 col-form-label">Country <span style="color: red">*</span></label>
        <div class="col-md-8 col-lg-3">
    <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example">
        <option value="">-- Select Country --</option>
        @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country')
            <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
            <label for="Job" class="col-md-2 col-lg-3 col-form-label">State <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select name="state" id="state-dropdown" class="form-select" aria-label="Default select example" value="{{ old('state')}}">
                    <option selected>Select State</option>
                    <option value=""></option>
                </select>
                @error('state')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">City <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select id="city-dropdown" name="city" class="form-select" aria-label="Default select example" value="{{ old('city')}}">
                    <option selected>Select city</option>
                    <option value=""></option>
                </select>
                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Zip code</label>
            <div class="col-md-8 col-lg-3">
                <input name="zipcode" type="text" class="form-control" id="Job" placeholder="Zip code" value="{{ old('zipcode', $data->zipcode ?? '') }}">
            </div>

        </div>

        <div class="row mb-3">
            <label for="landline" class="col-md-4 col-lg-3 col-form-label">Landline</label>
            <div class="col-md-8 col-lg-3">
                <input name="landline" type="text" class="form-control" id="landline" value="{{ old('landline', $data->landline ?? '') }}" placeholder="Landline or Mobile number">
                @error('landline')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label">Number Of Employees</label>
            <div class="col-md-8 col-lg-3">
    <select class="form-select" aria-label="Default select example" name="employee_number">
        <option value="" {{ old('employee_number') == '' ? 'selected' : '' }}>Select number of employees</option>
        <option value="1-10" {{ old('employee_number') == '1-10' ? 'selected' : '' }}>1-10</option>
        <option value="11-50" {{ old('employee_number') == '11-50' ? 'selected' : '' }}>11-50</option>
        <option value="51-500" {{ old('employee_number') == '51-500' ? 'selected' : '' }}>51-500</option>
        <option value="500+" {{ old('employee_number') == '500+' ? 'selected' : '' }}>500+</option>
    </select>
</div>

        </div>

        <div class="row mb-3">
            <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">Company Establishment Year <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="company_year" type="text" class="form-control" id="Phone" value="{{ old('company_year', $data->company_year ?? '') }}" placeholder="Company Establishment Year">
                @error('company_year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="about_comp" class="col-md-4 col-lg-3 col-form-label">About Company</label>
            <div class="col-md-8 col-lg-9">
            <div id="quill-editor" class="mb-3" style="height: 150px;">
                    </div>
                    <textarea rows="3" class="mb-3 d-none" name="about_company" id="quill-editor-area" placeholder="Write here">{{ old('about_company', $data->about_company ?? '') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="services" class="col-md-4 col-lg-3 col-form-label">Services/Skills</label>
            <div class="col-md-8 col-lg-9">
                <textarea name="services" id="services" class="form-control" placeholder="Add your services and skill's" style="height: 150px;">{{ old('services', $data->services ?? '') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="web_url" class="col-md-4 col-lg-3 col-form-label">Website URL</label>
            <div class="col-md-8 col-lg-9">
                <input name="website_url" type="text" class="form-control" id="web_url" value="{{ old('website_url', $data->website_url ?? '') }}" placeholder="Website URL">
            </div>
        </div>

        <div class="row mb-3">
           {{-- <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Technologies</label>
            <div class="col-md-8 col-lg-3">
                <select name="technologies[]" id="technology" class="selectpicker" multiple aria-label="size 3 select example">
               @foreach($technologies as $technology)
                <option value="{{ $technology->title }}">{{ $technology->title }}</option>
               @endforeach
        </select>
            </div>--}}
            <label for="logo" class="col-md-4 col-lg-3 col-form-label" style="margin-bottom: 0;">Company Logo</label>
            <div class="col-md-8 col-lg-3">
                <input id="logo" name="company_logo" type="file" class="form-control" accept="image/*" value="{{ old('company_logo', $data->company_logo ?? '') }}">
                @if(!empty($data->company_logo))
      @if(file_exists('upload/company_documents/'.$data->company_logo))<img src="{{url('upload/company_documents/'.$data->company_logo)}}" style="height:100px; width:100px;">
      @endif
      @endif
            </div>
        </div>
        <!----------------------------------------------Documenst upload------------------->
        <div class="container">
  <h5 class="card-title text-center">Documents Upload</h5>
  <br>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">Proof of company identity</label>

    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_identity" value="{{ old('company_identity', $data->company_identity ?? '') }}">

      @if(isset($data) && $data->documents->where('file_type', 'company_identity')->first())
      @php
          $doc = $data->documents->where('file_type', 'company_identity')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">Aadhar card/Pan card</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="aadharcard" value="{{ old('aadharcard', $data->aadharcard ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'aadharcard')->first())
      @php
          $doc = $data->documents->where('file_type', 'aadharcard')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
  <div class="row mb-3">
  <label for="" class="col-md-4 col-lg-3 col-form-label">Proof of company address</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="company_address" value="{{ old('company_address', $data->company_address ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'company_address')->first())
      @php
          $doc = $data->documents->where('file_type', 'company_address')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
    <label for="" class="col-md-4 col-lg-3 col-form-label">Letter of authority</label>
    <div class="col-md-8 col-lg-3">
      <input type="file" class="form-control" name="authority_letter" value="{{ old('authority_letter', $data->authority_letter ?? '') }}">
      @if(isset($data) && $data->documents->where('file_type', 'authority_letter')->first())
      @php
          $doc = $data->documents->where('file_type', 'authority_letter')->first();
      @endphp
      @if(pathinfo($doc->file_name, PATHINFO_EXTENSION) == 'pdf')
          <a href="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" target="_blank">View PDF</a>
      @else
          <img src="{{ url('upload/company_documents/' . $data->id . '/' . $doc->file_name) }}" style="height:100px; width:100px;">
      @endif
  @endif
    </div>
  </div>
</div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
           </form>
            </div>
          </div>
         </div>


    <!---End--->
  </main>


  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <script>

$(document).ready(function () {
    // Pre-selected state and city (from old data or database)
    var preselectedState = "{{ old('state') ?? $data->state ?? '' }}";
    var preselectedCity = "{{ old('city') ?? $data->city ?? '' }}";

    // Handle country change
    $('#country-dropdown').on('change', function () {
        var idCountry = this.value;

        $("#state-dropdown").html('');

        if (idCountry) {
            $.ajax({
                url: "{{ url('api/fetch-states') }}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dropdown').html('<option value="">-- Select State --</option>');

                    $.each(result.states, function (key, value) {
                        var selected = value.id == preselectedState ? 'selected' : '';
                        $("#state-dropdown").append(
                            '<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>'
                        );
                    });

                    // Trigger change event to load cities if a pre-selected state exists
                    if (preselectedState) {
                        $('#state-dropdown').trigger('change');
                    }
                }
            });
        } else {
            $('#state-dropdown').html('<option value="">-- Select State --</option>');
            $('#city-dropdown').html('<option value="">-- Select City --</option>');
        }
    });

    // Handle state change
    $('#state-dropdown').on('change', function () {
        var idState = this.value;

        $("#city-dropdown").html('');

        if (idState) {
            $.ajax({
                url: "{{ url('api/fetch-cities') }}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');

                    $.each(res.cities, function (key, value) {
                        var selected = value.id == preselectedCity ? 'selected' : '';
                        $("#city-dropdown").append(
                            '<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>'
                        );
                    });
                }
            });
        } else {
            $('#city-dropdown').html('<option value="">-- Select City --</option>');
        }
    });

    // Trigger country dropdown change event if a preselected value exists
    if ($('#country-dropdown').val()) {
        $('#country-dropdown').trigger('change');
    }

    $('#companycategory-dropdown').change(function() {
    var category_id = $(this).val();
    var subcategory_dropdown = $('#companysubcategory-dropdown');
    subcategory_dropdown.empty();
    subcategory_dropdown.append('<option value="">-- Subcategory --</option>');

    // Show/hide the other category input field
    if (category_id === 'other') {
        $('#other-category-input').show();
        $('#other-category').focus();
    } else {
        $('#other-category-input').hide();
    }

    if (category_id && category_id !== 'other') {
        $.ajax({
            url: '/admin/subcategory-get/' + category_id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    $.each(response, function(index, subcategory) {
                        subcategory_dropdown.append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                    });
                }
                subcategory_dropdown.append('<option value="other">Other</option>');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                subcategory_dropdown.append('<option value="other">Other</option>');
            }
        });
    } else {
        subcategory_dropdown.append('<option value="other">Other</option>');
    }
});

$('#companysubcategory-dropdown').change(function() {
    var otherSubcategoryInput = $('#other-subcategory-input');
    if (this.value === 'other') {
        otherSubcategoryInput.show();
        $('#other-subcategory').focus();
    } else {
        otherSubcategoryInput.hide();
    }
});

});



//Textarea
// document.addEventListener('DOMContentLoaded', function() {
//         if (document.getElementById('quill-editor-area')) {
//             var editor = new Quill('#quill-editor', {
//                 theme: 'snow'
//             });
//             var quillEditor = document.getElementById('quill-editor-area');
//             editor.on('text-change', function() {
//                 quillEditor.value = editor.root.innerHTML;
//             });

//             quillEditor.addEventListener('input', function() {
//                 editor.root.innerHTML = quillEditor.value;
//             });
//         }
//     });

document.addEventListener('DOMContentLoaded', function() {
        // Check if the editor and textarea exist
        var quillEditorDiv = document.getElementById('quill-editor');
        var quillEditorArea = document.getElementById('quill-editor-area');

        if (quillEditorDiv && quillEditorArea) {
            // Initialize Quill editor
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });

            // Set the initial value of the editor from the textarea
            editor.root.innerHTML = quillEditorArea.value;

            // Sync Quill editor content to the textarea
            editor.on('text-change', function() {
                quillEditorArea.value = editor.root.innerHTML;
            });

            // Sync textarea content to the Quill editor if textarea is manually edited
            quillEditorArea.addEventListener('input', function() {
                editor.root.innerHTML = quillEditorArea.value;
            });
        }
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






</script>


  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
