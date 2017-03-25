
    <div id="sponsors" class="content-container sponsor-viewport row col-xs-12 col-lg-8 col-lg-offset-2 col-xs-offset-0 white">
      <div class="col-xs-12 headline-big">Sponsoren</div>

      <?php
        $images = glob("wp-content/sponsor/banner/*.jpg");
        $images_parsed = array();

        echo "<div>";
          $i=0;
          foreach ($images as $img) {
            //Path nicht hardcoden
            $path = "/wordpress/" . $img;
            array_push($images_parsed, $path);
            echo "<div class='sponsor' id='sponsor-carousel-item-" . $i . "'>
                    <img src='" . $path . "'>
                  </div>";
            $i++;
          }
        echo "</div>";


        echo "<div>";
          create_carousel($images_parsed, "", "carousel-sponsors");
        echo "</div>";
      ?>
    
    </div>

  </div><!-- main-content -->

    <div id="impressum">
      <p class="impr-text">Impressum</p>
    </div>
  
  <script src="/wordpress/wp-content/themes/elbflorace/script.js"></script>

<?php wp_footer(); ?>
</body>
</html>
