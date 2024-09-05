@extends('layouts.base')

@section('content')


<main class="position-relative" style="height: 100vh;">
    <div class="button-container">
        <a href="{{route('search')}}" class="custom-btn btn-people me-3 mt-3">ЛЮДИ</a>
        @if(auth()->id())
            <a href="{{route('offers')}}" class="custom-btn btn-request mt-3">ЗАПИТИ</a>
{{--            <a href="{{route('createOffer')}}" class="custom-btn btn-request mt-3">СТВОРИТИ ЗАПИТ</a>--}}
{{--            <a href="{{route('myOffers', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">МОЇ ЗАПИТИ</a>--}}
        @endif
    </div>
</main>
@endsection
