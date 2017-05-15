@extends('layouts.master')

@section('title')
    Admin Control Panel
@stop

@section('content')
    @include('layouts.adminMenu')
    <section id="about-us">
        <div class="container">
            <h1 class="contenth1">Admin Panel</h1>
            <p>Sie können hier Ihre Daten verwalten, ansehen und bearbeiten. Bitte klicken Sie oben auf eine der Schaltflächen.</p>
            <div id="adminSheep" class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <img src="{{ asset('img/logo/logoNsheep.png') }}"  alt="logo" class="img-responsive" height="100">
            </div>
        </div>
    </section>
@stop
