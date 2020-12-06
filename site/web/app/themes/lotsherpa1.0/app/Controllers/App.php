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
                'phone_r' => '+11233211234',
                'email' => 'test@test.test',
            ];

            return $fallback;

    }

    public function customizedTheme()
    {
        $fallback = App::customizerFallback();
        $mods = get_theme_mods();
        $logo = $mods['upload_logo'] ?? $fallback['logo'];
        $address = $mods['address'] ?? $fallback['address'];
        $phone = $mods['phonenumber_humans'] ?? $fallback['phone'];
        $phoneR = $mods['phonenumber_robots'] ?? $fallback['phone_r'];
        $email = $mods['email_address'] ?? $fallback['email'];

        if (!isset($logo) ) {
            $logo = $fallback['logo'];
        }

        if ( !isset($address) ) {
            $address = $fallback['address'];
        }

        if ( !isset($phone) ) {
            $phone = $fallback['phone'];
        }

        if ( !isset($phoneR) ) {
            $phoneR = $fallback['phone_r'];
        }

        if ( !isset($email) ) {
            $email = $fallback['email'];
        }

          return [
             'logo' => $logo,
              'logo_id' => attachment_url_to_postid($logo),
              'logo_ext' => pathinfo($logo, PATHINFO_EXTENSION),
              'address' => $address,
              'phone' =>  $phone,
              'phone_r' => $phoneR,
              'email' => $email,
          ];

    }

    public static function svgCheck(  $path ) {
        if ($path) {
            $extension = pathinfo($path)['extension'];
            if ($extension == 'svg') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function imgAspect(  $path ) {
        if ($path) {
            // $p = "http://" . $_SERVER['HTTP_HOST'] .$path;
            $p = $path;
            $svgFlag = App::svgCheck($path);
            $specs;
            $ratio;

            if ($svgFlag) {
                $specs = simplexml_load_file($p)->attributes();
                $vb = $specs->viewBox;
                $viewBox = explode(" ",$vb);

                if ($vb) {
                    $ratio = ($viewBox[2] / $viewBox[3]);
                } else {
                    $ratio = ($specs[0] / $specs[1]);
                }
            } else {
                $specs = getimagesize($p);
                $ratio = ($specs[0] / $specs[1]);
            }

            if ($ratio > 1.1) {
                return 'landscape ';
            } elseif ($ratio < 0.9) {
                return 'portrait ';
            } else {
                return 'square ';
            }
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

    public static function getFeaturedImage () {
      $thumb = array();
      $thumb_id = get_post_thumbnail_id();
      $url = get_the_post_thumbnail_url();

      $args = array(
        'post_type' => 'attachment',
        'include' => $thumb_id
      );

      $thumbs = get_posts( $args );
      if ( $thumbs ) {
        // now create the new array
        $thumb['ID'] = $thumb_id;
        $thumb['url'] = $url;
        $thumb['title'] = $thumbs[0]->post_title;
        $thumb['description'] = $thumbs[0]->post_content;
        $thumb['caption'] = $thumbs[0]->post_excerpt;
        $thumb['alt'] = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
        $thumb['sizes'] = array(
            'full' => wp_get_attachment_image_src( $thumb_id, 'full', false )
        );
        // add the additional image sizes
        foreach ( get_intermediate_image_sizes() as $size ) {
            $thumb['sizes'][$size] = wp_get_attachment_image_src( $thumb_id, $size, false );
        }
      } // end if
      return $thumb;
    }
}


