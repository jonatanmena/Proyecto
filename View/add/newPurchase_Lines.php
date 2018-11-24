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
          <h2>Ingresar Lineas de compra</h2>
          <form action="<?php echo FRONT_ROOT;?>Purchase_Lines/addPurchase_Lines" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Cliente de la compra</th>
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <input type="text" name="Purchase_LinesQuantity" value="" required><br>
                  </td>
                  <td>
                    <input type="text" name="Purchase_LinesPrice" value="" required><br>
                  </td>
                  <td>
                    <select name="Square_Kind">
                      <?php foreach ($this->PurchaseData->getAll() as $Purchase) : ?>
                      <option value="<?php echo $Purchase->getID(); ?>">
                        <?php echo $Purchase->getClient()->getName(); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
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
