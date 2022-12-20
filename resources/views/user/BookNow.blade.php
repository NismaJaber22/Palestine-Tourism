@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Book.css') }}">
@endsection

@section('content')
    <header class="BOOK-header">
        <div class="container-fluid">
            <div class="row">
                <div class="img-header col-6">
                    <img src="{{ asset("storage/$places->image") }}" class="Place-image" alt="place img" />
                </div>
                <div class="text-header col-5 offset-md-1">
                    <div class="Name-Location">
                        <h1 class="Place-name">{{ $places->name }}</h1>
                        <h1 class="location">{{ $places->location }}</h1>
                    </div>
                    <p class="Description">{{ $places->description }}</p>
                    <h4 class="price"><span style="color:#ff4838 ;">{{ $places->Price }} </span><span class="text-dark">$ Pre Person</span></h4>
                    <h4 class="price py-2"><span style="color:#191616 ;">{{ $places->date }} </span></h4>
                    <h5 class="Time">Form <span style="color:#ff4838 ;"
                            class="Start-Time">{{ $places->start }}:{{ $places->AddRem1 }} AM</span> to <span
                            style="color:#ff4838 ;" class="End-Time">{{ $places->close }}:{{ $places->AddRem2 }} PM</span>
                    </h5>
                </div>
            </div>
        </div>
    </header>

    <div class="Recervation">
        <button class="btn show1">Book now</button>
        <form method="POST" action="{{ url('reserve') }}" class="w-100 form-reserve">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="place_id" value="{{ $places->id }}">

            {{-- <div class="DIVV">
                <label> Journey start </label>
                <input class="form-control" type="text" name="start" value="{{$places->start}} : {{$places->AddRem1}}">
                <label> Journey End</label>
                <input class="form-control" type="text" name="end" value="{{$places->close}} : {{ $places->AddRem2 }}">
            </div> --}}
            <div class="DIVV">
                <label>Number Of Person</label>
                <input class="form-control" type="number" name="peoplenum" />
            </div>
            <div class="DIVV">
                <label>Mobile Number</label>
                <input class="form-control" type="text" name="phone" />

            </div>
            <div class=" DIVV">
                {{-- <label>Journey Date</label>
                <input class="form-control" type="date" name="Date" value="" /> --}}

                {{-- <input name="total" value="{{($places->Price)}} $ per person " class="text-danger"> --}}
                {{-- <h5 name="total" class="Total">Total : <span style="color:#ff4838 ;">200$</span></h5> --}}

            </div>
            <input type="submit" value="Emphasis" class="btn  d-block book" name="sub">

        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user/js/Book.js') }}"></script>
@endsection

