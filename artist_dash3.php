 <?php  
 session_start();
 // check user Loged in
 if(!$_SESSION['access_token'])    
 {    //  if not Redirect to Login Page
    header('location:http://localhost:81/Lartist/artist-reg.php');
 }
 else
 { 
 require_once('header.php') 
 
 ?>

 <!-- Section  -->
 <section>
     <div class="container-fluid p-5" id="artist_dash">
         <div class="row">
             <div class="col-6 p-4">
                 <a href="artist-dash.php">
                     <h4 class="rounded shadow text-center p-2">Dashboard</h4>
                 </a>
             </div>
         </div>
         <!-- Main Content  -->
         <div class="row">
             <div class="col">
                 <form enctype="multipart/form-data" action="server\data.php" method="POST">
                     <!-- Registration Box -->
                     <div id="item-registration-box" class="item-box-styling shadow p-3 mb-5 bg-body rounded container">
                         <div class="row">
                             <div class="col-md-4 mb-2">
                                 <h6>Product ID</h6>
                                 <span id="id-validation-icon">
                                     <input type="text" name="" id="pId-btn" disabled value="Auto Generated" />
                                 </span>
                                 <h6>Product Name</h6>
                                 <input type=" text" name="productName" id="pName-btn" required />
                                 <h6>Product Price</h6>
                                 <input type="number" name="productPrice" id="pPrice-btn" required />
                                 <h6 class="mt-2">Choose Category</h6>
                                 <select name="productType" id="pType-btn">
                                     <option value="Nature">Nature</option>
                                     <option value="Abstract">Abstract</option>
                                     <option value="Paint">Paint</option>
                                 </select>
                                 <div class="form-group shadow-textarea">
                                     <label for="exampleFormControlTextarea6">
                                         <h6 class="mt-4">Product Description</h6>
                                     </label>
                                     <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3"
                                         placeholder="Write something here..." name="productDesc"
                                         style="resize: none"></textarea>
                                 </div>
                             </div>

                             <div class="col-md-3 position-relative">
                                 <div id="main-image-thumbnail" class="shadow-sm">
                                     <label for="thumbnail" style="width: 100%">
                                         <img src="assects/media/upload-folder/p-default.png" alt="" />
                                     </label>
                                     <input type="file" name="thumbnail" id="thumbnail" class="d-none"
                                         data-container="main-image-thumbnail" onchange="readURL_thumbnail(this)">
                                     <figcaption class="text-center mt-2">Main Image</figcaption>
                                     <p>
                                         Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                         Officia, quo?
                                     </p>
                                 </div>
                             </div>
                             <div
                                 class="col-md-5 d-flex p-5 flex-column justify-content-between align-items-center h-100">
                                 <label for="submit-btn">
                                     <span class="iconify" style="font-size:50px; cursor:pointer;"
                                         data-icon="cil:cloud-upload"></span>
                                     <p class="text-center" style="cursor:pointer">Upload</p>
                                 </label>
                                 <input type="submit" name="form2-submit" value="Upload" id="submit-btn" hidden>
                                 <!-- <div class="success-msg d-none">
                                     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                         <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6"
                                             stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                         <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6"
                                             stroke-linecap="round" stroke-miterlimit="10"
                                             points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                     </svg>
                                     <p class="success">Product Uploaded Sucessfully!</p>
                                 </div>
                                 <div class="error-msg">
                                     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                         <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6"
                                             stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                         <line class="path line" fill="none" stroke="#D06079" stroke-width="6"
                                             stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8"
                                             y2="92.3" />
                                         <line class="path line" fill="none" stroke="#D06079" stroke-width="6"
                                             stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4"
                                             y2="92.2" />
                                     </svg>
                                     <p class="error text-center mt-2">Bummer!</p>
                                 </div> -->

                             </div>
                         </div>

                         <div class="row">
                             <div class="btn-container">
                                 <i class="fas fa-long-arrow-alt-right next-btn"></i>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>

 <?php } require_once('footer.php') ?>