@extends('admin.layout.master')

@section('content')
    <div class="city">
        <div class="container w-50">

            @if (session()->has('success'))
                <div class='alert alert-success w-75 text-center'>
                    <h2>{{ session()->get('success') }}</h2>
                </div>
            @endif

            <form class="border p-3 bg-white mt-5" method="post" action="{{ route('submit.city') }}">
                @csrf
                <div class="mb-3">
                    <label for="cityName" class="form-label">City Name</label>
                    <input type="text" class="form-control" id="cityName" name="cityName" aria-describedby="emailHelp">
                </div>
                @error('cityName')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
                {{--
                <div class="mb-3 form-check">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activity" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="activity" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Not Active
                        </label>
                      </div>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
