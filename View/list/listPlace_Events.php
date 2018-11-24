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
          <h2>Listado de lugares del evento</h2>
          <form action="<?php echo FRONT_ROOT;?>place_event/newPlace_Event" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Descripción</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->Place_EventData->getAll() as $Place_Event) {
                 ?>
                <tr>
                  <td>
                    <?php echo $Place_Event->getQuantity(); ?>
                  </td>
                  <td>
                    <?php echo $Place_Event->getDescription(); ?>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
              <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;" />
          </form>
        </div>
      </div>
    </main>
  </div>

</body>

</html>
