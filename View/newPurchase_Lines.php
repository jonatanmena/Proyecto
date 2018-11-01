<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Purchase_Lines/addPurchase_Lines" method="post">
     <table>
       <tr>
         <td>
           <label for="PurchaseLinesQuantity">Cantidad: </label><input type="number" name="PurchaseLinesQuantity" value=""><br>
           <label for="PurchaseLinesPrice">Precio: </label><input type="number" name="PurchaseLinesPrice" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
