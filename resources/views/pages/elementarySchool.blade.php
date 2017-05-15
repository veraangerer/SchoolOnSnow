@extends('layouts.master')

@section('title')
    Angebot - Volkschulen
@stop

@section('content')
    <section id="recent-works">
        <div class="container">
            <div class="wow fadeInDown">
                <h1 class="contenth1">Angebot - Volksschulen</h1>
                <p class="lead">Diese Angebote richten sich an die Bundesländer Salzburg, Steiermark, Kärnten und
                    Oberösterreich.</br>
                    Wenn in der Beschreibung von einem Skitag gesprochen wird so beinhaltet dieser in der Regel</p>
                <ul class="benefitslist">
                    <li><h3>Transfer von der Schule in eines der Partnerskigebiete,</h3></li>
                    <li><h3>Skikurs in der örtlichen Skischule, Liftkarte,</h3></li>
                    <li><h3>Mittagessen inkl. Getränk sowie bei Bedarf auch eine Leihausrüstung (Ski, Schuhe,
                            Helm).</h3></li>
                </ul>

                <div class="col-md-4">
                    <img src="{{ asset('img/sheep/sheep_1.png') }}" height="300px">
                </div>


            </div><!--/.row-->

            <ul id="offerlist">
                <a class="btn btn-primary btn-lg" href="/angebot/volksschulen/sbg">Salzburg</a>
                <a class="btn btn-primary btn-lg" href="/angebot/volksschulen/oö">Oberösterreich</a>
                <a class="btn btn-primary btn-lg" href="/angebot/volksschulen/ktn">Kärtnen</a>
                <a class="btn btn-primary btn-lg" href="/angebot/volksschulen/stmk">Steiermark</a>
            </ul>
        </div>

        <div class="container">
            <h1 class="contenth1">Mögliche Preispakete für Volksschulen</h1>
            <div class="center">
                <div class="pricing-area text-center">
                    <div class="row">

                        <div class="col-sm-6 col-md-3 plan price-four wow fadeInDown">
                            <ul>
                                <li class="heading-four">
                                    <h1 class="offerh1">„SCHOOL on SNOW – Classic“ </h1>
                                    <span>Unser erstes Angebot, der „Klassiker“ für die dritte Schulstufe</span>
                                </li>
                                <li>2 Tage Skikurs in einem unserer Partnergebiete,
                                Annaberg, Flachau, Hinterglemm und Dürnberg
                                mit ca. 5 Stunden Skiunterricht mit staatlich geprüften Skilehrern</li>
                                <li>Liftkarte, Transfer, Mittagessen inkl. Getränk</li>
                                <li>und – falls nötig – Leihmaterial von Hervis</li>
                                <li>Zusätzlich Teilnahme an einen der beiden Abschlusstage am Ende des Winters</li>
                                <li class="plan-action">
                                    <a href="" class="btn btn-primary">Preis für das  </br>gesamte Paket 45 €</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-3 plan price-five wow fadeInDown">
                            <ul>
                                <li class="heading-five">
                                    <h1 class="offerh1">„SCHOOL on SNOW – Schnuppertag“ </h1>
                                    <span>Dieses Angebot richtet sich an die Vorschulklassen, die erste und zweite Schulstufe!</span>
                                </li>
                                <li>Damit wollen wir auch den jüngeren schon die Möglichkeit bieten „dabei“ zu sein. Ein weiterer Vorteil natürlich – später, in der dritten Schulstufe, haben wir dann weniger „Anfänger“!</li>
                                <li>1 Tag Skikurs in einem unserer Partnergebiete Annaberg, Flachau, Hinterglemm und Dürnberg mit ca. 2,5 Stunden Skiunterricht mit staatlich geprüften Skilehrern</li>
                                <li>Liftkarte, Transfer, Mittagessen inkl. Getränk</li>
                                <li>und – falls nötig – Leihmaterial von Hervis</li>
                                <li class="plan-action">
                                    <a href="" class="btn btn-primary">Preis für das  </br>gesamte Paket 28 €</a>
                                </li>
                            </ul>
                        </div>


                        <div class="col-sm-6 col-md-3 plan price-six wow fadeInDown">
                            <ul>
                                <li class="heading-four">
                                    <h1 class="offerh1">„SCHOOL on SNOW – Individuell“ </h1>
                                    <span>Dieses Angebot richtet sich speziell an die vierte Schulstufe!</span>
                                </li>
                                <li>Ähnlich wie Variante „Classic“, aber mit Übernachtung in Saalbach/Hinterglemm und ohne Abschlusstag, aber drei Skitagen.</li>
                                <li>3 Tage Skikurs in  Saalbach/Hinterglemm mit ca. 6 Stunden Skiunterricht mit staatlich geprüften Skilehrern,</li>
                                <li>Liftkarte, Transfer,2 mal Vollpension und ein MittagessenMittagessen inkl. Getränk</li>
                                <li>und – falls nötig – Leihmaterial von Hervis</li>
                                <li>Ein sehr individualisiertes Angebot – nur der Preis ist fix, alles andere bitte direkt mit uns ausmachen</li>
                                <li class="plan-action">
                                    <a href="" class="btn btn-primary">Preis für dieses </br> Angebot 129 €</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-3 plan price-seven wow fadeInDown">
                            <ul>
                                <li class="heading-five">
                                    <h1 class="offerh1">„SCHOOL on SNOW – Wiener Schulen“ </h1>
                                    <span> Dieses Angebot richtet sich speziell an die vierte Schulstufe der Wiener Volksschulen!</span>
                                </li>
                                <li>3 Tage Skikurs in  Saalbach/Hinterglemm mit ca. 6 Stunden Skiunterricht mit staatlich geprüften Skilehrern,</li>
                                <li>Liftkarte, Transfer,2 mal Vollpension und ein MittagessenMittagessen inkl. Getränk</li>
                                <li>und – falls nötig – Leihmaterial von Hervis</li>
                                <li>Als Alternative zu den üblichen Abschlusstagen der vierten Klassen gedacht, kann das skifahrerische Können damit perfektioniert werden, kann das „Skivirus“ die Kinder endgültig erwischen!</li>
                                <li> Ein sehr individualisiertes Angebot – der Preis richtet sich nach Termin und Schüleranzahl, bei Interesse bitte direkt mit uns Kontakt aufnehmen!</li>
                                <li class="plan-action">
                                    <a href="" class="btn btn-primary">Preis für dieses Angebot </br>zwischen 129 € und 149 €</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/pricing-area-->
            </div>
            <!--/container-->
            </div>

        <div class="container">
            <div class="wow fadeInDown">
                <div class="center wow">
                    <a class="btn btn-primary btn-block" href="{{ url('registerClass') }}"><h1>Zur Klassen-Anmeldung</h1></a>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/pricing-page-->
@stop