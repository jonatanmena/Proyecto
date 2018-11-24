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
          <h2>Listado de Compras</h2>
          <form action="<?php echo FRONT_ROOT;?>purchase/newPurchase" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Fecha de compra</th>
                  <th>Cliente</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->PurchaseData->getAll() as $Purchase) {
                  //var_dump($Purchase);
                 ?>
                <tr>
                  <td>
                    <?php echo $Purchase->getDate(); ?>
                  </td>
                  <td>
                    <?php echo $Purchase->getClient()->getName(); ?>
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
