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
          <h2>Listado de Eventos</h2>
          <form action="<?php echo FRONT_ROOT; ?>event/newEvent" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Nombre del Evento</th>
                  <th>Categoria</th>
                  <th>Imagen</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->EventData->getAll() as $Event) {
                 ?>
                <tr>
                  <td>
                    <br><br>
                    <?php echo $Event->getTitle(); ?>
                  </td>
                  <td>
                    <br><br>
                    <?php echo $Event->getCategory()->getDescription(); ?>
                  </td>
                  <td>
                    <img src="<?php echo FRONT_ROOT . $Event->getImage();?>" style="max-width:250px; min-width:249px; max-height:150px;">
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
