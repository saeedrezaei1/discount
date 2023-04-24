@extends('admin.master')

@section('content')
    <h3 class="mt-2">list of jobs</h3>
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
    <table class="table">
        <thead>
        <tr>

            <th scope="col">id</th>
            <th scope="col">queue</th>
            <th scope="col">payload</th>
            <th scope="col">attempts</th>
            <th scope="col">reserved_at</th>
            <th scope="col">available_at</th>
            <th scope="col">created_at</th>

        </tr>
        </thead>
        <tbody>
        @foreach( $jobs as $job)
            <tr>

                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>
                <td>{{$job->id}}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
