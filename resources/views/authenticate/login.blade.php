@extends('admin.master')
@section('content')

<main class="login-form mt-4">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">{{ __('custom-auth.Login') }}</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom',['locale' => $locale]) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="{{ __('custom-auth.email') }}" id="email" class="form-control" name="email" required
                                       autofocus >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="{{ __('custom-auth.pass') }}" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
{{--                            <div class="form-group mb-3">--}}
{{--                                <div class="checkbox">--}}
{{--                                    <label>--}}
{{--                                        <input type="checkbox" name="remember"> Remember Me--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="d-grid mx-auto mb-2">
                                <a href="{{route('pass.request',['locale' => $locale])}}">{{ __('forget password ?') }}</a>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">{{ __('custom-auth.signin') }}</button>
                            </div>
                            <div class="d-grid mx-auto mb-2">
                                <a href="{{route('register-user',['locale' => $locale])}}">{{ __('Sign Up Here') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
