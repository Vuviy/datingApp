@extends('layouts.base')

@section('content')
    <main class="container" style="display: block">
        <div class="filter-section mt-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="category" class="form-label">Категорія</label>
                    <select id="category" class="form-select">
                        <option selected>Легкові автомобілі</option>
                        <option>Вантажні автомобілі</option>
                        <option>Мотоцикли</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="subcategory" class="form-label">Підкатегорія</label>
                    <select id="subcategory" class="form-select">
                        <option selected>Всі оголошення</option>
                        <option>Продаються</option>
                        <option>Обмін</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Ціна</label>
                    <div class="d-flex">
                        <input type="number" class="form-control me-2" id="price-from" placeholder="Від">
                        <input type="number" class="form-control" id="price-to" placeholder="До">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Тип автомобіля</label>
                    <select id="type" class="form-select">
                        <option selected>Всі оголошення</option>
                        <option>Нові</option>
                        <option>Вживані</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h2 class="mb-5">Результати пошуку</h2>
            @foreach($peoples as $people)
            <div class="result-card d-flex" style="height: 200px; margin-bottom: 20px">
                <a href="{{route('userProfile', $people)}}">
                    <img  src="https://pbs.twimg.com/profile_images/1221735342937645067/MGMXudrc_400x400.jpg" alt="Фото профілю" style="max-height: 100%">
                </a>
                    <div class="info" style="margin-left: 20px">
                        <a href="{{route('userProfile', $people)}}" style="text-decoration: none; color: black">
                            <h3>{{$people->name}}</h3>
                        </a>
                    <p>Вік: {{$people->age}}</p>
                    <p>Інтереси:

                        @if($people->interests)
                            @foreach($people->interests as $interest)
                                {{$interest->name}},
                            @endforeach
                        @endif
                    </p>
                </div>
            </div>
            @endforeach
            <div>{{ $peoples->links('vendor.pagination.bootstrap-5') }}</div>
        </div>
    </main>

@endsection
