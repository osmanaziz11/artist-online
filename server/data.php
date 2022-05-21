<?php
      require_once 'constants.php';
      session_start();
      // Artist Profile Form Submit 
      if (isset($_POST['form1-submit'])) 
      {
         //  Check if Product main Image Set
      if (!empty($_FILES['adminImage']['name'])) {
        // Move Images to Upload Folder
        $test = explode('.', $_FILES['adminImage']['name']);
        $exten = end($test);
        $mainImage = rand(0, 999999) . '.' . $exten;
        $location = "../assects/media/upload-folder/" . $mainImage;
        move_uploaded_file($_FILES['adminImage']['tmp_name'], $location);
        $sql_query="UPDATE `artist` SET `picture` = '".$mainImage."' WHERE `email` = '".$_SESSION['user_email_address']."';";
        mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
        $_FILES['adminImage']['name']='';
      }
       if(isset($_POST['admin-password']))
        {
         $sql_query="UPDATE `artist` SET `password` = '".$_POST['admin-password']."' WHERE `artist`.`email` = '".$_SESSION['user_email_address']."';";
         mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
       }
       if(isset($_POST['bio']))
        {
        
            $sql_query="UPDATE `artist` SET `bio` = '".$_POST['bio']."' WHERE `email` = '".$_SESSION['user_email_address']."';";
            mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
        }
       if(isset($_POST['city']))
        {
        
            $sql_query="UPDATE `artist` SET `city` = '".$_POST['city']."' WHERE `email` = '".$_SESSION['user_email_address']."';";
            mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
        }
       if(isset($_POST['country']))
        {
        
            $sql_query="UPDATE `artist` SET `country` = '".$_POST['country']."' WHERE `email` = '".$_SESSION['user_email_address']."';";
            mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
        }
          header('location:http://localhost:81/Lartist/artist-dash.php');
      }

      // Product Form Submit 
      if(isset($_POST['form2-submit']))
      {
        $thumbnail='';
        if(empty($_FILES['thumbnail']['name']))
        {
          $thumbnail='p-default.png';
        }else{
            $test = explode('.', $_FILES['thumbnail']['name']);
            $exten = end($test);
            $thumbnail = rand(0, 999999) . '.' . $exten;
            $location = "../assects/media/upload-folder/" . $thumbnail;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $location);
          }
            
            $sql_query="INSERT INTO `products` (`name`, `price`, `description`, `thumbnail`, `category`, `artist`) VALUES ('".$_POST['productName']."', '".$_POST['productPrice']."', '".$_POST['productDesc']."', '".$thumbnail."', '".$_POST['productType']."', '".$_SESSION['user_email_address']."');";
            mysqli_query($sql_conn, $sql_query) or die('<script>alert("Database Query Failed")</script>');
          header('location:http://localhost:81/Lartist/artist-dash.php');
      
      }

      if(isset($_POST['username']) && isset($_POST['password']))
      {
       $username=$_POST['username'];
       $password=$_POST['password'];
       $sql_query='SELECT * FROM artist WHERE username="'.$username.'" AND password="'.$password.'";';
      
       $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
       if(mysqli_num_rows($result)>0)
       {  $row=mysqli_fetch_assoc($result);
         $_SESSION['access_token']='set';
         $_SESSION['user_first_name']=$row['name'];
         $_SESSION['user_email_address']=$row['email'];
         $_SESSION['user_image']=$row['picture'];
         header('location:http://localhost:81/Lartist/artist-dash.php');
       }else{
            header('location:http://localhost:81/Lartist/artist-reg.php');
       }
      }


if(isset($_POST['status']))
{
  mysqli_query($sql_conn,'UPDATE `products` SET `status` = 1 WHERE `id` = '.$_GET['id'].';');
    header('location: http://localhost:81/Lartist/artist_dash2.php');
    // http://localhost:81/Lartist/artist_dash2.php
 
}else if(!isset($_POST['status']))
{
   
     mysqli_query($sql_conn,'UPDATE `products` SET `status` = 0 WHERE `id` = '.$_GET['id'].';');
         header('location:http://localhost:81/Lartist/artist_dash2.php');
  
}

?>