@extends('user.layout.master')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.3/sweetalert2.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/ReligiousDashboard.css') }}">
@endsection

@section('content')
    <div class="container conta">
        <div class="Dash-div container">
            <div class="header-div">
                <h3 class="dash-header">Leisure Dashboard</h3>
            </div>
            <div class="card text-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link dash-link" aria-current="page"
                            href="{{ url('ReligiousDashboard') }}">Religious</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link" href="{{ url('CulturalDashboard') }}">Cultural</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link dash-link active" href="{{ url('LeisureDashboard') }}">Leisure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dash-link" href="{{ url('MedicalDashboard') }}">Medical</a>
                    </li>
                </ul>

                <div class="table-div">
                    <form method="get" action="{{ url('searchRel') }}" class="search-form">
                        <input type="search" name="search" class="form-control search-input"
                            placeholder="Enter item name" />
                        <input type="submit" class="btn search-submit" value="Search" name="sib" />
                    </form>


                    {{-- Add --}}
                    <div class="add-new-div">
                        <button type="button" data-bs-toggle="modal" class="btn btn-success me-1"
                            data-bs-target="#exampleModal">
                            <i class="fa-regular fa-square-plus"></i>
                        </button>
                    </div>

                    <!-- Modal Add-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title m-auto" id="exampleModalLabel">Add New Religious place</h5>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" class="Add-form" method="post"
                                        action="{{ url('/admin/storeRel') }}">
                                        @csrf
                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Name</p>
                                            <div style="width:100%">
                                                <input name="name" placeholder="Place Name"
                                                    onkeyup="NameValidation(this)" type="text" id="swal-input1"
                                                    class="form-control  swal2-input " style="width:80%" />

                                                <p class="pb-2 text-start pt-1" id="NameError"
                                                    style="color:red; font-size:11px; margin:0;     font-weight: 500;"></p>
                                            </div>
                                        </label>

                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Type</p>
                                            <div class="w-100">
                                                <select class="form-select swal2-input" aria-label="Default select example"
                                                    style="width:80%" name="type">
                                                    <option value="1">Religious</option>
                                                    <option value="2">Cultural</option>
                                                    <option value="3">Leisure</option>
                                                    <option value="4">Medical</option>
                                                </select>
                                                <p id="NameError"
                                                    style="color:red; font-size:11px; margin:0; font-weight: 500;">
                                                </p>
                                            </div>
                                        </label>

                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Price</p>
                                            <div  class="w-100">
                                                <input name="Price" placeholder="Place Price"
                                                    onkeyup="CostValidation(this)" type="number" id="swal-input2"
                                                    class="form-control swal2-input" style="width:80%" />
                                                <p class="pb-2 text-start pt-1" id="CostError"
                                                    style="color:red; font-size:11px; margin:0;     font-weight: 500;"></p>
                                            </div>
                                        </label>

                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Location</p>
                                            <div  class="w-100">
                                                <select id="swal-input6" class="form-control swal2-input" style="width:80%"
                                                    name="location">
                                                    <option selected value="1">Jerusalem</option>
                                                    <option value="2">Nablus</option>
                                                    <option value="3">Jenin</option>
                                                    <option value="4">Tulkarm</option>
                                                    <option value="5">Hebron</option>
                                                    <option value="5">Bethlehem</option>
                                                    <option value="7">Ramallah</option>
                                                    <option value="8">Jericho</option>
                                                    <option value="9">Qalqilya</option>
                                                    <option value="10">Salfit</option>
                                                    <option value="11">Tubas</option>
                                                </select>
                                            </div>
                                        </label>

                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Description</p>
                                            <div  class="w-100">
                                                <input name="description" placeholder="Place Description"
                                                    onkeyup="DescValidation(this)" type="text" id="swal-input3"
                                                    class="form-control swal2-input" style="width:80%" />
                                                <p class="pb-2 text-start pt-1" id="DescError"
                                                    style="color:red; font-size:11px; margin:0;     font-weight: 500;"></p>
                                            </div>
                                        </label>

                                        <label class="d-flex">
                                            <p style="width:25%; margin-top: revert;">Image</p>
                                            <input name="image" placeholder="Place Image" type="file"
                                                id="swal-input4" class="form-control swal2-input" style="width:80%"
                                                onchange="FileValidation(this)" />
                                        </label>

                                        <label class="d-flex pt-3">
                                            <p style="width:25%; margin-top: revert;">Start</p>
                                            <input name="start" placeholder="hours" onkeyup="hValidation(this,0)"
                                                type="number" id="swal-input5" class="form-control swal2-input"
                                                style="width:30%" />
                                            <p
                                                style="width:5%; margin-top: revert; margin-right: 10px; font-weight: bold;">
                                                :</p>
                                            <input name="AddRem1" placeholder="min" onkeyup="mValidation(this,0)"
                                                type="number" id="swal-input7" class="form-control swal2-input"
                                                style="width:30%" />
                                        </label>

                                        <label class="d-flex pt-3">
                                            <p style="width:25%; margin-top: revert;">Close</p>
                                            <input name="close" placeholder="hours" onkeyup="hValidation(this,1)"
                                                type="number" id="swal-input5" class="form-control swal2-input"
                                                style="width:30%" />
                                            <p
                                                style="width:5%; margin-top: revert; margin-right: 10px; font-weight: bold;">
                                                :</p>
                                            <input name="AddRem2" placeholder="min" onkeyup="mValidation(this,1)"
                                                type="number" id="swal-input7" class="form-control swal2-input"
                                                style="width:30%" />
                                        </label>
                                        {{--
                                    <label class="d-flex">
                                        <p style="width:25%; margin-top: revert;">Explore</p>
                                        <input name="Explore" type="checkbox" />
                                    </label> --}}

                                        <input id="js-btn" type="submit" name="RelSub" value="Add"
                                            class="btn btn-primary disabled"
                                            style="width: 100px; margin-right: auto;  margin-left: auto; margin-top:40px;" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Exp</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Location</th>
                            <th scope="col">Start</th>
                            <th scope="col">Close</th>
                            <th scope="col">desc</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($places->isNotEmpty())
                            {{ $i = 1 }}
                            @foreach ($places as $place)
                                @if ($place->type == '3')
                                    <tr>
                                        <td><a href="{{ url('Reservations') }}" class="btn btn-warning btn-table"><i
                                                    class="fa-solid fa-list-check"></i></a>
                                        </td>


                                        <td scope="col">{{ $i++ }}<br></td>


                                        <td scope="col">{{ $place->name }}</td>
                                        <td scope="col">{{ $place->Price }} <span class="text-black">$</span></td>
                                        <td scope="col">{{ $place->location }} </td>
                                        <td scope="col">{{ $place->start }}:{{ $place->AddRem1 }}</td>
                                        <td scope="col">{{ $place->close }}:{{ $place->AddRem2 }}</td>


                                        {{-- description --}}

                                        <td style="margin:auto;"><button
                                                onclick="ShowDesc('{{ $place->description }}','{{ $place->name }}')"
                                                class="btn btn-secondary btn-table"><i
                                                    class="fa-solid fa-file-medical"></i>
                                            </button>
                                        </td>

                                        {{-- image --}}
                                        <td style="margin:auto;">
                                            <button
                                                onclick="ShowImage('{{ asset('storage/' . $place->image) }}','{{ $place->name }}')"
                                                class="btn btn-secondary btn-table">
                                                <i class="fa-regular fa-image"></i>
                                            </button>
                                        </td>


                                        {{-- edit--------------------------------- --}}
                                        <td style="width:10%;">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-table" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $place->id }}">
                                                <i style="color:white ;" class="fa-solid fa-pen"></i>
                                            </button>


                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal{{ $place->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title m-auto" id="exampleModalLabel">Update
                                                                {{ $place->name }} place
                                                            </h5>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form name="editform" enctype="multipart/form-data"
                                                                class="Add-form" method="post" id='editForm'
                                                                action="{{ url("/admin/updateRel/$place->id") }}">

                                                                @csrf
                                                                <label class="d-flex">
                                                                    <p style="width:25%; margin-top: revert;">Name</p>
                                                                    <div style="width:100%">
                                                                        <input name="name" placeholder="Place Name"
                                                                            onkeyup="NameValidation(this)" type="text"
                                                                            id="name"
                                                                            class="form-control swal2-input "
                                                                            style="width:80%"
                                                                            value="{{ $place->name }}" />

                                                                        <p class="pb-2 text-start pt-1" id="NameError"
                                                                            style="color:red; font-size:11px; margin:0;     font-weight: 500;">
                                                                        </p>
                                                                    </div>
                                                                </label>
                                                                <label class="d-flex">
                                                                    <p style="width:25%; margin-top: revert;">Type</p>
                                                                    <div class="w-100">
                                                                        <select class="form-select swal2-input"
                                                                            aria-label="Default select example"
                                                                            style="width:80%" name="type">
                                                                            <option value="1">Religious</option>
                                                                            <option value="2">Cultural</option>
                                                                            <option value="3">Leisure</option>
                                                                            <option value="4">Medical</option>
                                                                        </select>

                                                                        <p id="NameError"
                                                                            style="color:red; font-size:11px; margin:0; font-weight: 500;">
                                                                        </p>
                                                                    </div>
                                                                </label>

                                                                <label class="d-flex">
                                                                    <p style="width:25%; margin-top: revert;">Price</p>
                                                                    <div style="width:100%">
                                                                        <input name="Price" placeholder="Place Price"
                                                                            onkeyup="CostValidation(this)" type="number"
                                                                            id="Price"
                                                                            class="form-control swal2-input"
                                                                            style="width:80%"
                                                                            value="{{ $place->Price }}" />
                                                                        <p class="pb-2 text-start pt-1" id="CostError"
                                                                            style="color:red; font-size:11px; margin:0;     font-weight: 500;">
                                                                        </p>
                                                                    </div>
                                                                </label>

                                                                <label class="d-flex">
                                                                    <p style="width:25%; margin-top: revert;">Location</p>
                                                                    <div style="width:100%">
                                                                        <select id="location"
                                                                            class="form-control swal2-input"
                                                                            style="width:80%" name="location">
                                                                            <option selected value="1">Jerusalem
                                                                            </option>
                                                                            <option value="2">Nablus</option>
                                                                            <option value="3">Jenin</option>
                                                                            <option value="4">Tulkarm</option>
                                                                            <option value="5">Hebron</option>
                                                                            <option value="6">Bethlehem</option>
                                                                            <option value="7">Ramallah</option>
                                                                            <option value="8">Jericho</option>
                                                                            <option value="9">Qalqilya</option>
                                                                            <option value="10">Salfit</option>
                                                                            <option value="11">Tubas</option>
                                                                        </select>
                                                                    </div>
                                                                </label>

                                                                <label class="d-flex">
                                                                    <p style="width:25%; margin-top: revert;">Description
                                                                    </p>
                                                                    <div style="width:100%">
                                                                        <input name="description"
                                                                            placeholder="Place Description"
                                                                            onkeyup="DescValidation(this)" type="text"
                                                                            id="description"
                                                                            class="form-control swal2-input"
                                                                            style="width:80%"
                                                                            value="{{ $place->description }}" />
                                                                        <p class="pb-2 text-start pt-1" id="DescError"
                                                                            style="color:red; font-size:11px; margin:0;     font-weight: 500;">
                                                                        </p>
                                                                    </div>
                                                                </label>

                                                                <label class="d-flex ">
                                                                    <p style="width:25%; margin-top: revert;">Image</p>
                                                                    <input name="image" placeholder="Place Image"
                                                                        type="file" id="image"
                                                                        value="{{ $place->image }}"
                                                                        class="form-control swal2-input" style="width:60%"
                                                                        onchange="FileValidation(this)" />
                                                                    <img class="px-4"style="width:20%"
                                                                        src="{{ asset("storage/$place->image") }}">
                                                                </label>

                                                                <label class="d-flex pt-3">
                                                                    <p style="width:25%; margin-top: revert;">Start</p>
                                                                    <input name="start" placeholder="hours"
                                                                        value="{{ $place->start }}"
                                                                        onkeyup="hValidation(this,0)" type="number"
                                                                        id="start" class="form-control swal2-input"
                                                                        style="width:30%" />
                                                                    <p
                                                                        style="width:5%; margin-top: revert; margin-right: 10px; font-weight: bold;">
                                                                        :</p>
                                                                    <input name="AddRem1" placeholder="min"
                                                                        value="{{ $place->AddRem1 }}"
                                                                        onkeyup="mValidation(this,0)" type="number"
                                                                        id="AddRem1" class="form-control swal2-input"
                                                                        style="width:30%" />
                                                                </label>

                                                                <label class="d-flex pt-3">
                                                                    <p style="width:25%; margin-top: revert;">Close</p>
                                                                    <input name="close" placeholder="hours"
                                                                        value="{{ $place->close }}"
                                                                        onkeyup="hValidation(this,1)" type="number"
                                                                        id="close" class="form-control swal2-input"
                                                                        style="width:30%" />
                                                                    <p
                                                                        style="width:5%; margin-top: revert; margin-right: 10px; font-weight: bold;">
                                                                        :</p>
                                                                    <input name="AddRem2" placeholder="min"
                                                                        value="{{ $place->AddRem2 }}"
                                                                        onkeyup="mValidation(this,1)" type="number"
                                                                        id="AddRem2" class="form-control swal2-input"
                                                                        style="width:30%" />
                                                                </label>
                                                                {{--
                                                                <label class="d-flex">
                                                                  <p style="width:25%; margin-top: revert;">Explore</p>
                                                                  <input name="Explore" type="checkbox" />
                                                                </label> --}}

                                                                <input id="js-btn" type="submit" name="RelSub"
                                                                    value="Update" class="btn btn-primary "
                                                                    style="width: 100px; margin-right: auto;  margin-left: auto; margin-top:40px;" />


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- delete--------------------------------- --}}
                                        <form name='myForm'method="post"
                                            action={{ url("admin/deleteRel/$place->id") }}>
                                            @csrf
                                            @method('DELETE')
                                            <td style="width:10%;">
                                                <button class="btn btn-danger btn-table show-alert-delete-box"
                                                    title='Delete'>
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </form>

                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <div>
                                <h2>No data found</h2>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>


        {{-- {{ $places->links() }} --}}


    </div>
@endsection

@section('script')

    <script src="{{ asset('user/js/Dashboard-Pages-js/LeisureDashboard.js') }}"></script>

     {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="javascript/jquery-3.6.0.min.js"></script>
    <script src="javascript/bootstrap.bundle.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            // var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal({
                        text: 'DELETE',
                        icon: "warning"
                    });
                }
            });
        });
    </script>
@endsection

