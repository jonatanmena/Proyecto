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
          <h2>Ingresar Evento</h2>
          <form action="<?php echo FRONT_ROOT;?>Event/addEvent" method="post" enctype="multipart/form-data" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Categoria</th>
                  <th>Imagen</th>
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <input style="margin-top:10px;" type="text" name="EventTitle" value="" required><br>
                  </td>
                  <td>
                    <select name="Category" style="margin-top:7px; padding:10px; width:100px">
                      <?php foreach ($this->CategoryData->getAll() as $category) : ?>
                      <option value="<?php echo $category->getID(); ?>">
                        <?php echo $category->getDescription(); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td><input style="margin-top:5px; " type="file" name="image" id="image" accept=".jpg, .jpeg, .png"></td>
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
