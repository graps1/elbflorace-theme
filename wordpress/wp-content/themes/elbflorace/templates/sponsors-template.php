<?php
    function create_sponsors() {
    
    ?>
    
    <div id="sponsors" class="content-container sponsor-viewport">
    
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
        create_carousel($images_parsed, "", "carousel-sponsors",
        "<p> Beschreibung </p>"
        );
    echo "</div></div>";
    }
?>