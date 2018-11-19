<?php
    include_once('header.php');
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
          <h2>Listado de Artistas</h2>
          <form action="<?php echo FRONT_ROOT;?>Artist/addArtist" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Genero</th>
                  <th>Portada</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->ArtistData->getAll() as $Artist) {
                 ?>
                <tr>
                  <td>
                    <!-- <input type="text" name="ArtistNam" value="" required><br> -->
                    <?php echo $Artist->getName(); ?>
                  </td>
                  <td>
                    <!--<input type="text" name="ArtistDescription" value="" required><br>-->
                      <?php echo $Artist->getDescription(); ?>
                  </td>
                  <td>
                    <!--<input type="text" name="ArtistGender" value=""><br>-->
                      <?php echo $Artist->getGender(); ?>
                  </td>
                  <td>
                      <!--<input type="text" name="ArtistPortrait" value=""><br>-->
                    <img src="<?php echo 'FRONT_ROOT'.  $Artist->getPortrait(); ?>">
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
    include_once('footer.php');
 ?>
