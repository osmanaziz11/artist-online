<?php  
    require_once('header.php');
    require_once 'server\constants.php';
    
    $sql_query="SELECT products.id,artist.name,products.price,products.thumbnail,products.artist FROM products JOIN artist ON artist.email=products.artist WHERE products.status=1 AND products.views>=5;";
    $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
?>

<!-- Hero Section -->
<div class="container-fluid" id="hero_container"></div>

<!-- Section  -->
<section>
    <div class="container-fluid mt-4" id="section_container">
        <div class="row mt-4">
            <div class="col">
                <h3 class="text-center">Choose Category</h3>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <p class="text-center">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo,
                    suscipit.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 d-lg-flex justify-content-end align-items-center">
                <div class="img_box position-relative">
                    <img src="https://cdn.shopify.com/s/files/1/0072/7472/5427/files/img_17_600x790_crop_top.png.jpg?v=1640854345"
                        alt="" />
                    <h4><a href="Shop.php">Abstract</a></h4>
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
                <div class="img_box position-relative">
                    <img src="https://cdn.shopify.com/s/files/1/0072/7472/5427/files/img_14_600x790_crop_top.png.jpg?v=1640853777"
                        alt="" />
                    <h4><a href="Shop.php">Painting</a></h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="img_box position-relative">
                    <img src="https://cdn.shopify.com/s/files/1/0072/7472/5427/files/img_09_600x790_crop_top.png.jpg?v=1640854251"
                        alt="" />
                    <h4><a href="">Nature</a></h4>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-4 offset-1">
                <div class="img_box d-flex justify-content-end">
                    <img src="https://cdn.shopify.com/s/files/1/0072/7472/5427/files/img_04_720x.png?v=1640854824"
                        alt="" />
                </div>
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                <h2>Art Selected by our Curators</h2>
                <p>Discover new original artwork from around the world.</p>
                <button><a href="Shop.php">Shop Now</a></button>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <h4 class="text-center">Popular Products</h4>
            </div>
        </div>
        <!-- Products  -->
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="row">
                        <?php    
                     if (mysqli_num_rows($result) > 0)
                     {  $counter=0;
                         while ($row = mysqli_fetch_assoc($result))
                        {   
                            $counter+=1;
                            if($counter<=4)
                            {  ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="product_view.php?id=<?php echo $row['id'] ?>">
                                <div class="product rounded shadow p-3">
                                    <img src="<?php
                                           
                                             echo 'assects/media/upload-folder/'.$row['thumbnail']
                                              ?>" alt="" />
                                </div>
                            </a>
                            <div class="desc mt-4">
                                <p class="text-center">
                                    <a style="color:black !important"
                                        href="artist-profile.php?id=<?php echo $row['artist'] ?>">by
                                        <?php echo $row['name'] ?></a>
                                </p>

                            </div>
                        </div>

                        <?php  }
                        else{
                            break;}
                        
                         }
                        }
                    else{
                    ?>
                        <div class="col p-3">
                            <p class="text-center">No Popular Available Available.</p>
                        </div>

                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  require('footer.php') ?>