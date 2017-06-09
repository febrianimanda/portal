<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//output : css folder path
    if ( ! function_exists('css_url')){
      function css_url($uri = ''){
        $CI =& get_instance();
        return base_url()."asset/css/".$uri;
      }
    }

    //output : javascript folder path
    if ( ! function_exists('js_url')){
      function js_url($uri = ''){
        $CI =& get_instance();
        return base_url()."asset/js/".$uri;
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

    // output css tags
    if(!function_exists('put_css_headers')){
      function put_global_css(){
        $str = '';
        $ci =& get_instance();
        $file_css  = $ci->config->item('global_file_css');
        if(sizeof($file_css) > 0){
          foreach($file_css AS $file) {
            $str .= '<link rel="stylesheet" href="'.css_url($file).'" type="text/css" />'."\n";
          }
        }
        return $str;
      }
    }

    // output: javascript tags
    if(!function_exists('put_js_headers')){
      function put_global_js(){
        $str = '';
        $ci =& get_instance();
        $file_js = $ci->config->item('global_file_js');
        $url_js = $ci->config->item('global_url_js');

        if(sizeof($file_js) > 0){
          foreach($file_js AS $file) {
            $str .= '<script type="text/javascript" src="'.js_url($file).'"></script>'."\n";
          }
        }
        
        if(sizeof($url_js) > 0){
          foreach ($url_js as $url) {
            $str .= '<script type="text/javascript" src="'.$url.'"></script>'."\n"; 
          }
        }

        return $str;
      }
    }