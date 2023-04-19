@extends('admin.master')

@section('content')

    <h3 class="mt-2">create a new Coupon</h3>
    <form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Coupon Name:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="" aria-describedby="emailHelp">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Coupon Code:</label>
            <input type="text" name="code" class="form-control" id="" value="{{old('code')}}">
            @error('code')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="discount" class="form-label">discount: %</label>
            <input type="number" name="discount" class="form-control" id="" value="{{old('discount')}}">
            @error('discount')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="max_uses" class="form-label">max_uses:</label>
            <input type="number" name="max_uses" class="form-control" id="" value="{{old('max_uses')}}">
            @error('max_uses')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="valid_from" class="form-label">valid_from:</label>
            <input type="datetime-local" name="valid_from" class="form-control" id="" value="{{old('valid_from')}}">
            @error('valid_from')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="valid_to" class="form-label">valid_to:</label>
            <input type="datetime-local" name="valid_to" class="form-control" id="" value="{{old('valid_to')}}">
            @error('valid_to')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check form-switch mb-3">
            <label class="form-check-label" for="status">status</label>
            <input class="form-check-input" name="status" type="checkbox" role="switch" id="" checked>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
