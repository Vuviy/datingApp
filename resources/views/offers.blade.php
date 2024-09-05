
@extends('layouts.base')

@section('content')
<main class="container my-5" style="display: block">
    <!-- Основний контент -->

    <div>
{{--    <div class="row justify-content-center">--}}
        <a href="{{route('createOffer')}}" class="custom-btn btn-request mt-3">СТВОРИТИ ЗАПИТ</a>
        <a href="{{route('myOffers', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">МОЇ ЗАПИТИ</a>
        <a href="{{route('myRespond', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">МОЇ myRespond</a>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach($offers as $offer)
                    <div class="card border-primary mb-3" style="max-width: 600px; margin: 20px auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$offer->name}}</h5>
                            <p class="card-text">{{$offer->description}}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <form class="d-flex" method="post" action="{{route('offers.respond')}}">
                                @csrf
                                <input type="text" name="comment" class="form-control me-2" placeholder="Ваш коментар">
                                <input type="text" name="offer_id" hidden value="{{$offer->id}}">

                                <button {{$offer->disabled}} type="submit" class="btn btn-success">{{$offer->disabled ? 'ви вже Відгукнулися' : 'Відгукнутись' }}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection


{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#interest_name').autocomplete({--}}
{{--                source: function(request, response) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('interests.autocomplete') }}",--}}
{{--                        data: {--}}
{{--                            term: request.term--}}
{{--                        },--}}
{{--                        success: function(data) {--}}
{{--                            response(data);--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                select: function(event, ui) {--}}
{{--                    $('#interest_name').val(ui.item.value);--}}
{{--                    $('#interest_id').val(ui.item.id);--}}
{{--                    return false;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
