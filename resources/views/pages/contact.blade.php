@extends('layouts.master')

@section('title')
    Kontakt
@stop

@section('content')
    <section id="contact-info">
        <div class="center">
            <h1 class="contenth1">Wie erreichen Sie uns?</h1>
            <p class="lead"></p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d343027.1042214715!2d12.77627677388863!3d47.802788697811806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47769adda908d4b1%3A0xc1e183a1412af73d!2sSalzburg!5e0!3m2!1sde!2sat!4v1465329263313" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Michael Lala</h5>
                                    <p>Mobil: +43(0)664 12 34 567</p>
                                    <p>Email: lala@schoolonsnow.at</p>
                                </address>

                                <address>
                                    <h5>Ingo Ingram</h5>
                                    <p>Mobil: +43(0)664 12 34 567</p>
                                    <p>Email: ingram@schoolonsnow.at</p>
                                </address>
                            </li>


                            <li class="col-sm-6">
                                <address>
                                    <h5>&nbsp;</h5>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </address>

                                <address>
                                    <h5>Manfred Wirnsberger</h5>
                                    <p>Mobil: +43(0)664 12 34 567</p>
                                    <p>Email: wirnsberger@schoolonsnow.at</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="registerChildForm">
        <div class="container">
            <div class="center">
                <h1 class="contenth1">Senden Sie uns eine Nachricht</h1>
                <p class="lead"></p>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            <div class="form-group">

                                <label class="col-md-4 control-label">Vorname:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstName" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nachname:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Telefonnummer:</label>

                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="class_Id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-mail:</label>

                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="class_Id">
                                </div>
                            </div>

                            <div class="form-grou}">
                                <label class="col-md-4 control-label">Nachricht:</label>

                                <div class="col-md-6">
                                    <textarea cols="50" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        senden
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>

@stop