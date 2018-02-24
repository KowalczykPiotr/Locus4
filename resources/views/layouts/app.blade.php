<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <!--link href="{{ URL::asset('css/app.css') }}" rel="stylesheet"-->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/fontawesome-all.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/colors.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/print.min.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}"></script-->
    <script src="{{ URL::asset('/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('js/angular-1.6.6/angular.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/js/angular-1.6.6/angular-sanitize.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/js/angular-1.6.6/angular-base64.min.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/my-scripts/custom.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/print.min.js') }}" type="text/javascript"></script>


</head>
<body>
    <div id="app">


        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-th"></i> WebDeveloper</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="row w-100">
                    <div class="col-sm-10">
                        <ul class="navbar-nav">
                            <li class="nav-item  @yield('mnu-home')">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    @lang('common.mnu_home') <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            @auth
                            <li class="nav-item @yield('mnu-letters')">
                                <a class="nav-link" href="{{ url('/letters') }}">@lang('common.mnu_letters')</a>
                            </li>
                            <li class="nav-item @yield('mnu-clients')">
                                <a class="nav-link" href="{{ url('/clients') }}">@lang('common.mnu_clients')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>

                            <li class="nav-item dropdown @yield('mnu-admin')">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @lang('common.mnu_admin')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <div>
                                        <a class="dropdown-item" href="{{ url('/admin/letter-types/') }}">
                                            @lang('common.mnu_letter_types')
                                        </a>
                                        <a class="dropdown-item" href="{{ url('/admin/customer-groups/') }}">
                                            @lang('common.mnu_customer_groups')
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endauth
















                        </ul>
                    </div>

                    <div class="col-sm-2">
                        <ul class="navbar-nav">

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('common.mnu_login')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('common.mnu_register')</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            @lang('common.mnu_logout')
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        @yield('content')



    </div>

</body>
</html>
