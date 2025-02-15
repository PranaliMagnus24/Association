<!--==========================-->
        <!--=         Banner         =-->
        <!--==========================-->
        <section id="slider-area">
            <div class="slider-active-wrap owl-carousel text-center text-md-start">

                <div class="single-slide-wrap slide-bg-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <div class="content">
                                        <h1 class="slider-title">{{ __('messages.Muslim') }} <br>{{ __('messages.Industralists') }} <span>{{ __('messages.And') }} </span> <br>{{ __('messages.Merchants') }} <br>{{ __('messages.Association') }}

                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="single-slide-wrap slide-bg-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                <div class="content">
                                <h1 class="slider-title">{{ __('messages.Muslim') }} <br>{{ __('messages.Industralists') }} <span>{{ __('messages.And') }} </span> <br>{{ __('messages.Merchants') }} <br>{{ __('messages.Association') }}

                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slide-wrap slide-bg-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                <div class="content">
                                <h1 class="slider-title">{{ __('messages.Muslim') }} <br>{{ __('messages.Industralists') }} <span>{{ __('messages.And') }} </span> <br>{{ __('messages.Merchants') }} <br>{{ __('messages.Association') }}

                                        <div class="aurora">
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                            <div class="aurora__item"></div>
                                        </div>
                                    </h1>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="social-networks-icon">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i> <span>7.2k Likes</span></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> <span>3.2m Followers</span></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i> <span>7.2k Likes</span></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i> <span>2.2k Subscribers</span></a></li>
                </ul>
            </div> -->

        </section>
 <!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        @if ($upcomingEvents->isNotEmpty())
<section id="upcoming-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="upcoming-event-wrap">
                    <div class="up-event-titile">
                        <h3>{{ __('messages.Upcoming Events:') }}</h3>
                    </div>
                    <div class="upcoming-event-content owl-carousel">
                        @foreach ($upcomingEvents as $event)
                        <div class="single-upcoming-event">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="up-event-thumb">
                                        <img src="{{ $event->upload ? url('upload/events/'.$event->upload) : url('upload/download.png') }}" class="img-fluid d-block mx-auto" style="width: 460px; height: 256px; object-fit: cover;" alt="Upcoming Event">
                                        <h4 class="up-event-date">
                                         It’s' {{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('d F Y') }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="up-event-text">
                                                <div class="event-countdown">
                                                    <div class="event-countdown-counter" data-date="{{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('Y/m/d H:i:s') }}">
                                                        <span class="countdown-text"> {{ __('messages.Loading') }}...</span>
                                                    </div>
                                                    <p>{{ __('messages.Remaining') }}</p>
                                                </div>
                                                <h3><a href="single-event.html">{{ $event->title }}</a></h3>
                                                <p>{!! \Illuminate\Support\Str::limit($event->introduction, 200) !!}</p>

                                                <a href="{{ route('eventdetails', $event->id) }}" class="btn btn-brand btn-brand-dark">{{ __('messages.join with us') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
