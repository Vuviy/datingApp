@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4>Додати запис</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('create_feed')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="text" class="form-label">Текст</label>
                                <input type="text" class="form-control" id="text" name="text">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <input type="file" class="form-control" id="content" name="content">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <button type="submit" class="btn btn-primary">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="m-5 row justify-content-center">
                    <h2>Content</h2>
                </div>
                @foreach($user->feeds as $feed)
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        @if($feed->content)
                            <img src="{{asset('storage/' . $feed->content)}}" class="card-img-top w-50" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$feed->text}}</h5>
{{--                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to--}}
{{--                                additional content. This content is a little bit longer.</p>--}}
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <form method="post" action="{{route('delete_feed', ['feedId' => $feed->id])}}">
                            @csrf
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </div>
                    <hr>
            @endforeach
            </div>
        </div>
    </main>
@endsection


{{--@section('scripts')--}}
{{--    <script>--}}

{{--        $(document).ready(function () {--}}
{{--            $('#interest_name').autocomplete({--}}
{{--                source: function (request, response) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('interests.autocomplete') }}",--}}
{{--                        data: {--}}
{{--                            term: request.term--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            response(data);--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                select: function (event, ui) {--}}
{{--                    $('#interest_name').val(ui.item.value);--}}
{{--                    $('#interest_id').val(ui.item.id);--}}
{{--                    return false;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
