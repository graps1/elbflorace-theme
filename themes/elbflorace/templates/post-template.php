<?php

    /*
    creates a carousel for a list of image-links
    */
    function create_carousel($images, $carousel_class, $target_id, $extra_item_content = ""){
        //Indicators
        echo "<div id='". $target_id . "' class='" . $carousel_class . " carousel slide post-carousel'
            data-ride='carousel'>
            <ol class='carousel-indicators'>";

        for ($i = 0; $i < sizeof($images); $i++){
            if ($i == 0) {
                echo "<li data-target='#".$target_id."' data-slide-to='0' class='carousel-indicator active'></li>";
            } else {
                echo "<li data-target'#".$target_id."' data-slide-to='" . $i . " class='carousel-indicator'></li>";
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
                    <div class='image' style='background-image:url( " . $img . " );'></div>"
                    . $extra_item_content .
                  "</div>";
        }
        echo "</div>";

        ?>
            <!-- Left and right controls -->
            <a class="carousel-control" href="#<?php echo $target_id; ?>" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="col-xs-offset-10 carousel-control" href="#<?php echo $target_id; ?>" role="button" data-slide="next">
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

          //removes the http://localhost... from a link
          //so other devices can access these images!
          //not working when integrating images from other websites,
          //
          //maybe test for "http://localhost/" and then cut?
          $link = substr($matches[1][$i], 16);

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

    function create_post_img($images, $img_classes){
        //generate a random string as id
        $hash = substr(str_shuffle(MD5(microtime())), 0, 10);

        if (sizeof($images) == 1) {
            echo "
                <div id='" . $hash ."' class='carousel-post'>
                    <img src='" . $images[0] . "' width='100%'></img>
                </div>
            ";
        } elseif (sizeof($images) > 0) {
            create_carousel($images, $img_classes, $hash);
        }
    }

    function create_post ($post, $post_classes, $headline_classes, $text_classes, $date_classes) {
        $images = grab_images($post->post_content);
        
        $content =
            "<p class='" . $text_classes . "'>" . rm_html($post->post_content) . "</p>
                <div class='post-button btn glyphicon glyphicon-chevron-down' 
                    full-height='1000px' collapsed-height='60px'></div>
            <p class='" . $date_classes . "'>" . $post->post_date_gmt . "</p>"; 
        
        echo "<div class='" . $post_classes . "'>";
          echo "<h3 class='" . $headline_classes . "'>" . $post->post_title . "</h3>";
          create_post_img($images, "carousel-post");
          echo "<div class='content'>".$content."</div>";
        echo "</div>";
    }

?>
