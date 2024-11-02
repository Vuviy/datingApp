
@extends('layouts.base')

@section('content')
<main class="container my-5" style="display: block">
    <!-- Основний контент -->
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


                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-6">
                                        <div class="card">
                                            @if (session('status-info'))
                                                <div class="alert alert-success">
                                                    {{ session('status-info') }}
                                                </div>
                                            @endif
                                            <div class="card-header">
                                                <h4>шо шукаєш</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{route('looking-for.store')}}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="age" class="form-label">age</label>
                                                        <input type="number" class="form-control" id="age" name="age"
                                                               value="{{$user->fastDateInfo->age ?: ''}}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">gender</label>
                                                        <select class="form-select" id="gender" name="gender">
                                                            <option value="" disabled selected>Оберіть gender</option>
                                                            <option {{$user->fastDateInfo->gender == '1' ? 'selected' : ''}} value="1">man
                                                            </option>
                                                            <option {{$user->fastDateInfo->gender  == '2' ? 'selected' : ''}} value="2">female
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="height" class="form-label">height</label>
                                                        <input type="number" class="form-control" id="height" name="height"
                                                               value="{{$user->fastDateInfo->height ?: ''}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="weight" class="form-label">weight</label>
                                                        <input type="number" class="form-control" id="weight" name="weight"
                                                               value="{{$user->fastDateInfo->weight ?: ''}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="hair_color" class="form-label">hair_color</label>
                                                        <select class="form-select" id="hair_color" name="hair_color">
                                                            <option value="" disabled selected>Оберіть hair_color</option>
                                                            <option value="">all
                                                            </option>
                                                            <option {{$user->fastDateInfo->hair_color == '1' ? 'selected' : ''}} value="1">black
                                                            </option>
                                                            <option {{$user->fastDateInfo->hair_color  == '2' ? 'selected' : ''}} value="2">white
                                                            </option>
                                                            <option {{$user->fastDateInfo->hair_color  == '3' ? 'selected' : ''}} value="3">brown
                                                            </option>
                                                            <option {{$user->fastDateInfo->hair_color  == '4' ? 'selected' : ''}} value="4">red
                                                            </option>
                                                            <option {{$user->fastDateInfo->hair_color  == '5' ? 'selected' : ''}} value="5">yellow
                                                            </option>
                                                        </select>
                                                    </div>

                                                        <div class="mb-3">
                                                            <label for="boobs_size" class="form-label">boobs_size</label>
                                                            <input type="number" class="form-control" id="boobs_size" name="boobs_size"
                                                                   value="{{$user->fastDateInfo->boobs_size ?: ''}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="dick_length" class="form-label">dick_length</label>
                                                            <input type="number" class="form-control" id="dick_length" name="dick_length"
                                                                   value="{{$user->fastDateInfo->dick_length ?: ''}}">
                                                        </div>

                                                    <div class="mb-3">
                                                        <label for="waistline" class="form-label">waistline</label>
                                                        <input type="number" class="form-control" id="waistline" name="waistline"
                                                               value="{{$user->fastDateInfo->waistline ?: ''}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ass_girth" class="form-label">ass_girth</label>
                                                        <input type="number" class="form-control" id="ass_girth" name="ass_girth"
                                                               value="{{$user->fastDateInfo->ass_girth ?: ''}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="goal_here" class="form-label">goal_here</label>
                                                        <select class="form-select" id="goal_here" name="goal_here">
                                                            <option value="" disabled selected>Оберіть goal_here</option>
                                                            <option value="">all
                                                            </option>
                                                            <option {{$user->fastDateInfo->goal_here == '1' ? 'selected' : ''}} value="1">єбля
                                                            </option>
                                                            <option {{$user->fastDateInfo->goal_here  == '2' ? 'selected' : ''}} value="2">відносини
                                                            </option>
                                                            <option {{$user->fastDateInfo->goal_here  == '3' ? 'selected' : ''}} value="3">тусня
                                                            </option>
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Відправити</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
