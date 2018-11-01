<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Purchase/addPurchase" method="post">
     <table>
       <tr>
         <td>
           <label for="PurchaseDate">Fecha: </label><input type="date" name="PurchaseDate" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
