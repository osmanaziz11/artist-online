 <?php 

session_start();
include 'server\google_config.php';   // Include Google Config File 

// Google Authencation Code 
if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

  $_SESSION['access_token'] = $token['access_token'];
  

    $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
  
  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }
  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
 // check if already Loged in
 if(!$_SESSION['access_token'])    
 {   
    //  if not Redirect to Login Page
    header('location:http://localhost:81/Lartist/artist-reg.php');
 }
 else
 { 
    //  otherwise goto Dashboard 
  require_once('header.php') ;
  require_once 'server\constants.php';
 $sql_query='SELECT * FROM artist WHERE email="'.$_SESSION['user_email_address'].'";';
  $result = mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
  if (mysqli_num_rows($result) > 0) {
        // if user already registered
    } else {
        // if user is not registered
        $joining_year=date("Y");
        $sql_query1="INSERT INTO `artist` (`username`,`password`,`name`, `email`, `picture`,`joining_year`) VALUES ('".strstr($_SESSION['user_email_address'], '@',true)."','".strstr($_SESSION['user_email_address'], '@',true)."','".$_SESSION['user_first_name']."', '".$_SESSION['user_email_address']."', '".$_SESSION['user_image']."',".$joining_year.");";
    
        $result = mysqli_query($sql_conn, $sql_query1) or die('<script>alert("Database Query Failed")</script>');
    }
 ?>

 <!-- Section  -->
 <section>
     <div class="container-fluid" id="artist_dash">
         <div class="row">
             <div class="col p-4 d-flex justify-content-center">
                 <h4 class="rounded shadow text-center p-2">Welcome, <?php echo $_SESSION['user_first_name'] ?></h4>
             </div>
         </div>
         <div class="row">
             <div class="col">
                 <div class="dashboard_container container">
                     <div class="row mb-5">
                         <div class="col-3">
                             <a href="artist_dash1.php">
                                 <div
                                     class="dash_box rounded d-flex flex-column justify-content-center align-items-center shadow">
                                     <span class="iconify" data-icon="icomoon-free:profile"></span>

                                     <p class="mt-3">Profile</p>
                                 </div>
                             </a>
                         </div>
                         <div class="col-3">
                             <a href="artist_dash2.php">
                                 <div
                                     class="dash_box d-flex justify-content-center align-items-center flex-column rounded shadow">
                                     <span class="iconify" data-icon="entypo:shop"></span>
                                     <p class="mt-3">Shop</p>
                                 </div>
                             </a>
                         </div>
                         <div class="col-3">
                             <a href="artist_dash3.php">
                                 <div
                                     class="dash_box d-flex justify-content-center align-items-center flex-column rounded shadow">
                                     <span class="iconify" data-icon="fontisto:product-hunt"></span>
                                     <p class="mt-3">Products</p>
                                 </div>
                             </a>
                         </div>
                         <div class="col-3">
                             <a href="logout.php">
                                 <div
                                     class="dash_box d-flex justify-content-center align-items-center flex-column rounded shadow">
                                     <span class="iconify" data-icon="clarity:logout-line"></span>
                                     <p class="mt-3">Logout</p>
                                 </div>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <?php 
  }

  require_once('footer.php') ?>