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
          <h2>Ingresar Cliente</h2>
          <form action="<?php echo FRONT_ROOT;?>Client/addClient" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>DNI</th>
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <input type="text" name="ClientName" value="" required><br>
                  </td>
                  <td>
                    <input type="text" name="ClientSurname" value="" required><br>
                  </td>
                  <td>
                    <input type="number" name="ClientDNI" value="" required><br>
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
