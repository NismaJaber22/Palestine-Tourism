@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/Dashboard-pages-css/dashboards.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/Myreservations.css') }}">
@endsection

@section('content')

    <body>

        <div class="container conta">
            <div class="Dash-div container">
                <div class="header-div">
                    <h3 class="dash-header">My Reservations</h3>
                </div>
                <div class="card text-center">
                    <div class="table-div">
                        <form method="POST" class="search-form">
                            <input type="search" name="Research" class="form-control search-input"
                                placeholder="Enter item name" />
                            <input type="submit" class="btn search-submit" value="Search" name="sib" />
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">My Name</th>
                                <th scope="col">Place</th>
                                <th scope="col">Type</th>
                                <th scope="col">Persons</th>
                                <th scope="col">Total</th>
                                <th scope="col">Ticket</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($Myreservations as $Myreservation)
                                @if ($Myreservation->user->id == Auth::user()->id)
                                    <td scope="col">{{ $Myreservation->id }}</td>
                                    {{-- <td scope="col">{{$Myreservation->userfname}}{{$Myreservation->userlname}}</td> --}}

                                    <td scope="col">{{ $Myreservation->user->userfname }}
                                        {{ $Myreservation->user->userlname }}</td>
                                    <td scope="col">{{ $Myreservation->place->name }}</td>
                                    <td scope="col">{{ $Myreservation->place->type }}</td>
                                    <td scope="col">{{ $Myreservation->peoplenum }} </td>
                                    <td scope="col">{{$Myreservation->place->Price* $Myreservation->peoplenum}} <span style="color:#ff4838 ;">$</span></td>

                                    {{-- @foreach ($reserves as $reserve) --}}
                                    <td style="width:10%;"><a href="{{ url("/Ticket/$Myreservation->id") }}"
                                            class="btn btn-warning btn-table"> <i class="fa-solid fa-table-list"></i> </a>
                                    </td>
                                    {{-- @endforeach --}}
                                    <td scope="col"><img src="{{ asset('storage/' . $Myreservation->place->image) }}"
                                            alt="place image" style="width:50%;" /></td>
                                    </tr>
                                @endif
                            @endforeach

                            <!-- End php loop -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection
@section('script')
    <script src="{{ asset('user/js/Myreservations.js') }}"></script>
@endsection
