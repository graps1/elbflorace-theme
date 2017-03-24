<?php

    /*
    creates a carousel for a list of image-links
    */
    function create_carousel($images, $img_classes){
        $hash = substr(str_shuffle(MD5(microtime())), 0, 10);

        //Find maximum image-size, so the carousel won't change its size
        //and destroy our nice layout
        $max_height = -1;
        $max_width = -1;
        foreach ($images as $img) {
          $size = getimagesize($img);
          if ($max_height === -1 || $max_height < $size[1]) {
            $max_height = $size[1];
          }

          if ($max_width === -1 || $max_width < $size[0]) {
            $max_width = $size[0];
          }
        }

        //Indicators
        echo "<div id='". $hash . "' class='carousel slide post-carousel'
            data-ride='carousel'>
            <ol class='carousel-indicators'>";

        for ($i = 0; $i < sizeof($images); $i++){
            if ($i == 0) {
                echo "<li data-target='#".$hash."' data-slide-to='0' class='active'></li>";
            } else {
                echo "<li data-target'#".$hash."' data-slide-to='" . $i . "'></li>";
            }
        }

        echo "</ol>";

        //Wrapper for slides
        echo "<div class='carousel-inner' role='listbox'>";
        for ($i = 0; $i < sizeof($images); $i++){
            $img = $images[$i];

            $img_par_class = "item";
            if ($i == 0) {
                $img_par_class = $img_par_class . " active";
            }

            echo "<div class='" . $img_par_class . "'>
                    <div class='" . $img_classes . "' style='background-image:url( " . $img . " );'>
                  </div></div>";
        }
        echo "</div>";

        ?>
            <!-- Left and right controls -->
            <a class="left carousel-control" href=<?php echo "'#" . $hash . "'" ?> role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href=<?php echo "'#" . $hash . "'" ?> role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        <?php
    }

    /*
    grabs all images from a post and returns their links
    */
    function grab_images ($content) {
        $matches = array();
        preg_match_all("<img(?:.*?)src=(?:\"|')(.*?)(?:\"|')(?:.*?)>", $content . "", $matches);
        $links = array();
        for ($i=0; $i<sizeof($matches[1]); $i++){
          //$link = $matches[1][$i];

          //removes the http://localhost/wordpress/... from a link
          //so other devices can access these images!
          //not working when integrating images from other websites,
          //
          //maybe test for "http://localhost/" and then cut?
          $link = substr($matches[1][$i], 27);

          array_push($links, $link);
        }

        return $links;
    }

    /*
    removes all html-tags from a post
    */
    function rm_html($post) {
      $ret = "";
      $i = 0;
      for ($i = 0; $i < strlen($post); $i++) {
        if ($post[$i] === '<'){
          while ($post[$i] !== '>'){
            $i++;
          }
        } else {
          $ret = $ret . $post[$i];
        }
      }

      return $ret;
    }


    function preview_post($post, $min_length){
      $ret = "";
      for ($i = 0; $i < strlen($post) && ($i < $min_length || $post[$i] !== " "); $i++) {
        $ret = $ret . $post[$i];
      }
      return $ret;
    }

    function create_post_img($images, $img_classes){
        if (sizeof($images) > 0) {
            create_carousel($images, $img_classes);
        }
    }

    function create_post ($post, $post_classes, $headline_classes, $text_classes, $date_classes) {
        $images = grab_images($post->post_content);

        $content =
            "<div class='" . $text_classes . "'>" . preview_post(rm_html($post->post_content), 11250) . "</div>" .
            "<div class='" . $date_classes . "'>" . $post->post_date_gmt . "</div>";

        echo "<div class='" . $post_classes . "'>";
          echo "<h3 class='" . $headline_classes . "'>" . $post->post_title . "</h3>";
          create_post_img($images, "post-img");
          echo "<div class='post-left'>".$content."</div>";
        echo "</div>";
    }

?>
