<?php

require_once 'app/core/App.php';
require_once 'app/core/Controller.php';
require_once 'app/core/Model.php';

$app = new App();

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super Bank</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <div class="js-animsition animsition" id="site-wrap" data-animsition-in-class="fade-in" data-animsition-out-class="fade-out">


    <header>
    </header>

  
<!--
    <div class="templateux-section">

      <div class="container">

        <div class="row mb-5">
          <div class="col-md-4 mb-4" data-aos="fade-up">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-loop"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Regular Update</h3>
                <p>We are the bank of Concordia. Always available to serve for COMP 353.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-infinite-outline"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Infinite Posibilities</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-locked-outline"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Good Security</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-nutrition-outline"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Orange for Carrots</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-lightbulb-outline"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Intuitive Thinking</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="media block-icon-1 d-block text-center">
              <div class="icon mb-3"><span class="ion-ios-videocam-outline"></span></div>
              <div class="media-body">
                <h3 class="h5 mb-4">Play Video</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="#" class="btn btn-sm btn-primary px-3">Read More</a></p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>  -->

    <footer class="templateux-footer bg-light">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-4 pr-md-5">
            <div class="block-footer-widget">
              <h3>About</h3>
              <p>We are the bank of Concordia. Always available to serve for COMP 353.</p>
            </div>
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3">
                <div class="block-footer-widget">
                  <h3>Learn More</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">How it works?</a></li>
                    <li><a href="#">Useful Tools</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Sitemap</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="block-footer-widget">
                  <h3>Support</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Help Desk</a></li>
                    <li><a href="#">Knowledgebase</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="block-footer-widget">
                  <h3>About Us</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-3">
                <div class="block-footer-widget">

                  <p>Connect With Us</p>
                  <ul class="list-unstyled block-social">
                    <li><a href="#" class="p-1"><span class="icon-facebook-square"></span></a></li>
                    <li><a href="#" class="p-1"><span class="icon-twitter"></span></a></li>
                    <li><a href="#" class="p-1"><span class="icon-github"></span></a></li>
                  </ul>
                </div>
              </div>
            </div> <!-- .row -->

          </div>
        </div> <!-- .row -->



      </div>
    </footer> <!-- .templateux-footer -->


   </div> <!-- .js-animsition -->


  <script src="js/scripts-all.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
