@extends('admin.app')

@section('content')

    
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(imagens/banner3.png)">
                </div><!--/.item-->
                <div class="item" style="background-image: url(http://fakeimg.pl/1920x700/)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content center centered">
                                    <h2 class="animation animated-item-1">Lorem ipsum dolor sit amet</h2>
                                    <p class="animation animated-item-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae euismod lacus. Maecenas in tempor lectus. Nam mattis, odio ut dapibus ornare, libero. Donec at ligula risus. </p>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(http://fakeimg.pl/1920x700/)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1">Lorem ipsum dolor sit amet</h2>
                                    <p class="animation animated-item-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae euismod lacus. Maecenas in tempor lectus. Nam mattis, odio ut dapibus ornare, libero. </p>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section><!--/#main-slider-->

   

        <!-- Services -->
        <div class="section section-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <i class="icon-home"></i>
                            <h3>Web Design</h3>
                            <p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>
                            <a href="#" class="btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <i class="icon-briefcase"></i>
                            <h3>Design</h3>
                            <p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>
                            <a href="#" class="btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-wrapper">
                            <i class="icon-calendar"></i>
                            <h3>Markting Digital</h3>
                            <p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>
                            <a href="#" class="btn">Ver Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->


<hr>

        <!-- Our Portfolio -->  

        <div class="section section-white">
            <div class="container">
                <div class="row">
    
                <div class="section-title">
                <h1>Os trabalhos mais recentes.</h1>
                </div>
        
        
            <ul class="grid cs-style-3">
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>Design</h3>
                            <span>Empresa YY</span>
                            <a href="#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>  
                <div class="col-md-4 col-sm-6">
                    <figure>
                      <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>Web Site</h3>
                            <span>Empresa YY</span>
                            <a href="#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>Design</h3>
                            <span>Empresa YY</span>
                            <a href="#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>APP</h3>
                            <span>Empresa YY</span>
                            <a href="#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>Android</h3>
                            <span>Empresa YY</span>
                            <a href="#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="http://fakeimg.pl/1200x750/">
                        <figcaption>
                            <h3>APP Web</h3>
                            <span>Empresa YY</span>
                            <a href=#">Ver Mais</a>
                        </figcaption>
                    </figure>
                </div>
            </ul>
                </div>
            </div>
        </div>
        <!-- Our Portfolio -->
            
<hr>

        <!-- Our Clients -->
        <div class="section">
            <div class="container">
            
                <div class="section-title">
                <h1>Parceiros de Sucesso!</h1>
                </div>

                <div class="clients-logo-wrapper text-center row">
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="http://fakeimg.pl/100x100/" alt="Client Name"></a></div>
                </div>
            </div>
        </div>
        <!-- End Our Clients -->
  
@stop
