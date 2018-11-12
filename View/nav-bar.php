
<div class="bgded overlay" style="background-image:url('<?php echo IMG_PATH; ?>page-dark.png');">
  <div class="wrapper row">
    <div id="topbar" class="hoc clear">
      <div class="fl_right">
        <ul class="nospace">
          <li><i class="fas fa-phone"></i> (223) 5181256</li>
          <li><i class="far fa-envelope"></i> Mischuk.ti@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">
        <h1><a href="#">Proyecto Tickets</a></h1>
      </div>
      <!-- Solo hacer los cambios de Ruteo necesarios Aqui donde comienza en Nav -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
            <li class="active"><a href="<?php echo FRONT_ROOT ?>">Menu Principal</a></li>
            <li><a class="drop" href="#">Usuarios</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>User/newUser">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>User/listUsers">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Artistas</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT;?>Artist/newArtist">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT;?>Artist/listArtists">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Calendarios</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Calendar/newCalendar">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Calendar/listCalendars">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Categoria</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT;?>Category/newCategory">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT;?>Category/listCategories">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Clientes</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Client/newClient">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Client/listClients">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Eventos</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Event/newEvent">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Event/listEvents">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Lugar Evento</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Place_Event/newPlace_Event">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Place_Event/listPlace_Events">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Linea de Compra</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Purchase_Lines/newPurchase_Lines">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Purchase_Lines/listPurchase_lines">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Compra</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Purchase/newPurchase">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Purchase/listPurchases">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Plaza Evento</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Square_Event/newSquare_Event">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Square_Event/listSquare_Events">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Tipo de Plaza</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Square_Kind/newSquare_Kind">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Square_Kind/listSquare_Kinds">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Ticket</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>Ticket/newTicket">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>Ticket/listTickets">Ver Listado</a></li>
            </ul>
            </li>
            <li><a class="drop" href="">Calendario X Artista</a>
            <ul>
                <li><a href="<?php echo FRONT_ROOT ?>CalendarXArtist/newCalendarXArtist">Agregar</a></li>
                <li><a href="<?php echo FRONT_ROOT ?>CalendarXArtist/listCalendarXArtists">Ver Listado</a></li>
            </ul>
            </li>
        </ul>
    </nav>
    </header>
  </div>
</html>
