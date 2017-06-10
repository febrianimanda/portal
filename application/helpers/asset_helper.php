<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//output : css folder path
if ( ! function_exists('css_url')){
  function css_url($uri = ''){
    $CI =& get_instance();
    return base_url()."asset/css/".$uri.".css";
  }
}

//output : javascript folder path
if ( ! function_exists('js_url')){
  function js_url($uri = ''){
    $CI =& get_instance();
    return base_url()."asset/js/".$uri.".js";
  }
}

//output : libraries folder path
if ( ! function_exists('libraries_url')){
  function libraries_url($uri = ''){
    $CI =& get_instance();
    return base_url()."asset/js/plugins/".$uri;
  }
}

//output: images folder path
if(! function_exists('img_url'))
{
  function img_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."asset/images/".$uri;
  }
}

// output: local css tags load using files
if(!function_exists('header_css_file')){
  function header_css_file($files=[]){
    $str = '';
    $ci =& get_instance();
    if(sizeof($files) > 0){
      foreach($files AS $file) {
        $str .= '<link rel="stylesheet" href="'.css_url($file).'" type="text/css" />'."\n";
      }
    }
    return $str;
  }
}

// output: local css tags load using URL
if(!function_exists('header_css_url')){
  function header_css_url($urls=[]){
    $str = '';
    $ci =& get_instance();
    if(sizeof($urls) > 0){
      foreach($urls AS $url) {
        $str .= '<link rel="stylesheet" href="'.$url.'" type="text/css" />'."\n";
      }
    }
    return $str;
  }
}

// output: local javascript tags load using files
if(!function_exists('header_js_file')){
  function header_js_file($files=[]){
    $str = '';
    $ci =& get_instance();
    if(sizeof($files) > 0){
      foreach($file_js AS $file) {
        $str .= '<script type="text/javascript" src="'.js_url($file).'"></script>'."\n";
      }
    }
    return $str;
  }
}

// output: local javascript tags load using files
if(!function_exists('footer_js_file')){
  function footer_js_file($files=[]){
    $str = '';
    $ci =& get_instance();
    if(sizeof($files) > 0){
      foreach($files AS $file) {
        $str .= '<script type="text/javascript" src="'.js_url($file).'"></script>'."\n";
      }
    }
    return $str;
  }
}

// output: local javascript tags load using url
if(!function_exists('footer_js_url')){
  function footer_js_url($urls=[]){
    $str = '';
    $ci =& get_instance();
    if(sizeof($urls) > 0){
      foreach ($urls as $url) {
        $str .= '<script type="text/javascript" src="'.$url.'"></script>'."\n"; 
      }
    }
    return $str;
  }
}