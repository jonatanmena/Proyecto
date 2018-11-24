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
          <h2>Listado de Categoria</h2>
          <form action="<?php echo FRONT_ROOT; ?>category/newCategory" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Descripcion</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->CategoryData->getAll() as $Category) {
                 ?>
                <tr>
                  <td>
                    <?php echo $Category->getDescription(); ?>
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
