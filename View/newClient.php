<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>Client/addClient" method="post">
     <table>
       <tr>
         <td>
           <label for="ClienteName">Nombre: </label><input type="text" name="ClienteName" value=""><br>
           <label for="ClientSurname">Apellido: </label><input type="text" name="ClientSurname" value=""><br>
           <label for="ClientDNI">DNI: </label><input type="number" name="ClientDNI" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
