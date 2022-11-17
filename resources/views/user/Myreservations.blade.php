@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/ReligiousDashboard.css') }}">
@endsection

@section('content')
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

                        <?php
                        $CustomerName = 'Ahmad Tamem';
                        $PlaceName = 'Abbbb';
                        $PlaceType = 'Leisure';
                        $NumOfPerson = 5;
                        $ImagePath = './images/home-images/p-alpha1.png';
                        $TotalSalary = 500;

                        ?>
                        <!--php for loop-->
                        <?php

        $Count = 10;
        for($i =0;$i < $Count ; $i = $i+1)
        {
          ?>
                        <tr id="<?php echo $i; ?>">
                            <td scope="col"><?php echo $i + 1; ?></td>
                            <td scope="col"><?php echo $CustomerName; ?></td>
                            <td scope="col"><?php echo $PlaceName; ?> </td>
                            <td scope="col"><?php echo $PlaceType; ?></td>
                            <td scope="col"><?php echo $NumOfPerson; ?></td>
                            <td scope="col"><?php echo $TotalSalary; ?> <span style="color:#ff4838 ;">$</span></td>
                            <td style="width:10%;"><a href="{{url('Ticket')}}" class="btn btn-warning btn-table"> <i
                                        class="fa-solid fa-table-list"></i> </a></td>
                            <td scope="col"> <img src="{{asset('user/images/home-images/p-alpha4.png')}}"" style="width:50%;;" /></td>
                        </tr>
                        <?php
        }
        ?>
                        <!-- End php loop -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user/js/Myreservations.js') }}"></script>
@endsection
