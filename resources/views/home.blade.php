<!doctype html>
<html lang="en" id="home-page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trans Express</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/js/app.js"></script>
</head>
<body>

@include('header')
@include('inc.messages')

<main>

    @include('poisk.poisk_template')
    <script type="text/javascript">

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
</main>

