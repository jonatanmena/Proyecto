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
          <h2>Ingresar Artista</h2>
          <form action="<?php echo FRONT_ROOT;?>Artist/addArtist" method="post" enctype="multipart/form-data" style="background-color: #EAEDED;padding: 2rem !important;">
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
                <tr>
                  <td>
                    <input type="text" name="ArtistName" value="" required><br>
                  </td>
                  <td>
                    <input type="text" name="ArtistDescription" value="" required><br>
                  </td>
                  <td>
                    <input type="text" name="ArtistGender" value=""><br>
                  </td>
                  <td>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br>
                  </td>
                </tr>
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
