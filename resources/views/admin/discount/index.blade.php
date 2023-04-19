
@extends('admin.master')

@section('content')
    <h3 class="mt-2">create a new coupon</h3>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<table class="table">
    <thead>
    <tr>

        <th scope="col">name</th>
        <th scope="col">code</th>
        <th scope="col">discount</th>
        <th scope="col">max_uses</th>
        <th scope="col">times_used</th>
        <th scope="col">valid_from</th>
        <th scope="col">valid_to</th>
        <th scope="col">status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($coupons as $coupon)
    <tr>

        <td>{{$coupon->name}}</td>
        <td>{{$coupon->code}}</td>
        <td>{{$coupon->discount}}</td>
        <td>{{$coupon->max_uses}}</td>
        <td>{{$coupon->times_used}}</td>
        <td>{{$coupon->valid_from}}</td>
        <td>{{$coupon->valid_to}}</td>
        <td>{{$coupon->status}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
