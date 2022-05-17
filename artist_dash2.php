 <?php  
 session_start();
 // check user Loged in
 if(!$_SESSION['access_token'])    
 {    //  if not Redirect to Login Page
    header('location:http://localhost:81/Lartist/artist-reg.php');
 }
 else
 { 
 require_once('header.php') ;
  require_once 'server\constants.php';
  $sql_query='SELECT * from products where artist="'.$_SESSION['user_email_address'].'";';
  $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
  
 
 ?>

 <!-- Section  -->
 <section>
     <div class="container-fluid p-5" id="artist_dash">
         <div class="row">
             <div class="col-6 p-4">
                 <a href="artist-dash.php">
                     <h4 class="rounded shadow text-center p-2">Dashboard</h4>
                 </a>
             </div>
         </div>
         <div class="row mt-3 p-4">
             <div class="col">
                 <div class="container shadow rounded" id="shop_container">
                     <div class="row my-5">
                         <div class="col-4 p-3">Sort by</div>
                         <div class="col-4 p-3 d-flex justify-content-center">
                             <?php echo mysqli_num_rows($result) ?> Products
                         </div>
                         <div class="col-4 p-3 d-flex justify-content-end">Filters</div>
                     </div>
                     <?php 
                            if (mysqli_num_rows($result) > 0) 
                            {  while ($row = mysqli_fetch_assoc($result)) 
                                {
                                    ?>
                     <div class="row mb-5">
                         <!-- Item  -->
                         <div class="col-4 d-flex justify-content-center">
                             <div class="item_box">
                                 <img src="<?php
                                           
                                             echo 'assects/media/upload-folder/'.$row['thumbnail']
                                              ?>" alt="" />
                             </div>
                         </div>
                         <!-- Item Desc -->
                         <div class="col-8">
                             <div class="container-fluid">
                                 <div class="row">
                                     <div class="col-4">
                                         <p>Views</p>
                                         <p>Sold</p>
                                         <p>Amount</p>
                                     </div>
                                     <div class="col-4">
                                         <p class="text-center">6</p>
                                         <p class="text-center">10</p>
                                         <p class="text-center"><?php echo $row['price']   ?></p>
                                     </div>
                                     <div class="col-2">
                                         <form action="server/data.php?id=<?php echo $row['id']?>" method="POST">
                                             <input type="checkbox" name="status" onchange="this.form.submit()"
                                                 <?php if($row['status']==1){echo 'checked';}  ?> id="mode-btn" />
                                         </form>
                                     </div>
                                     <div class="col-2"><button>Delete</button></div>
                                 </div>
                                 <div class="row">
                                     <div class="col">
                                         <p>
                                             <?php echo $row['description']   ?>
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php   }

                            }else{
                                ?>
                     <div class="row">
                         <div class="col p-5">
                             No Product Found.
                         </div>
                     </div>
                     <?php   }

                     ?>


                 </div>
             </div>
         </div>
     </div>
 </section>

 <?php } require_once('footer.php') ?>