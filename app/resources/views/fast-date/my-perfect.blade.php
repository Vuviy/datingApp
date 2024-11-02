@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">

        @if(!empty($items))
            @foreach($items as $item)
                    <div class="result-card d-flex" style="margin-bottom: 20px; width: 400px;">
                        <a href="{{route('userProfile', $item->id)}}">
                            <img  src="{{$item->gender != '2' ? 'https://th-thumbnailer.cdn-si-edu.com/5a79C6jJ8BrChMX5tgEKiMI_qqo=/1000x750/filters:no_upscale():focal(792x601:793x602)/https://tf-cmsv2-smithsonianmag-media.s3.amazonaws.com/filer/52/e4/52e44474-c2dc-41e0-bb77-42a904695196/this-image-shows-a-portrait-of-dragon-man-credit-chuang-zhao_web.jpg' : 'https://pbs.twimg.com/profile_images/1221735342937645067/MGMXudrc_400x400.jpg'}}" alt="Фото профілю" style="height: 200px; width: 200px">
                        </a>
                        <div class="info" style="margin-left: 20px">
                            <a href="{{route('userProfile', $item->id)}}" style="text-decoration: none; color: black">
                                <h3>{{$item->name}}</h3>
                            </a>
                            <p>Вік: {{$item->age}}</p>
                            <p>Стать: {{$item->gender == 1 ? 'Male' : 'Female'}}</p>
                        </div>
                    </div>
{{--                @foreach($item as $name => $value)--}}


{{--                    <div>--}}
{{--                        {{$name .' - '. $value }}--}}
{{--                        <br>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                @endforeach--}}
                    <hr>
            @endforeach

        @endif


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
