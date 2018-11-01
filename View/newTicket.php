<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Ticket/addTicket" method="post">
     <table>
       <tr>
         <td>
           <label for="TicketNumber">Numero: </label><input type="number" name="TicketNumber" value=""><br>
           <label for="TicketQR">QR: </label><input type="text" name="TicketQR" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
