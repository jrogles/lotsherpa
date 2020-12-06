<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_action('after_setup_theme', function() {
    add_theme_support('soil', [
        'clean-up',
        'disable-rest-api',
        'disable-asset-versioning',
        'disable-trackbacks',
        'js-to-footer',
        'nav-walker',
        'nice-search',
        'relative-urls'
    ]);
});

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));

}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });

    /**
     * Create @svg('asset/path', 'class names') Blade directive
     */
    sage('blade')->compiler()->directive('svg', function ($arguments) {
        // Accept multiple arguments
        list($path, $class) = array_pad(explode(',', trim($arguments, "() ")), 2, '');
        $svgpath = asset_path(trim($path, "' "));
        $class = trim($class, "' ");

        // Create the DOM document to remove the XML version element
        $svg = new \DOMDocument();
        $svg->load($svgpath);
        $svg->documentElement->setAttribute("class", $class);
        $output = $svg->saveXML($svg->documentElement);

        return $output;
    });

    /**
    * Create @shortcode() Blade directive
    *
    * Usage: @shortcode('[share title="Share this post"]')
    */
    sage('blade')->compiler()->directive('shortcode', function ($shortcode) {
    return '<?= do_shortcode(\''. $shortcode .'\'); ?>';
    });
});



/**
 * Soberwp Models
 */
add_filter('sober/models/path', function () {
    return get_theme_file_path() . '/app/models';
});

/**
 * Soberwp Controller
 */
add_filter('sober/controller/path', function () {
    return get_theme_file_path() . '/app/controllers';
});

/** TGM plugin activation **/
require_once (get_template_directory() . '/includes/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', function () {
    $plugins = array(
        array(
            'name'               => 'Soil', // The plugin name.
            'slug'               => 'soil', // The plugin slug (typically the folder name).
            'source'             => 'soil.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'               => 'Advanced Custom Fields', // The plugin name.
            'slug'               => 'acf', // The plugin slug (typically the folder name).
            'source'             => 'acf.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'               => 'WPSVG', // The plugin name.
            'slug'               => 'wpsvg', // The plugin slug (typically the folder name).
            'source'             => 'wpsvg.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

    );

    $config = array(
        'id'           => 'lotsherpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/includes/',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => 'These plugins are required  for use with the Lotsherpa Theme.',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
});


