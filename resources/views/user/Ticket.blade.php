@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Ticket.css') }}">
@endsection

@section('content')

<div style="display:flex; width:100%; height: 100vh;justify-content: center; align-items: center;">
    <div id="Ticket" >
        <div class="Ticket-header">
            <h1 class="Place-Name"> Sama Nablus</h1>
            <img src="{{asset('user/images/home-images/airplane-57-48.ico')}}" style="width:50px" />
            <h1 class="Ticket-id"> 55421</h1>
        </div>
        <div class="Ticket-body" >
            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">User Id : </span> 155321</h6>
                <h6 class="Your-Name"><span style="color:black">visit time : </span> 5:30 PM</h6>
            </div>

            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">User Name : </span>  Ahmad Tamem</h6>
                <h6 class="Your-Name"><span style="color:black">Number of Person :</span> 5</h6>
            </div>
            <div class="First-body">
                <h6 class="Your-Name"><span style="color:black">Printing Date : </span> 20-10-2022</h6>
                <h6 class="Your-Name"> <span style="color:black">Total Salary : </span> 500 $</h6>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('user/js/Ticket.js') }}"></script>
@endsection

