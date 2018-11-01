<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Place_Event/addPlace_Event" method="post">
     <table>
       <tr>
         <td>
           <label for="PlaceEventQuantity">Cantidad: </label><input type="number" name="PlaceEventQuantity" value=""><br>
           <label for="PlaceEventDescription">Descripcion: </label><input type="text" name="PlaceEventDescription" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
