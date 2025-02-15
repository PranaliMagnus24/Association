@include('home.includes.head')
@include('home.includes.navbar')
<style>

.single-upcoming-event {
    position: relative;
}

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
    top: -12px;
    right: -12px;
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



/* Responsive adjustments for smaller screens */
@media screen and (max-width: 1200px) {
    .ribbon {
        width: 120px;
        height: 120px;
    }

    .ribbon span {
        width: 180px;
        padding: 10px 0;
        font-size: 16px; /* Adjust font size */
    }

    .ribbon-top-right span {
        left: -20px;
        top: 25px;
        transform: rotate(45deg);
    }
}

@media screen and (max-width: 768px) {
    .ribbon {
        width: 100px;
        height: 100px;
    }

    .ribbon span {
        width: 150px;
        padding: 8px 0;
        font-size: 14px; /* Adjust font size */
    }

    .ribbon-top-right span {
        left: -15px;
        top: 20px;
        transform: rotate(45deg);
    }
}

@media screen and (max-width: 480px) {
    .ribbon {
        width: 80px;
        height: 80px;
    }

    .ribbon span {
        width: 120px;
        padding: 6px 0;
        font-size: 12px; /* Adjust font size */
    }

    .ribbon-top-right span {
        left: -10px;
        top: 15px;
        transform: rotate(45deg);
    }
}


</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ __('messages.Events') }}</h1>
                        <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                        </p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>


<!--=========================-->
        <!--=          Event        =-->
        <!--=========================-->
        <section id="page-content-wrap">
        @php
    $events = App\Models\Event::all();
    @endphp
            <div class="event-page-content-wrap section-padding">
                <div class="container">
                   {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="event-filter-area">
                                <form action="index.html" class="form-inline d-flex">
                                    <select name="year" id="year">
                                        <option selected>Year</option>
                                        <option>2018</option>
                                        <option>2017</option>
                                        <option>2016</option>
                                        <option>2015</option>
                                        <option>2014</option>
                                    </select>

                                    <select name="place" id="place">
                                        <option selected>Place</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Colorado</option>
                                        <option>Delaware</option>
                                    </select>

                                    <select name="type" id="type">
                                        <option selected>Type</option>
                                        <option>Meetup</option>
                                        <option>Seminar</option>
                                        <option>Get Together</option>
                                    </select>

                                    <button class="btn btn-brand">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>--}}

                    <div class="row">
    <div class="col-lg-12">
        <div class="all-event-list">
        @if($events->isEmpty())
                <h2 class="text-center font-weight-bold">{{ __('messages.Coming Soon') }}</h2>
            @else
            @foreach($events as $event)
                <!-- Single Event Start -->
                <div class="single-upcoming-event position-relative">
                    <!-- Ribbon positioned top-right of the event -->
                    <div class="ribbon ribbon-top-right {{ $event->type == 'Free' ? 'ribbon-free' : 'ribbon-paid' }}">
                    <span>{{ ucfirst($event->type) }}</span>

                    </div>
                     <!-- End Ribbon positioned top-right of the event -->

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="up-event-thumb">
                                <img src="{{ $event->upload ? url('upload/events/'.$event->upload) : url('upload/download.png') }}"  class="img-fluid d-block mx-auto" style="width: 460px; height: 256px; object-fit: cover;" alt="Upcoming Event">
                                <h4 class="up-event-date">
                                    It’s {{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('d F Y') }}
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="up-event-text">
                                        <div class="event-countdown">
                                            <div class="event-countdown-counter" data-date="{{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('Y/m/d H:i:s') }}">
                                                <span class="countdown-text">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                            <p>{{ __('messages.Remaining') }}</p>
                                        </div>

                                        <h3><a href="single-event.html">{{ $event->title }}</a></h3>
                                        <p>{!! \Illuminate\Support\Str::limit($event->introduction, 200) !!}</p>

                                        <a href="{{ route('eventdetails', $event->id) }}"  class="btn btn-brand btn-brand-dark">{{ __('messages.View Details') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Event End -->
            @endforeach
            @endif
        </div>
    </div>
</div>





                    <!-- Pagination Start -->
                   {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination-wrap text-center">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">50</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>--}}
                    <!-- Pagination End -->
                </div>
            </div>
        </section>





         @include('home.includes.footer')
