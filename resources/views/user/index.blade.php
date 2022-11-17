@extends('user.layout.master')

    <!--header-->

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

                    <a href="{{url('/login')}}" class="btn login-btn">Login</a>
                    <a href="{{url('/signup')}}" class="btn signup-btn">Sign up</a>

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

        <section class="container slider">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row" style="justify-content: space-between;">
                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                                </div>
                                <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.
                                </h5>

                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$79.00</span> per person</h5>
                            </div>

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha2.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                                </div>
                                <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$259.00</span> per person</h5>
                            </div>

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                                </div>
                                <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$199.00</span> per person</h5>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row" style="justify-content: space-between;">

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha2.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                                </div>
                                <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$259.00</span> per person</h5>
                            </div>
                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                                </div>
                                <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$179.00</span> per person</h5>
                            </div>

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                                </div>
                                <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="./BookNow.php" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$199.00</span> per person</h5>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row" style="justify-content: space-between;">
                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                                </div>
                                <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.
                                </h5>

                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$79.00</span> per person</h5>
                            </div>

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                                </div>
                                <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}"class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$179.00</span> per person</h5>
                            </div>

                            <div class="Top-Dest col-3">
                                <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                                </div>
                                <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                                <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                                <a href="{{('BookNow')}}"class="btn book-btn">BOOK NOW <i
                                        class="fa-solid fa-arrow-right"></i></a>
                                <h5><span class="price">$199.00</span> per person</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>


    </section>

    <section>
        <h2 class="container" style="margin-top:50px">For You</h2>
        <div class="Top-Dests container">
            <div class="row" style="justify-content: space-between;">
                <div class="Top-Dest col-4">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.</h5>

                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
                    <h5><span class="price">$79.00</span> per person</h5>
                </div>

                <div class="Top-Dest col-4">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha2.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                    </div>
                    <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
                    <h5><span class="price">$259.00</span> per person</h5>
                </div>
                <div class="Top-Dest col-4">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <a href="{{('BookNow')}}" class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></a>
                    <h5><span class="price">$179.00</span> per person</h5>
                </div>
            </div>
        </div>

    </section>
@endsection

