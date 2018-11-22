<?php
    include_once('nav-bar.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </div>
  <div class="wrapper row3" >
    <main class="container" style="width: 90%;">
      <!-- main body -->
      <div class="content" >
        <div id="comments" style="align-items:center;">
          <h2>Listado de Plaza Evento</h2>
          <form action="<?php echo FRONT_ROOT;?>square_event/newSquare_Event" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Precio</th>
                  <th>Remanente</th>
                  <th>Cantidad Disponible</th>
                  <th>Descripcion tipo de plaza</th>
                  <th>Lugar de Evento</th>

                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->Square_EventData->getAll() as $Square_event) {
                 ?>
                <tr>
                  <td>
                    <?php echo $Square_event->getPrice(); ?>
                  </td>
                  <td>
                      <?php echo $Square_event->getRemainder(); ?>
                  </td>
                  <td>
                      <?php echo $Square_event->getQuantityAvailable(); ?>
                  </td>
                  <td>
                      <?php echo $Square_event->getSquareKind()->getDescription(); ?>
                  </td>
                  <td>
                      <?php echo $Square_event->getCalendar()->getPlaceEvent()->getDescription(); ?>
                  </td>
                </tr>
                <?php
                }
                 ?>
              </tbody>
            </table>
            <div>
              <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
            </div>

          </form>
        </div>
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>

  </body>
</html>
<?php
    include_once('footerViejo.php');
 ?>
