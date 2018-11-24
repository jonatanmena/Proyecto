<?php
    $Artist=$this->ArtistData->GetByArtistCode($_POST["updateArtist"]);
?>
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
          <h2>Modificar Artista</h2>
          <form action="<?php echo FRONT_ROOT;?>Artist/updateArtist" method="post" enctype="multipart/form-data" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Genero</th>
                  <th>ID Artista</th>
                  <th>Estado</th>
                  <th>Portada</th>
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <input type="text" name="ArtistName" value="<?php echo $Artist->getName(); ?>" required><br>
                  </td>
                  <td>
                    <input type="text" name="ArtistDescription" value="<?php echo $Artist->getDescription(); ?>" required><br>
                  </td>
                  <td>
                    <input type="text" name="ArtistGender" value="<?php echo $Artist->getGender(); ?>" required><br>
                  </td>
                  <td>
                    <input type="number" name="ArtistCode" value="<?php echo $Artist->getID(); ?>" required readonly="readonly"><br>
                  </td>
                  <td>
                    <input type="text" name="ArtistStatus" value="<?php echo $Artist->getStatus(); ?>" required readonly="readonly"><br>
                  </td>
                  <td>
                    <img src="<?php echo FRONT_ROOT . $Artist->getPortrait();?>" style="max-width:250px; min-width:249px; max-height:150px;">
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br>
                  </td>
                </tr>
              </tbody>
            </table>
            <input type="submit" class="btn" value="Modificar" style="background-color:#DC8E47;color:white;" />
          </form>
        </div>
      </div>
    </main>
  </div>

</body>

</html>
