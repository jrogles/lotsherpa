<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function postQuery($limit,$categoryID)
      {
        return get_posts([
          'posts_per_page' => $limit,
          'cat' => $categoryID,
          'exclude' => array(get_the_id()),
        ]);
      }

    public static function hex2rgb( $colour )
    {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
    }

    public function customizerFallback()
    {
        $initlogo = \App\asset_path('images/logo.svg');
        $fallback = [
                'logo' => $initlogo,
                'address' => '5000 UpdateMe Ave, St. Louis, MO 12345',
                'phone' => '123.321.1234',
                'phone_comp' => '+11233211234',
                'email' => 'test@test.test',
            ];

            return $fallback;

    }

    public function customizedTheme()
    {
        $fallback = App::customizerFallback();
        $mods = get_theme_mods()[0];
        $logo;
            if ( !isset($mods['upload_logo']) ) {
                $logo = $fallback['logo'];
            } else {
                $logo = $mods['upload_logo'];
            }

          return [
             'logo' => $logo,
              'logo_id' => attachment_url_to_postid($logo),
              'logo_ext' => pathinfo($logo, PATHINFO_EXTENSION),
              'address' => $mods['address'] ?? $fallback['address'],
              'phone' => $mods['phonenumber_humans'] ?? $fallback['phone'],
              'phone_comp' => $mods['phonenumber_robots'] ?? $fallback['phone_comp'],
              'email' => $mods['email_address'] ?? $fallback['email'],
          ];

    }

    public static function svgCheck(  $path ) {
        $extension = pathinfo($path)['extension'];
        if ($extension == 'svg') {
            return true;
        } else {
            return false;
        }
    }

    public static function imgAspect(  $path ) {
        $p = "http://" . $_SERVER['HTTP_HOST'] .$path;
        $svgFlag = App::svgCheck($path);
        $specs;
        $ratio;


        if ($svgFlag) {
            $specs = simplexml_load_file($p)->attributes();
            $viewBox = explode(" ",$specs->viewBox);
             //var_dump($viewBox);
            //$ratio = ($specs->width / $specs->height);
             $ratio = ($viewBox[2] / $viewBox[3]);
        } else {
            $specs = getimagesize($p);
            $ratio = ($specs[0] / $specs[1]);
        }

        if ($ratio > 1.2) {
            return 'landscape ';
        } elseif ($ratio < 0.8) {
            return 'portrait ';
        } else {
            return 'square ';
        }
    }

    public static function evenOdd(  $num ) {
        if($num % 2 == 0){
            return "even";
        }
        else{
            return "odd";
        }
    }
}


