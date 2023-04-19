
@extends('admin.master')

@section('content')
    <h3 class="mt-2">{{ __('use.enter') }}</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('coupon') }}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">entre Coupon code:</label>
            <input type="text" class="form-control" name="code" value="" id="" aria-describedby="emailHelp">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
