@extends('user.layout.master')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/Dashboard-pages-css/dashboards.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="container conta">
        <div class="Dash-div container">

            <div class="header-div" tabindex="-1" aria-labelledby="header" aria-hidden="true">
                {{-- @foreach ($Myreservations as $Myreservation) --}}
                {{-- @if ($Myreservation->place->id == 1) --}}


                {{-- {{$Myreservations[0]->id}} --}}

                {{-- {{$places[1]->name}} --}}
                <h3 class="dash-header" id="header">Customers Reservations {{ $places->name }} place</h3>
                {{-- @endif --}}
                {{-- @endforeach --}}
            </div>
            <div class="card text-center">

                <div class="table-div">
                    <form method="POST" class="search-form">
                        <input type="search" name="Research" class="form-control search-input"
                            placeholder="Enter item name" />
                        <input type="submit" class="btn search-submit" value="Search" name="sib" />
                    </form>
                    <div class="add-new-div">
                        <button class="btn btn-danger me-1 Bbb delete-all">Delete all Consumed</button>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="check_all">Consumed</th>
                            <th scope="col">Key</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Number of people</td>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    {{-- @foreach ($places as $place) --}}

                    {{-- {{$places}} --}}
                    {{-- @endforeach --}}

                    <tbody>
                        @foreach ($Myreservations as $Myreservation)
                            @if ($Myreservation->place->id == $places->id)
                                <td><input type="checkbox" class="checkbox" data-id="{{ $Myreservation->id }}"></td>
                                <td scope="col">{{ $Myreservation->id }}</td>
                                <td scope="col">{{ $Myreservation->user->userfname }}</td>
                                <td scope="col">{{ $Myreservation->peoplenum }}</td>
                                <td scope="col">{{ $Myreservation->place->Price * $Myreservation->peoplenum }}
                                    <span>$</span></td>
                                <td>
                                    <p class="post-time">
                                        {{ Carbon\carbon::parse($Myreservation->created_at)->format('d M Y') }}</p>
                                </td>

                                {{-- delete --}}
                                <form onclick="deleteAlert()" name='myForm'method="post"
                                    action={{ url("resarve/destroy/$Myreservation->id") }}>
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <button onclick="deleteAlert()"
                                            class="btn btn-danger btn-table show-alert-delete-box" title='Delete'>
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </form>
                                </tr>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/dashboards.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- sweet alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- toaster js--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            var form = $(this).closest("form");
            var name = $(this).data("myForm");

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'delete successfuly',
                showConfirmButton: false,
                timer: 3000,
            })
        });
    </script>
    {{--
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            var form =  $(this).closest("form");
            var name = $(this).data("myForm");
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
    </script> --}}

    {{-- delete with check box --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#check_all').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            //إختيار الجميع
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#check_all').prop('checked', true);
                } else {
                    $('#check_all').prop('checked', false);
                }
            });
            //إختيار عنصر معين
            $('.delete-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    //عند الضغط على زر الحذف - التحقق اذا كان المستخدم قد اختار اي صف للحذف
                    alert("Please select atleast one record to delete.");
                } else {
                    //رسالة تأكيد للحذف
                    if (confirm("Are you sure, you want to delete the selected categories?")) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{ route('delete-multiple-category') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) {
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr")
                                            .remove(); //حذف الصف بعد اتمام الحذف من قاعدة البيانات
                                    });
                                    //رسالة toast للحذف
                                    toastr.options.closeButton = true;
                                    toastr.options.closeMethod = 'fadeOut';
                                    toastr.options.closeDuration = 100;
                                    toastr.success('Deleted Successfully');
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
