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
          <h2>Listado de Tickets</h2>
          <form action="<?php echo FRONT_ROOT;?>ticket/newTicket" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Número</th>
                  <th>QR</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->TicketData->getAll() as $Ticket) {
                 ?>
                <tr>
                  <td>
                    <?php echo $Ticket->getNumber(); ?>
                  </td>
                  <td>
                    <?php echo $Ticket->getQR(); ?>
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
