@include('home.includes.head')
@include('home.includes.navbar')
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position: absolute;
        display: none;
    }
    .rate:not(:checked) > label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .star-rating-complete {
        color: #c59b08;
    }
    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }
    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }
</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ $companypro->company_name }}</h1>
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
                                                <img
                                                    src="{{ $companypro->company_logo ? url('upload/company_documents/'.$companypro->company_logo) : url('upload/download.png') }}"
                                                    alt="Company Logo"
                                                    class="img-fluid mb-3"
                                                    style="max-width: 250px; border-radius: 5px; max-height: 250px;"
                                                >
                                                <hr class="my-3" style="border-top: 2px solid #ddd; width: 80%; margin: 0 auto;">
                                                <h5 class="card-title text-dark mt-3"><strong>{{ $companypro->company_name }}</strong> </h5>
                                                <!-- Display Average Rating -->
                                                 <div class="average-rating mt-2">
                                                 <div class="rated">
    @php
        $averageRating = $companypro->reviews()->where('status', 'active')->avg('star_rating');
        $totalComments = $companypro->reviews()->where('status', 'active')->count();
    @endphp

    @if($averageRating)
        <span>{{ number_format($averageRating, 1) }}</span>
        @for ($i = 1; $i <= 5; $i++)
            <label class="star-rating-complete" style="font-size:20px; color: {{ $i <= $averageRating ? 'gold' : '#ddd' }};">&#9733;</label>
        @endfor
        <span>
            <a href="#" class="view-comments" data-id="{{ $companypro->id }}" data-toggle="modal" data-target="#commentsModal">
                {{ $totalComments }} {{ __('messages.Reviews') }}
            </a>
        </span>
    @else
        <span>   <a href="#" class="btn btn-primary fs-4" data-toggle="modal" data-target="#reviewModal"> <i class="fas fa-pencil-alt"></i> {{ __('messages.Add Reviews') }}</a></span>
    @endif
</div>




                                                </div>
                                            </div>
                                            <!--End Display Average Rating -->
                                        </div>
                                 <!------------Address------------->
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>{{ __('messages.Address') }}</strong> <br>
                                            {{ $companypro->address_one }} <br><br>{{ $companypro->cities->name }},
                                            {{ $companypro->states->name }} ,
                                            {{ $companypro->countries->name }}
                                        </p>
                                    </div>
                                </div>
                                <!----------End Address------>
                                 <!------------Services------------->
                                 @if(!empty($companypro->services))
                                 <div class="card text-center" style="width: 100%; max-width: 400px; margin: 20px auto; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                    <div class="card-body">
                                        <p class="card-text mt-3" style="font-size: 16px; color: #555;">
                                            <strong>{{ __('messages.Services/Expertise') }}</strong>
                                        </p>
                                        <p>{!! $companypro->services !!}</p>
                                    </div>
                                </div>
                                @endif
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
                                        <p>{{ strip_tags($companypro->about_company) }}</p>
                                        </div>

                                        <!-- Contact Form -->
                                        <div class="p-4 border rounded company-form position-relative">
                                             <!----loader----------->
                                        <div id="formLoader" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white" style="opacity: 0.7;">
                                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                                <span class="visually-hidden">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                        </div>
                                            <!----end loader---->
                                        <form action="{{ route('send.email') }}" method="POST" id="contactForm" class="row g-3 needs-validation">
                                            @csrf
                                            <h5 class="fw-normal mb-3 pb-3 text-center text-dark" style="letter-spacing: 1px;"><strong>{{ __('messages.Send a Business Inquiry') }}</strong> </h5>

                                            <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <input type="hidden" name="form_type" value="business">
                                                <input type="hidden" name="company_id" value="{{ $companypro->id }}">
                                                <div class="form-group">
                                                    <label for="cbxname" class="form-label">{{ __('messages.Name') }} <span style="color: red">*</span></label>
                                                    <input type="text" name="name" id="cbxname" placeholder="{{ GoogleTranslate::trans('Your Full Name', app()->getLocale()) }}" class="form-control fs-4">
                                                </div>
                                                @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="cbxphone" class="form-label">{{ __('messages.Phone') }} <span style="color: red">*</span></label>
                                                    <input type="text" name="phone" id="cbxphone" placeholder="{{ GoogleTranslate::trans('Your Phone', app()->getLocale()) }}" class="form-control fs-4">
                                                </div>
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxemail" class="form-label">{{ __('messages.Email') }} <span style="color: red">*</span></label>
                                                    <input type="email" name="to" id="cbxemail" placeholder="{{ GoogleTranslate::trans('Your Email', app()->getLocale()) }}"class="form-control fs-4">
                                                </div>
                                                @error('to')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxsubject" class="form-label">{{ __('messages.Subject') }}</label>
                                                    <input type="text" name="subject" id="cbxsubject" placeholder="{{ GoogleTranslate::trans('Subject', app()->getLocale()) }}" class="form-control fs-4">
                                                    @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cbxmessage" class="form-label">{{ __('messages.Message') }}</label>
                                                    <textarea name="message" id="cbxmessage" rows="10" cols="80" placeholder="{{ GoogleTranslate::trans('Your Message', app()->getLocale()) }}" class="form-control fs-4" style="height: 120px;"></textarea>
                                                    @error('message')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary send-btn fs-4" type="submit">{{ __('messages.Send') }}</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- <div class="card-footer text-center bg-transparent">
                        <a href="{{ route('home.directory') }}" class="btn btn-secondary send-btn">Back</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-------------Add review------------->
    <!-- Add Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">{{ __('messages.Add Review') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('review.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="company_id" value="{{ $companypro->id }}">

                    @if(Auth::check())
                        <div class="form-group">
                            <label>{{ __('messages.Rating') }}</label>
                            <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5"/><label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4"/><label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3"/><label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2"/><label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1"/><label for="star1">&#9733;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.Comment') }}</label>
                            <textarea class="form-control" name="comment" rows="4" placeholder="Write your review" maxlength="200"></textarea>
                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div class="form-group">
                            <label for="name">{{ __('messages.Name') }} <span style="color: red">*</span></label>
                            <input type="text" name="rating_name" id="name" class="form-control">
                            @error('rating_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('messages.Email') }} <span style="color: red">*</span></label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contact">{{ __('messages.Contact') }} <span style="color: red">*</span></label>
                            <input type="text" name="contact" id="contact" class="form-control">
                            @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label></label>
                            <div class="rate">
                                <input type="radio" id="star5_guest" name="rating" value="5"/><label for="star5_guest">&#9733;</label>
                                <input type="radio" id="star4_guest" name="rating" value="4"/><label for="star4_guest">&#9733;</label>
                                <input type="radio" id="star3_guest" name="rating" value="3"/><label for="star3_guest">&#9733;</label>
                                <input type="radio" id="star2_guest" name="rating" value="2"/><label for="star2_guest">&#9733;</label>
                                <input type="radio" id="star1_guest" name="rating" value="1"/><label for="star1_guest">&#9733;</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.Comment') }}</label>
                            <textarea class="form-control" name="comment" rows="4" placeholder="Write your review" maxlength="200"></textarea>
                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary fs-4">{{ __('messages.Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--------------add review end------------>
<!-- Comments Modal -->
<div class="modal fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="commentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-5 mx-auto" role="document">
        <div class="modal-content ms-2 me-1"> <!-- Added ms-2 and me-1 -->
            <div class="modal-header ms-2 me-1">
                <h4 class="modal-title" id="commentsModalLabel">
                {{ $companypro->company_name }}
                </h4>
                <div class="d-flex justify-content-end align-items-center mt-3">
                    <a href="#" class="btn btn-primary me-3 fs-4" data-toggle="modal" data-target="#reviewModal">
                        <i class="fas fa-pencil-alt"></i> {{ __('messages.Add Review') }}
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body ms-2 me-1">
                 <!-- Company Address -->
                <p class="text-muted">
                {{ $companypro->address_one }}, {{ $companypro->cities->name }},
                    {{ $companypro->states->name }}, {{ $companypro->countries->name }}
                </p>
                  <!-- Star Rating & Reviews Count -->
                <div class="d-flex align-items-center ms-2 me-1">
                    @php
                        $averageRating = $companypro->reviews()->where('status', 'active')->avg('star_rating');
                        $totalComments = $companypro->reviews()->where('status', 'active')->count();
                    @endphp

                    <span class="font-weight-bold mr-2" style="font-size: 24px;">
                        {{ number_format($averageRating, 1) }}
                    </span>

                    @for ($i = 1; $i <= 5; $i++)
                        <label class="star-rating" style="font-size: 22px; color: {{ $i <= $averageRating ? 'gold' : '#ddd' }};">&#9733;</label>
                    @endfor

                    <span class="ml-2">
                        <a href="#" class="view-comments" data-id="{{ $companypro->id }}" data-toggle="modal" data-target="#commentsModal">
                            {{ $totalComments }} {{ __('messages.Reviews') }}
                        </a>
                    </span>
                </div>
                  <!-- Reviews List -->
                <div class="mt-4 ms-0 me-1">
                    @foreach($companypro->reviews()->where('status', 'active')->latest()->get() as $review)
                        <div class="card mb-3 ms-2 me-1">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="ml-2">
                                        <h5 class="mb-0">{{ $review->rating_name }}</h5>
                                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="star-rating" style="font-size:18px; color: {{ $i <= $review->star_rating ? 'gold' : '#ddd' }};">&#9733;</label>
                                    @endfor
                                </div>

                                <p class="mt-2">{{ $review->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Comments Modal -->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    $(document).ready(function() {
        $('.view-comments').on('click', function() {
            var companyId = $(this).data('id');
            $.ajax({
                url: '/comments/' + companyId,
                method: 'GET',
                success: function(data) {
                    $('#commentsContent').html(data.html);
                },
                error: function() {
                    $('#commentsContent').html('<p>Error loading comments.</p>');
                }
            });
        });
    });

    $(document).ready(function () {

    $('[data-target="#reviewModal"]').on('click', function () {
        $('#commentsModal').modal('hide');
    });
});
</script>


@include('home.includes.footer')

