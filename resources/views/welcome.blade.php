@extends('layouts.app')
<body>
    @section('content')
    <div class="container">
        @if (Route::has('login'))
            <div class="flex2">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    @endsection  
</body>

