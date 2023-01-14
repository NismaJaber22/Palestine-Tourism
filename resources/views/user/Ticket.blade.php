@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Ticket.css') }}">
@endsection

@section('content')

<div style="display:flex; width:100%; height: 100vh;justify-content: center; align-items: center;">
    <div id="Ticket" >
        <div class="Ticket-header">
            <h1 class="Place-Name">{{$reserves->place->name}}</h1>
            <img src="{{asset('user/images/home-images/airplane-57-48.ico')}}" style="width:50px" />
            <h1 class="Ticket-id">{{$reserves->place->id}}</h1>
        </div>
        <div class="Ticket-body" >
            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">User Id : </span>{{$reserves->user->id}}</h6>
                <h6 class="Your-Name"><span style="color:black">visit date & time : </span>{{$reserves->place->date}} -- {{$reserves->place->start}}:{{$reserves->place->AddRem1}} Am</h6>

            </div>

            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">User Name : </span> {{$reserves->user->userfname}} {{$reserves->user->userlname}}</h6>
                <h6 class="Your-Name"><span style="color:black">Number of Person :</span> {{$reserves->peoplenum}}</h6>
            </div>
            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">Printing Date : </span>{{date('d-m-y  H:i:s')}}</h6>
                <h6 class="Your-Name"> <span style="color:black">Total Salary : </span> {{$reserves->peoplenum * $reserves->place->Price}}</h6>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('user/js/Ticket.js') }}"></script>
<script defer>

    window.print();
    </script>

@endsection

