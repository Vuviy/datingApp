@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">
        <!-- Основний контент -->
        <div class="container mt-5">
            <div>
                <h2>
                    <a href="{{route('feed', ['userId' => $user->id])}}">
                        feed
                    </a>
                </h2>
            </div>
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
                            <h4>Заповніть свої дані</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('edit_profile')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ім'я</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$user->name ?: ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Пошта</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{$user->email}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Стать</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="" disabled selected>Оберіть стать</option>
                                        <option {{$user->gender == 'male' ? 'selected' : ''}} value="male">Чоловіча
                                        </option>
                                        <option {{$user->gender == 'female' ? 'selected' : ''}} value="female">Жіноча
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Вік</label>
                                    <input type="number" class="form-control" id="age" name="age"
                                           value="{{$user->age ?: ''}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Відправити</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <div class="card">
                        @if (session('status-info'))
                            <div class="alert alert-success">
                                {{ session('status-info') }}
                            </div>
                        @endif
                        <div class="card-header">
                            <h4>Заповніть свої дані</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('edit_info')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="height" class="form-label">height</label>
                                    <input type="number" class="form-control" id="height" name="height"
                                           value="{{$user->info->height ?: ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">weight</label>
                                    <input type="number" class="form-control" id="weight" name="weight"
                                           value="{{$user->info->weight ?: ''}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hair_color" class="form-label">hair_color</label>
                                    <select class="form-select" id="hair_color" name="hair_color">
                                        <option value="" disabled selected>Оберіть hair_color</option>
                                        <option {{$user->info->hair_color == '1' ? 'selected' : ''}} value="1">black
                                        </option>
                                        <option {{$user->info->hair_color  == '2' ? 'selected' : ''}} value="2">white
                                        </option>
                                        <option {{$user->info->hair_color  == '3' ? 'selected' : ''}} value="3">brown
                                        </option>
                                        <option {{$user->info->hair_color  == '4' ? 'selected' : ''}} value="4">red
                                        </option>
                                        <option {{$user->info->hair_color  == '5' ? 'selected' : ''}} value="5">yellow
                                        </option>
                                    </select>
                                </div>
                                @if($user->gender == 'female')
                                    <div class="mb-3">
                                        <label for="boobs_size" class="form-label">boobs_size</label>
                                        <input type="number" class="form-control" id="boobs_size" name="boobs_size"
                                               value="{{$user->info->boobs_size ?: ''}}">
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <label for="dick_length" class="form-label">dick_length</label>
                                        <input type="number" class="form-control" id="dick_length" name="dick_length"
                                               value="{{$user->info->dick_length ?: ''}}">
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="waistline" class="form-label">waistline</label>
                                    <input type="number" class="form-control" id="waistline" name="waistline"
                                           value="{{$user->info->waistline ?: ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="ass_girth" class="form-label">ass_girth</label>
                                    <input type="number" class="form-control" id="ass_girth" name="ass_girth"
                                           value="{{$user->info->ass_girth ?: ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="goal_here" class="form-label">goal_here</label>
                                    <select class="form-select" id="goal_here" name="goal_here">
                                        <option value="" disabled selected>Оберіть goal_here</option>
                                        <option {{$user->info->goal_here == '1' ? 'selected' : ''}} value="1">єбля
                                        </option>
                                        <option {{$user->info->goal_here  == '2' ? 'selected' : ''}} value="2">відносини
                                        </option>
                                        <option {{$user->info->goal_here  == '3' ? 'selected' : ''}} value="3">тусня
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


        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2>Interests</h2>
                    <form action="{{ route('users.interests.add', $user) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="interest_name">Add Interest</label>
                            <input type="text" name="name" id="interest_name" class="form-control" autocomplete="off">
                            <input type="hidden" name="interest_id" id="interest_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Interest</button>
                    </form>

                    <ul>
                        @foreach($user->interests as $interest)
                            <li>{{ $interest->name }}
                                <form action="{{ route('users.interests.detach', $user) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="interest_id" value="{{ $interest->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script>

        $(document).ready(function () {
            $('#interest_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('interests.autocomplete') }}",
                        data: {
                            term: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#interest_name').val(ui.item.value);
                    $('#interest_id').val(ui.item.id);
                    return false;
                }
            });
        });
    </script>
@endsection
