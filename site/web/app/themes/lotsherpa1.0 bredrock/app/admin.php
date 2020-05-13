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
      'default' => '#FFFFFF',
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
      'default' => '#FFFFFF',
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
      'default' => '#FFFFFF',
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
      'default' => '#fff',
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
      'default' => '#FFFFFF',
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
      'default' => '#eee',
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
      'default' => '#666',
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

add_action('wp_head', function () {
  $primary_color                                   = get_theme_mod('primary_color');
  $primary_light_color                                 = get_theme_mod('primary_light_color');
  $primary_dark_color                         = get_theme_mod('primary_dark_color');
  $accent1_color                               = get_theme_mod('accent1_color');
  $accent2_color                               = get_theme_mod('accent2_color');
  $light_color                               = get_theme_mod('light_color');
  $dark_color                                  = get_theme_mod('dark_color');
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});


