 <?php  require_once('header.php');
 require_once 'server\constants.php';
  $sql_query="SELECT products.id,artist.name,products.price,products.thumbnail,products.artist FROM products JOIN artist ON artist.email=products.artist WHERE products.status=1;";
  $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
   ?>

 <!-- Section  -->
 <div class="container-fluid" id="shop_container">
     <!-- Path  -->
     <div class="row">
         <div class="col p-3">
             <p class="m-0 px-5">
                 <a href="index.php">Home</a> / <a href="Gallery.php">Gallery</a>
             </p>
         </div>
     </div>
     <!-- Heading  -->
     <div class="row my-5">
         <div class="col">
             <h3 class="text-center">Gallery</h3>
         </div>
     </div>
     <!-- Main Content  -->
     <div class="row">
         <div class="col">
             <div class="container">
                 <!-- Filters  -->
                 <div class="row">
                     <div class="col-4">

                     </div>
                     <div class="col-4">
                         <p class="text-center"><?php echo mysqli_num_rows($result) ?> Products</p>
                     </div>
                     <div class="col-4">

                     </div>
                 </div>
                 <!-- Products  -->
                 <div class="row mb-4">
                     <?php     if (mysqli_num_rows($result) > 0)
                     { while ($row = mysqli_fetch_assoc($result))
                     {?>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                         <a href="product_view.php?id=<?php echo $row['id'] ?>">
                             <div class="product rounded shadow p-3">
                                 <img src="<?php
                                           
                                             echo 'assects/media/upload-folder/'.$row['thumbnail']
                                              ?>" alt="" />
                             </div>
                         </a>

                     </div>
                     <?php  }}else{
    ?>
                     <div class="col p-3">No products available.</div>

                     <?php }  ?>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?php  require_once('footer.php') ?>