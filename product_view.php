<?php 
  require_once('header.php') ;
  require_once 'server\constants.php';

    $sql_query='SELECT * from products where id='.$_GET['id'].';';
    $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
    $row = mysqli_fetch_assoc($result);

    $sql_query2='SELECT name from artist where email="'.$row['artist'].'";';
    $res2=mysqli_query($sql_conn,$sql_query2) or die('<script>alert("Database Query Failed")</script>');
    $row2 = mysqli_fetch_assoc($res2);
    
     $sql_query1='UPDATE `products` SET `views` = views+1 WHERE `id` ='.$row['id'];
     mysqli_query($sql_conn,$sql_query1) or die('<script>alert("Database Query Failed")</script>');
 ?>
<!-- Product Detail Container -->
<div id="outer_container" class="p-5">
    <div id="product-detail-container" class="container shadow bg-white p-3 rounded">

        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox mt-5">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 d-flex justify-content-center align-items-center mb-0">
                            <figure class="view overlay rounded z-depth-1 abc" id="main-img">
                                <img id="zoom" src="<?php echo 'assects/media/upload-folder/'.$row['thumbnail'] ?>"
                                    class="img-fluid z-depth-1">
                            </figure>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <h5><?php echo $row['name'] ?></h5>
                <p class="mb-2 text-muted text-uppercase small"><?php echo $row['category'] ?></p>
                <ul class="rating d-flex p-0">
                    <li class="list-group-item border-0 p-0">
                        <span class="iconify" data-inline="false" data-icon="emojione:star"></span>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <span class="iconify" data-inline="false" data-icon="emojione:star"></span>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <span class="iconify" data-inline="false" data-icon="emojione:star"></span>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <span class="iconify" data-inline="false" data-icon="emojione:star"></span>
                    </li>
                    <li class="list-group-item border-0 p-0">
                        <span class="iconify" data-inline="false" data-icon="emojione:star"></span>
                    </li>

                </ul>
                <p><span class="mr-1"><strong>Rs/- <?php echo $row['price'] ?></strong></span></p>
                <p class="pt-1"><?php echo $row['description'] ?></p>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Artist</strong></th>
                                <td><?php echo $row2['name']  ?></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Views</strong></th>
                                <td><?php echo $row['views']  ?></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Sold</strong></th>
                                <td><?php echo $row['sold']  ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>

                <button type="button" class="btn btn-dark btn-md mr-1 mb-2 w-50"><a
                        href="cart.php?id=<?php echo $row['id'] ?>">Add to cart</a></button>
            </div>

        </div>


    </div>
</div>
<?php require_once('footer.php') ?>