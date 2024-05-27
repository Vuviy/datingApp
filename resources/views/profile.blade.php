
@extends('layouts.base')

@section('content')
<main class="container my-5" style="display: block">
    <!-- Основний контент -->
    <div class="container mt-5">
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
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name ?: ''}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Пошта</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Стать</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="" disabled selected>Оберіть стать</option>
                                    <option {{$user->gender == 'male' ? 'selected' : ''}} value="male">Чоловіча</option>
                                    <option {{$user->gender == 'female' ? 'selected' : ''}} value="female">Жіноча</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Вік</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{$user->age ?: ''}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Відправити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
{{--        <div class="container row justify-content-center">--}}
{{--            <h1>Interests</h1>--}}
{{--            <form action="{{ route('interests.store') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="name">Interest Name</label>--}}
{{--                    <input type="text" name="name" id="name" class="form-control" required>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary">Add Interest</button>--}}
{{--            </form>--}}

{{--            <ul>--}}
{{--                @foreach($interests as $interest)--}}
{{--                    <li>{{ $interest->name }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}

        <div class="container">
            <h1>{{ $user->name }}'s Profile</h1>

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
                        <form action="{{ route('users.interests.detach', $user) }}" method="POST" style="display:inline;">
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
</main>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#interest_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('interests.autocomplete') }}",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#interest_name').val(ui.item.value);
                    $('#interest_id').val(ui.item.id);
                    return false;
                }
            });
        });
    </script>
@endsection
