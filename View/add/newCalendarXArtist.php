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
          <h2>Ingresar Calendario X Artista</h2>
          <form action="<?php echo FRONT_ROOT;?>CalendarXArtist/addCalendarXArtist" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Artista</th>
                  <th>Calendario</th>
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <select name="Artist">
                      <?php foreach ($this->ArtistData->getAll() as $Artist) : ?>
                      <option value="<?php echo $Artist->getID(); ?>">
                        <?php echo $Artist->getName(); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <select name="Calendar">
                      <?php foreach ($this->CalendarData->getAll() as $Calendar) : ?>
                      <option value="<?php echo $Calendar->getID(); ?>">
                        <?php echo $Calendar->getDate(); ?>
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
