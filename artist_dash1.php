 <?php 
 session_start();
 if(!$_SESSION['access_token'])
 {
header('location:http://localhost:81/Lartist/artist-reg.php');
 }else{
  require_once('header.php') ;
  require_once 'server\constants.php';
  $sql_query='SELECT * from artist where email="'.$_SESSION["user_email_address"].'";';
  $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
   $row = mysqli_fetch_assoc($result);
 
 ?>

 <!-- Section  -->
 <section>
     <div class="container-fluid" id="artist_dash">
         <div class="row">
             <div class="col-6 p-4">
                 <a href="artist-dash.php">
                     <h4 class="rounded shadow text-center p-2">Dashboard</h4>
                 </a>
             </div>

         </div>
         <div class="row">
             <div class="col">
                 <!-- Setting Main Container -->
                 <div id="setting-container" class="container-fluid">
                     <form enctype="multipart/form-data" action="server\data.php" method="POST" id="user-form-data">
                         <div class="row">
                             <div class="col-md-4">
                                 <div id="image-container" class="shadow">
                                     <div id="image-box">
                                         <label for="adminImage">
                                             <img src="<?php
                                           
                                              if(strlen($row['picture'])>10)
                                              {
                                                  echo $row['picture'];
                                              }else{
                                                 echo 'assects/media/upload-folder/'.$row['picture'];
                                              }
                                              
                                              ?>" alt="error" />
                                         </label>
                                         <input type="file" name="adminImage" id="adminImage" class="d-none"
                                             data-container="image-box" onchange="readURL(this)">
                                     </div>
                                 </div>
                             </div>

                             <!-- Personal Information box -->
                             <div class="col-md-8">
                                 <div id="personal-info-box" class="container-fluid shadow">
                                     <div class="row">
                                         <div class="col">
                                             <h4>Personal Information</h4>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-sm-4">
                                             <h6>Name</h6>
                                         </div>
                                         <div class="col-sm-8">
                                             <div class="span-input">
                                                 <input type="text" name="admin-name" id="userName-input"
                                                     value="<?php echo $_SESSION['user_first_name'] ?>" disabled />
                                                 <label for="userName-input">
                                                     <i class="bx bxs-edit"></i>
                                                 </label>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-sm-4">
                                             <h6>Email</h6>
                                         </div>
                                         <div class="col-sm-8">
                                             <div class="span-input">
                                                 <input type="text" name="admin-email" id="userEmail-input"
                                                     value="<?php echo $_SESSION['user_email_address']  ?>" disabled />
                                                 <label for="userEmail-input">
                                                     <i class="bx bxs-edit"></i>
                                                 </label>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-sm-4">
                                             <h6>Gender</h6>
                                         </div>
                                         <div class="col-sm-8">
                                             <div class="span-input">
                                                 <input type="text" name="admin-phone" id="userPhone-input"
                                                     value="<?php  echo $row['gender'] ?>" />
                                                 <label for="userPhone-input">
                                                     <i class="bx bxs-edit"></i>
                                                 </label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row mt-4 mb-4">
                             <div class="col-sm-6 mb-4">
                                 <div id="account-setting-box" class="shadow">
                                     <h5>Account Setting</h5>
                                     <h6>Username</h6>
                                     <div class="span-input">
                                         <input type="text" name="admin-userName" id="username-input" value="<?php 
                            echo strstr($_SESSION['user_email_address'], '@',true);
                                         ?>
                                         " disabled />

                                     </div>
                                     <h6>Password</h6>
                                     <div class="span-input">
                                         <input type="text" name="admin-password" id="userPass-input"
                                             value="<?php echo $row['password'] ?>" />

                                     </div>
                                     <h6>City</h6>
                                     <div class="span-input">
                                         <input type="text" name="city" id="userAccemail-input"
                                             value="<?php echo $row['city']  ?>" />
                                         <label for="userAccemail-input">
                                             <i class="bx bxs-edit"></i>
                                         </label>
                                     </div>
                                     <h6>Country</h6>
                                     <div class="span-input">
                                         <input type="text" name="country" id="userAccphone-input"
                                             value="<?php echo $row['country'] ?>" />
                                         <label for="userAccphone-input">
                                             <i class="bx bxs-edit"></i>
                                         </label>
                                     </div>

                                 </div>
                             </div>

                             <div class="col-sm-6">
                                 <div id="pannel-setting-box" class="shadow">
                                     <textarea class="form-control" rows="5" style="resize: none"
                                         placeholder="Write about yourself..."
                                         name="bio"><?php echo $row['bio']  ?></textarea>
                                 </div>
                                 <div id="submit-btn-container">
                                     <input type="submit" name="form1-submit" value="Click to Update" />
                                 </div>
                             </div>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </section>

 <?php } require_once('footer.php') ?>