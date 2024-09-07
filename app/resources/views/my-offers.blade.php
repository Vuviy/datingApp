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
                    @foreach($offers as $offer)
                        <div class="card border-primary mb-3" style="max-width: 600px; margin: 20px auto;">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">{{$offer->name}}</h5>
                                    <p class="card-text">{{$offer->description}}</p>
                                </div>
                                <div>
                                    <form action="{{route('offers.delete', ['offerId' => $offer->id])}}"
                                          id="deleteForm-{{$offer->id}}" method="post">
                                        @csrf
                                        {{--                                        <button class="btn btn-danger" type="submit">delete</button>--}}
                                        <button class="btn btn-danger deleteButton" data-id="{{$offer->id}}">Видалити
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                @if($offer->responds()->count())
                                    <h5>Vidpovidi:</h5>
                                    @foreach($offer->responds as $respond)
                                        <div class="d-flex justify-content-between bg-info mt-3">
                                            <p>{{$respond->comment}}</p>
                                            <a href="{{route('allChats', ['id' => $respond->user->id, 'respond' => $respond->id])}}"
                                               class="btn btn-primary"
                                               style="width: 100px; line-height: 50px; font-size: 20px">write</a>

                                            @switch($respond->status)
                                                @case(3)<button class="btn btn-danger-soft">ignored</button> @break;
                                                @case(4)<button class="btn btn-danger-soft">ви вже написали</button> @break;
                                                <form action="{{route('ignoreRespond')}}" method="post">
                                                    @csrf
                                                    <input hidden value="{{$respond->id}}" name="respondId">
                                                    <button class="btn btn-danger" type="submit">ignore</button>
                                                </form
                                            @endswitch
{{--                                            @if($respond->status == 3)--}}
{{--                                                <button class="btn btn-danger-soft">ignored</button>--}}
{{--                                            @elseif($respond->status == 4)--}}
{{--                                                <button class="btn btn-check">ви вже написали</button>--}}
{{--                                            @else--}}
{{--                                                <form action="{{route('ignoreRespond')}}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    <input hidden value="{{$respond->id}}" name="respondId">--}}
{{--                                                    <button class="btn btn-danger" type="submit">ignore</button>--}}
{{--                                                </form--}}
{{--                                            @endif--}}


                                        </div>
                                    @endforeach

                                @endif

                                {{--                            <form class="d-flex" method="post" action="{{route('offers.respond')}}">--}}
                                {{--                                @csrf--}}
                                {{--                                <input type="text" name="comment" class="form-control me-2" placeholder="Ваш коментар">--}}
                                {{--                                <input type="text" name="offer_id" hidden value="{{$offer->id}}">--}}

                                {{--                                <button {{$offer->disabled}} type="submit" class="btn btn-success">Відгукнутись</button>--}}
                                {{--                            </form>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')

    <script>


        document.querySelectorAll('.deleteButton').forEach(button => {


            // console.log(5555);

            button.addEventListener('click', function (event) {
                event.preventDefault(); // Зупиняємо стандартну поведінку кнопки
                const recordId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Ви впевнені?',
                    text: "Цей запис буде видалено назавжди!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Так, видалити!',
                    cancelButtonText: 'Скасувати'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(`Запис з ID ${recordId} видалено.`);
                        // Виконайте реальне видалення, наприклад, відправка форми
                        document.getElementById('deleteForm-' + recordId).submit();
                    }
                });
            });
        });

    </script>
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
