@extends('admin.master')
@section('content')
    <div class="mt-5 ">
        <main class="signup-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <h3 class="card-header text-center">TODO LIST</h3>
                            <div class="card-body">
                                <form action="{{ route('todo.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="{{__('Name')}}" id="name" class="form-control" name="name"
                                               required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">Add Task</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
