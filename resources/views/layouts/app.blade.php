<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Tag for the search bar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- App Name-->
    <title>{{ config('app.name', 'Aston') }}</title>
    <!-- JavaScript tag-->
    <script src="{{ asset('js/app.js') }}"></script>

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- slides animation -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Extra tags-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!-- Close estra tags-->

    <!--More tags for the email form -->


</head>
<body>
    <div id="app">
        @include('inc.navbar')
        @yield('extra_content')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>
    <!-- JavaScript tag-->
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);
        var today_date = moment().format('YYYY-MM-DD');
        document.getElementById("txtDate").value = today_date;
    </script>
</body>
</html>