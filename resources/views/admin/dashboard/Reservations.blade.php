@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/ReligiousDashboard.css') }}">
@endsection

@section('content')
    <div class="container conta">
        <div class="Dash-div container">
            <?php $PlaceName = 'Abbbb'; ?>
            <div class="header-div">
                <h3 class="dash-header">Customers Reservations <?php echo $PlaceName; ?> place</h3>
            </div>
            <div class="card text-center">



                <div class="table-div">
                    <form method="POST" class="search-form">
                        <input type="search" name="Research" class="form-control search-input"
                            placeholder="Enter item name" />
                        <input type="submit" class="btn search-submit" value="Search" name="sib" />
                    </form>
                    <div class="add-new-div">
                        <button class="btn btn-primary me-1 Bbb">Submit </button>
                        <button class="btn btn-danger me-1 Bbb">Delete all Consumed</button>
                    </div>
                </div>

                <table class="table">
                    <thead>

                        <tr>
                            <th scope="col">Consumed</th>
                            <th scope="col">Key</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Number of people</td>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    {{-- @foreach ($places as $place) --}}
                        <tbody>

                            <?php
                            $Consumed = false;
                            ?>
                            <!--php for loop-->

                            <tr>
                                <?php if ($Consumed) {
                                    echo '<td> <div class="Explore m-auto"></div> </td>';
                                } else {
                                    echo '<td> <input type="checkbox" /> </td>';
                                } ?>
                                <td scope="col">15532</td>
                                <td scope="col"> nisma </td>
                                <td scope="col">5</td>
                                <td scope="col">200<span style="color:#ff4838 ;">$</span></td>
                                <td scope="col">5/5/2023</td>
                                <td style="width:10%;"><button class="btn btn-danger btn-table"> <i
                                            class="fa-solid fa-trash"></i> </button></td>
                            </tr>

                            <!-- End php loop -->
                        </tbody>
                    {{-- @endforeach --}}
                </table>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/ReligiousDashboard.js') }}"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            // var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal('sssss');
                }
            });
        });
    </script>
@endsection
