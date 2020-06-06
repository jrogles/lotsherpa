<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
    //change site title and tagline to Branding
    $wp_customize->get_section('title_tagline')->title = __('Branding', 'sage');
    $wp_customize->get_section('title_tagline')->priority = 1;
});

add_action('customize_register', function ( $wp_customize) {
  //theme colors
    $wp_customize->add_section(
      'colors',
      array(
          'title' => 'Theme Colors',
          'description' => 'Change the colors of the theme.',
          'priority' => 35,
      )
  );
  $wp_customize->add_setting(
    'primary_color',
    array(
      'default' => '#1e80c2',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'primary_color',
      array(
        'label' => 'Primary ',
        'section' => 'colors',
        'settings' => 'primary_color'
      )
    )
  );
  $wp_customize->add_setting(
    'primary_light_color',
    array(
      'default' => '#69cdf5',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'primary_light_color',
      array(
        'label' => 'Primary Light color',
        'section' => 'colors',
        'settings' => 'primary_light_color'
      )
    )
  );
  $wp_customize->add_setting(
    'primary_dark_color',
    array(
      'default' => '#224870',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'primary_dark_color',
      array(
        'label' => 'Primary Dark color',
        'section' => 'colors',
        'settings' => 'primary_dark_color'
      )
    )
  );
  $wp_customize->add_setting(
    'accent1_color',
    array(
      'default' => '#ff6315',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'accent1_color',
      array(
        'label' => 'Accent 1 color',
        'section' => 'colors',
        'settings' => 'accent1_color'
      )
    )
  );
  $wp_customize->add_setting(
    'accent2_color',
    array(
      'default' => '#6bffb8',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'accent2_color',
      array(
        'label' => 'Accent 2 color',
        'section' => 'colors',
        'settings' => 'accent2_color'
      )
    )
  );
  $wp_customize->add_setting(
    'light_color',
    array(
      'default' => '#eaeaea',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'light_color',
      array(
        'label' => 'Light (White) color',
        'section' => 'colors',
        'settings' => 'light_color'
      )
    )
  );
  $wp_customize->add_setting(
    'dark_color',
    array(
      'default' => '#121a40',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new \WP_Customize_Color_Control(
      $wp_customize,
      'dark_color',
      array(
        'label' => 'Dark (Black) color',
        'section' => 'colors',
        'settings' => 'dark_color'
      )
    )
  );
  //add logo
  $wp_customize->add_setting('upload_logo');
  $wp_customize->add_control(
    new \WP_Customize_Image_Control(
      $wp_customize,
      'upload_logo',
      array(
        'label' => 'Logo',
        'section' => 'title_tagline',
        'settings' => 'upload_logo',
        'transport' => 'postMessage'
      )
    )
  );
  $wp_customize->add_setting('upload_rich_preview');
  $wp_customize->add_control(
    new \WP_Customize_Image_Control(
      $wp_customize,
      'upload_rich_preview',
      array(
        'label' => 'Upload a Rich Preview for Social Media',
        'section' => 'title_tagline',
        'settings' => 'upload_rich_preview',
        'transport' => 'postMessage'
      )
    )
  );
  $wp_customize->add_section(
      'contactdetails',
      array(
          'title' => 'Contact Details',
          'description' => 'Manage the contact details',
          'priority' => 35,
      )
  );
  $wp_customize->add_setting(
    'address',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'address',
    array(
      'label' => 'Address',
      'section' => 'contactdetails',
      'settings' => 'address'
    )
  );
  $wp_customize->add_setting(
    'phonenumber_humans',
    array(
      'default' => '0121 123 4567',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'phonenumber_humans',
    array(
      'label' => 'Phone Number (for humans)',
      'section' => 'contactdetails',
      'settings' => 'phonenumber_humans'
    )
  );
  $wp_customize->add_setting(
    'phonenumber_robots',
    array(
      'default' => '+441211234567',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'phonenumber_robots',
    array(
      'label' => 'Phone Number (for robots)',
      'section' => 'contactdetails',
      'settings' => 'phonenumber_robots'
    )
  );
  $wp_customize->add_setting(
    'email_address',
    array(
      'default' => 'info@example.com',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'email_address',
    array(
      'label' => 'Email Address',
      'section' => 'contactdetails',
      'settings' => 'email_address'
    )
  );
});

function hex2rgba( $color, $opacity = false ) {
  $default = 'rgb( 0, 0, 0 )';
  if( empty( $color ) ) {
        return $default;
  }
    if ( $color[0] == '#' ) {
      $color = substr( $color, 1 );
    }
    if ( strlen($color) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    $rgb =  array_map( 'hexdec', $hex );
    if( $opacity ) {
      if( abs( $opacity ) > 1 )
      $opacity = 1.0;
      $output = 'rgba( ' . implode( "," ,$rgb ) . ', ' . $opacity . ' )';
    } else {

      $output = 'rgb( ' . implode( "," , $rgb ) . ' )';
    }
    return $output;
}

// Print styles
function print_styles() {

  $p = get_theme_mod('primary_color');
  if (!$p) {
    $p = '#1e80c2';
  }
  $pl = get_theme_mod('primary_light_color');
  if (!$pl) {
    $pl = '#69cdf5';
  }
  $pd = get_theme_mod('primary_dark_color');
  if (!$pd) {
    $pd = '#224870';
  }
  $a1 = get_theme_mod('accent1_color');
  if (!$a1) {
    $a1 = '#ff6315';
  }
  $a2 = get_theme_mod('accent2_color');
  if (!$a2) {
    $a2 = '#6bffb8';
  }
  $l = get_theme_mod('light_color');
  if (!$l) {
    $l = '#eaeaea';
  }
  $d = get_theme_mod('dark_color');
  if (!$d) {
    $d = '#121a40';
  }

  $primary_color             = hex2rgba($p);
  $primary_light_color       = hex2rgba($pl);
  $primary_dark_color        = hex2rgba($pd);
  $accent1_color             = hex2rgba($a1);
  $accent2_color             = hex2rgba($a2);
  $light_color               = hex2rgba($l);
  $dark_color                = hex2rgba($d);

  $primary_color_a           = hex2rgba($p, 0.7);
  $primary_light_color_a     = hex2rgba($pl, 0.8);
  $primary_dark_color_a      = hex2rgba($pd, 0.65);
  $accent1_color_a           = hex2rgba($a1, 0.8);
  $accent2_color_a           = hex2rgba($a2, 0.8);
  $light_color_a             = hex2rgba($l, 0.8);
  $dark_color_a              = hex2rgba($d, 0.9);
  $dark_color_soft_a         = hex2rgba($d, 0.35);


  ?>
  <style>
    <?php if ($primary_color) { ?>
    :root{--primary: <?= $primary_color; ?> !important;}
    <?php } ?>
    <?php if ($primary_light_color) { ?>
    :root{--primary-light: <?= $primary_light_color; ?> !important;}
    <?php } ?>
    <?php if ($primary_dark_color) { ?>
    :root{--primary-dark: <?= $primary_dark_color; ?> !important;}
    <?php } ?>
    <?php if ($accent1_color) { ?>
    :root{--accent1: <?= $accent1_color; ?> !important;}
    <?php } ?>
    <?php if ($accent2_color) { ?>
    :root{--accent2: <?= $accent2_color; ?> !important;}
    <?php } ?>
    <?php if ($light_color) { ?>
    :root{--light: <?= $light_color; ?> !important;}
    <?php } ?>
    <?php if ($dark_color) { ?>
    :root{--dark: <?= $dark_color; ?> !important;}
    <?php } ?>

    <?php if ($primary_color_a) { ?>
    :root{--primary-a: <?= $primary_color_a; ?> !important;}
    <?php } ?>
    <?php if ($primary_light_color_a) { ?>
    :root{--primary-light-a: <?= $primary_light_color_a; ?> !important;}
    <?php } ?>
    <?php if ($primary_dark_color_a) { ?>
    :root{--primary-dark-a: <?= $primary_dark_color_a; ?> !important;}
    <?php } ?>
    <?php if ($accent1_color_a) { ?>
    :root{--accent1-a: <?= $accent1_color_a; ?> !important;}
    <?php } ?>
    <?php if ($accent2_color_a) { ?>
    :root{--accent2-a: <?= $accent2_color_a; ?> !important;}
    <?php } ?>
    <?php if ($light_color_a) { ?>
    :root{--light-a: <?= $light_color_a; ?> !important;}
    <?php } ?>
    <?php if ($dark_color_a) { ?>
    :root{--dark-a: <?= $dark_color_a; ?> !important;}
    <?php } ?>
    <?php if ($dark_color_soft_a) { ?>
    :root{--dark-soft-a: <?= $dark_color_soft_a; ?> !important;}
    <?php } ?>
  </style>
  <?php
}
add_action('wp_head', __NAMESPACE__ . '\\print_styles');

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
