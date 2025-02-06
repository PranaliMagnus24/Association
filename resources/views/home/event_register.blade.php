@include('home.includes.head')
@include('home.includes.navbar')
<style>
/* Ribbon container */
.ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
}

/* Before and After for the diagonal cuts on the ribbon */
.ribbon::before,
.ribbon::after {
    position: absolute;
    content: '';
    display: block;
    border: 5px solid transparent;
}

.ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    color: #fff;
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center;
}

/* Green background for free events */
.ribbon-free span {
    background-color: green !important;
}

/* Red background for paid events */
.ribbon-paid span {
    background-color: red !important;
}

/* Positioning ribbon top-right of the event container */
.ribbon-top-right {
    top: -23px;
    right: -16px;
}

.ribbon-top-right::before,
.ribbon-top-right::after {
    border-top-color: transparent;
    border-right-color: transparent;
}

.ribbon-top-right::before {
    top: 0;
    left: 0;
}

.ribbon-top-right::after {
    bottom: 0;
    right: 0;
}

.ribbon-top-right span {
    left: -25px;
    top: 30px;
    transform: rotate(45deg);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    /* Adjust ribbon size for smaller screens */
    .ribbon {
        width: 120px;
        height: 120px;
    }

    .ribbon span {
        width: 180px;
        font-size: 16px;
        padding: 12px 0;
    }

    .ribbon-top-right {
        top: -15px;
        right: -10px;
    }

    .ribbon-top-right span {
        left: -20px;
        top: 25px;
        transform: rotate(45deg);
    }
}

@media (max-width: 480px) {
    /* Further adjustments for very small screens */
    .ribbon {
        width: 100px;
        height: 100px;
    }

    .ribbon span {
        width: 160px;
        font-size: 14px;
        padding: 10px 0;
    }

    .ribbon-top-right {
        top: -10px;
        right: -5px;
    }

    .ribbon-top-right span {
        left: -15px;
        top: 20px;
        transform: rotate(45deg);
    }
}




</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">Event Register</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <section class="job-details section-padding mt-0">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card Container without borders -->
                <div class="card mb-3 border-0">
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Side: Company Details -->
                            <div class="col-lg-6 mb-4">
                                <div class="card mb-3 border-0">
                                    <div class="card-body">
                                        <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                            <div class="card-body">
                                            <div class="ribbon ribbon-top-right {{ $event->type == 'Free' ? 'ribbon-free' : 'ribbon-paid' }}">
                                                <span>{{ ucfirst($event->type) }}</span>
                                            </div>
                                                <img
                                                    src="{{ $event->upload ? url('upload/events/'.$event->upload) : url('upload/download.png') }}"
                                                    alt="Company Logo"
                                                    class="img-fluid mb-3 mt-5"
                                                    style="max-width: 250px; border-radius: 5px; max-height: 250px;"
                                                >
                                                <hr class="my-3" style="border-top: 2px solid #ddd; width: 80%; margin: 0 auto;">
                                                <h5 class="card-title text-dark mt-3"><strong>{{ $event->title }}</strong> </h5>
                                            </div>
                                        </div>
                                 <!------------Address------------->
                                 @if(!empty($event->event_address))
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">

                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>Venue</strong> <br>
                                            {{ $event->event_address }}
                                        </p>

                                        @if($event->type === 'Paid')
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>Event Amount</strong> <br>
                                            {{ $event->event_amount }} Rs
                                        </p>
                                        @else
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">

                                            Free
                                        </p>
                                        @endif



                                    </div>
                                </div>
                                @endif
                                <!----------End Address------>
                                 <!------------Services------------->
                                 {{--@if(!empty($event->services))
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>Services/Expertise</strong> <br>
                                            <p>{{ $event->services }}</p>
                                        </p>
                                    </div>
                                </div>
                                @endif--}}
                                <!----------End services------>

                            </div>
                        </div>
                    </div>

                            <!-- Right Side: Inquiry Form -->
                            <div class="col-lg-6 m-auto">
                                <div class="card mb-3 border-0">
                                    <div class="card-body">
                                        <!-- About Company -->
                                        <div class="mt-4">
                                       {{-- <p>{{ strip_tags($event->about_company) }}</p>--}}
                                        </div>

                                        <!-- Contact Form -->
                                        <div class="p-4 border rounded company-form">
                                            <!----loader----------->
                                        <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.7;">
                                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                            <!----end loader---->
                                        <form action="{{route('eventstore')}}" method="POST" id="eventForm" class="row g-3 needs-validation">
                                            @csrf
                                            <h5 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;"><strong>Event Register</strong> </h5>

                                            <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <input type="hidden" name="form_type" value="event_form">
                                                <div class="form-group">
                                                    <label for="cbxname" class="form-label">Name <span style="color: red">*</span></label>
                                                    <input type="text" name="name" id="cbxname" placeholder="Your Full Name" class="form-control fs-4">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxphone" class="form-label">Phone <span style="color: red">*</span></label>
                                                    <input type="text" name="phone" id="cbxphone" placeholder="Your Phone" class="form-control fs-4">
                                                </div>
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxemail" class="form-label">Email <span style="color: red">*</span></label>
                                                    <input type="email" name="email" id="cbxemail" placeholder="Your Email" class="form-control fs-4">
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxcountry" class="form-label">Country</label>
                                                    <select name="country" id="country-dropdown" class="form-select" aria-label="Default select example" value="{{ old('country') }}">
                                                        <option value="">-- Select Country --</option>
                                                        @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" {{ $country->id == 101 ? 'selected' : '' }}>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxstate" class="form-label">State</label>
                                                    <select name="state" id="state-dropdown" class="form-select" aria-label="Default select example" value="{{ old('state')}}">
                                                        <option selected>Select State</option>
                                                        <option value=""></option>
                                                    </select>
                                                    @error('state')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxcity" class="form-label">City</label>
                                                    <select name="city" id="city-dropdown" class="form-select" aria-label="Default select example" value="{{ old('city')}}">
                                                        <option selected>Select City</option>
                                                        <option value=""></option>
                                                    </select>
                                                    @error('city')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary send-btn fs-4" type="submit">Send</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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



 //Apply Job



    document.getElementById('eventForm').addEventListener('submit', function (e) {
        e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const errorMessages = document.querySelectorAll('.text-danger');
    errorMessages.forEach(error => error.remove());

    let isValid = true;

    // Validate Name field
    const name = document.getElementById('cbxname');
    if (!name.value.trim()) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Name is required.';
        name.parentElement.appendChild(error);
    }

    // Validate Phone field
    const phone = document.getElementById('cbxphone');
    if (!phone.value.trim() || phone.value.length !== 10) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Phone number is required.';
        phone.parentElement.appendChild(error);
    }

    // Validate Email field
    const email = document.getElementById('cbxemail');
    if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
        isValid = false;
        const error = document.createElement('span');
        error.classList.add('text-danger');
        error.innerText = 'Email is required.';
        email.parentElement.appendChild(error);
    }



    // If form is valid, proceed with the AJAX request
    if (isValid) {
        // Show Loader
        document.getElementById('formLoader').classList.remove("d-none");

        fetch("/event-store", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: formData,
        })
        .then((response) => {
            // Debugging the response
            console.log('Response:', response);
            return response.json();
        })
        .then((data) => {
            console.log('Data:', data); // Check the response data

            if (data.success) {
                swal({
                    title: "Success!",
                    text: data.message,
                    icon: "success",
                    button: "OK",
                }).then(() => {
                    form.reset();
                });
            } else {
                swal({
                    title: "Error!",
                    text: data.message,
                    icon: "error",
                    button: "OK",
                });
            }
        })
        .catch((error) => {
            console.log('Error:', error); // Log the error if any

            swal({
                title: "Error!",
                text: "Something went wrong. Please try again.",
                icon: "error",
                button: "OK",
            });
        })
        .finally(() => {
            // Hide Loader
            document.getElementById('formLoader').classList.add("d-none");
        });
    }
});
</script>
@include('home.includes.footer')

