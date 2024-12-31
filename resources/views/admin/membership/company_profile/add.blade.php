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
    </div><!-- End Page Title -->

 <!---Add Member--->
         <div class="container">
         <div class="text-end mb-3">
        <a href="{{ url('admin/membershipform')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Registration</h5>
              @if (isset($data))

    <form action="{{ route('company.update', $data->id) }}" method="POST" enctype="multipart/form-data">

    @method('PUT')
              <form action="{{ route('company.register')}}" method="POST" enctype="multipart/form-data">
              @endif
              @csrf

        <div class="row mb-3">
        <label class="col-md-4 col-lg-3 col-form-label">Member's Name<span style="color: red">*</span></label>

<div class="col-md-8 col-lg-3">
  <select class="form-select member_name" aria-label="Default select example" name="member_name" id="member_name">
     <option selected>Name</option>
    @foreach($users as $user)
  <option value="{{ $user->id }}" @if(isset($user_id) && $user->id == $user_id) selected="selected" @endif>
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
             <option value="{{ $membershiptype->title }}">
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
            <label class="col-md-4 col-lg-3 col-form-label">Company Type <span style="color: red">*</span></label>

            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="company_type" value="{{ old('company_type')}}">
                    <option selected>Company Type</option>
                    <option value="Product">Product</option>
                    <option value="Service">Service</option>
                    <option value="College/Institutional Organization">College/Institutional Organization</option>
                </select>
                @error('company_type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <label class="col-md-4 col-lg-3 col-form-label">Membership<span style="color: red">*</span></label>

          <div class="col-md-8 col-lg-3">
          <select class="form-select membership_year" aria-label="Default select example" name="membership_year" id="membershipYearSelect" onchange="updateRenewalDate()">
            <option selected>Membership</option>
            @foreach($memberships as $membership)
            <option value="{{ $membership->id }}" data-months="{{ $membership->membership_year }}" data-years="{{ $membership->default_year }}">
                {{ $membership->membership_year }} {{ $membership->default_year }}
            </option>
        @endforeach
            </select>
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
                <input name="aadharcard_number" type="text" class="form-control" id="aadhar" value="{{ old('aadharcard_number')}}" placeholder="Registration or Aadhar number">
                @error('aadharcard_number')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="reg_date" class="col-md-4 col-lg-3 col-form-label">Registration Date <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="registration_date" type="date" class="form-control" id="reg_date" value="{{ now()->format('Y-m-d') }}">
                @error('registration_date')
                <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label" style="margin-bottom: 0;">Renewal Date <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="renewal_date" type="date" class="form-control renewal_date" id="ren_date" value="{{ old('renewal_date')}}">
                @error('renewal_date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Address <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_one" type="text" class="form-control" id="Job" placeholder="Address Line 1" value="{{ old('address_one')}}">
                @error('address_one')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-9">
                <input name="address_two" type="text" class="form-control" id="Job" placeholder="Address Line 2" value="{{ old('address_two')}}">
            </div>
        </div>

        <div class="row mb-3">
        <label for="Job" class="col-md-2 col-lg-3 col-form-label">Country <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example" value="{{ old('country')}}">
                <option value="">-- Select Country --</option>
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>@endforeach
                </select>
                @error('country')
                <span class="text-danger">{{$message}}</span>
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
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Zip code<span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="zipcode" type="text" class="form-control" id="Job" placeholder="Zip code" value="{{ old('zipcode')}}">
                @error('zipcode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>

        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Landline</label>
            <div class="col-md-8 col-lg-3">
                <input name="landline" type="text" class="form-control" id="Country" value="{{ old('landline')}}" placeholder="Landline or Mobile number">
                @error('landline')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <label class="col-md-2 col-lg-3 col-form-label">Number Of Employees</label>
            <div class="col-md-8 col-lg-3">
                <select class="form-select" aria-label="Default select example" name="employee_number" value="{{ old('employee_number')}}">
                    <option selected>Select number of employees</option>
                    <option value="1-10">1-10</option>
                    <option value="11-50">11-50</option>
                    <option value="51-500">51-500</option>
                    <option value="500+">500+</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="comapany_year" class="col-md-4 col-lg-3 col-form-label">Company Establishment Year <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <input name="company_year" type="text" class="form-control" id="Phone" value="{{ old('company_year')}}" placeholder="Company Establishment Year">
                @error('company_year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="about_comp" class="col-md-4 col-lg-3 col-form-label">About Company <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
            <div id="quill-editor" class="mb-3" style="height: 150px;">
                    </div>
                    <textarea rows="3" class="mb-3 d-none" name="about_company" id="quill-editor-area" placeholder="Write here"></textarea>
                @error('about_company')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
        </div>

        <div class="row mb-3">
            <label for="web_url" class="col-md-4 col-lg-3 col-form-label">Website URL <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-9">
                <input name="website_url" type="text" class="form-control" id="web_url" value="{{ old('webisite_url')}}" placeholder="Website URL">
                @error('website_url')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Technologies <span style="color: red">*</span></label>
            <div class="col-md-8 col-lg-3">
                <select name="technologies" id="technology" class="selectpicker" multiple aria-label="size 3 select example">
               @foreach($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->title }}</option>
               @endforeach
        </select>
            </div>
            <label for="logo" class="col-md-4 col-lg-3 col-form-label" style="margin-bottom: 0;">Company Logo</label>
            <div class="col-md-8 col-lg-3">
                <input id="logo" name="company_logo" type="file" class="form-control" accept="image/*" value="{{ old('company_logo')}}">
                @if(!empty($data->company_logo))
      @if(file_exists('upload/'.$data->company_logo))<img src="{{url('upload/'.$data->company_logo)}}" style="height:100px; width:100px;">
      @endif
      @endif
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
document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });


//Renewal Date

function updateRenewalDate() {
    const membershipSelect = document.getElementById('membershipYearSelect');
    const selectedOption = membershipSelect.options[membershipSelect.selectedIndex];
    const renewalDateInput = document.getElementById('ren_date');

    const currentDate = new Date();
    const membershipValue = selectedOption.getAttribute('data-months') || 0;
    const defaultValue = selectedOption.getAttribute('data-years');

    if (defaultValue === "Month") {
        currentDate.setMonth(currentDate.getMonth() + parseInt(membershipValue));
    } else if (defaultValue === "Year") {
        currentDate.setFullYear(currentDate.getFullYear() + parseInt(membershipValue));
    } else if (defaultValue === "Lifetime") {
        currentDate.setFullYear(currentDate.getFullYear() + 10);
    }

    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');

    renewalDateInput.value = `${year}-${month}-${day}`;
}


</script>


  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
