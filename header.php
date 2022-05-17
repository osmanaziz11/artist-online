<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artist</title>
    <!-- Favicon  -->
    <link rel="shortcut icon" href="assects\media\favicon.png" type="image/jpg" />
    <!-- Index.css  -->
    <link rel="stylesheet" href="assects\css\index.css" />
    <!-- Bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <!-- nav mobile menu  -->
    <div class="container-fluid position-fixed h-100" id="nav_m_menu">
        <div class="row">
            <div class="col p-4 d-flex justify-content-end">
                <span class="iconify" style="font-size: 40px; cursor: pointer" data-icon="gridicons:cross-small"
                    onclick="toggle_menu()"></span>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="nav_m_img">
                    <img src="assects\media\logo1.jpg" alt="Logo" class="img-responsive w-100" />
                </div>
            </div>
        </div>
        <!-- Window Mode  -->
        <div class="row d-md-block d-none">
            <div class="col p-2">
                <p class="text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum ipsa
                    eveniet sint adipisci, porro nam dicta qui est vitae dolores
                    excepturi facere ducimus, nobis mollitia maiores fuga eaque eligendi
                    ipsam.
                </p>
            </div>
        </div>
        <!-- Mobile Mode  -->
        <div class="row d-md-none d-block">
            <div class="col">
                <ul class="mob_menu d-flex flex-column p-0 align-items-center">
                    <li><a href="artist.php">Artist</a></li>
                    <li class="px-4"><a href="gallery.php">Gallery</a></li>
                    <li class="px-4"><a href="shop.php">Shop</a></li>
                    <li><a href="artist-reg.php">Register</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col p-3 d-flex justify-content-center">
                <button><a href="Shop.php" style="color:white !important">Shop</a></button>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col p-2">
                <ul class="d-flex p-0 justify-content-center">

                    <li><a class="mx-3" href="">Checkout</a></li>
                    <li><a class="" href="">My Account</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  menu effect  -->
    <!-- <div class="container-fluid position-fixed" id="menu_effect"></div> -->
    <!-- header  -->
    <header>
        <!-- navbar -->
        <div class="container-fluid" id="nav_container">
            <div class="row h-100">
                <!-- Logo  -->
                <div class="col-4 h-100" id="Logo_container">
                    <div class="nav_img">
                        <a href="index.php"><img src="assects\media\logo1.jpg" alt="Logo" class="img-responsive" /></a>
                    </div>
                </div>
                <!-- Menu  -->
                <div class="col-8 position-relative d-flex justify-content-start align-items-center"
                    id="menu_container">
                    <ul class="d-lg-flex d-none p-0 position-relative">
                        <li class="mx-4"><a href="artist.php">Artist</a></li>
                        <li class="mx-4"><a href="gallery.php">Gallery</a></li>
                        <li class="mx-4"><a href="shop.php">Shop</a></li>
                        <li class="mx-4"><a href="artist-reg.php">Register</a></li>
                    </ul>
                    <span class="iconify mx-4 position-absolute" onclick="toggle_menu()"
                        data-icon="icon-park-outline:hamburger-button"></span>
                    <button class="p-2 position-absolute">
                        <a href="artist-reg.php">Join Artist</a>
                    </button>
                </div>
            </div>
        </div>
    </header>