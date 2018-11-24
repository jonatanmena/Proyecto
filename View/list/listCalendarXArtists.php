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
          <h2>Listado de Calendarios x Artistas</h2>
          <form action="<?php echo FRONT_ROOT; ?>calendarXArtist/newCalendarXArtist" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Artistas</th>
                  <th>Calendarios</th>
                </tr>
              </thead>
              <tbody align="center">
                <?php foreach ($this->CalendarXArtistData->getAll() as $CalendarXArtist) {
                 ?>
                <tr>
                  <td>
                    <?php echo $CalendarXArtist->getArtist()->getName(); ?>
                  </td>
                  <td>
                    <?php echo $CalendarXArtist->getCalendar()->getDate(); ?>
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
