<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/js/app.js"></script>

{{--    <link rel="stylesheet" href="https: //stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
</head>
<body>
    @include('header')

    @yield('content')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            scrollTo(0, 0);
        });

        document.querySelector('.switch-input').addEventListener('click', function (e){
            if (this.checked) {
                $('.gruz_poisk').hide();
                $('.transport_poisk').show();
            }

            else {
                $('.gruz_poisk').show();
                $('.transport_poisk').hide();
            }
        })
    </script>
 </body>
</html>
