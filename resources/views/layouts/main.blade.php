<!DOCTYPE HTML>
<html>

<head>
{{--    <title>User Card - <?=$user->name?></title>--}}
    @foreach($data as $user)
    <title>User Card - {{$user->name}}</title>
    @endforeach
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{asset('res/css/main.css')}}"/>
    <noscript>
        <link rel="stylesheet" href="{{asset('res/css/noscript.css')}}"/>
    </noscript>
</head>

<body class="is-preload">
<div id="wrapper">

    {{--    Main--}}
    @include('layouts.body')

    @yield('content')

    @include('layouts.footer')
    {{--    Footer--}}

</div>

<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function () {
            document.body.className = document.body.className.replace(/\bis-preload\b/, '');
        });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>
