 <?php
     include_once('nav-bar.php');
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

   </div>
   <div class="wrapper row3" >
     <main class="container" style="width: 90%;">
       <!-- main body -->
       <div class="content" >
         <div id="comments" style="align-items:center;">
           <h2>Ingresar Usuario</h2>
           <form action="<?php echo FRONT_ROOT;?>User/addUser" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
             <table>
               <thead>
                 <tr>
                   <th>Email</th>
                   <th>Password</th>
                   <th>Privilegio</th>
                 </tr>
               </thead>
               <tbody align="center">
                 <tr>
                   <td>
                     <!--<input type="text" name="Name" id="" value="" size="22" required>-->
                     <input type="email" name="User" value="" required><br>
                   </td>
                   <td>
                       <input type="password" name="Password" value="" required><br>
                   </td>
                   <td>
                       <select name="Privilege" value="">
                         <option value="1">Administrador</option>
                         <option value="0">Usuario</option>
                       </select>
                   </td>
                 </tr>
               </tbody>
             </table>
             <div>
               <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
             </div>
           </form>
         </div>
       </div>
       <!-- / main body -->
       <div class="clear"></div>
     </main>
   </div>

   </body>
 </html>
 <?php
     include_once('footerViejo.php');
  ?>
