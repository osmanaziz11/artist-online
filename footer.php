 <!-- Footer  -->
 <div class="footer-dark pb-0">
     <footer>
         <div class="container">
             <div class="row">
                 <div class="col-sm-6 col-md-3 item">
                     <h3>Services</h3>
                     <ul>
                         <li><a href="#">Web design</a></li>
                         <li><a href="#">Development</a></li>
                         <li><a href="#">Hosting</a></li>
                     </ul>
                 </div>
                 <div class="col-sm-6 col-md-3 item">
                     <h3>About</h3>
                     <ul>
                         <li><a href="#">Company</a></li>
                         <li><a href="#">Team</a></li>
                         <li><a href="#">Careers</a></li>
                     </ul>
                 </div>
                 <div class="col-md-6 item text">
                     <h3>Company Name</h3>
                     <p>
                         Praesent sed lobortis mi. Suspendisse vel placerat ligula.
                         Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis
                         tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel
                         in justo.
                     </p>
                 </div>
                 <!-- <div class="col item social">
                     <a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                             class="icon ion-social-twitter"></i></a><a href="#"><i
                             class="icon ion-social-snapchat"></i></a><a href="#"><i
                             class="icon ion-social-instagram"></i></a>
                 </div> -->
             </div>
         </div>
     </footer>
 </div>
 <p class="text-center bg-dark w-100 p-3" style="
        font-family: var(--font-mont);
        color: var(--fc-primary);
        letter-spacing: 1px;
      ">
     Powered by One|Man
 </p>
 <!-- Iconify Script  -->
 <script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
 <script src="assects\Js\jquery.js"></script>
 <script>
const toggle_menu = () => {
    $("#nav_m_menu").toggleClass("end-0");
    setTimeout(() => {
        $("#menu_effect").toggleClass("effect_active");
    }, 180);
};

//  Image Preview 
const readURL = (input) => {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {

        var reader = new FileReader();
        reader.onload = function(e) {
            console.log($(this).data('container'));
            $('#image-box label').html('<img src="' + e.target.result + '" onload="" />');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#image-container').addClass('invalidError');
        setTimeout(() => {
            $('#image-container').removeClass('invalidError');
        }, 2000);
    }
}
const readURL_thumbnail = (input) => {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {

        var reader = new FileReader();
        reader.onload = function(e) {

            $('#main-image-thumbnail label').html('<img src="' + e.target.result + '" onload="" />');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#main-image-thumbnail').addClass('invalidError');
        setTimeout(() => {
            $('#main-image-thumbnail').removeClass('invalidError');
        }, 2000);
    }
}

// Product Status 
const product_status = (event) => {
    if (event.checked) {
        // status 1

    } else {
        // status 0

    }
}
 </script>
 </body>

 </html>