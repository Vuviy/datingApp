@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">
        <!-- Основний контент -->

        <div>
            {{--    <div class="row justify-content-center">--}}
            <a href="{{route('lookingFor', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">шо я шукаю</a>
            <a href="{{route('myPerfect', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">за моїми критерiями найкраще</a>
{{--            <a href="{{route('myRespond', ['userId' => auth()->id()])}}" class="custom-btn btn-request mt-3">МОЇ--}}
{{--                myRespond</a>--}}
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
