<?php

    /*
    Gets the page-name from the url:
    http://localhost/this/is/a/fancy-page/ returns fancy-page.
    This is necessary because each page has a custom header!
    author: Hans
    */
    function get_page_name() {

      if (is_front_page()) {
          return "home";
      }

      $url = get_page_link();
      $arr = str_split($url);
      $name = "";

      for ($i=sizeof($arr)-2; $i > 0 && $arr[$i] !== '/'; $i--){
          $name = $arr[$i] . $name;
      }

      return $name;
    }

    /*
    Returns a banner picture for the current page.
    Each banner must start with the page name and end with "-header.jpg"
    author: Hans
    */
    function get_page_banner(){
        $img = get_page_banner_dir() . get_page_name() . "-banner.jpg";
        return $img;
    }

    function get_cont_dir() {
      return "/wordpress/wp-content/";
    }

    function get_theme_dir() {
      return get_cont_dir() . "themes/elbflorace/";
    }

    function get_page_banner_dir() {
      return get_cont_dir() . "page/banner/";
    }

    function get_sponsor_banner_dir() {
      return get_cont_dir() . "sponsor/banner/";
    }
?>
