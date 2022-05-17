 <?php
 require_once('header.php') ;
  require_once 'server\constants.php';
  
  $sql_query='SELECT * from artist;';
  $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
 ?>

 <!-- Section  -->
 <section>
     <div id="outer_container" class="p-4">
         <div class="container" id="artist_container">
             <div class="row">
                 <div class="col p-3 d-flex flex-column justify-content-center align-items-center">
                     <h4>Our Artist.</h4>
                     <div class="style-bar"></div>
                 </div>
             </div>
             <!-- Filteration  -->
             <div class="row my-4">
                 <div class="col-4 p-3"></div>
                 <div class="col-4 p-3 d-flex justify-content-center"><?php echo mysqli_num_rows($result) ?> Profiles
                 </div>
                 <div class="col-4 p-3 d-flex justify-content-end"></div>
             </div>

             <!-- Profiles  -->
             <div class="row">
                 <?php 
                if (mysqli_num_rows($result) > 0) 
                {  while ($row = mysqli_fetch_assoc($result)) 
                    {?>
                 <div class="col-3">
                     <div class="profile_container shadow rounded container-fluid">
                         <!-- Profile Image  -->
                         <div class="row">
                             <div class="col p-2 d-flex justify-content-center">
                                 <div id="image-box">
                                     <label for="adminImage">
                                         <img src="<?php
                                           
                                              if(strlen($row['picture'])>10)
                                              {
                                                  echo $row['picture'];
                                              }else{
                                                 echo 'assects/media/upload-folder/'.$row['picture'];
                                              }
                                              
                                              ?>" alt="" />
                                     </label>

                                 </div>
                             </div>
                         </div>
                         <!-- Profile Desc  -->
                         <div class="row my-2">
                             <div class="col">
                                 <h6 class="text-center">
                                     <a
                                         href="artist-profile.php?id=<?php echo $row['email'] ?>"><?php echo $row['name'] ?></a>
                                 </h6>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <p class="text-center">
                                     <?php echo $row['bio'] ?>
                                 </p>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-6 position-relative">
                                 <p class="d-inline-block">Painting</p>
                                 <p class="d-inline-block position-absolute end-0">
                                     <?php   $sql_query1='SELECT * from products where artist="'.$row['email'].'" AND status=1;';
                                     $res=mysqli_query($sql_conn,$sql_query1) or die('<script>alert("Database Query Failed")</script>');
                                     echo mysqli_num_rows($res);
                                     ?>
                                 </p>
                             </div>
                             <div class="col-6 position-relative">
                                 <p class="d-inline-block">Sold</p>
                                 <p class="d-inline-block position-absolute end-0">
                                     <?php 
                                     if(mysqli_num_rows($res)==0){echo 0;}
                                    else{
                                         $sold=0;
                                     while($row1 = mysqli_fetch_assoc($res))
                                     {      
                                         $sold= $sold+$row1['sold'];
                                         
                                        //  echo $avg;
                                     }  
                                    echo $sold;
                                    }
                                     ?>
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <?php }
                 }else { ?> Artist not registered yet. <?php } ?>

             </div>
         </div>
     </div>
 </section>

 <?php  require_once('footer.php') ?>