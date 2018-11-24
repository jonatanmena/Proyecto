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
          <h2>Ingresar Calendario</h2>
          <form action="<?php echo FRONT_ROOT;?>Calendar/addCalendar" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Evento</th>
                  <th>Lugar</th>
                  <!--<th>Plaza Evento ID</th>-->
                </tr>
              </thead>
              <tbody align="center">
                <tr>
                  <td>
                    <!--<input type="text" name="Name" id="" value="" size="22" required>-->
                    <input type="date" name="CalendarDate" value="" required><br>
                  </td>
                  <td>
                    <select name="Event">
                      <?php foreach ($this->EventData->getAll() as $event) : ?>
                      <option value="<?php echo $event->getID(); ?>">
                        <?php echo $event->getTitle(); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <select name="Place_Event">
                      <?php foreach ($this->Place_EventData->getAll() as $location) : ?>
                      <option value="<?php echo $location->getID(); ?>">
                        <?php echo $location->getDescription(); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <!--
                  <td>
                    <select name="Artist">

                    </select>
                  </td>
                -->
                  <!--
                  <td>
                    <select name="Square_Event">

                      <?php foreach ($this->Square_EventData->getAll() as $Square_Event) : ?>
                       <option value="<?php echo $Square_Event->getID(); ?>"><?php echo $Square_Event->getID(); ?></option>
                      <?php endforeach; ?>

                    </select>
                  </td>
                  -->
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
