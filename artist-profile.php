 <?php 

  require_once('header.php') ;
  require_once 'server\constants.php';

  $sql_query='SELECT * from artist where email="'.$_GET['id'].'";';

  $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
 $row = mysqli_fetch_assoc($result);

   $sql_query1='SELECT * FROM PRODUCTS WHERE artist="'.$_GET['id'].'" AND status=1;';
     $result1=mysqli_query($sql_conn,$sql_query1) or die('<script>alert("Database Query Failed")</script>');
    
 ?>


 <!-- Artist Profile Section  -->
 <section>
     <div id="artist_profile" class="container-fluid p-5">
         <!-- Main Profile  -->
         <div class="container shadow rounded" id="profile">
             <!-- Bio -->
             <div class="row">
                 <div class="col-lg-3 p-2 d-flex flex-column align-items-center justify-content-center">
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
                         <input type="file" name="adminImage" id="adminImage" data-id="image-container" class="file"
                             hidden="" />
                     </div>
                     <h6 class="mt-2"><?php echo $row['name'] ?></h6>
                     <p><?php echo $row['city']?>, <?php echo $row['country'] ?></p>
                 </div>
                 <div class="col-lg-6 d-flex flex-column justify-content-center">
                     <p>Since <?php echo $row['joining_year']?></p>
                     <p>Badge
                         <?php 
                         if(mysqli_num_rows($result1)>10)
                         {echo 'Average';}
                         if(mysqli_num_rows($result1)>20)
                         {echo "Top Rated";}
                         if(mysqli_num_rows($result1)<10)
                         {echo "Newest";} ?>
                     </p>
                     <p></p>
                     <p>
                         <?php echo $row['bio'] ?>
                     </p>
                 </div>
                 <div class="col-12">
                     <div class="style-bar"></div>
                 </div>
             </div>
             <!-- Timeline -->
             <div class="row my-3">
                 <?php 
                    if (mysqli_num_rows($result1) > 0) 
                        {  
                            while ($row1 = mysqli_fetch_assoc($result1)) 
                            { ?>
                 <div class="col-lg-3 col-md-4 col-sm-6 p-2">
                     <div class="timeline_photo_container">
                         <img src="<?php echo 'assects/media/upload-folder/'.$row1['thumbnail'] ?>" alt="" />
                     </div>
                 </div>
                 <?php     }
                        }
                        else
                        { ?>
                 <div class="col p-3">No Prodcuts Available.</div>
                 <?php  }  ?>
             </div>
         </div>
     </div>
 </section>

 <?php  require_once('footer.php') ?>