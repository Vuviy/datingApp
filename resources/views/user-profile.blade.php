
@extends('layouts.base')

@section('content')
<main class="container my-5" style="display: block">
    <!-- Основний контент -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img  src="https://pbs.twimg.com/profile_images/1221735342937645067/MGMXudrc_400x400.jpg" alt="{{ $user->name }}" class="img-fluid rounded-circle mb-3">
            </div>
            <div class="col-md-8">
                <div class="d-flex">
                    <h1 style="margin-right: 50px">{{ $user->name }}</h1>

                    <a href="#" class="btn btn-primary text-uppercase" style="width: 100px; line-height: 50px; font-size: 20px">write</a>
                </div>
{{--                <p>{{ $user->bio }}</p>--}}
                <p>Вік: {{ $user->age }}</p>
                <p>Стать: {{ $user->gender }}</p>

                <h3>Interests</h3>
                <ul>
                    @foreach($user->interests as $interest)
                        <li>{{ $interest->name }}</li>
                    @endforeach
                </ul>

                <h3>Contact Information</h3>
                <p>Email: {{ $user->email }}</p>

            </div>
        </div>
    </div>



</main>
@endsection
