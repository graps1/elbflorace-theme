
  </div>
  <div class="footer container" id="footer">
    <?php

      $images = glob("wp-content/sponsor/banner/*.jpg");

      foreach ($images as $img) {
        $path = "/wordpress/" . $img;
        echo "<img class='sponsor' src='".$path."'></img>";
      }

     ?>
  </div>

  <div class="impressum">
    <p class="impr-text">Impressum</p>
  </div>

<?php wp_footer(); ?>
</body>
</html>
