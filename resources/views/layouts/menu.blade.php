<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-4">
                    {{--<div class="top-number"><p><i class="fa fa-phone-square"></i> +43 660 / 490 10 28</p></div>--}}
                </div>

                <div class="col-sm-3 col-xs-4">
                    @if (Auth::guest())
                        {{--<p>Du bist nicht eingeloggt!</p> <--- nicht ausgeben wie Authguest verneinen; ! geht ned XD--}}
                    @endif
                </div>

                <div class="col-sm-6 col-xs-8">
                    @if (Auth::guest())
                        <a class="btn btn-primary" href="{{ url('/login') }}">Anmelden</a>
                        <a class="btn btn-primary" href="{{ url('/register') }}">Registrieren</a>
                    @else
                        <a href="{{ url('/logout') }}" class="btn btn-primary">Abmelden</a>
                        <a href="{{ url('/profile') }}" class="btn btn-primary">Profil</a>
                    @endif
                </div>
            </div>


        </div>
        <!--/.container-->
    </div>
    <!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo/logoNsheep.png') }}" height="60px" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">School on Snow <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('wasistdas') }}">Was ist das?</a></li>
                            <li><a href="{{ url('ihr_vorteil') }}">Ihr Vorteil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Angebot <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="{{ url('offer') }}">Terminübersicht</a></li>
                            <li><a href="{{ url('offer') }}">Preise</a></li>-->
                            <li><a href="{{ url('angebot/volksschulen') }}">Volksschule</a></li>
                            {{--<li><a href="{{ url('angebot/oberstufe') }}">Sekundar- & Oberstufe</a></li>--}}
                        </ul>
                    </li>
                    {{--<li><a href="{{ url('news') }}">News</a></li>--}}
                    <li><a href="{{ url('partner') }}">Partner</a></li>
                    {{--<li><a href="#">Bilder & Presse</a></li>--}}
                    <li><a href="{{ url('contact') }}">Kontakt</a></li>

                </ul>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>