@extends('layouts.base')

@section('content')
    <main class="container my-5" style="display: block">
        <!-- Основний контент -->
        <div class="container mt-5">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div>
                     <h2>
                         Your money {{$user->wallet->amount}}
                     </h2>
                </div>
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
                            <h4>deposit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('deposit')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="amount" class="form-label">amount</label>
                                    <input type="number" step="0.01" class="form-control" id="amount" name="amount">
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


{{--@section('scripts')--}}
{{--    <script>--}}

{{--        $(document).ready(function () {--}}
{{--            $('#interest_name').autocomplete({--}}
{{--                source: function (request, response) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('interests.autocomplete') }}",--}}
{{--                        data: {--}}
{{--                            term: request.term--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            response(data);--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                select: function (event, ui) {--}}
{{--                    $('#interest_name').val(ui.item.value);--}}
{{--                    $('#interest_id').val(ui.item.id);--}}
{{--                    return false;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
