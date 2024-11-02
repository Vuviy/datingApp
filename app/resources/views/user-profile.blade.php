@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">
        <!-- Основний контент -->
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img
                        src="{{$user->gender != '2' ? 'https://th-thumbnailer.cdn-si-edu.com/5a79C6jJ8BrChMX5tgEKiMI_qqo=/1000x750/filters:no_upscale():focal(792x601:793x602)/https://tf-cmsv2-smithsonianmag-media.s3.amazonaws.com/filer/52/e4/52e44474-c2dc-41e0-bb77-42a904695196/this-image-shows-a-portrait-of-dragon-man-credit-chuang-zhao_web.jpg' : 'https://pbs.twimg.com/profile_images/1221735342937645067/MGMXudrc_400x400.jpg'}}"
                        alt="{{ $user->name }}" class="img-fluid rounded-circle mb-3">
                </div>
                <div class="col-md-8">
                    <div class="d-flex">
                        <h1 style="margin-right: 50px">{{ $user->name }}</h1>

                        @if(auth()->id() != $user->id)
                            <a href="{{route('allChats', ['id' => $user->id])}}" class="btn btn-primary text-uppercase"
                               style="width: 100px; line-height: 50px; font-size: 20px">write</a>
                        @endif
                    </div>
                    <p>Вік: {{ $user->age }}</p>
                    <p>Стать: {{ $user->gender == 1 ? 'Male' : 'Female'}}</p>

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

            <div class="d-flex flex-column justify-content-center align-items-center">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @foreach($user->feeds as $feed)
                    @if(auth()->user())
                        @if(in_array($feed->id, auth()->user()->payedContents()) || !$feed->price)
                            <div class="card mb-3  w-75">
                                @if($feed->content)
                                    @if(str_contains($feed->content, 'https'))
                                        <img src="{{$feed->content}}" class="card-img-top w-50"
                                             alt="...">
                                    @else
                                        <img src="{{asset('storage/' . $feed->content)}}" class="card-img-top w-50"
                                             alt="...">
                                    @endif
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$feed->text}}</h5>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        @else
                            <div class="card mb-3  w-75">
                                @if($feed->content)
                                    <img src="{{asset('storage/fuck-you.jpg')}}" class="card-img-top w-50" alt="...">
                                @endif
                                <div class="card-body">
                                    <form method="post" action="{{route('feed_pay')}}">
                                        {{--                                    <form method="POST" action="{{route('gamno_pay', ['feedId' => $feed->id])}}">--}}
                                        @csrf
                                        <input hidden name="feedId" value="{{$feed->id}}">
                                        <button type="submit">pay for content ${{$feed->price}}</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        {{--                    @endif--}}
                    @else
                        @if(!$feed->price)
                            <div class="card mb-3  w-75">
                                @if($feed->content)
                                    @if(str_contains($feed->content, 'https'))
                                        <img src="{{$feed->content}}" class="card-img-top w-50"
                                             alt="...">
                                    @else
                                        <img src="{{asset('storage/' . $feed->content)}}" class="card-img-top w-50"
                                             alt="...">
                                    @endif
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$feed->text}}</h5>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        @else
                            <div class="card mb-3  w-75">
                                @if($feed->content)
                                    <img src="{{asset('storage/fuck-you.jpg')}}" class="card-img-top w-50" alt="...">
                                @endif
                                <div class="card-body">
                                    <form method="post" action="{{route('feed_pay')}}">
                                        {{--                                    <form method="POST" action="{{route('gamno_pay', ['feedId' => $feed->id])}}">--}}
                                        @csrf
                                        <input hidden name="feedId" value="{{$feed->id}}">
                                        <button type="submit">pay for content ${{$feed->price}}</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endif

                @endforeach

            </div>
        </div>


    </main>
@endsection
