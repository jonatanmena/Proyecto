<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="<?php echo FRONT_ROOT;?>User/addUser" method="post">
     <table>
       <tr>
         <td>
           <label for="User">Usuario: </label><input type="text" name="User" value=""><br>
           <label for="UserPassword">Password: </label><input type="text" name="UserPassword" value=""><br>
           <label for="UserPrivilege">Privilegios: </label><input type="text" name="UserPrivilege" value=""><br>
           <input type="submit" name="Enviar" value="Enviar">
           <input type="reset" name="Restablecer" value="Restablecer">
         </td>
       </tr>
     </table>
     </form>
   </body>
 </html>
