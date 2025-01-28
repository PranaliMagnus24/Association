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
            {{ $companyProfile->company_name }} Job Post
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
            <h5 class="card-title">Job Details</h5>
            <div class="row mb-3">
<div class="col">
<p><strong>Job Title:</strong> <br>{{$job->job_title}}</p>
</div>
<div class="col">
<p><strong>Job Description:</strong> {!! $job->job_desc !!}</p>
</div>
<div class="col">
<p><strong>Category:</strong> <br>{{$job->category->category_name}}</p>
</div>
<div class="col">
<p><strong>SubCategory:</strong> <br>{{$job->subcategory->subcategory_name}}</p>
</div>
            </div>





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
