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

    public function customizedTheme()
    {
        $mods = get_theme_mods();
        return [
          'logo' => $mods['upload_logo'],
          'logo_id' => attachment_url_to_postid(($mods['upload_logo'])),
          'logo_ext' => pathinfo($mods['upload_logo'], PATHINFO_EXTENSION),
          'address' => $mods['address'],
          'phone' => $mods['phonenumber_humans'],
          'phone_comp' => $mods['phonenumber_robots'],
          'email' => $mods['email_address'],
        ];
    }
}
