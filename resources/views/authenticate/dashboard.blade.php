@extends('admin.master')
@section('content')

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">{{__('Dashboard')}}</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login-user',['locale' => $locale]) }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register-user',['locale' => $locale]) }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signout-user',['locale' => $locale]) }}">{{__('Logout')}}</a>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('todo.index') }}">todos</a>
            </li>
        </ul>
    </div>
@endsection


