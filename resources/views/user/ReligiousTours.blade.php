@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Tours.css') }}">
    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('owl_carousel/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owl_carousel/owl-carousel/owl.theme.css') }}">
@endsection

@section('content')
    <div class="conta">
        <div class="Dash-div">
            <div class="card text-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link dash-link active" aria-current="page"
                            href="{{ url('ReligiousTours') }}">Religious</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dash-link " href="{{ url('CulturalTours') }}">Cultural</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link " href="{{ url('LeisureTours') }}">Leisure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link " href="{{ url('MedicalTours') }}">Medical</a>
                    </li>
                </ul>

                {{-- search toures --}}
                <div>
                    <div class="search-city">
                        <h4 class="text-capitalize ps-3" style="display:inline-block ;">Search with city</h4>

                        <form method="get" action="{{ url('Religioussearch') }}" role="search">

                            <input type="text" placeholder="Search.." name="search"
                                value="{{ Request::get('Religioussearch') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>

                        </form>


                    </div>
                </div>


                <section>
                    <div class="Top-Dests">
                        {{-- <div class="row" style="justify-content: space-between;"> --}}
                        <div class="owl-carousel owl-theme">
                            @if ($places->isNotEmpty())
                                @foreach ($places as $place)
                                    @if ($place->type == 'Religious')
                                        <div class="Top-Dest">
                                            <img src="{{ asset("storage/$place->image") }}" />
                                            <div class="time">
                                                <i class="fa-regular fa-clock"></i>&nbsp;
                                                <span>{{ $place->start }}:{{ $place->AddRem1 }} </span> &nbsp; to &nbsp;
                                                <span> {{ $place->close }}:{{ $place->AddRem2 }}</span>
                                            </div>

                                            <h5 calss="place-name">{{ $place->name }}</h5>
                                            {{-- <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6> --}}
                                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span>
                                                {{ $place->cities->cityName }}</h6>

                                            {{-- booking --}}
                                            @auth
                                                <div class="booking w-10 text-end">
                                                    <a href="{{ url("/BookNow/$place->id") }}" name="book"
                                                        class="py-2 btn book-btn">BOOK NOW <i
                                                            class="fa-solid fa-arrow-right"></i></a>
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
                                                <span class="price">{{ $place->Price }} $</span> per person
                                            </h5>
                                        </div>
                                    @endif
                                @endforeach
                                @else
                                <div>
                                    No Data Found
                                </div>
                        @endif
                        </div>
                        {{-- </div> --}}
                    </div>
                </section>

                <div class="search-city">
                    <h2 style="display:inline-block">Explore Place</h2>
                </div>

                {{-- --------------------------------------------------------------------------------- --}}
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
                                    <h5 calss="place-name">{{ $randomPlace->name }}.</h5>
                                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type:
                                        </span>{{ $randomPlace->type }}
                                    </h6>
                                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location:
                                        </span>{{ $randomPlace->cities->cityName }}
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
            </div>
        </div>
    </div>
@endsection

@section('script')
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
