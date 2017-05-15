@extends('layouts.master')

@section('title')
    Home
@stop

@section('slider')
    @include('layouts.slider')
@stop
@section('content')
    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <img src="{{ asset('img/sheep/sheep_3.png') }}" class="img-responsive" height="100px">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="media-body">
                            <a class="btn btn-primary btn-lg" href="/ihr_vorteil" id="benefitbutton">Ihr Vorteil</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <img src="{{ asset('img/sheep/sheep_4.png') }}" class="img-responsive" height="80px">
                    </div>
                </div>
            </div>
            </div>
    </section><!-- /#conatcat-info -->

    <section id="feature" >
        <div class="container">
            <div class="center wow fadeInDown">
                <p class="lead">Ein Projekt von SBG-Events in Zusammenarbeit mit dem Landesschulrat für Salzburg, dem Sportland Salzburg, der Salzburger Tourismusförderung, dem Salzburger Skiverband sowie dem Kuratorium für Verkehrssicherheit als Medienpartner.</p>
                <p class="lead">SCHOOL on SNOW soll zur Förderung des Skisportes in Salzburg bei der jungen Bevölkerung beitragen.</p>
        </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="{{ url('wasistdas') }}"><div class="feature-wrap">
                            <i class="fa fa-question"></i>
                            <h2>School on Snow</h2>
                            <h3>Was ist das?</h3>
                        </div></a>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="{{ url('angebot/volksschulen') }}"><div class="feature-wrap">
                            <i class="fa fa-child"></i>
                            <h2>Volksschulen</h2>
                            <h3>Information & Anmeldung</h3>
                        </div></a>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="#"><div class="feature-wrap">
                            <i class="fa fa-graduation-cap"></i>
                            <h2>Sekundar- & Oberstufe</h2>
                            <h3>Information & Anmeldung</h3>
                        </div></a>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->
        </div><!--/.container-->


    </section><!--/#feature-->

    <section id="content">
        <div class="container">
            <div class="row">
                <h1 class="contenth1">Historie – das war School on Snow 2014/15</h1>
                <div class="col-md-4 wow fadeInDown">
                    <p>Ablauf – nach der Ausschreibung durch den Landesschulrat können sich die 3. Klassen unter Angabe des Organisators und der einzelnen Lehrkräfte mit der möglichst genauen Schülerzahl anmelden. Daraufhin erhalten alle angemeldeten Klassen die Aufforderung zur genauen, zahlenmäßig endgültigen Anmeldung mit einem eigenen Code für jede Klasse. Diese Anmeldung hat bis längstens drei Wochen nach der erfolgten Klassenanmeldung zu erfolgen,</p>
                </div><!--/.col-sm-6-->

                <div class="col-md-4 wow fadeInDown">
                    <p>ansonsten wird die beim Erstkontakt angegebene Schülerzahl als verbindliche Berechnungsgrundlage hergenommen, der Bus reserviert und auch verrechnet! Hier geht es zur Anmeldung! Als Termin für die Anmeldung können die Lehrer Ende Oktober, Anfang November als frühesten Zeitpunkt annehmen – bitte öfters diese Seite oder unsere Facebookseite besuchen, wir werden immer alles aktualisieren!</p>
                </div>

                <div class="col-md-4 wow fadeInDown">
                    <img src="{{ asset('img/sheep/sheep_1.png') }}" class="img-responsive">
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->

    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Unsere Partner</h2>
                <p class="lead">Durch die Unterstützung unserer zahlreichn Partner gelingt es uns, ein tolles Skierlebnis für die Kinder zu organisieren.</p>
            </div>

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="img/partner/landsbg.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="img/partner/atomic.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="img/partner/rossignol.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="img/partner/flachau.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="img/partner//salomon.png"></a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </section><!--/#partner-->

@stop