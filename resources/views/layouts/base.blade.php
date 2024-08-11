<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badoost</title>
    <!-- Підключення стилів Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        /* Стилі для забезпечення, щоб футер був внизу */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <style>
        .custom-btn {
            display: inline-block;
            padding: 30px 60px; /* Збільшення розміру кнопок */
            font-size: 36px; /* Збільшення розміру тексту */
            font-weight: bold;
            text-align: center;
            /*border: 2px solid black;*/
            /*border-radius: 10px;*/
            transition: box-shadow 0.2s, background-color 0.2s;
            color: black;
            text-decoration: none;
        }

        .custom-btn:hover {
            box-shadow: 15px 10px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }

        .btn-people {
            background-color: #0d81ea;
            color: black;
        }

        .btn-request {
            background-color: #af0c54;
            color: black;
        }
        .btn-people:hover {
            background-color: #0e97d5;
        }
        .btn-request:hover {
            background-color: #d52573;
        }
        .button-container {
            position: absolute;
            top: 20%;
            left: 20%;
        }
    </style>

</head>
<body>
    <!-- Хедер -->

    @include('.includes.header')

    <!-- Основний контент -->
        @yield('content')

    <!-- Футер -->
    @include('.includes.footer')

{{--    <!-- Підключення скриптів Bootstrap 5 -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>--}}


    <!-- Інші скрипти -->
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>--}}

{{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}


{{--    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js" integrity="sha256-J8ay84czFazJ9wcTuSDLpPmwpMXOm573OUtZHPQqpEU=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>--}}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')


<script>


</script>
</body>
</html>
