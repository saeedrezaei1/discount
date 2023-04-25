@extends('admin.master')
@section('content')

    <main class="login-form mt-4">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">{{__('Enter Your Email')}}</h3>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('pass.email',['locale' => $locale]) }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="{{__('Email')}}" id="email" class="form-control" name="email" required
                                           autofocus >
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">{{__('Email Password Reset Link')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
