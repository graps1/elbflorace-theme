
  </div>
  <div class="container see-through-black-light" id="footer">
    <div class="sponsor-viewport">
    </div>

    <?php
      $images = glob("wp-content/sponsor/banner/*.jpg");

      echo "<div class='col-xs-12 col-lg-8 col-lg-offset-2 col-xs-offset-0'>";
        create_carousel($images, "sponsor-carousel-img");
      echo "</div>";
      
      echo "<div class='col-xs-12 col-lg-8 col-lg-offset-2'>";
        foreach ($images as $img) {
          //Path nicht hardcoden
          $path = "/wordpress/" . $img;
          echo "<div class='sponsor' src='".$path."'>
                  <img src='" . $path . "'>
                  <p>Ausführliche Beschreibung...</p>
                </div>";
        }
      echo "</div>";

     ?>
  </div>

  <div id="impressum" class="see-through-black-strong">
    <p class="impr-text">Impressum</p>
  </div>
  
  <script src="/wordpress/wp-content/themes/elbflorace/script.js"></script>

<?php wp_footer(); ?>
</body>
</html>
