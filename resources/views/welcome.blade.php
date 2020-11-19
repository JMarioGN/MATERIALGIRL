<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icono en pestaña n -->
    <link rel="shortcut icon" href="{{ asset('images/logol.png') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- ICONOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <script src="js/modernizr-2.6.2.min.js"></script>
    

    </head>
    <body>
        
    <div class="gtco-loader"></div>
    
    <div id="page">
    <nav class="gtco-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-xs-12">
                    <div id="gtco-logo"><a href="#">MATERIALGIRL</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1 main-nav">
                    <ul>
                        <li><a href="#" data-nav-section="home">INICIO</a></li>
                        <li><a href="#" data-nav-section="practice-areas">NOSOTROS</a></li>
                        <li><a href="#" data-nav-section="productos">PRODUCTOS</a></li>
                        <li><a href="#" data-nav-section="contact"><span>CONTACTO</span></a></li>
                        <li class="btn-cta"><a class="external" href="{{ route('login') }}"><span style="background: #BB8FCE;">INICIAR SESIÓN</span></a></li>
                        <li class="btn-cta"><a class="external" href="{{ route('register') }}"><span style="background: #BB8FCE;">REGISTRARSE</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section id="gtco-hero" class="gtco-cover" style="background-image: url(images/img_bg_4.jpg);"  data-section="home"  data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc">
                            <h1 class="animate-box" data-animate-effect="fadeIn">¡PRENDAS DE CALIDAD, AL MEJOR PRECIO!</h1>
                            <p class="gtco-video-link animate-box" data-animate-effect="fadeIn"><a href="video/bienvenido.mp4" class="popup-vimeo"><i class="icon-controller-play"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

    <section id="gtco-practice-areas" data-section="practice-areas">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                    <h1>NOSOTROS</h1>
                    <p class="sub">Hoy en día es difícil tener una empresa exitosa, sin el apoyo de las tecnologías de la información y comunicación puesto a que esto llevará una mejor administración del mismo. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="gtco-practice-area-item animate-box">
                        <div class="gtco-icon">
                            <img src="images/mision.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        </div>
                        <div class="gtco-copy">
                            <h3>Misión:</h3>
                            <p>Ser una empresa dedicada a la implementación de redes ayudando a nuestros clientes a alcanzar sus metas de negocios previendo nuestros servicios a través de nuestros conocimientos.  Para ello implementamos soluciones prácticas adaptadas a sus necesidades y desarrollamos nuevas soluciones creativas.</p>
                        </div>
                    </div>

                    <div class="gtco-practice-area-item animate-box">
                        <div class="gtco-icon">
                            <img src="images/valores.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        </div>
                        <div class="gtco-copy">
                            <h3>Valores:</h3>
                            <p>• Integridad y Respeto: genera e inspira confianza con su trabajo y en su persona.<br>
                            • Sentido de Responsabilidad: es comprometido. Mide, reconoce y se hace cargo de sus acciones.<br>
                            • Enfoque al Cliente: siempre en busca de mejorar la propuesta de valor y experiencia de nuestros clientes.<br>
                            • Compromiso a la Excelencia: enfoque en mejora continua para alcanzar la excelencia y generar valor.<br>
                            • Espíritu Innovador: cuestionan constantemente el status quo para transformar positivamente nuestro modelo de negocio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="gtco-practice-area-item animate-box">
                        <div class="gtco-icon">
                            <img src="images/vision.png" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                        </div>
                        <div class="gtco-copy">
                            <h3>Visión:</h3>    
                            <p>Ser una empresa reconocida a nivel nacional de tal forma que seamos los líderes en la infraestructura de las TIC. Queremos estar comprometidos con los problemas de nuestros clientes de forma transparente y eficaz para convertirnos en su socio de confianza.</p> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="gtco-practice-areas" data-section="productos">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                    <h1>Productos</h1>
                </div>
            </div>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/anuncio1.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="images/anuncio2.png" alt="Chicago">
    </div>

    <div class="item">
      <img src="images/anuncio3.png" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="oi oi-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="oi oi-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>
   
   <div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center">
        @foreach($tableProductos as $rowProducto)
            <img class="d-block w-100" src="{{ asset('storage/'.$rowProducto->imgNombreFisico )}}" alt="First slide" style="width: 90%; max-width: 190px; height: 150px; border-radius: 4px;">      
        @endforeach
    </div>
    
        <br>
        <div class="d-flex justify-content-center">
            @foreach($tableProductos as $rowProducto)
                <a href="{{route('productos.show', $rowProducto->id)}}" class="a">{{$rowProducto->nombre}}</a>
            @endforeach
        </div>
    </div>

</section>             




    <section id="gtco-contact" data-section="contact">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                    <h1>Contacto</h1>
                    <p class="sub">En MATERIAL GIRL ..., no dudes en poner en contacto con nosotros, ¡llamanos o escríbenos!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <form action="#">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.187963324448!2d-101.66952398559137!3d21.10507119054587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbfb1f13d80e1%3A0x39a34c2f6f306c4a!2sCalle+Angela+Peralta+517%2C+Le%C3%B3n+Moderno%2C+37480+Le%C3%B3n%2C+Gto.!5e0!3m2!1ses-419!2smx!4v1541548311354" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </form>
                </div>
                <div class="col-md-4 col-md-pull-6 animate-box">
                    <div class="gtco-contact-info">
                        <ul>
                            <li class="address">Angela Peralta #517, Col. Leon Moderno</li>
                            <li class="phone">+52 477 664 3006</li>
                            <li class="email">materialgirl@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="gtco-footer" role="contentinfo">
        <div class="container">
            
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="pull-left">
                        <small class="block">Copyright © 2020 MATERIAL GIRL</small> 

                    </p>
                    <p class="pull-right">
                        <ul class="gtco-social-icons pull-right">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>

