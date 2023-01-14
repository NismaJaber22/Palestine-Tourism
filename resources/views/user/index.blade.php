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
        <h2 class="container" style="font-weight:700; margin-top:50px; margin-bottom: 50px; ">Explore Top Destinations</h2>
        {{-- booking modal --}}
        <section class="explore_places">
            <div class="Top-Dests">
                <div class="owl-carousel owl-theme">
                    @foreach ($randomPlaces as $randomPlace)
                        <div class="Top-Dest">
                            <img src="{{ asset("storage/$randomPlace->image") }}" />
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>&nbsp;
                                <span>{{ $randomPlace->start }}:{{ $randomPlace->AddRem1 }}AM</span> &nbsp;
                                to &nbsp;
                                <span> {{ $randomPlace->close }}:{{ $randomPlace->AddRem2 }}BM</span>
                            </div>
                            <h5 calss="place-name">{{ $randomPlace->name }}.</h5>
                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Type:
                                </span>{{ $randomPlace->type }}
                            </h6>
                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Location:
                                </span>{{ $randomPlace->cities->cityName }}
                            </h6>

                            {{-- booking --}}
                            <div class="booking w-10 text-end">
                                <a href="{{ url("/BookNow/$randomPlace->id") }}" name="book"
                                    class="py-2 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
                            </div>

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
        <h2 class="container" style="margin-top:50px; font-weight:700;">For You</h2>
        <div class="Top-Dests justify-content-center">
            <div class="container-fluid">
                <div class="row justify-content-between">

                    @foreach ($lasttours as $lasttour)
                        <div class="col-3">
                            <div class="Top-Dest">
                                <img style="width:100%" src="{{ asset("storage/$lasttour->image") }}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i>&nbsp;
                                    <span>{{ $lasttour->start }}:{{ $lasttour->AddRem1 }}AM</span> &nbsp;
                                    to &nbsp;
                                    <span> {{ $lasttour->close }}:{{ $lasttour->AddRem2 }}BM</span>
                                </div>
                                <h5 calss="place-name">{{ $lasttour->name }}</h5>

                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> {{ $lasttour->type }}
                                </h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location:
                                    </span>{{ $lasttour->cities->cityName }}
                                </h6>

                                {{-- booking --}}
                                <div class="booking w-10 text-end">
                                    <a href="{{ url("/BookNow/$lasttour->id") }}" name="book"
                                        class="py-2 btn book-btn">BOOK
                                        NOW <i class="fa-solid fa-arrow-right"></i></a>
                                </div>

                                {{-- <div class="booking " tabindex="0" data-bs-toggle="tooltip"
                            title="you should have an account to booking">
                            <a href="{{ url('/BookNow') }}" name="book" class="py-2 btn book-btn">BOOK NOW <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div> --}}
                                <h5 class="py-3">
                                    <span class="price">{{ $lasttour->Price }}</span> $ per person
                                </h5>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    {{-- ***---/*****-*-*-*-*-*------------------------ --}}
    <section class="reviews my-5">
        <div class="Top-Reviwes py-5">
            <div class="container">
                <h2>our happy clients</h2>
                <div class="Top-Rev">
                    <div class="owl-carousel owl-theme">
                        @foreach ($reviews as $reviews)
                            <div class="Top-Rev-item text-center">
                                @if ($reviews->user->image != null)
                                    <img src="{{ asset('storage/' . $reviews->user->image) }}" alt="user img" />
                                @else
                                    <img src="{{ asset('user/images/avatar.PNG') }}" alt="user img" />
                                @endif

                                <h6>{{ $reviews->user->userfname }} {{ $reviews->user->userlname }}</h6>

                                <div class="quote">
                                    <i class="fas fa-quote-left"></i>
                                    <span>
                                        <textarea class="text text-center" disabled>{{ $reviews->opinion }}</textarea>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- {{$reviews}} --}}
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
