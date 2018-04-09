<nav class="navbar navbar-inverse">
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
                <li><a href="{{ url('events') }}">EVENTS</a></li>
                <li class="float-left" ><a href="{{ url('/event/create') }}">CREATE EVENT</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">CATEGORY
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/event/sport">SPORT</a></li>
                        <li><a href="/event/culture">CULTURE</a></li>
                        <li><a href="/event/music">MUSIC</a></li>
                        <li><a href="/event/other">OTHER</a></li>
                    </ul>
                </li>
                {{--<li><a href="{{ url('about') }}">ABOUT US</a></li>--}}
                <li>
                    <a>
                        <div class="search-container">
                            <form action="/event/search">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </a>
                </li>


                <!-- FILTER BUTTON BASED ON SELECTED DATE-->
                <li class="dropdown">
                    {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">Category:--}}
                        {{--<span class="caret"></span></a>--}}
                    <ul class="dropdown-menu">Clikc
                        <li>@include('pages.dropdown')</li>
                    </ul>


                </li>

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