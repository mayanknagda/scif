<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>

    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p align="center" style="color:red"><b>SCIF:</b><i>SRM Centreal Instrumentation Facility</i></p>
        <p>About SCIF<br>SCIF portal provides consolidated state-of-the-art research facilities available in SRMIST and allows users to directly reserve time for use.
        </p>


        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/hrtem.jpg" style="width:100%">
          <div class="text" style="color:red">Hi-Resolution Transmission Electron Microscope (HRTEM)</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/raman.jpg" style="width:100%">
          <div class="text" style="color:red">Micro-Raman Spectrometer</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/xrd.jpg" style="width:100%">
          <div class="text" style="color:red">X-Ray Diffractometer (XRD)</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
        </script>
        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; SCIF</p>
        </footer>
      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
