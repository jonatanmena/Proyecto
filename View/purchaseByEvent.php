<?php
require_once("header.php");

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
                <a class="navbar-brand page-scroll sticky-logo" href="<?php echo FRONT_ROOT;?>main/index">
                  <h1><span>e</span>Ticket</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a class="page-scroll" href="#purchase">Comprar</a>
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
                    <li class="dropdown"><a id="afterLinea" href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,
                        <?php echo $_SESSION["userLogged"]->getUser(); ?><b class="caret"></b></a>
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

                <?php
                foreach ($_SESSION["Purchase_Lines"] as $Lines)
                {
                ?>
                <ul class="shopping-cart-items">
                  <li class="clearfix">

                    <img src="<?php $Lines->getSquareEvent()->getEvent()->getImage();?>" alt="item1" />
                    <span class="item-name"><?php $Lines->getSquareEvent()->getTitle();?></span>
                    <span class="item-price"><?php $Lines->getPrice();?></span>
                    <span class="item-quantity"><?php $Lines->getQuantity();?></span>

                  </li>

                  <!--

                  private $Quantity;
                  private $Price;
                  private $ID;
                  private $Purchase;
                  private $Square_Event;
                  private $Ticket;
                  private $Status;

                  <li class="clearfix">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
                    <span class="item-name">Kindle, 6" Glare-Free To...</span>
                    <span class="item-price">$129.99</span>
                    <span class="item-quantity">Quantity: 01</span>
                  </li>
                -->

                <?php
                }
                 ?>



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
  <div id="purchase" class="about-area area-padding">
  </div>
  <!-- Start About area -->
  <div id="purchase" class="about-area area-padding" style="text-align: -webkit-center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Calendarios Disponibles</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <table class="table">
            <tr>
              <th scope="col" style="text-align:center">Fecha</th>
              <th scope="col" style="text-align:center">Evento</th>
              <th scope="col" style="text-align:center">Lugar</th>
              <th scope="col" style="text-align:center">Imagen</th>
              <th scope="col" style="text-align:center">Plazas</th>
              <th scope="col" style="text-align:center">Comprar</th>
            </tr>
          </thead>
          <tbody align="center">
            <?php foreach ($CalendarList as $Calendar)
            {
            ?>

            <tr>
              <td style="vertical-align: middle;"><?php echo $Calendar->getDate(); ?></td>
              <td style="vertical-align: middle;"><?php echo $Calendar->getEvent()->getTitle(); ?></td>
              <td style="vertical-align: middle;"><?php echo $Calendar->getPlaceEvent()->getDescription(); ?></td>
              <td style="vertical-align: middle;"><img src="<?php echo FRONT_ROOT .$Calendar->getEvent()->getImage();?>" style="max-width:250px; min-width:249px; max-height:150px;"></td>
              <td style="vertical-align: middle;">
                <select name="Place_Event">

                  <?php foreach ($Calendar->getSquareEvent() as $Square_Event)
                  {
                  ?>
                  <option value="<?php echo $Square_Event->getID(); ?>">
                    <?php echo $Square_Event->getSquareKind()->getDescription(); ?>
                  </option>
                  <?php
                  }
                  ?>

                </select>
            </td>
            <td style="vertical-align: middle;"><input type="button" onclick="location.href='<?php echo FRONT_ROOT;?>main/purchaseByEvent/<?php echo $Square_Event->getID();?>;'" value="Comprar" /></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- End col-->
  </div>
  </div>
  </div>
  <!-- End About area -->

  <?php
 require_once("footer.php");
  ?>
