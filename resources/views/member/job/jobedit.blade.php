<!DOCTYPE html>
<html lang="en">

<head>
  @include('member.layout.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('member.layout.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('member.layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

  <div class="pagetitle">
    <h1>
        @if(!empty($companyProfile) && !empty($companyProfile->company_name))
            {{ $companyProfile->company_name }} Update Job Post
        @else
            Default Title
        @endif
    </h1>
</div>


<div class="container">
    <div class="text-end mb-3">
        <a href="{{ route('joblist')}}" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Job Post</h5>
            <form class="row g-3" method="POST" action="{{ route('job.update', $job->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
              <label for="job_title" class="col-md-4 col-lg-3 col-form-label">Job Title <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Job Title" value="{{ old('job_title', $job->job_title) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="job_desc" class="col-md-4 col-lg-3 col-form-label">Job Description  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="job_desc" id="quill-editor-area" placeholder="Write here">
                        {{$job->job_desc}}
                    </textarea>
                </div>
            </div>
            <div class="row mb-3">
                {{--<label for="job_location" class="col-md-4 col-lg-3 col-form-label">Job Location</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="job_location" id="job_location" class="form-control" placeholder="Job Location">
                </div>--}}
                <label for="vacancy" class="col-md-4 col-lg-3 col-form-label">Vacancy</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="vacancy" id="vacancy" class="form-control" placeholder="Vacancy" value="{{ old('vacancy', $job->vacancy) }}">
                </div>
                <label for="exp_req" class="col-md-4 col-lg-3 col-form-label">Experience Required</label>
            <div class="col-md-8 col-lg-3">
                <input type="text" name="exp_req" id="exp_req" class="form-control" placeholder="Experience Required" value="{{ old('exp_req', $job->exp_req) }}">
            </div>
            </div>
            <div class="row mb-3">
            <label for="companycategory_id" class="col-md-4 col-lg-3 col-form-label">Category</label>
            <div class="col-md-8 col-lg-3">
                <select name="category_id" class="form-control" id="companycategory-dropdown" value="{{ old('category_id', $job->category_id) }}">
              @foreach($categories as $category)
                      <option value="{{ $category->id }}">
                {{ $category->category_name }}
                      </option>
            @endforeach
                </select>
            </div>
            <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label">Subcategory</label>
            <div class="col-md-8 col-lg-3">
                <select name="subcategory_id" class="form-control" id="companysubcategory-dropdown" value="{{ old('subcategory_id', $job->subcategoty_id) }}">
                    <option value="">Select Subcategory</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="skill" class="col-md-4 col-lg-3 col-form-label">Skill  <span style="color:red;">*</span></label>
            <div class="col-md-8 col-lg-9">
                <textarea name="skill" id="skill" class="form-control" placeholder="Add skill's here" style="height: 100px;" value="{{ old('skill', $job->skill) }}">{{$job->skill}}</textarea>
            </div>
            </div>
            <div class="row mb-3">
            <label for="salary" class="col-md-4 col-lg-3 col-form-label">Salary</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="salary" id="salary" class="form-control" placeholder="add salary" value="{{ old('salary', $job->salary) }}">
                </div>
            </div>
            <h5 class="card-title text-center">Company Information</h5>
              <div class="row mb-3">
                    <label for="Company" class="col-md-4 col-lg-3 col-form-label">Company Name  <span style="color:red;">*</span></label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="company"  name="company" placeholder="Your Company Name" value="{{ old('company', $companyProfile->company_name ?? '') }}">
                    </div>

                </div>
            <div class="row mb-3">
            <label for="Contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                    <div class="col-md-8 col-lg-3">
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" value="{{ old('contact', $user->phone ?? '') }}">
                    </div>
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
                </div>

            </div>
            <div class="row mb-3">
                <label for="address" class="col-md-4 col-lg-3 col-form-label">Address  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ old('address', $companyProfile->address_one ?? '') }}">
                </div>
            </div>
            <div class="row mb-3">
            <label for="country" class="col-md-4 col-lg-3 col-form-label">Country  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="country" class="form-control" id="country-dropdown" value="{{ old('country') }}">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                    @endforeach
                    </select>
                </div>
                <label for="state" class="col-md-4 col-lg-3 col-form-label">State  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="state" class="form-control" id="state-dropdown" value="{{ old('state')}}">
                    <option value="">-- Select State --</option>
                            @foreach ($states as $state)

                            <option value="{{ $state->id }}" {{ ($state->id == $companyProfile->state) ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                    </select>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="city" class="col-md-4 col-lg-3 col-form-label">City  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="city" class="form-control" id="city-dropdown" value="{{ old('city')}}">
                    <option selected>Select city</option>
                    @foreach ($cities as $city)

                        <option value="{{ $city->id }}" {{ ($city->id == $companyProfile->city) ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                    </select>
                </div>
                <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                <div class="col-md-8 col-lg-3">
                <select name="status" id="status" class="form-control">
    <option value="" {{ old('status', $job->status ?? '') == '' ? 'selected' : '' }}>Select Status</option>
    <option value="Active" {{ old('status', $job->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
    <option value="Inactive" {{ old('status', $job->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
    <option value="Pending" {{ old('status', $job->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
</select>

                </div>
            </div>
            <div class="row mb-3">
    <label for="upload_document" class="col-md-4 col-lg-3 col-form-label">Upload Document</label>
    <div class="col-md-8 col-lg-3">
        <input type="file" name="upload_document" id="upload_document" class="form-control">

        @if(!empty($job->upload_document))
            <div class="mt-2">
                <a href="{{ asset('upload/company_documents/' . $job->upload_document) }}" target="_blank">
                    View Uploaded Document
                </a>

            </div>
        @endif
    </div>
</div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</main>

  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script>
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

// $(window).on("load", function() {
//         var idCountry = $('#country-dropdown').val();

//         $("#state-dropdown").html('');

//         $.ajax({

//             url: "{{url('api/fetch-states')}}",

//             type: "POST",

//             data: {

//                 country_id: idCountry,

//                 _token: '{{csrf_token()}}'

//             },

//             dataType: 'json',

//             success: function (result) {

//                 $('#state-dropdown').html('<option value="">-- Select State --</option>');

//                 $.each(result.states, function (key, value) {

//                     $("#state-dropdown").append('<option value="' + value

//                         .id + '">' + value.name + '</option>');

//                 });

//                 $('#city-dropdown').html('<option value="">-- Select City --</option>');

//             }

//         });
//     });

    $(document).ready(function() {
        $('#companycategory-dropdown').change(function() {
            var category_id = $(this).val();
            //   alert(category_id);
            if (category_id) {
                $.ajax({
                    url: '/get-subcategories/' + category_id,
                    type: 'GET',
                    success: function(data) {
                        var subcategory_dropdown = $('#companysubcategory-dropdown');
                        subcategory_dropdown.empty();
                        subcategory_dropdown.append('<option value="">Select Subcategory</option>');


                        $.each(data, function(index, subcategory) {
                            subcategory_dropdown.append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Error fetching subcategories');
                    }
                });
            } else {

                $('#companysubcategory-dropdown').empty();
                $('#companysubcategory-dropdown').append('<option value="">Select Subcategory</option>');
            }
        });
    });

  </script>
  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

</body>

</html>
