<!DOCTYPE html>
<html lang="ja">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('kakeibo.css') }}"> -->
<link rel="stylesheet" type="text/css" href="@yield('CSS')">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('boot.js') }}"></script>
    <script src="{{ asset('input.js') }}"></script>
    <title>@yield('title')</title>
    @vite('resources/sass/app.scss')
</head>


<body onload="init()">

@csrf
<h1>@yield('h1')</h1>
@yield('データ一覧')

</body>
</html>