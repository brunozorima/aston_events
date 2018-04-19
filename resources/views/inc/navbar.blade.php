<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/index') }}">
                {{ config('app.name', 'Aston') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav">
                <li ><a href="{{ url('events') }}">EVENTS</a></li>
                <li ><a href="{{ url('/event/create') }}">CREATE EVENT</a></li>

                <!-- Dropdown menu tp filter different types of events and date-->
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">CATEGORY
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a>
                                <div class="search-container">
                                    <form action="/event/search">
                                        <input type="text" placeholder="Event name, organiser.." name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </a>
                        </li>
                        <li><a href="{{ url('events') }}">ALL EVENTS</a></li>
                        <li><a href="/event/newest">UPCOMING EVENTS</a></li>
                        <li><a href="/event/oldest">FUTURE EVENTS</a></li>
                        <li><a href="/event/sort/name/asc">SORT BY NAME (ASC)</a></li>
                        <li><a href="/event/sort/name/desc">SORT BY NAME (DESC)</a></li>
                        <li><a href="/event/sport">SPORT</a></li>
                        <li><a href="/event/culture">CULTURE</a></li>
                        <li><a href="/event/music">MUSIC</a></li>
                        <li><a href="/event/other">OTHER</a></li>


                        <li class="dropdown-submenu">
                            <a class="dropdown-toggle drop" id="reportrange" data-toggle="dropdown" href="#">DATE
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span class="caret"></span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('about') }}">ABOUT US</a></li>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}" ><span class="glyphicon glyphicon-user"></span> LOGIN</a></li>
                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> REGISTER</a></li>
                @else
                    <li><a href="{{ url('/event') }}">DASHBOARD</a></li>
                    {{--<li><a href="{{ url('/event/create') }}">Add event</a></li>--}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    LOGOUT
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@section('extra_content')
    <script>
        $(document).ready(function(){
            $('.dropdown-submenu a.drop').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange a.drop');
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
@endsection