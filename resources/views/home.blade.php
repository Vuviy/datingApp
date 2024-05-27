@extends('layouts.base')

@section('content')
{{--<main class="container my-5">--}}
{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <h2>Основний контент</h2>--}}
{{--            <p>Тут буде основний контент вашої сторінки.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</main>--}}

{{--<main class="d-flex justify-content-center align-items-center" style="height: 100vh;">--}}
{{--    <div>--}}
{{--        <a href="#" class="custom-btn btn-people me-3">ЛЮДИ</a>--}}
{{--        <a href="#" class="custom-btn btn-request">СТВОРИТИ ЗАПИТ</a>--}}
{{--    </div>--}}
{{--</main>--}}


<main class="position-relative" style="height: 100vh;">
    <div class="button-container">
        <a href="{{route('search')}}" class="custom-btn btn-people me-3">ЛЮДИ</a>
        <a href="#" class="custom-btn btn-request">СТВОРИТИ ЗАПИТ</a>
    </div>
</main>
@endsection
