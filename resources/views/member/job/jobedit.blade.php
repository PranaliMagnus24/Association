
  @include('member.layout.head')

<style>
    select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/16/271/271210.png') no-repeat right 10px center;
    background-size: 12px;
    padding-right: 25px;
}
</style>


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
                    <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Job Title" value="{{ old('job_title', $job->job_title) }}" pattern="[-_?!@#$&A-Za-z0-9]+" title="Only letters, numbers, and -_?!@#$& are allowed." oninput="validateJobTitle()">
                    <small id="char-error" class="text-danger" style="display: none;">Only letters, numbers, and -_?!@#$& are allowed.</small>
                    <small id="length-error" class="text-danger" style="display: none;">Maximum 200 characters allowed.</small>
                    @error('job_title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="job_desc" class="col-md-4 col-lg-3 col-form-label">Job Description  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="job_desc" id="quill-editor-area" placeholder="Write here">
                       {{ old('job_desc', $job->job_desc ?? '') }}
                    </textarea>
                    @error('job_desc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                {{--<label for="job_location" class="col-md-4 col-lg-3 col-form-label">Job Location</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="job_location" id="job_location" class="form-control" placeholder="Job Location">
                </div>--}}
                <label for="vacancy" class="col-md-4 col-lg-3 col-form-label">Vacancy <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="vacancy" id="vacancy" class="form-control" placeholder="Vacancy" value="{{ old('vacancy', $job->vacancy) }}">
                    @error('vacancy')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="exp_req" class="col-md-4 col-lg-3 col-form-label">Experience Required</label>
            <div class="col-md-8 col-lg-3">
                <input type="text" name="exp_req" id="exp_req" class="form-control" placeholder="Experience Required" value="{{ old('exp_req', $job->exp_req) }}">
                @error('exp_req')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row mb-3">
    <!-- Category Dropdown -->
    <label for="companycategory_id" class="col-md-4 col-lg-3 col-form-label">Category <span style="color:red;">*</span></label>
    <div class="col-md-8 col-lg-3">
        <select name="category_id" class="form-control" id="companycategory-dropdown">
            <option value="">--Select Category--</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
            <option value="other">Other</option>
        </select>
        @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
    </div>

    <!-- Subcategory Dropdown -->
    <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label">Subcategory <span style="color:red;">*</span></label>
    <div class="col-md-8 col-lg-3">
        <select name="subcategory_id" class="form-control" id="companysubcategory-dropdown">
            <option value="">Select Subcategory</option>
            @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}"
                    {{ old('subcategory_id', $job->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->subcategory_name }}
                </option>
            @endforeach
        </select>
        @error('subcategory_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
    </div>
</div>

<!-- Hidden input field for "Other" category -->
<div class="row mb-3">
    <label for="companysubcategory_id" class="col-md-4 col-lg-3 col-form-label"></label>
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
            <label for="skill" class="col-md-4 col-lg-3 col-form-label">Skill  <span style="color:red;">*</span></label>
            <div class="col-md-8 col-lg-9">
            <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="skill" id="quill-editor-area" placeholder="Add skill's here">
                       {{ old('skill', $job->skill ?? '') }}
                    </textarea>
                    @error('skill')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="row mb-3">
            <label for="salary" class="col-md-4 col-lg-3 col-form-label">Salary</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="salary" id="salary" class="form-control" placeholder="add salary" value="{{ old('salary', $job->salary) }}">
                    @error('salary')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="job_end_date" class="col-md-4 col-lg-3 col-form-label">Job Apply End Date</label>
                <div class="col-md-8 col-lg-3">
                    <input type="date" name="job_end_date" id="job_end_date" class="form-control" value="{{ old('job_end_date', $job->job_end_date ? \Carbon\Carbon::parse($job->job_end_date)->format('Y-m-d') : '') }}">
                    @error('job_end_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="job_type" class="col-md-4 col-lg-3 col-form-label">Job Type  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="job_type" id="job_type" class="form-control">
                        <option value=""> -- Select Job Type -- </option>
                        <option value="Full Time" {{ old('job_type', $job->job_type) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                        <option value="Part Time" {{ old('job_type', $job->job_type) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                        <option value="Freelancer" {{ old('job_type', $job->job_type) == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                        <option value="Contract" {{ old('job_type', $job->job_type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                    @error('job_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="job_mode" class="col-md-4 col-lg-3 col-form-label">Job Mode  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="job_mode" id="job_mode" class="form-control">
                        <option value=""> -- Select Job Mode -- </option>
                        <option value="Remote" {{ old('job_mode', $job->job_mode) == 'Remote' ? 'selected' : '' }}>Remote</option>
                        <option value="On-site" {{ old('job_mode', $job->job_mode) == 'On-site' ? 'selected' : '' }}>On-site</option>
                    </select>
                    @error('job_mode')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h5 class="card-title text-center">Company Information</h5>
              <div class="row mb-3">
                    <label for="Company" class="col-md-4 col-lg-3 col-form-label">Company Name  <span style="color:red;">*</span></label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="company"  name="company" placeholder="Your Company Name" value="{{ old('company', $companyProfile->company_name ?? '') }}">
                        @error('company')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                    </div>

                </div>
            <div class="row mb-3">
            <label for="Contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                    <div class="col-md-8 col-lg-3">
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" value="{{ old('contact', $user->phone ?? '') }}">
                        @error('contact')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                    </div>
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
                    @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

            </div>
            <div class="row mb-3">
                <label for="address" class="col-md-4 col-lg-3 col-form-label">Address  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ old('address', $companyProfile->address_one ?? '') }}">
                    @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
                    @error('country')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="state" class="col-md-4 col-lg-3 col-form-label">State  <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="state" class="form-control" id="state-dropdown" value="{{ old('state')}}">
                    <option value="">-- Select State --</option>
                            @foreach ($states as $state)

                            <option value="{{ $state->id }}" {{ ($state->id == $companyProfile->state) ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                    </select>
                    @error('state')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
                    @error('city')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                <div class="col-md-8 col-lg-3">
                <select name="status" id="status" class="form-control">
    <option value="" {{ old('status', $job->status ?? '') == '' ? 'selected' : '' }}>Select Status</option>
    <option value="Active" {{ old('status', $job->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
    <option value="Inactive" {{ old('status', $job->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
    <option value="Pending" {{ old('status', $job->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
</select>
@error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror

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
        @error('upload_document')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
function validateJobTitle() {
        let jobTitleInput = document.getElementById("job_title");
        let charError = document.getElementById("char-error");
        let lengthError = document.getElementById("length-error");
        let regex = /^[-_?!@#$&A-Za-z0-9]+$/; // Allowed characters

        // Check if input contains only allowed characters
        if (!regex.test(jobTitleInput.value)) {
            charError.style.display = "block";
        } else {
            charError.style.display = "none";
        }

        // Check if input exceeds 200 characters
        if (jobTitleInput.value.length > 200) {
            lengthError.style.display = "block";
            jobTitleInput.value = jobTitleInput.value.slice(0, 200); // Trim extra characters
        } else {
            lengthError.style.display = "none";
        }
    }

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
        var subcategory_dropdown = $('#companysubcategory-dropdown');
        subcategory_dropdown.empty();
        subcategory_dropdown.append('<option value="">Select Subcategory</option>');

        if (category_id) {
            $.ajax({
                url: '/get-subcategories/' + category_id,
                type: 'GET',
                success: function(data) {
                    // Append each subcategory to the dropdown
                    $.each(data, function(index, subcategory) {
                        subcategory_dropdown.append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                    });
                    // Always append the "Other" option last
                    subcategory_dropdown.append('<option value="other">Other</option>');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Error fetching subcategories');
                }
            });
        } else {
            // If no category is selected, just add the "Other" option
            subcategory_dropdown.append('<option value="other">Other</option>');
        }
    });

    $('#companysubcategory-dropdown').change(function() {
        var otherSubcategoryInput = $('#other-subcategory-input');
        var otherSubcategoryField = $('#other-subcategory');

        if (this.value === 'other') {
            otherSubcategoryInput.show();
            otherSubcategoryField.focus();
        } else {
            otherSubcategoryInput.hide();
        }
    });
});




    document.getElementById('companycategory-dropdown').addEventListener('change', function () {
        var otherCategoryInput = document.getElementById('other-category-input');
        var otherCategoryField = document.getElementById('other-category');

        if (this.value === 'other') { // Check for "other" instead of ID 22
            otherCategoryInput.style.display = 'block';
            otherCategoryField.focus();
        } else {
            otherCategoryInput.style.display = 'none';
        }
    });
  </script>
  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

