@extends('user.layout.master')
<!--header-->
@section('head')
    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('owl_carousel/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owl_carousel/owl-carousel/owl.theme.css') }}">
@endsection

@section('content')
    <header class="container-fluid">
        <section class="row">
            <div class="col-6 left-header">
            </div>
            <div class="col-6 right-header">
                <div class="into-header col-12">
                    <p id="auto-write"></p>
                    <p id="auto-write-Tourism"></p>
                    @guest
                        <a href="{{ url('/login') }}" class="btn login-btn">Login</a>
                        <a href="{{ url('/signup') }}" class="btn signup-btn">Sign up</a>
                    @endguest
                    @auth
                        {{-- <h3 class='text-white'> Welcome {{Auth::user()->name}}</h3> --}}
                    @endauth
                </div>
            </div>
        </section>
    </header>
    <section>
        <h2 class="container" style="margin-top:50px; margin-bottom: 50px;">Explore Top Destinations</h2>
        {{-- booking modal --}}
        <section class="explore_places">
            <div class="Top-Dests">
                <div class="owl-carousel owl-theme">
                    @foreach ($randomPlaces as $randomPlace)
                        <div class="Top-Dest">
                            <img src="{{ asset("storage/$randomPlace->image") }}" />
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>&nbsp;
                                <span>{{ $randomPlace->start }}:{{ $randomPlace->AddRem1 }} </span> &nbsp;
                                to &nbsp;
                                <span> {{ $randomPlace->close }}:{{ $randomPlace->AddRem2 }}</span>
                            </div>
                            <h5 calss="place-name">{{ $randomPlace->description }}.</h5>
                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Type:
                                </span>{{ $randomPlace->type }}
                            </h6>
                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Location:
                                </span>{{ $randomPlace->location }}
                            </h6>

                            {{-- booking --}}
                            @auth
                                <div class="booking w-10 text-end">
                                    <a href="{{ url("/BookNow/$randomPlace->id") }}" name="book"
                                        class="py-2 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            @endauth
                            @guest
                                <div class="booking " tabindex="0" data-bs-toggle="tooltip"
                                    title="you should have an account to booking">
                                    <button name="book" class="py-2 btn book-btn" disabled>BOOK NOW <i
                                            class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            @endguest

                            <h5 class="py-3">
                                <span class="price">{{ $randomPlace->Price }}$</span> per person
                            </h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </section>

    <section>
        <h2 class="container" style="margin-top:50px">For You</h2>

        <div class="Top-Dests container-fluid justify-content-center">
            <div class="row justify-content-between">
                @foreach ($lasttours as $lasttour)
                    <div class="Top-Dest col-3" style="width: 24%;">

                        <img style="width:100%" src="{{ asset("storage/$lasttour->image") }}" />
                        <div class="time">
                            {{-- <i class="fa-regular fa-clock"></i> <span>{{$lasttour->start}}</span> to <span>22:30</span> --}}
                            <span>{{ $lasttour->start }}:{{ $lasttour->AddRem1 }} </span> &nbsp;
                            to &nbsp;
                            <span> {{ $lasttour->close }}:{{ $lasttour->AddRem2 }}</span>
                        </div>
                        <h5 calss="place-name">{{ $lasttour->description }}</h5>

                        <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> {{ $lasttour->type }}</h6>
                        <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span>{{ $lasttour->location }}
                        </h6>

 {{-- booking --}}
 @auth
 <div class="booking w-10 text-end">
     <a href="{{ url("/BookNow/$randomPlace->id") }}" name="book"
         class="py-2 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
 </div>
@endauth
@guest
 <div class="booking " tabindex="0" data-bs-toggle="tooltip"
     title="you should have an account to booking">
     <button name="book" class="py-2 btn book-btn" disabled>BOOK NOW <i
             class="fa-solid fa-arrow-right"></i></button>
 </div>
@endguest
  {{-- <div class="booking " tabindex="0" data-bs-toggle="tooltip"
                            title="you should have an account to booking">
                            <a href="{{ url('/BookNow') }}" name="book" class="py-2 btn book-btn">BOOK NOW <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div> --}}

                        <h5 class="py-3">
                            <span class="price">{{ $lasttour->Price }}</span> $ per person
                        </h5>
                    </div>


                    @endforeach
</div>
        </div>

    </section>
@endsection

@section('script')
    <script src="{{ asset('user/js/home.js') }}"></script>

    <script src="{{ asset('owl_carousel/owl-carousel/owl.carousel.js') }}"></script>

    {{-- owl carousel --}}
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();
        });

        $(".owl-carousel").owlCarousel({

            // default
            //Basic Speeds
            slideSpeed: 200,
            paginationSpeed: 800,

            //Autoplay
            autoPlay: true,
            goToFirst: true,
            goToFirstSpeed: 1000,

            // Navigation
            navigation: false,
            navigationText: ["prev", "next"],
            pagination: true,
            paginationNumbers: false,

            // Responsive
            responsive: true,
            items: 4,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [980, 3],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1]

        })
    </script>
@endsection
