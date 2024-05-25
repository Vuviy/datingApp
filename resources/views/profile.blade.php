
@extends('layouts.base')

@section('content')
<main class="container my-5">
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
</main>
@endsection
