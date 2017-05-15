<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active" style="background-image:url({{ asset('img/slider/bg1.jpg') }})">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Willkommen auf </br> School on Snow</h1>
                                <h2 class="animation animated-item-2">Schikurs „All inclusive“ aus einer Hand</h2>
                                <!--<a class="btn-slide animation animated-item-3" href="#">mehr...</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{ asset('img/sheep/sheep_1.png') }}" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

       <div class="item" style="background-image:url({{ asset('img/slider/bg2.jpg') }});">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Höchste Qualität – Unterricht durch Profis</h1>
                                <h2 class="animation animated-item-2">Von der Volksschule bis zur Matura</h2>
                                <!--<a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{ asset('img/sheep/sheep_1.png') }}" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

           <div class="item" style="background-image: url({{ asset('img/slider/bg3.jpg') }})">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Vom Einsteiger zum Profi</h1>
                                <h2 class="animation animated-item-2">	Angebote in allen Preis- und Leistungsstufen</h2>
                                <!--<a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{ asset('img/sheep/sheep_1.png') }}" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->