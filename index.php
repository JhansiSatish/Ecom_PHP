   <?php

   include('functions/userfunctions.php');
   include('includes/header.php');
   include('includes/slider.php');
   ?>
   <div class="py-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4>Tending Products</h4>
               <hr>

               <div class="owl-carousel">
                  <?php
                  $trendingProducts = getAllTrending();
                  if (mysqli_num_rows($trendingProducts) > 0) {
                     foreach ($trendingProducts as $item) {
                  ?>
                        <div class="item">
                           <a href="product-view.php?product=<?= $item['slug']; ?>">
                              <div class="card shadow">
                                 <div class="card-body">
                                    <img src="uplodes/<?= $item['image']; ?>" alt="Product  Name" class="w-100">
                                    <h6 class="text-center"><?= $item['name']; ?></h6>
                                 </div>
                              </div>
                           </a>
                        </div>

                  <?php
                     }
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <div class="py-4 bg-light">
      <div class="container ">
         <div class="row">
            <div class="col-md-12">
               <h4>About Us :</h4>

               <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis error consectetur ab et, doloribus consequatur ad in sequi quis repellat repudiandae, maiores asperiores harum facilis totam, dicta quidem dolore. Debitis!
               </p>

            </div>
         </div>
      </div>
   </div>
   <div class="py-4 bg-dark">
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <h4 class="text-white">E-Shop :</h4>

               <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i> Home</a><br>
               <a href="#" class="text-white"> <i class="fa fa-angle-right"></i> About Us</a><br>
               <a href="displaycart.php" class="text-white"> <i class="fa fa-angle-right"></i> My Cart</a><br>
               <a href="categories.php" class="text-white"> <i class="fa fa-angle-right"></i> Our Collections</a>


            </div>
            <div class="col-md-3">
               <h4 class="text-white">Adress :</h4>
               <p class="text-white">
                  Indraprastha Apartments
                  Plot No 5, 502,
                  beside Tenali Road, Mangalagiri,
                  Atmakur Rural, Andhra Pradesh 522503
               </p>
               <a href="tel:+919876543456"><i class="fa fa-phone"></i>+91 9876543456</a><br>
               <a href="mailto:abc@gmail.com"><i class="fa fa-envelope"></i>abc@gmail.com</a>
            </div>
            <div class="col-md-6">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.0095064280713!2d80.5768443724248!3d16.424343584307746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f1e7e1c80d05%3A0x3ec78ef7893a9886!2sIndraprastha%20Apartments!5e0!3m2!1sen!2sin!4v1695238653358!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
      </div>
   </div>
   <div class="py-1 bg-danger">
      <div class="text-center">
         <p class="mb=0 text-white">
            All rights reserved. Copyright@ Jhansi satish<?= date('Y'); ?>

         </p>
      </div>

   </div>

   <?php include('includes/footer.php'); ?>
   <script>
      $(document).ready(function() {
         $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
               0: {
                  items: 1
               },
               600: {
                  items: 3
               },
               1000: {
                  items: 5
               }
            }
         })

      });
   </script>