<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>

  <div class="wrapper row3">
    <main class="container" style="width: 90%;">
      <!-- main body -->
      <div class="content">
        <div id="comments" style="align-items:center">
          <h2>Listado de Artistas</h2>
          <form id="addForm" action="<?php echo FRONT_ROOT;?>Artist/newArtist" method="post"></form>
          <form id="deleteForm" action="<?php echo FRONT_ROOT;?>Artist/deleteArtist" method="post"></form>
          <form id="activateForm" action="<?php echo FRONT_ROOT;?>Artist/activateArtist" method="post"></form>
          <form id="updateForm" action="<?php echo FRONT_ROOT;?>Artist/modifyArtist" method="post"></form>
          <table>
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Genero</th>
                <th>Portada</th>
                <th>Estado</th>
                <th>Activar</th>
                <th>Desactivar</th>
                <th>Modificar</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php foreach ($this->ArtistData->getAll() as $Artist) {
                ?>
              <tr>
                <td>
                  <br><br>
                  <h5 style="padding-bottom:12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">
                    <?php echo $Artist->getName(); ?>
                  </h5>
                </td>
                <td>
                  <br><br>
                  <h5 style="padding-bottom:12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">
                    <?php echo $Artist->getDescription(); ?>
                  </h5>
                </td>
                <td>
                  <br><br>
                  <h5 style="padding-bottom:12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">
                    <?php echo $Artist->getGender(); ?>
                  </h5>
                </td>
                <td>
                  <img src="<?php echo FRONT_ROOT . $Artist->getPortrait(); ?>" style="max-width:250px; min-width:249px; max-height:150px;">
                </td>
                <td>
                  <br><br>
                  <h5 style="padding-bottom:12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">
                    <?php echo $Artist->getStatus(); ?>
                  </h5>
                </td>
                <td>
                  <?php
                    if ($Artist->getStatus()==="Activo") {
                        ?>

                  <?php
                    } else {
                        ?>
                  <input type="button" onclick="location.href='<?php echo FRONT_ROOT;?>Artist/activateArtist/<?php echo $Artist->getID();?>;'" value="Activar" />
                  <?php
                    } ?>
                </td>
                <td>
                  <?php
                    if ($Artist->getStatus()==="Inactivo") {
                        ?>
                  <?php
                    } else {
                        ?>
                  <input type="button" onclick="location.href='<?php echo FRONT_ROOT;?>Artist/deleteArtist/<?php echo $Artist->getID();?>;'" value="Desactivar" />
                  <?php
                    } ?>
                <td>
                  <input type="button" onclick="location.href='<?php echo FRONT_ROOT;?>Artist/modifyArtist/<?php echo $Artist->getID();?>;'" value="Modificar" />
                </td>

                </td>
              </tr>
              <?php
            }
              ?>
            </tbody>
          </table>
            <input type="submit" class="btn" value="Agregar" form="addForm" style="background-color:#DC8E47;color:white;" />
          </div>
        </div>
    </main>
  </div>
</body>

</html>
