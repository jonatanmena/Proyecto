<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>

  <div class="wrapper row3">
    <main class="container" style="width: 90%;">
      <div class="content">
        <div id="comments" style="align-items:center;">
          <h2>Listado de Calendarios</h2>
          <form action="FRONT_ROOT" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Evento</th>
                  <th>Lugar</th>
                  <!--<th>Artistas</th>-->
                  <!--<th>Plaza Evento Remanente</th>-->
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->CalendarData->getAll() as $Calendar) {
                  ?>
                <tr>
                  <td>
                    <?php echo $Calendar->getDate(); ?>
                  </td>
                  <td>
                    <?php echo $Calendar->getEvent()->getTitle(); ?>
                  </td>
                  <td>
                    <?php echo $Calendar->getPlaceEvent()->getDescription(); ?>
                  </td>
                  <!--
                  <td>
                    <?php
                    /*
                    foreach ($Calendar->getArtist() as $Artist) {
                    echo $Artist->getName()."<br>";
                    }
                    */
                    ?>
                  </td>
                -->
                  <!--
                  <td>
                    <?php
                    foreach ($Calendar->getSquareEvent() as $Square_Event) {
                        echo $Square_Event->getRemainder()."<br>";
                    } ?>
                  </td>
                  -->

                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <!--
            <div>
              <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
            </div>
            -->
          </form>
        </div>
      </div>    
    </main>
  </div>
</body>

</html>
