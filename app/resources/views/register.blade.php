@extends('layouts.base')

@section('content')
    <main class="container my-5 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3 class="card-title text-center mb-4">Register</h3>
                        <form method="post" action="{{route('register')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Електронна пошта</label>
                                <input type="email" class="form-control" name="email" id="email" value="vvv@gmail.com" placeholder="Введіть вашу електронну пошту">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" class="form-control" name="password" id="password" value="1111" placeholder="Введіть ваш пароль">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Повторіть пароль</label>
                                <input type="password" class="form-control" id="password_confirmation" value="1111" name="password_confirmation" placeholder="Повторіть ваш пароль" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
