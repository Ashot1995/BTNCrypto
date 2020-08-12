<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="user-scalable = yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title content="Crypto">Crypto</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<v-app id="app" v-cloak>

    <v-content>
        @include('partials.header')
        @yield('content')

    </v-content>
</v-app>
@stack('beforeScripts')
<script type="application/javascript" src="{{ mix('js/app.js') }}"></script>
@stack('afterScripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
