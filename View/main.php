<?php
include("header.php");
 ?>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>e</span>Ticket</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a class="page-scroll" href="#about">Sobre la app</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Servicios</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Equipo</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Recitales</a>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ABM<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo FRONT_ROOT;?>main/purchase">Comprar Tickets</a></li>
                      <li><a href=#>Listas de ABM</a></li>
                    </ul>
                  </li>
                  <li>
                    <a class="page-scroll" href="#blog">Blog</a>
                  </li>

                  <li>
                    <a class="page-scroll" href="#contact">Contacto</a>
                  </li>
                  <?php
                  //$_SESSION["userLogged"] = "asd";
                  //session_destroy();
                  if(isset($_SESSION["userLogged"]))
                  {
                  ?>

                  <li>
                    <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a>
                  </li>
                  <?php
                  }
                   ?>

                  <?php

                  if(!isset($_SESSION["userLogged"]))
                  {
                  ?>
                  <ul id="LoginForm" class="nav navbar-nav navbar-righ">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                      <ul id="login-dp" class="dropdown-menu">
                        <li>
                          <div class="row">
                            <div class="col-md-12">
                              Login via
                              <div class="social-buttons">
                                <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                              </div>
                              or

                              <form class="form" role="form" method="post" action="<?php echo FRONT_ROOT ?>User/Login" accept-charset="UTF-8" id="login-nav">
                                <div class="form-group">
                                  <label class="sr-only" for="email">Email address</label>
                                  <input name="Email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                </div>
                                <div class="form-group">
                                  <label class="sr-only" for="password">Password</label>
                                  <input name="Password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                  <div class="help-block text-right"><a id="aColor" href=""><b>Forget the password ?</b></a></div>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> keep me logged-in
                                  </label>
                                </div>
                              </form>
                            </div>
                            <div class="bottom text-center">
                              New here ? <a id="aColor" href="#"><b>Join Us</b></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <?php
                }else {
                  ?>
                    <li class="dropdown"><a id="afterLinea" href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION["userLogged"]->getUser(); ?><b class="caret"></b></a>
                      <ul id="login-dp" class="dropdown-menu">
                        <li><a id="aColor" href="/user/preferences"><i class="icon-cog"></i> <b>Preferences</b></a></li>
                        <li><a id="aColor" href="/help/support"><i class="icon-envelope"></i> <b>Contact Support</b></a></li>
                        <li class="divider"></li>
                        <li><a id="aColor" href="<?php echo FRONT_ROOT;?>main/logout"><i class="icon-off"></i> <b>Logout</a></b></li>
                      </ul>
                    </li>
              </div>
              <?php
                }
                 ?>

              <!-- navbar-collapse -->
            </nav>
            <?php
            if(isset($_SESSION["userLogged"]))
            {
             ?>
            <div class="container">
              <div class="shopping-cart" style="display: none;">
                <div class="shopping-cart-header">
                  <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                  <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text">$2,229.97</span>
                  </div>
                </div>
                <!--end shopping-cart-header -->
                <ul class="shopping-cart-items">
                  <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
                    <span class="item-name">Sony DSC-RX100M III</span>
                    <span class="item-price">$849.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                  </li>

                  <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
                    <span class="item-name">KS Automatic Mechanic...</span>
                    <span class="item-price">$1,249.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                  </li>

                  <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                    <span class="item-name">Kindle, 6" Glare-Free To...</span>
                    <span class="item-price">$129.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                  </li>

                </ul>
                <a href="#" class="button">Checkout</a>
              </div>
              <!--end shopping-cart -->
              <?php
          }
             ?>
            </div>
            <!--end container -->
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->
  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="<?php echo IMG_PATH?>slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="<?php echo IMG_PATH?>slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="<?php echo IMG_PATH?>slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Poner informacion de la banda </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Poner algun chamuyo mas de la banda</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">Ver Servicios</a>
                  <a class="ready-btn page-scroll" href="#about">Saber Mas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Poner informacion de la banda</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Poner algun chamuyo mas de la banda</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">Ver Servicios</a>
                  <a class="ready-btn page-scroll" href="#about">Saber Mas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Poner informacion de la banda</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Poner algun chamuyo mas de la banda</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">Ver servicios</a>
                  <a class="ready-btn page-scroll" href="#about">Saber mas</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Sobre eTicket</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                <img src="<?php echo IMG_PATH?>about/1.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">Requisitos funcionales</h4>
              </a>
              <p>
                Nuestra app por ahora basicamente tiene que dejar contentos a los profesores.
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> Al de Laboratorio IV
                </li>
                <li>
                  <i class="fa fa-check"></i> Al de Base de datos I
                </li>
                <li>
                  <i class="fa fa-check"></i> Al de Metodologia
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->
  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Nuestros servicios</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-code"></i>
                  </a>
                  <h4>Expert Coder</h4>
                  <p>
                    Nunca en nuestra vida documentamos una linea de codigo.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-camera-retro"></i>
                  </a>
                  <h4>Creative Designer</h4>
                  <p>
                    Somos programadores no de interiorismo.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-wordpress"></i>
                  </a>
                  <h4>Wordpress Developer</h4>
                  <p>
                    Nos aseguramos que el prototipo sea igual que el producto final.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-camera-retro"></i>
                  </a>
                  <h4>Subimos boludeces</h4>
                  <p>
                    En nuestras redes sociales.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-bar-chart"></i>
                  </a>
                  <h4>Estadisticas</h4>
                  <p>
                    Nuestra calculadora es un ábaco.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-ticket"></i>
                  </a>
                  <h4>24/7 Soporte</h4>
                  <p>
                    Si tenemos datos.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- our-skill-area start -->
  <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <div class="skill-text">
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="5" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Web Design</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="100" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Afanar Templates</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="20" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Php Developer</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="1" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Java Script</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->
  <!-- Start team Area -->
  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Nuestro equipo</h2>
          </div>
        </div>
      </div>
      <div class="row" style="padding-left:200px">
        <div class="team-top">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="<?php echo IMG_PATH?>team/1.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jonatan Mena</h4>
                <p>Fullstack Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="<?php echo IMG_PATH?>team/2.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Mischuk Franco</h4>
                <p>Fullstack Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="<?php echo IMG_PATH?>team/3.jpg" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jose Giles</h4>
                <p>Fullstack Developer</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->

  <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Bandas</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
                <li>
                  <a href="#" data-filter=".rock">Rock</a>
                </li>
                <li>
                  <a href="#" data-filter=".indie">Indie</a>
                </li>
                <li>
                  <a href="#" data-filter=".reggaeton">Reggaeton</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 rock">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/1.jpg">
                      <h4>Artic Monkeys</h4>
                      <span>Rock</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 rock">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/2.jpg">
                      <h4>Foo Fighters</h4>
                      <span>Rock</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 indie">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/3.jpg">
                      <h4>Radiohead</h4>
                      <span>Indie</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 indie">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/4.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/4.jpg">
                      <h4>Queen of Stone Age</h4>
                      <span>Indie</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 reggaeton">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/5.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/5.jpg">
                      <h4>Maluma</h4>
                      <span>Reggaeton</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 reggaeton">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo IMG_PATH?>portfolio/6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo IMG_PATH?>portfolio/6.jpg">
                      <h4>Daddy Yankee</h4>
                      <span>Reggaeton</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      La base de datos peor normalizada que vi en mi vida IGN 11/10
                    </p>
                    <h6>El profe de Base de datos</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      No entiendo nada de php pero mas que estos pelotudos conozco.
                    </p>
                    <h6>El profe de Metodologia</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Eran medios boludos, nunca coordinaban pero parece que hicieron algo que anda.
                    </p>
                    <h6>El profe de Lab 4</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->
  <!-- TODO: Hacer si se quiere las direcciones de las ultimas noticias -->
  <!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Ultimas noticias</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
                  <img src="<?php echo IMG_PATH?>blog/1.jpg" alt="">
                </a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
                  <i class="fa fa-comment-o"></i>
                  <a href="#">13 comentarios</a>
                </span>
                <span class="date-type">
                  <i class="fa fa-calendar"></i>17-11-2018
                </span>
              </div>
              <div class="blog-text">
                <h4>
                  <a href="blog.html">Rock & Pop con Blondie en Argentina</a>
                </h4>
                <p>
                  Vuelve el Rock & Pop con Blondie, The Vamps, Azealia Banks y The Magic Numbers en Argentina. Sí, un line up increíble al que se suman los locales Octafonic y Eruca Sativa. La cita es el 17 de noviembre en el Estadio Obras y la
                  venta está disponible por TopShow.
                </p>
              </div>
              <span>
                <a href="blog.html" class="ready-btn">Leer mas</a>
              </span>
            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
                  <img src="<?php echo IMG_PATH?>blog/2.jpg" alt="">
                </a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
                  <i class="fa fa-comment-o"></i>
                  <a href="#">130 comments</a>
                </span>
                <span class="date-type">
                  <i class="fa fa-calendar"></i>17-11-2018
                </span>
              </div>
              <div class="blog-text">
                <h4>
                  <a href="blog.html">Die Toten Hosen en Argentina.</a>
                </h4>
                <p>
                  Die Toten Hosen llegan a la Argentina en el marco de su festival Hosen Fest. La magia sucederá en el Club Ciudad de Buenos Aires y la banda alemana se encargará junto a bandas invitadas como Attaque 77 y Cadena Perpetua, de dar una
                  serie de shows en vivo. Early Bird tickets en venta a través de sistema Tu Entrada.
                </p>
              </div>
              <span>
                <a href="blog.html" class="ready-btn">Leer mas</a>
              </span>
            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          <!-- Start Right Blog-->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="blog.html">
                  <img src="<?php echo IMG_PATH?>blog/3.jpg" alt="">
                </a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
                  <i class="fa fa-comment-o"></i>
                  <a href="#">10 comentarios</a>
                </span>
                <span class="date-type">
                  <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                </span>
              </div>
              <div class="blog-text">
                <h4>
                  <a href="blog.html">Festival La Nueva Generación</a>
                </h4>
                <p>
                  El Festival La Nueva Generación en Córdoba una de las frutillas de este año. Tocan Los Espíritus, Nathy Peluso, El Kuelgue, Emmanuel Horvilleur, Marilina Bertoldi, Sara Hebe, Juan Ingaramo, Perras On the Beach, Francisca y les
                  Exploradores, Lo' Pibitos, Hipnótica, Morbo y Mambo y seguro se funde absolutamente todo. El Festival será en el Óvalo del Hipódromo de Córdoba el 18 de noviembre. Entradas a la venta por Alpogo.
                </p>
              </div>
              <span>
                <a href="blog.html" class="ready-btn">Leer mas</a>
              </span>
            </div>
          </div>
          <!-- End Right Blog-->
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Bienvenido a nuestra App de Ticket</h3>
            <a class="sus-btn" href="#">Citanos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contactanos</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Contacto: +54 2235181256<br>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: Mischuk.ti@gmail.com<br>
                  <span>Web: <a href="https://www.linkedin.com/in/franco-mischuk-125a46149/">Linkedin</a></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Direccion: Brown 1949<br>
                  <span>Argentina,Buenos Aires, Mar del plata</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form" style="margin:0px auto;width: 160%;padding-left: 300px;">
              <div id="sendmessage">Tu mensaje ha sido enviado. Gracias por contactarte con nosotros!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" data-rule="minlen:4" data-msg="Por favor ingresa al menos 4 caracteres" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" data-rule="email" data-msg="Por favor ingresa un email valido" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Motivo" data-rule="minlen:4" data-msg="Por favor ingresa al menos 8 caracteres en el motivo" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->
  <?php
include("footer.php");
 ?>
