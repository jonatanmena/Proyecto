<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Square_event/addSquare_Event" method="post">
     <table>
       <tr>
         <td>
           <label for="SquareEventPrice">Precio: </label><input type="text" name="SquareEventPrice" value=""><br>
           <label for="SquareEventRemainder">Remanente: </label><input type="text" name="SquareEventRemainder" value=""><br>
           <label for="SquareEventQuantityAvailable">Cantidad Disponible: </label><input type="text" name="SquareEventQuantityAvailable" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
