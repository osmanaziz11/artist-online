<?php  
require_once('header.php') ;
 require_once 'server\constants.php';

    $sql_query='SELECT * from products where id='.$_GET['id'].';';
    $result=mysqli_query($sql_conn,$sql_query) or die('<script>alert("Database Query Failed")</script>');
    $row = mysqli_fetch_assoc($result);

   $sql_query1='UPDATE `products` SET `sold` = sold+1 WHERE `id` ='.$row['id'];
    mysqli_query($sql_conn,$sql_query1) or die('<script>alert("Database Query Failed")</script>');

?>
<div class="container-fluid">
    <div class="row">
        <div id="cartBanner" class="col p-5 d-flex flex-column align-items-center">
            <h2>Shopping Bag</h2>
            <div class="style-bar"></div>
        </div>
    </div>
    <!--Grid row-->
    <div class="row mb-5">
        <!--Grid column-->
        <div id="leftCol" class="col-lg-8  p-4 bg-white">

            <!-- Card -->
            <div class="row mb-4 shadow p-4 bg-white">
                <div class="col-md-5 col-lg-3 col-xl-3" style="background: white;">
                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                        <img class="img-fluid w-100"
                            src="<?php echo 'assects/media/upload-folder/'.$row['thumbnail'] ?>" alt="Sample">

                    </div>
                </div>
                <div class="col-md-7 col-lg-9 col-xl-9">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5><?php echo $row['name']  ?></h5>
                                <p class="mb-3 text-muted text-uppercase small">
                                    Category - <?php echo $row['category'] ?></p>
                                <p class="mb-2 text-muted text-uppercase small">Description:</p>
                                <p class="mb-3 text-muted text-uppercase small">
                                    <?php echo $row['description']  ?>
                                </p>
                            </div>
                            <div>


                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">

                            <p class="mb-0"><span><strong>Print - <?php echo $row['price'] ?></strong></span></p>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <!--Grid column-->
        <div id="rightCol" class="col-lg-4 bg-white">

            <!-- Card -->
            <div class="mb-3 p-4">
                <div class="shadow p-2 bg-white">

                    <h5 class="mb-3 text-center">Summary</h5>

                    <ul class="p-0">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Temporary amount
                            <span>$25.98</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Shipping
                            <span>Gratis</span>
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>The total amount of</strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                            <span><strong>$53.98</strong></span>
                        </li>
                    </ul>

                    <button type="button" id="cartBtn1" class="bg-black p-2 text-white rounded border-0 w-100"
                        style="background-color: black;">Checkout</button>
                    <button type="button" id="cartBtn2" class="bg-black p-2 mt-2 text-white rounded border-0 w-100"
                        style="background-color: black;">Continue Shopping</button>

                </div>
            </div>



        </div>
        <!--Grid column-->

    </div>
    <!-- Grid row -->
</div>

<?php require_once('footer.php') ?>