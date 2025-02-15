@include('home.includes.head')
@include('home.includes.navbar')
<style>
    .event-details {
    font-size: 1em;
    font-weight: normal;
    color: #333;
    text-align: center;
    background-color:#f8f9fa;
}

.event-details span {
    margin-right: 15px; /* Space between each element */
}

.event-details strong {
    font-weight: bold; /* Bold labels for clarity */
}



</style>
<section id="page-title-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 m-auto text-center">
                     <div class="page-title-content">
                        <h1 class="h2">{{ $event->title }}</h1>
                     </div>
                  </div>
               </div>
            </div>
         </section>


      <!--=          Event        =-->
        <!--=========================-->
        <section id="page-content-wrap">
            <div class="single-event-page-content section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-event-details">
                                <div class="event-thumbnails">
                                    <div class="event-thumbnail-carousel owl-carousel">
                                    <div class="event-thumb-item event-thumb-img-1" style="background-image: url('{{ $event->upload ? url('upload/events/'.$event->upload) : 'upload/No-Image.png' }}'); min-height: 500px; max-height: 500px; background-size: cover; background-position: center; position: relative;
  z-index: 1;">
                                            <div class="event-meta">
                                                <h3>{{ $event->title }}</h3>
                                                @if(!empty($event->event_address))
                                                <a class="event-address" href="#">
                                                    <i class="fa fa-map-marker"></i>{{ $event->event_address }}
                                                </a>

                                                 @endif
                                                 <!-- Event Type (capitalized, bold, and with dynamic color) -->
                                                  <span class="event-type" style="color: {{ $event->type == 'Free' ? 'green' : ($event->type == 'Paid' ? 'red' : 'black') }}; font-weight: bold;">
                                                  {{ strtoupper($event->type ?? '') }}


                                                </span>
                                                <a href="{{route('eventregister',$event->id)}}" class="btn btn-brand btn-join">{{ __('messages.Join') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-countdown">
                                            <div class="event-countdown-counter" data-date="{{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('Y/m/d H:i:s') }}">
                                                <span class="countdown-text">{{ __('messages.Loading') }} ...</span>
                                            </div>
                                            <p>{{ __('messages.Remaining') }}</p>
                                        </div>
                                </div>
                                <div class="mt-3">
                                    <div class="event-details">
                                        <span><strong>{{ __('messages.Event Start Day') }}:</strong> {{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('d F Y') }}</span> |
                                        <span><strong>{{ __('messages.Start Time') }} :</strong> {{ \Carbon\Carbon::parse($event->eventstartdatetime)->format('h:i A') }}</span> |
                                        <span><strong>{{ __('messages.Event End Day') }} :</strong> {{ \Carbon\Carbon::parse($event->eventenddatetime)->format('d F Y') }}</span> |
                                        <span><strong>{{ __('messages.End Time') }} :</strong> {{ \Carbon\Carbon::parse($event->eventenddatetime)->format('h:i A') }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 text-left">
    <h2>{{ __('messages.Introduction') }}</h2>
    {!! $event->introduction !!}
</div>

<div class="mt-3 text-left">
    <h2>{{ __('messages.All Details About This Event') }}</h2>
    {!! $event->description !!}
</div>


                                <div class="event-schedul">
                                    <h3>{{ __('messages.Event Schedule') }}</h3>

                                  {{--  <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="accordion cbx-acacordion" id="cbx-event-accordion">
                                            <div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
												<button class="accordion-button" type="button" data-bs-toggle="collapse"
														data-bs-target="#collapseOne" aria-expanded="false"
														aria-controls="collapseOne">
													<span class="event-time">8am - 10am</span> Grand Opening Speech of
													Our Event And Re Introductory episode
												</button>
											</h2>
											<div id="collapseOne" class="accordion-collapse collapse show"
												 aria-labelledby="headingOne" data-bs-parent="#cbx-event-accordion">
												<div class="accordion-body">
													<p>Anim pariatur cliche reprehenderit, enim eiusmod high life
														accusamus terry richardson ad squid. 3 wolf moon officia aute,
														non cupidatat skateboard dolor brunch. Food truck quinoa
														nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
														put a bird on it squid single-origin coffee nulla assumenda
														shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
														wes anderson cred nesciunt sapiente ea proident.</p>
													<p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
														beer farm-to-table, raw denim aesthetic synth nesciunt you
														probably haven't heard of them accusamus labore sustainable
														VHS.</p>
													<h4 class="speaker-name"><strong>Speaker:</strong> Adam Watshon,
														<span class="speaker-deg">Crish Joshef</span></h4>
												</div>
											</div>
										</div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@include('home.includes.footer')

