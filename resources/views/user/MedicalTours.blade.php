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
                        <a class="nav-link dash-link" aria-current="page" href="{{ url('ReligiousTours') }}">Religious</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dash-link " href="{{ url('CulturalTours') }}">Cultural</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link " href="{{ url('LeisureTours') }}">Leisure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link active" href="{{ url('MedicalTours') }}">Medical</a>
                    </li>
                </ul>
                <div>
                    <div class="search-city">
                        <h4 class="text-capitalize ps-3" style="display:inline-block ;">Search with city</h4>
                        <form method="GET"
                            style="display:flex;  margin-left: 1%;width: 20%; justify-content: space-between;">
                            <select style="display:inline-block ; width: 70%;" class="form-select"
                                aria-label="Default select example">
                                <option selected value="1">Jerusalem</option>
                                <option value="2">Nablus</option>
                                <option value="3">Jenin</option>
                                <option value="4">Tulkarm</option>
                                <option value="5">Hebron</option>
                                <option value="6">Bethlehem</option>
                                <option value="7">Ramallah</option>
                                <option value="8">Jericho</option>
                                <option value="9">Qalqilya</option>
                                <option value="10">Salfit</option>
                                <option value="9">Tubas</option>
                            </select>
                            <input type="submit" value="Search" class="btn btn-primary" name="Searchbtn"
                                style="display:inline-block ;" />

                        </form>
                    </div>
                </div>

                <section>
                    <div class="Top-Dests">
                            {{-- <div class="row" style="justify-content: space-between;"> --}}
                            <div class="owl-carousel owl-theme">
                                @foreach ($places as $place)
                                    @if ($place->type == '4')
                                        <div class="Top-Dest">
                                            <img src="{{ asset("storage/$place->image") }}" />
                                            <div class="time">
                                                <i class="fa-regular fa-clock"></i>&nbsp;
                                                <span>{{ $place->start }}:{{ $place->AddRem1 }} </span> &nbsp; to &nbsp;
                                                <span> {{ $place->close }}:{{ $place->AddRem2 }}</span>
                                            </div>

                                            <h5 calss="place-name">{{ $place->description }}</h5>
                                            {{-- <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6> --}}
                                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span>
                                                {{ $place->location }}</h6>

                                            <div class="booking">
                                                <button class="py-2 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                                            </div>

                                            <h5 class="py-3">
                                                <span class="price">{{ $place->Price }} $</span> per person
                                            </h5>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            {{-- </div> --}}

                    </div>
                </section>


                <div class="search-city">
                    <h2 style="display:inline-block">Explore Place</h2>
                </div>

                <section class="explore_places">

                    <div class="owl-carousel owl-theme">
                        @foreach ($randomPlaces as $randomPlace)
                            {{-- <div class="row" style="justify-content: space-between;"> --}}
                            <div class="Top-Dest">
                                <img src="{{ asset("storage/$randomPlace->image") }}" />
                                <div class="time">
                                    <span>{{ $randomPlace->start }}:{{ $randomPlace->AddRem1 }} </span> &nbsp;
                                    to &nbsp;
                                    <span> {{ $randomPlace->close }}:{{ $randomPlace->AddRem2 }}</span>
                                </div>
                                <h5 calss="place-name">{{ $randomPlace->description }}.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span>{{ $randomPlace->type }}
                                </h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location:
                                    </span>{{ $randomPlace->location }}</h6>

                                    <div class="booking">
                                        <button class="py-2 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                                    </div>

                                <h5 class="py-3">
                                    <span class="price">{{ $randomPlace->Price }}$</span> per person
                                </h5>
                            </div>
                            {{-- </div> --}}
                        @endforeach
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
