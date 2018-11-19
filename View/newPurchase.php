 <?php
     include_once('header.php');
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
           <h2>Ingresar Compra</h2>
           <form action="<?php echo FRONT_ROOT;?>Purchase/addPurchase" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
             <table>
               <thead>
                 <tr>
                   <th>Fecha</th>
                   <th>Cliente</th>
                 </tr>
               </thead>
               <tbody align="center">
                 <tr>
                   <td>
                    <input type="date" name="PurchaseDate" value="" required><br>
                   </td>
                   <td>
                     <select name="Client">

                       <?php foreach ($this->ClientData->getAll() as $Client) : ?>

                        <option value="<?php echo $Client->getID(); ?>"><?php echo $Client->getName(); ?></option>
                       <?php endforeach; ?>
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
     include_once('footer.php');
  ?>
