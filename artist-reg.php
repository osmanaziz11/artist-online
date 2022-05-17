<?php
session_start();
if(isset($_SESSION['access_token']))
{
 header('location:http://localhost:81/Lartist/artist-dash.php');
}else{
include 'header.php';
include 'server\google_config.php';

$login_button = '';

if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<!-- Section  -->
<section>
    <div class="container-fluid py-4" id="artist_reg">
        <div class="row">
            <div class="col p-5 d-flex flex-column justify-content-center align-items-center">
                <p class="text-center">Join Our Community</p>
                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                    laborum magni dolores eligendi non error commodi modi quaerat
                    accusantium debitis, reprehenderit natus nostrum reiciendis. Quis
                    modi minus et animi sequi?
                </p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-6 d-flex justify-content-end">

            </div>
            <div class="col-6">
                <form action="server\data.php" method="POST" class="rounded shadow ">
                    <h3>Login here.</h3>

                    <label for="username">Username</label>
                    <input type="text" placeholder="Email or Phone" name="username" id="username" required />

                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password" id="password" required />

                    <h6 class="text-center"><button class="mt-5 p-3">Log In</button></h6>
                    <div class="social p-4 justify-content-center align-items-center">
                        <button> <span class="iconify" data-icon="flat-color-icons:google"></span>
                            <?php echo $login_button ?></button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php  } ?>
<?php  require_once('footer.php') ?>