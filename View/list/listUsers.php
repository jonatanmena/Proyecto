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
          <h2>Listado de Users</h2>
          <form action="<?php echo FRONT_ROOT;?>user/newUser" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Password</th>
                  <th>Privilegio</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->UserData->getAll() as $User) {
                 ?>
                <tr>
                  <td>
                    <?php echo $User->getUser(); ?>
                  </td>
                  <td>
                    <?php echo $User->getPassword(); ?>
                  </td>
                  <td>
                    <?php echo $User->getPrivilege(); ?>
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
