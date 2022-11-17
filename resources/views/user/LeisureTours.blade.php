@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Tours.css') }}">
@endsection

@section('content')

<div class="conta">
    <div class="Dash-div">
     <div class="card text-center">
      <ul class="nav nav-tabs">
      <li class="nav-item">
          <a class="nav-link dash-link" aria-current="page" href="{{url('ReligiousTours')}}">Religious</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link dash-link " href="{{url('CulturalTours')}}">Cultural</a>
        </li>
        <li class="nav-item">
          <a class="nav-link dash-link active" href="{{url('LeisureTours')}}">Leisure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link dash-link" href="{{url('MedicalTours')}}">Medical</a>
        </li>
      </ul>
      <div>
        <div class="search-city">
          <h5 style="display:inline-block ;">Search with city</h5>
          <form method="GET" style="display:flex;  margin-left: 1%;width: 20%; justify-content: space-between;">
            <select style="display:inline-block ; width: 70%;" class="form-select" aria-label="Default select example">
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
            <input type="submit" value="Search" class="btn btn-primary" name="Searchbtn" style="display:inline-block ;"/>

          </form>
        </div>
      </div>
      <section>
        <div class="Top-Dests">
         <div class="container">
            <div class="row" style="justify-content: space-between;">
                @foreach ($places as $place)
                    @if ($place->type == '3')
                        <div class="Top-Dest col-3 p-1">
                            <img style="width:100%; height:50%;" src="{{ asset("storage/$place->image") }}" />
                            <div class="time my-2">
                              <i class="fa-regular fa-clock"></i>&nbsp;
                              <span>{{ $place->start }}:{{ $place->AddRem1 }} </span> &nbsp; to &nbsp;
                              <span> {{ $place->close }}:{{ $place->AddRem2 }}</span>
                            </div>

                            <h5 calss="place-name">{{ $place->description }}</h5>
                            {{-- <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6> --}}
                            <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span>
                              {{ $place->location }}</h6>


                            <div class="d-flex justify-content-center">
                                <button class="p-1 btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                            </div>

                            <h5><span class="price">{{ $place->Price }}</span> per person</h5>
                      </div>
                    @endif
                @endforeach
            </div>
         </div>
        </div>
    </section>
      <div class="search-city">
        <h5 style="display:inline-block ;">Explore Place</h5>

      </div>

      <section>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row" style="justify-content: space-between;">
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.</h5>

                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$79.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="i{{asset('user/images/home-images/p-alpha2.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                    </div>
                    <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$259.00</span> per person</h5>
                </div>
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$179.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                  <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                  <div class="time">
                      <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                  </div>
                  <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                  <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                  <h5><span class="price">$199.00</span> per person</h5>
              </div>
            </div>
            </div>
            <div class="carousel-item">
              <div class="row" style="justify-content: space-between;">
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.</h5>

                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$79.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha2.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                    </div>
                    <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$259.00</span> per person</h5>
                </div>
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$179.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                  <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                  <div class="time">
                      <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                  </div>
                  <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                  <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                  <h5><span class="price">$199.00</span> per person</h5>
              </div>
            </div>
            </div>
            <div class="carousel-item">
              <div class="row" style="justify-content: space-between;">
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha1.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5 calss="place-name">Etiam placerat dictum consequat an Pellentesque habitant morbi.</h5>

                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$79.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha2.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>10:00</span> to <span>20:00</span>
                    </div>
                    <h5>varius condimentum consequat frin Aenean pretium risus eu.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$259.00</span> per person</h5>
                </div>
                <div  class="Top-Dest col-3">
                    <img style="width:100%" src="{{asset('user/images/home-images/p-alpha3.png')}}" />
                    <div class="time">
                        <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>22:30</span>
                    </div>
                    <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                    <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                    <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                    <h5><span class="price">$179.00</span> per person</h5>
                </div>

                <div  class="Top-Dest col-3">
                  <img style="width:100%" src="{{asset('user/images/home-images/p-alpha4.png')}}" />
                  <div class="time">
                      <i class="fa-regular fa-clock"></i> <span>8:00</span> to <span>24:00</span>
                  </div>
                  <h5>Praesent sed elit mi. In risus nullaam efficitur non elementum.</h5>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Type: </span> Leisure</h6>
                  <h6 class="Place-Type"><span style="color:#ff4838 ;">Location: </span> Nablus</h6>

                  <button class="btn book-btn">BOOK NOW <i class="fa-solid fa-arrow-right"></i></button>
                  <h5><span class="price">$199.00</span> per person</h5>
              </div>
            </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

    </div>
  </div>
</div>


@endsection

@section('script')
    <script src="{{ asset('user/js/Tours.js') }}"></script>
@endsection
