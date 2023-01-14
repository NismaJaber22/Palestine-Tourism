@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Book.css') }}">
@endsection

@section('content')
    <header class="BOOK-header">
        <div class="container-fluid">
            <div class="row">
                <div class="img-header col-7">
                    <img src="{{ asset("storage/$places->image") }}" class="Place-image" alt="place img" />
                </div>
                <div class="text-header col-5">
                    <div class="Name-Location">
                        <h1 class="Place-name text-capitalize">{{ $places->name }}</h1>
                        <h1 class="location">{{ $places->cities->cityName }}</h1>
                    </div>
                    <p class="fs-5">{{ $places->type }}</p>

                    <textarea class="Description" disabled>{{ $places->description }}
                    </textarea>

                    <h5 class="price"><span style="color:#ff4838 ;">{{ $places->Price }} </span><span class="text-dark">$
                            Pre Person</span></h5>
                    <h5 class="price py-2"><span style="color:#191616 ;">{{ $places->date }} </span></h5>
                    <h5 class="Time">Form <span style="color:#ff4838 ;"
                            class="Start-Time">{{ $places->start }}:{{ $places->AddRem1 }} AM</span> to <span
                            style="color:#ff4838 ;" class="End-Time">{{ $places->close }}:{{ $places->AddRem2 }} PM</span>
                    </h5>
                </div>
            </div>
        </div>
    </header>
    {{-- ------- --}}
    @if (session()->has('success'))
        <div class='alert alert-success text-center w-50 m-auto mt-4'>
            <h2>{{ session()->get('success') }}</h2>
        </div>
    @endif
    @error('peoplenum')
        <div class="alert alert-danger text-center w-50 m-auto mt-4">{{ $message }}
        </div>
    @enderror
    @error('phone')
        <div class="alert alert-danger text-center w-50 m-auto mt-4">{{ $message }}
        </div>
    @enderror
    <div class="Recervation">
        <button class="btn show1">Book now</button>
        <form method="POST" action="{{ url('reserve') }}" class="w-100 form-reserve">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="place_id" value="{{ $places->id }}">


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
            <input type="submit" value="Emphasis" class="btn  d-block book" name="sub" onclick="fireSweetAlert()"
                id="res">

        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user/js/Book.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- <div style="height: 500px;">
        <button onclick="fireSweetAlert()">Show sweet alert example</button>
      </div> --}}


    {{-- @if ($errors->any())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#res').modal('show');
            });
        </script> --}}
    {{-- @else --}}
    {{-- <script>
        function fireSweetAlert() {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        }
    </script> --}}
    {{-- @endif --}}




    {{-- Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      }) --}}
@endsection
