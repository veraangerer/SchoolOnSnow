@extends('layouts.master')

@section('title')
   404 Site not found
@stop

@section('content')
    <section id="about-us">
        <div class="center">
        <div class="container">
            <h1 class="contenth1">Error 404: Seite nicht gefunden</h1>
            <img src="{{ asset('img/sheep/broken_schafi.png') }}" class="img-responsive">
        </div>
        </div>
        <!--/.container-->
    </section><!--/about-us-->
@stop