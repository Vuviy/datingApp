@extends('layouts.base')

@section('content')
    <main class="container" style="display: block">
        <form method="GET">
            <div class="filter-section mt-4">
                <div class="row">
                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="gender" class="form-label">Стать</label>
                        <select id="gender" name="gender" class="form-select">
                            <option selected value="all" >All</option>
                            <option {{request('gender') == 'male' ? 'selected' : '' }} value="male">Мужики</option>
                            <option {{request('gender') == 'female' ? 'selected' : '' }} value="female">Тьолки</option>
                        </select>
                    </div>
                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="goal_here" class="form-label">goal_here</label>
                        <select id="goal_here" name="goal_here" class="form-select">
                            <option selected value="all" >All</option>
                            <option {{request('goal_here') == '1' ? 'selected' : '' }} value="1">Єбля</option>
                            <option {{request('goal_here') == '2' ? 'selected' : '' }} value="2">Вiдносини</option>
                            <option {{request('goal_here') == '3' ? 'selected' : '' }} value="3">Тусня</option>
                        </select>
                    </div>
                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="age" class="form-label">Вік</label>
                        <div class="d-flex">
                            <input name="age_from" value="{{request('age_from') ?: request('age_from') }}" type="number" class="form-control me-2" id="age_from" placeholder="Від">
                            <input name="age_to" value="{{request('age_to') ?: request('age_to') }}" type="number" class="form-control" id="age_to" placeholder="До">
                        </div>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="height" class="form-label">height</label>
                        <div class="d-flex">
                            <input name="height_from" value="{{request('height_from') ?: request('height_from') }}" type="number" class="form-control me-2" id="height_from" placeholder="Від">
                            <input name="height_to" value="{{request('height_to') ?: request('height_to') }}" type="number" class="form-control" id="height_to" placeholder="До">
                        </div>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="weight" class="form-label">weight</label>
                        <div class="d-flex">
                            <input name="weight_from" value="{{request('weight_from') ?: request('weight_from') }}" type="number" class="form-control me-2" id="weight_from" placeholder="Від">
                            <input name="weight_to" value="{{request('weight_to') ?: request('weight_to') }}" type="number" class="form-control" id="weight_to" placeholder="До">
                        </div>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="hair_color" class="form-label">hair_color</label>
                        <select id="hair_color" name="hair_color" class="form-select">
                            <option selected value="all" >All</option>
                            <option {{request('hair_color') == '1' ? 'selected' : '' }} value="1">black</option>
                            <option {{request('hair_color') == '2' ? 'selected' : '' }} value="2">white</option>
                            <option {{request('hair_color') == '3' ? 'selected' : '' }} value="3">brown</option>
                            <option {{request('hair_color') == '4' ? 'selected' : '' }} value="4">red</option>
                            <option {{request('hair_color') == '5' ? 'selected' : '' }} value="5">yellow</option>
                        </select>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="boobs_size" class="form-label">boobs_size</label>
                        <div class="d-flex">
                            <input name="boobs_size_from" value="{{request('boobs_size_from') ?: request('boobs_size_from') }}" type="number" class="form-control me-2" id="boobs_size_from" placeholder="Від">
                            <input name="boobs_size_to" value="{{request('boobs_size_to') ?: request('boobs_size_to') }}" type="number" class="form-control" id="boobs_size_to" placeholder="До">
                        </div>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="ass_girth" class="form-label">ass_girth</label>
                        <div class="d-flex">
                            <input name="ass_girth_from" value="{{request('ass_girth_from') ?: request('ass_girth_from') }}" type="number" class="form-control me-2" id="ass_girth_from" placeholder="Від">
                            <input name="ass_girth_to" value="{{request('ass_girth_to') ?: request('ass_girth_to') }}" type="number" class="form-control" id="ass_girth_to" placeholder="До">
                        </div>
                    </div>

                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="waistline" class="form-label">waistline</label>
                        <div class="d-flex">
                            <input name="waistline_from" value="{{request('waistline_from') ?: request('waistline_from') }}" type="number" class="form-control me-2" id="waistline_from" placeholder="Від">
                            <input name="waistline_to" value="{{request('waistline_to') ?: request('waistline_to') }}" type="number" class="form-control" id="waistline_to" placeholder="До">
                        </div>
                    </div>
                    <div class="col-md-2 border border-primary p-1 m-1">
                        <label for="dick_length" class="form-label">dick_length</label>
                        <div class="d-flex">
                            <input name="dick_length_from" value="{{request('dick_length_from') ?: request('dick_length_from') }}" type="number" class="form-control me-2" id="dick_length_from" placeholder="Від">
                            <input name="dick_length_to" value="{{request('dick_length_to') ?: request('dick_length_to') }}" type="number" class="form-control" id="dick_length_to" placeholder="До">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto m-3">
                <button type="submit" class="btn btn-primary mb-3">search</button>
            </div>
        </form>
        <div class="mt-3">
            <h2 class="mb-5">Результати пошуку</h2>
            @foreach($peoples as $people)
            <div class="result-card d-flex" style="margin-bottom: 20px; width: 400px;">
                <a href="{{route('userProfile', $people)}}">
                    <img  src="{{$people->gender != 'female' ? 'https://th-thumbnailer.cdn-si-edu.com/5a79C6jJ8BrChMX5tgEKiMI_qqo=/1000x750/filters:no_upscale():focal(792x601:793x602)/https://tf-cmsv2-smithsonianmag-media.s3.amazonaws.com/filer/52/e4/52e44474-c2dc-41e0-bb77-42a904695196/this-image-shows-a-portrait-of-dragon-man-credit-chuang-zhao_web.jpg' : 'https://pbs.twimg.com/profile_images/1221735342937645067/MGMXudrc_400x400.jpg'}}" alt="Фото профілю" style="height: 200px; width: 200px">
                </a>
                    <div class="info" style="margin-left: 20px">
                        <a href="{{route('userProfile', $people)}}" style="text-decoration: none; color: black">
                            <h3>{{$people->name}}</h3>
                        </a>
                    <p>Вік: {{$people->age}}</p>
                    <p>Стать: {{$people->gender}}</p>
                    <p>Інтереси:

                        @if($people->interests)
                            @foreach($people->interests as $interest)
                                <p>
                                    {{$interest->name}},
                                </p>
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
