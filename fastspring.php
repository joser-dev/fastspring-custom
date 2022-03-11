<?php
/**
 *
 * @link              fastspring.com
 * @since             1.0.0
 * @package           fastspring
 *
 * @wordpress-plugin
 * Plugin Name:       FastSpring
 * Plugin URI:        FastSpring.com
 * Description:      The FastSpring WordPress Plugin is a tool that lets you integrate your FastSpring Store with your WordPress website.
 * Version:           1.8.5
 * Author:            FastSpring WordPress Team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fastspring
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fastspring-activator.php
 */
function activate_fastspring() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fastspring-activator.php';
	fastspring_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fastspring-deactivator.php
 */
function deactivate_fastspring() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fastspring-deactivator.php';
	fastspring_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_fastspring' );
register_deactivation_hook( __FILE__, 'deactivate_fastspring' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fastspring.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fastspring() {
	$plugin = new fastspring();
	$plugin->run();
}
run_fastspring();

 function fastspring_settings_menu() {
$icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 51.1 50.9" style="enable-background:new 0 0 51.1 50.9;" xml:space="preserve">
<path class="st0" style="fill:#FFFFFF;" d="M25.5,25.8c4.5,0.1,9.1,1.1,9.8,2.2c0,0.8,0.5,1.4,1.3,1.5c0.8-0.1,1.4-0.9,1.3-1.7c0-4.2-6.7-5.2-12.3-5.3l0,0
	c-4.4,0-11.9,1.2-11.9,5.8c0,1.1,0.4,2.1,1.2,2.8l0,0l0,0c0.6,0.5,1.2,1,1.9,1.3c-1.7,0.8-3,2.1-3.1,3.8c0,0.1,0,0.3,0,0.4
	c0,2.9,3,4.5,6.4,5.3c1.8,0.4,3.7,0.6,5.5,0.6c2.7-0.1,5.4,0.5,7.8,1.7c0.5,0.2,0.7,0.8,0.5,1.3c-0.1,0.3-0.3,0.5-0.6,0.6
	c-2.4,1-5.1,1.5-7.7,1.4c-4.5-0.1-9.1-1.1-9.8-2.2c0.2-0.7-0.3-1.3-0.9-1.5c-0.1,0-0.2,0-0.4,0c-0.8,0.1-1.4,0.9-1.3,1.7
	c0,4.2,6.7,5.2,12.3,5.3l0,0c4.4,0,11.9-1.2,11.9-5.8c0-1.1-0.4-2.1-1.2-2.8l0,0l0,0c-0.6-0.5-1.2-1-1.9-1.3c1.7-0.8,3-2.1,3.1-3.8
	c0-0.1,0-0.3,0-0.4c0-2.9-3-4.5-6.4-5.3c-1.8-0.4-3.7-0.6-5.5-0.6c-3.5,0-5.9-0.5-8-1.8c-0.5-0.2-0.6-0.8-0.4-1.3
	c0.1-0.2,0.2-0.3,0.4-0.4C19.1,26.4,21.7,25.9,25.5,25.8z M25.5,34.2c1.2,0,2.4,0.1,3.5,0.2c1.6,0.2,3.2,0.7,4.7,1.5
	c0.5,0.3,0.6,0.9,0.3,1.4c-0.1,0.1-0.2,0.2-0.3,0.3c-1.4,0.7-2.9,1.2-4.4,1.4c-1.3,0.2-2.5,0.3-3.8,0.3c-1.2,0-2.4-0.1-3.5-0.2
	c-1.6-0.2-3.2-0.7-4.7-1.5c-0.5-0.3-0.6-0.9-0.3-1.4c0.1-0.1,0.2-0.2,0.3-0.3c1.4-0.7,2.9-1.2,4.4-1.4C23,34.3,24.3,34.2,25.5,34.2
	L25.5,34.2z"/>
<path class="st0" style="fill:#FFFFFF;" d="M25.6,0c-5.1,0-9.3,4.2-9.3,9.3s4.2,9.3,9.3,9.3s9.3-4.2,9.3-9.3S30.7,0,25.6,0C25.6,0,25.6,0,25.6,0z
	 M22.2,8.6c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S23.8,8.6,22.2,8.6z"/>
</svg>');
	add_menu_page(
		'FastSpring Settings',
		'FastSpring Settings',
		'administrator',
		'fastspring_settings_menu',
		'fastspring_settings_display',
		$icon_url
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'General', 'fastspring' ),
		__( 'General', 'fastspring' ),
		'administrator',
		'fastspring_settings_general_settings',
		'fastspring_settings_display'
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Shopping Cart', 'fastspring' ),
		__( 'Shopping Cart', 'fastspring' ),
		'administrator',
		'fastspring_settings_shopping_cart_settings',
        function(){fastspring_settings_display( "shopping_cart_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Buy Button', 'fastspring' ),
		__( 'Buy Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_buy_button_settings',
        function(){fastspring_settings_display( "buy_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Remove from Cart Button', 'fastspring' ),
		__( 'Remove from Cart Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_remove_from_cart_button_settings',
        function(){fastspring_settings_display( "remove_from_cart_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'View Cart Button', 'fastspring' ),
		__( 'View Cart Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_view_cart_button_settings',
        function(){fastspring_settings_display( "view_cart_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Checkout Button', 'fastspring' ),
		__( 'Checkout Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_checkout_button_settings',
        function(){fastspring_settings_display( "checkout_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Cross-Sell Button', 'fastspring' ),
		__( 'Cross-Sell Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_cross_sell_button_settings',
        function(){fastspring_settings_display( "cross_sell_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Up-Sell Button', 'fastspring' ),
		__( 'Up-Sell Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_up_sell_button_settings',
        function(){fastspring_settings_display( "up_sell_button_settings" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'EDS Buy Button', 'fastspring' ),
		__( 'EDS Buy Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_eds_button_settings',
        function(){fastspring_settings_display( "eds_button_settings" );}
	);


	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Nav Menu', 'fastspring' ),
		__( 'Nav Menu', 'fastspring' ),
		'administrator',
		'fastspring_settings_nav_menu',
        function(){fastspring_settings_display( "nav_menu" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Custom CSS', 'fastspring' ),
		__( 'Custom CSS', 'fastspring' ),
		'administrator',
		'fastspring_settings_custom_css',
        function(){fastspring_settings_display( "custom_css" );}
	);

	add_submenu_page(
		'fastspring_settings_menu',
		__( 'About', 'fastspring' ),
		__( 'About', 'fastspring' ),
		'administrator',
		'fastspring_settings_about',
        function(){fastspring_settings_display( "about" );}
	);

}
add_action( 'admin_menu', 'fastspring_settings_menu' );

function fastspring_settings_display( $active_tab = '' ) {
?>
	<div class="wrap">
		<?php
		$icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 51.1 50.9" style="enable-background:new 0 0 51.1 50.9;" xml:space="preserve">
<path class="st0" style="fill:#f68700;" d="M25.5,25.8c4.5,0.1,9.1,1.1,9.8,2.2c0,0.8,0.5,1.4,1.3,1.5c0.8-0.1,1.4-0.9,1.3-1.7c0-4.2-6.7-5.2-12.3-5.3l0,0
	c-4.4,0-11.9,1.2-11.9,5.8c0,1.1,0.4,2.1,1.2,2.8l0,0l0,0c0.6,0.5,1.2,1,1.9,1.3c-1.7,0.8-3,2.1-3.1,3.8c0,0.1,0,0.3,0,0.4
	c0,2.9,3,4.5,6.4,5.3c1.8,0.4,3.7,0.6,5.5,0.6c2.7-0.1,5.4,0.5,7.8,1.7c0.5,0.2,0.7,0.8,0.5,1.3c-0.1,0.3-0.3,0.5-0.6,0.6
	c-2.4,1-5.1,1.5-7.7,1.4c-4.5-0.1-9.1-1.1-9.8-2.2c0.2-0.7-0.3-1.3-0.9-1.5c-0.1,0-0.2,0-0.4,0c-0.8,0.1-1.4,0.9-1.3,1.7
	c0,4.2,6.7,5.2,12.3,5.3l0,0c4.4,0,11.9-1.2,11.9-5.8c0-1.1-0.4-2.1-1.2-2.8l0,0l0,0c-0.6-0.5-1.2-1-1.9-1.3c1.7-0.8,3-2.1,3.1-3.8
	c0-0.1,0-0.3,0-0.4c0-2.9-3-4.5-6.4-5.3c-1.8-0.4-3.7-0.6-5.5-0.6c-3.5,0-5.9-0.5-8-1.8c-0.5-0.2-0.6-0.8-0.4-1.3
	c0.1-0.2,0.2-0.3,0.4-0.4C19.1,26.4,21.7,25.9,25.5,25.8z M25.5,34.2c1.2,0,2.4,0.1,3.5,0.2c1.6,0.2,3.2,0.7,4.7,1.5
	c0.5,0.3,0.6,0.9,0.3,1.4c-0.1,0.1-0.2,0.2-0.3,0.3c-1.4,0.7-2.9,1.2-4.4,1.4c-1.3,0.2-2.5,0.3-3.8,0.3c-1.2,0-2.4-0.1-3.5-0.2
	c-1.6-0.2-3.2-0.7-4.7-1.5c-0.5-0.3-0.6-0.9-0.3-1.4c0.1-0.1,0.2-0.2,0.3-0.3c1.4-0.7,2.9-1.2,4.4-1.4C23,34.3,24.3,34.2,25.5,34.2
	L25.5,34.2z"/>
<path class="st0" style="fill:#f68700;" d="M25.6,0c-5.1,0-9.3,4.2-9.3,9.3s4.2,9.3,9.3,9.3s9.3-4.2,9.3-9.3S30.7,0,25.6,0C25.6,0,25.6,0,25.6,0z
	 M22.2,8.6c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S23.8,8.6,22.2,8.6z"/>
</svg>');
wp_enqueue_style('fastspring_fontawesome', plugins_url('public/css/awesome.css', __FILE__) );
    	wp_enqueue_style( 'fastspring_fontawesome' );
?>
		<h2><img src="<?php echo $icon_url;?>" style="height:30px;" /><?php _e( 'FastSpring Settings', 'fastspring' ); ?></h2>

		<?php settings_errors(); ?>
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'shopping_cart_settings' ) {
			$active_tab = 'shopping_cart_settings';
		} else if( $active_tab == 'buy_button_settings' ) {
			$active_tab = 'buy_button_settings';
		} else if( $active_tab == 'remove_from_cart_button_settings' ) {
			$active_tab = 'remove_from_cart_button_settings';
		} else if( $active_tab == 'view_cart_button_settings' ) {
			$active_tab = 'view_cart_button_settings';
		} else if( $active_tab == 'checkout_button_settings' ) {
			$active_tab = 'checkout_button_settings';
		} else if( $active_tab == 'cross_sell_button_settings' ) {
			$active_tab = 'cross_sell_button_settings';
		} else if( $active_tab == 'up_sell_button_settings' ) {
			$active_tab = 'up_sell_button_settings';
		} else if( $active_tab == 'eds_button_settings' ) {
			$active_tab = 'eds_button_settings';
		}  else if( $active_tab == 'nav_menu' ) {
			$active_tab = 'nav_menu';
		} else if( $active_tab == 'custom_css' ) {
			$active_tab = 'custom_css';
		} else if( $active_tab == 'about' ) {
			$active_tab = 'about';
		} else {
			$active_tab = 'general_settings';
		}
		?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=fastspring_settings_general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_shopping_cart_settings" class="nav-tab <?php echo $active_tab == 'shopping_cart_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Shopping Cart', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_buy_button_settings" class="nav-tab <?php echo $active_tab == 'buy_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Buy Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_remove_from_cart_button_settings" class="nav-tab <?php echo $active_tab == 'remove_from_cart_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Remove from Cart Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_view_cart_button_settings" class="nav-tab <?php echo $active_tab == 'view_cart_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'View Cart Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_checkout_button_settings" class="nav-tab <?php echo $active_tab == 'checkout_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Checkout Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_cross_sell_button_settings" class="nav-tab <?php echo $active_tab == 'cross_sell_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Cross-Sell Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_up_sell_button_settings" class="nav-tab <?php echo $active_tab == 'up_sell_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Up-Sell Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_eds_button_settings" class="nav-tab <?php echo $active_tab == 'eds_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'EDS Buy Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_nav_menu" class="nav-tab <?php echo $active_tab == 'nav_menu' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Nav Menu', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_custom_css" class="nav-tab <?php echo $active_tab == 'custom_css' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Custom CSS', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_about" class="nav-tab <?php echo $active_tab == 'about' ? 'nav-tab-active' : ''; ?>"><?php _e( 'About', 'fastspring' ); ?></a>
		</h2>

		<form method="post" action="options.php">
			<?php
				if( $active_tab == 'general_settings' ) {
					settings_fields( 'fastspring_settings_general_settings' );
					do_settings_sections( 'fastspring_settings_general_settings' );
				} elseif( $active_tab == 'shopping_cart_settings' ) {
					settings_fields( 'fastspring_settings_shopping_cart_settings' );
					do_settings_sections( 'fastspring_settings_shopping_cart_settings' );
				} elseif( $active_tab == 'buy_button_settings' ) {
					settings_fields( 'fastspring_settings_buy_button_settings' );
					do_settings_sections( 'fastspring_settings_buy_button_settings' );
				} elseif( $active_tab == 'remove_from_cart_button_settings' ) {
					settings_fields( 'fastspring_settings_remove_from_cart_button_settings' );
					do_settings_sections( 'fastspring_settings_remove_from_cart_button_settings' );
				} elseif( $active_tab == 'view_cart_button_settings' ) {
					settings_fields( 'fastspring_settings_view_cart_button_settings' );
					do_settings_sections( 'fastspring_settings_view_cart_button_settings' );
				} elseif( $active_tab == 'checkout_button_settings' ) {
					settings_fields( 'fastspring_settings_checkout_button_settings' );
					do_settings_sections( 'fastspring_settings_checkout_button_settings' );
				} elseif( $active_tab == 'cross_sell_button_settings' ) {
					settings_fields( 'fastspring_settings_cross_sell_button_settings' );
					do_settings_sections( 'fastspring_settings_cross_sell_button_settings' );
				} elseif( $active_tab == 'up_sell_button_settings' ) {
					settings_fields( 'fastspring_settings_up_sell_button_settings' );
					do_settings_sections( 'fastspring_settings_up_sell_button_settings' );
				} elseif( $active_tab == 'eds_button_settings' ) {
					settings_fields( 'fastspring_settings_eds_button_settings' );
					do_settings_sections( 'fastspring_settings_eds_button_settings' );
				} elseif( $active_tab == 'about' ) {
					settings_fields( 'fastspring_settings_about' );
					do_settings_sections( 'fastspring_settings_about' );
				} elseif( $active_tab == 'nav_menu' ) {
					settings_fields( 'fastspring_settings_nav_menu' );
					do_settings_sections( 'fastspring_settings_nav_menu' );
				} else {
					settings_fields( 'fastspring_settings_custom_css' );
					do_settings_sections( 'fastspring_settings_custom_css' );
				}

				if($active_tab != 'about' ) {
					submit_button();
					?>
					<script>
						(function( $ ) {
						    $(function() {

						        // Add Color Picker to all inputs that have 'color-field' class
						        $( '.color-picker' ).wpColorPicker();

						    });
						})( jQuery );
					</script>
					<?php
				}
			?>
		</form>
	</div>
<?php
}

function fastspring_settings_default_general_settings() {
	$defaults = array(
		'fastspring_storefront_id' => '',
		'fastspring_builder_url' => 'https://d1f8f9xcsvx3ha.cloudfront.net/sbl/0.7.6/fastspring-builder.min.js',
	);
	return apply_filters( 'fastspring_settings_default_general_settings', $defaults );
}

function fastspring_initialize_theme_options() {
	if( false == get_option( 'fastspring_settings_general_settings' ) ) {
		add_option( 'fastspring_settings_general_settings', apply_filters( 'fastspring_settings_default_general_settings', fastspring_settings_default_general_settings() ) );
	}
	add_settings_section(
		'general_settings_section',
		__( 'General Settings', 'fastspring' ),
		'fastspring_general_options_callback',
		'fastspring_settings_general_settings'
	);
	add_settings_field(
		'fastspring_storefront',
		__( 'Storefront ID', 'fastspring' ),
		'fastspring_storefront_id_callback',
		'fastspring_settings_general_settings',
		'general_settings_section'
	);
	add_settings_field(
		'fastspring_builder_url',
		__( 'Builder URL <!--<a href="#" title="This can link to a help topic"><i class="fa fa-info-circle"></i></a>-->', 'fastspring' ),
		'fastspring_builder_url_callback',
		'fastspring_settings_general_settings',
		'general_settings_section'
	);
	register_setting(
		'fastspring_settings_general_settings',
		'fastspring_settings_general_settings',
		'fastspring_settings_validate_general_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_theme_options' );

function fastspring_storefront_id_callback($args) {
	$options = get_option('fastspring_settings_general_settings');
	?>
	<input type='text' name='fastspring_settings_general_settings[fastspring_storefront]' value='<?php echo $options['fastspring_storefront']; ?>' class="regular-text">
	<br /><em>The <strong>data-storefront</strong> attribute for your FastSpring Popup Storefront, found in Dashboard</em>
	<?php
}


function fastspring_builder_url_callback($args) {
	$options = get_option('fastspring_settings_general_settings');
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_general_settings[fastspring_builder_url]' value='<?php echo $options['fastspring_builder_url']; ?>' class="regular-text">
		<br /><em>The external URL of FastSpring's Store Builder Library JavaScript file, found in Dashboard</em>
	</div>
	<?php
}

function fastspring_settings_default_nav_menu() {
	$defaults = array(
	);
	return apply_filters( 'fastspring_settings_default_nav_menu', $defaults );
}

function fastspring_initialize_nav_menu() {
	if( false == get_option( 'fastspring_settings_nav_menu' ) ) {
		add_option( 'fastspring_settings_nav_menu', apply_filters( 'fastspring_settings_default_nav_menu', fastspring_settings_default_nav_menu() ) );
	}
	add_settings_section(
		'nav_menu_section',
		__( 'View Cart Links', 'fastspring' ),
		'fastspring_nav_menu_callback',
		'fastspring_settings_nav_menu'
	);
	add_settings_field(
		'fastspring_storefront',
		__( 'Menu Items', 'fastspring' ),
		'fastspring_viewcartmenuitems',
		'fastspring_settings_nav_menu',
		'nav_menu_section'
	);

	add_settings_section(
		'nav_menu_checkout_section',
		__( 'Checkout Links', 'fastspring' ),
		'fastspring_nav_menu_checkout_callback',
		'fastspring_settings_nav_menu'
	);
	add_settings_field(
		'fastspring_storefront',
		__( 'Menu Items', 'fastspring' ),
		'fastspring_checkoutmenuitems',
		'fastspring_settings_nav_menu',
		'nav_menu_checkout_section'
	);
	register_setting(
		'fastspring_settings_nav_menu',
		'fastspring_settings_nav_menu',
		'fastspring_settings_validate_nav_menu'
	);
}
add_action( 'admin_init', 'fastspring_initialize_nav_menu' );


  function fastspring_viewcartmenuitems() {
 	$options = get_option('fastspring_settings_nav_menu');
 	$locations = get_nav_menu_locations();
	foreach($locations as $key => $locationsitem) {
	  	?>
	  	<h2><?php echo $key ?></h2>
	  	<?php
		if(!$locationsitem) {
			echo 'There are no defined menus in use for the ' . $key . ' menu.<br />';
		} else {
			$menu = wp_get_nav_menu_object( $locationsitem );
			$menuitems = wp_get_nav_menu_items( $menu->name, array( 'order' => 'DESC' ) );
			$value = array();
			if (isset($options['fastspring_viewcartmenuitems']) && ! empty($options['fastspring_viewcartmenuitems'])) {
				$value = $options['fastspring_viewcartmenuitems'];
			}
			foreach( $menuitems as $item ) {
				?>
				<input type="checkbox" value="<?php echo $item->ID;?>" id="<?php echo $item->ID;?>" name='fastspring_settings_nav_menu[fastspring_viewcartmenuitems][]' <?php if(in_array($item->ID, $value)) { echo ' checked';} ?> />
				<label for="<?php echo $item->ID;?>"><?php echo $item->title;?></label><br />
				<?php
			}
		}
	}
 }

  function fastspring_checkoutmenuitems() {
 	$options = get_option('fastspring_settings_nav_menu');
 	$locations = get_nav_menu_locations();
	foreach($locations as $key => $locationsitem) {
	  	?>
	  	<h2><?php echo $key ?></h2>
	  	<?php
		if(!$locationsitem) {
			echo 'There are no defined menus in use for the ' . $key . ' menu.<br />';
		} else {
			$menu = wp_get_nav_menu_object( $locationsitem );
			$menuitems = wp_get_nav_menu_items( $menu->name, array( 'order' => 'DESC' ) );
			$value = array();
			if (isset($options['fastspring_checkoutmenuitems']) && ! empty($options['fastspring_checkoutmenuitems'])) {
				$value = $options['fastspring_checkoutmenuitems'];
			}
			foreach( $menuitems as $item ) {
				?>
				<input type="checkbox" value="<?php echo $item->ID;?>" id="<?php echo $item->ID;?>" name='fastspring_settings_nav_menu[fastspring_checkoutmenuitems][]' <?php if(in_array($item->ID, $value)) { echo ' checked';} ?> />
				<label for="<?php echo $item->ID;?>"><?php echo $item->title;?></label><br />
				<?php
			}
		}
	}
 }

function fastspring_settings_default_shopping_cart_settings() {
	$defaults = array(
		'fastspring_cart_location' =>	'mod',
		'fastspring_header' =>	'Shopping Cart',
		'fastspring_header_color' =>	'#a94442',
		'fastspring_header_text_color' =>	'#ffffff',
		'fastspring_show_coupon' => 'yes',
		'fastspring_coupon_label' => 'Have a promo code?',
		'fastspring_coupon_placeholder' => 'Coupon ID',
		'fastspring_coupon_class' => 'fastspring_btn fastspring_btn-success',
		'fastspring_coupon_text' => 'Apply',
		'fastspring_delete_icon' => 'fa-times',
		'fastspring_radio_color' => '#c0c0c0',
		'fastspring_radio_color_checked' => '#ff0000',
		'fastspring_empty_cart' => 'Your cart is empty.',
		'fastspring_thankyou_page' => '/',
	);
	return apply_filters( 'fastspring_settings_default_shopping_cart_settings', $defaults );
}

function fastspring_initialize_shopping_cart_settings() {
	if( false == get_option( 'fastspring_settings_shopping_cart_settings' ) ) {
		add_option( 'fastspring_settings_shopping_cart_settings', apply_filters( 'fastspring_settings_default_shopping_cart_settings', fastspring_settings_default_shopping_cart_settings() ) );
	}
	add_settings_section(
		'shopping_cart_section',
		__( 'Shopping Cart Settings', 'fastspring' ),
		'fastspring_cartsettings_section_callback',
		'fastspring_settings_shopping_cart_settings'
	);
	add_settings_field(
		'fastspring_cart_location',
		__( 'Shopping Cart Location', 'fastspring' ),
		'fastspring_cart_location_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_header',
		__( 'Shopping Cart Header Text', 'fastspring' ),
		'fastspring_header_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_header_color',
		__( 'Shopping Cart Header Color', 'fastspring' ),
		'fastspring_header_color_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_header_text_color',
		__( 'Shopping Cart Header Text Color', 'fastspring' ),
		'fastspring_header_text_color_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_show_coupon',
		__( 'Show Coupon Entry Field', 'fastspring' ),
		'fastspring_show_coupon_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_coupon_label',
		__( 'Coupon Field Label', 'fastspring' ),
		'fastspring_coupon_label_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_coupon_placeholder',
		__( 'Coupon Field Placeholder Text', 'fastspring' ),
		'fastspring_coupon_placeholder_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_coupon_class',
		__( 'Apply Coupon Button Class', 'fastspring' ),
		'fastspring_coupon_class_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_coupon_text',
		__( 'Apply Coupon Button Text', 'fastspring' ),
		'fastspring_coupon_text_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	add_settings_field(
		'fastspring_delete_icon',
		__( 'Cart Item Delete Icon', 'fastspring' ),
		'fastspring_delete_icon_render',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
    add_settings_field(
		'fastspring_radio_color',
		__( 'Radio and Checkbox Background Color', 'fastspring' ),
		'fastspring_radio_color',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
     add_settings_field(
		'fastspring_radio_color_checked',
		__( 'Radio and Checkbox Background Color (Selected)', 'fastspring' ),
		'fastspring_radio_color_checked',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
    add_settings_field(
		'fastspring_empty_cart',
		__( 'Empty Cart Message Text', 'fastspring' ),
		'fastspring_empty_cart',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
    add_settings_field(
		'fastspring_thankyou_page',
		__( 'Thank You Page URL', 'fastspring' ),
		'fastspring_thankyou_page',
		'fastspring_settings_shopping_cart_settings',
		'shopping_cart_section'
	);
	register_setting(
		'fastspring_settings_shopping_cart_settings',
		'fastspring_settings_shopping_cart_settings',
		'fastspring_settings_validate_shopping_cart_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_shopping_cart_settings' );

function fastspring_cart_location_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $options['fastspring_cart_location'], 'mod' ); ?> value='mod'>Modal Window</label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $options['fastspring_cart_location'], 'ls' ); ?> value='ls'>Left Panel</label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $options['fastspring_cart_location'], 'rs' ); ?> value='rs'>Right Panel</label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $options['fastspring_cart_location'], 'bs' ); ?> value='bs'>Bottom Sheet</label></p>
	<?php
}
function fastspring_header_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_header]' value='<?php echo $options['fastspring_header'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_header_color_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_header_color]' value='<?php echo $options['fastspring_header_color'];?>' class="form-control color-picker">
	</div>
	<?php
}
function fastspring_header_text_color_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_header_text_color]' value='<?php echo $options['fastspring_header_text_color'];?>' class="form-control color-picker">
	</div>
	<?php
}

function fastspring_show_coupon_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_show_coupon]' <?php checked( $options['fastspring_show_coupon'], 'yes' ); ?> value='yes' checked>Yes</label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_show_coupon]' <?php checked( $options['fastspring_show_coupon'], 'no' ); ?> value='no'>No</label></p>
	<?php
}
function fastspring_coupon_label_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_coupon_label]' value='<?php echo $options['fastspring_coupon_label'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_coupon_placeholder_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_coupon_placeholder]' value='<?php echo $options['fastspring_coupon_placeholder'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_coupon_class_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_coupon_class]' value='<?php echo $options['fastspring_coupon_class'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_coupon_text_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_coupon_text]' value='<?php echo $options['fastspring_coupon_text'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_delete_icon_render(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-times' ); ?> value='fa-times'><i class="fa fa-times" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-times-circle' ); ?> value='fa-times-circle'><i class="fa fa-times-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-trash' ); ?> value='fa-trash'><i class="fa fa-trash" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-trash-alt' ); ?> value='fa-trash-alt'><i class="fa fa-trash-alt" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-minus' ); ?> value='fa-minus'><i class="fa fa-minus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $options['fastspring_delete_icon'], 'fa-minus-circle' ); ?> value='fa-minus-circle'><i class="fa fa-minus-circle" aria-hidden="true"></i></label></p>
	<?php
}

function fastspring_radio_color(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_radio_color]' value='<?php echo $options['fastspring_radio_color'];?>' class="form-control color-picker">
	</div>
	<?php
}
function fastspring_radio_color_checked(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_radio_color_checked]' value='<?php echo $options['fastspring_radio_color_checked'];?>' class="form-control color-picker">
	</div>
	<?php
}
function fastspring_empty_cart(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_empty_cart]' value='<?php echo $options['fastspring_empty_cart'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_thankyou_page(  ) {
	$options = get_option( 'fastspring_settings_shopping_cart_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_thankyou_page]' value='<?php echo $options['fastspring_thankyou_page'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_settings_validate_shopping_cart_settings( $input ) {
	$output = array();
	foreach( $input as $key => $value ) {
		if( isset( $input[$key] ) ) {
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
		}
	}
	return apply_filters( 'fastspring_settings_validate_shopping_cart_settings', $output, $input );
}

function fastspring_settings_default_buy_button_settings() {
	$defaults = array(
		'fastspring_bbaction' => 'addtocart',
		'fastspring_bbclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_bbtext' => 'Add to Cart',
		'fastspring_bbicon' => 'fa-plus',
		'fastspring_bbsecondaryaction' => 'viewcart',
	);
	return apply_filters( 'fastspring_settings_default_buy_button_settings', $defaults );
}

function fastspring_initialize_buy_button_settings() {
	if( false == get_option( 'fastspring_settings_buy_button_settings' ) ) {
		add_option( 'fastspring_settings_buy_button_settings', apply_filters( 'fastspring_settings_default_buy_button_settings', fastspring_settings_default_buy_button_settings() ) );
	}
	add_settings_section(
		'buy_button_section',
		__( 'Buy Button Settings', 'fastspring' ),
		'fastspring_bbsettings_section_callback',
		'fastspring_settings_buy_button_settings'
	);
	add_settings_field(
		'fastspring_bbaction',
		__( 'Default Buy Button Action', 'fastspring' ),
		'fastspring_bbaction_render',
		'fastspring_settings_buy_button_settings',
		'buy_button_section'
	);
	add_settings_field(
		'fastspring_bbclass',
		__( 'Default Buy Button Class', 'fastspring' ),
		'fastspring_bbclass_render',
		'fastspring_settings_buy_button_settings',
		'buy_button_section'
	);
	add_settings_field(
		'fastspring_bbtext',
		__( 'Default Buy Button Text', 'fastspring' ),
		'fastspring_bbtext_render',
		'fastspring_settings_buy_button_settings',
		'buy_button_section'
	);
	add_settings_field(
		'fastspring_bbicon',
		__( 'Default Buy Button Icon', 'fastspring' ),
		'fastspring_bbicon_render',
		'fastspring_settings_buy_button_settings',
		'buy_button_section'
	);
	add_settings_field(
		'fastspring_bbsecondaryaction',
		__( 'Default Buy Button Secondary Action', 'fastspring' ),
		'fastspring_bbsecondaryaction_render',
		'fastspring_settings_buy_button_settings',
		'buy_button_section'
	);
	register_setting(
		'fastspring_settings_buy_button_settings',
		'fastspring_settings_buy_button_settings',
		'fastspring_settings_validate_buy_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_buy_button_settings' );

function fastspring_bbaction_render(  ) {
	$options = get_option( 'fastspring_settings_buy_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbaction]' <?php checked( $options['fastspring_bbaction'], 'addtocart' ); ?> value='addtocart' checked>Add to Cart</label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbaction]' <?php checked( $options['fastspring_bbaction'], 'checkout' ); ?> value='checkout'>Checkout</label></p>
	<?php
}

function fastspring_bbclass_render(  ) {
	$options = get_option( 'fastspring_settings_buy_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_buy_button_settings[fastspring_bbclass]' value='<?php echo $options['fastspring_bbclass'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_bbtext_render(  ) {
	$options = get_option( 'fastspring_settings_buy_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_buy_button_settings[fastspring_bbtext]' value='<?php echo $options['fastspring_bbtext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_bbicon_render(  ) {
	$options = get_option( 'fastspring_settings_buy_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-plus' ); ?> value='fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-plus-circle' ); ?> value='fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $options['fastspring_bbicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}
function fastspring_bbsecondaryaction_render(  ) {
	$options = get_option( 'fastspring_settings_buy_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbsecondaryaction]' <?php checked( $options['fastspring_bbsecondaryaction'], 'viewcart' ); ?> value='viewcart' checked>View Cart</label></p>
	<p><label><input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbsecondaryaction]' <?php checked( $options['fastspring_bbsecondaryaction'], 'removefromcart' ); ?> value='removefromcart'>Remove from Cart</label></p>
	<?php
}

function fastspring_settings_default_remove_from_cart_button_settings() {
	$defaults = array(
		'fastspring_rcclass' => 'fastspring_btn fastspring_btn-default',
		'fastspring_rctext' => 'Remove from cart',
		'fastspring_rcicon' => 'fa-times',
	);
	return apply_filters( 'fastspring_settings_default_remove_from_cart_button_settings', $defaults );
}

function fastspring_initialize_remove_from_cart_button_settings() {
	if( false == get_option( 'fastspring_settings_remove_from_cart_button_settings' ) ) {
		add_option( 'fastspring_settings_remove_from_cart_button_settings', apply_filters( 'fastspring_settings_default_remove_from_cart_button_settings', fastspring_settings_default_remove_from_cart_button_settings() ) );
	}
	add_settings_section(
		'remove_from_cart_section',
		__( 'Remove from Cart Button Settings', 'fastspring' ),
		'fastspring_rcsettings_section_callback',
		'fastspring_settings_remove_from_cart_button_settings'
	);
	add_settings_field(
		'fastspring_rcclass',
		__( 'Default Remove from Cart Button Class', 'fastspring' ),
		'fastspring_rcclass_render',
		'fastspring_settings_remove_from_cart_button_settings',
		'remove_from_cart_section'
	);
	add_settings_field(
		'fastspring_rctext',
		__( 'Default Remove from Cart Button Text', 'fastspring' ),
		'fastspring_rctext_render',
		'fastspring_settings_remove_from_cart_button_settings',
		'remove_from_cart_section'
	);
	add_settings_field(
		'fastspring_rcicon',
		__( 'Default Remove from Cart Button Icon', 'fastspring' ),
		'fastspring_rcicon_render',
		'fastspring_settings_remove_from_cart_button_settings',
		'remove_from_cart_section'
	);
	register_setting(
		'fastspring_settings_remove_from_cart_button_settings',
		'fastspring_settings_remove_from_cart_button_settings',
		'fastspring_settings_validate_remove_from_cart_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_remove_from_cart_button_settings' );


function fastspring_rcclass_render(  ) {
	$options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcclass]' value='<?php echo $options['fastspring_rcclass'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_rctext_render(  ) {
	$options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rctext]' value='<?php echo $options['fastspring_rctext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_rcicon_render(  ) {
	$options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-times' ); ?> value='fa-times'><i class="fa fa-times" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-times-circle' ); ?> value='fa-times-circle'><i class="fa fa-times-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-trash' ); ?> value='fa-trash'><i class="fa fa-trash" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-trash-alt' ); ?> value='fa-trash-alt'><i class="fa fa-trash-alt" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-minus' ); ?> value='fa-minus'><i class="fa fa-minus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'fa-minus-circle' ); ?> value='fa-minus-circle'><i class="fa fa-minus-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $options['fastspring_rcicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}

function fastspring_settings_default_view_cart_button_settings() {
	$defaults = array(
		'fastspring_vcclass' => 'fastspring_btn fastspring_btn-default',
		'fastspring_vctext' => 'View Cart',
		'fastspring_vcicon' => 'fa-chevron-right',
		'fastspring_vcshowhide' => 'show',
	);
	return apply_filters( 'fastspring_settings_default_view_cart_button_settings', $defaults );
}

function fastspring_initialize_view_cart_button_settings() {
	if( false == get_option( 'fastspring_settings_view_cart_button_settings' ) ) {
		add_option( 'fastspring_settings_view_cart_button_settings', apply_filters( 'fastspring_settings_default_view_cart_button_settings', fastspring_settings_default_view_cart_button_settings() ) );
	}
	add_settings_section(
		'view_cart_section',
		__( 'View Cart Button Settings', 'fastspring' ),
		'fastspring_vcsettings_section_callback',
		'fastspring_settings_view_cart_button_settings'
	);
	add_settings_field(
		'fastspring_vcclass',
		__( 'Default View Cart Button Class', 'fastspring' ),
		'fastspring_vcclass_render',
		'fastspring_settings_view_cart_button_settings',
		'view_cart_section'
	);
	add_settings_field(
		'fastspring_vctext',
		__( 'Default View Cart Button Text', 'fastspring' ),
		'fastspring_vctext_render',
		'fastspring_settings_view_cart_button_settings',
		'view_cart_section'
	);
	add_settings_field(
		'fastspring_vcicon',
		__( 'Default View Cart Button Icon', 'fastspring' ),
		'fastspring_vcicon_render',
		'fastspring_settings_view_cart_button_settings',
		'view_cart_section'
	);
	add_settings_field(
		'fastspring_vcshowhide',
		__( 'Default View Cart Button Visibility', 'fastspring' ),
		'fastspring_vcshowhide_render',
		'fastspring_settings_view_cart_button_settings',
		'view_cart_section'
	);
	register_setting(
		'fastspring_settings_view_cart_button_settings',
		'fastspring_settings_view_cart_button_settings',
		'fastspring_settings_validate_view_cart_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_view_cart_button_settings' );

function fastspring_vcclass_render(  ) {
	$options = get_option( 'fastspring_settings_view_cart_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_view_cart_button_settings[fastspring_vcclass]' value='<?php echo $options['fastspring_vcclass']; ?>' class="regular-text">
	</div>
	<?php
}
function fastspring_vctext_render(  ) {
	$options = get_option( 'fastspring_settings_view_cart_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_view_cart_button_settings[fastspring_vctext]' value='<?php echo $options['fastspring_vctext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_vcicon_render(  ) {
	$options = get_option( 'fastspring_settings_view_cart_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $options['fastspring_vcicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}

function fastspring_vcshowhide_render(  ) {
	$options = get_option( 'fastspring_settings_view_cart_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcshowhide]' <?php checked( $options['fastspring_vcshowhide'], 'show' ); ?> value='show'>Always show View Cart button</label></p>
	<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcshowhide]' <?php checked( $options['fastspring_vcshowhide'], 'hide' ); ?> value='hide'>Hide View Cart button when cart is empty</label></p>
	<?php
}

function fastspring_settings_default_checkout_button_settings() {
	$defaults = array(
		'fastspring_coclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_cotext' => 'Checkout',
		'fastspring_coicon' => 'fa-lock',
	);
	return apply_filters( 'fastspring_settings_default_checkout_button_settings', $defaults );
}

function fastspring_initialize_checkout_button_settings() {
	if( false == get_option( 'fastspring_settings_checkout_button_settings' ) ) {
		add_option( 'fastspring_settings_checkout_button_settings', apply_filters( 'fastspring_settings_default_checkout_button_settings', fastspring_settings_default_checkout_button_settings() ) );
	}
	add_settings_section(
		'checkout_section',
		__( 'Checkout Button Settings', 'fastspring' ),
		'fastspring_cosettings_section_callback',
		'fastspring_settings_checkout_button_settings'
	);
	add_settings_field(
		'fastspring_coclass',
		__( 'Default Checkout Button Class', 'fastspring' ),
		'fastspring_coclass_render',
		'fastspring_settings_checkout_button_settings',
		'checkout_section'
	);
	add_settings_field(
		'fastspring_cotext',
		__( 'Default Checkout Button Text', 'fastspring' ),
		'fastspring_cotext_render',
		'fastspring_settings_checkout_button_settings',
		'checkout_section'
	);
	add_settings_field(
		'fastspring_coicon',
		__( 'Default Checkout Button Icon', 'fastspring' ),
		'fastspring_coicon_render',
		'fastspring_settings_checkout_button_settings',
		'checkout_section'
	);
	register_setting(
		'fastspring_settings_checkout_button_settings',
		'fastspring_settings_checkout_button_settings',
		'fastspring_settings_validate_checkout_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_checkout_button_settings' );

function fastspring_coclass_render(  ) {
	$options = get_option( 'fastspring_settings_checkout_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_checkout_button_settings[fastspring_coclass]' value='<?php echo $options['fastspring_coclass'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_cotext_render(  ) {
	$options = get_option( 'fastspring_settings_checkout_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_checkout_button_settings[fastspring_cotext]' value='<?php echo $options['fastspring_cotext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_coicon_render(  ) {
	$options = get_option( 'fastspring_settings_checkout_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-lock' ); ?> value='fa-lock'><i class="fa fa-lock" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $options['fastspring_coicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}


function fastspring_settings_default_cross_sell_button_settings() {
	$defaults = array(
		'fastspring_xsclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_xstext' => 'Add to Order',
		'fastspring_xsicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_cross_sell_button_settings', $defaults );
}

function fastspring_initialize_cross_sell_button_settings() {
	if( false == get_option( 'fastspring_settings_cross_sell_button_settings' ) ) {
		add_option( 'fastspring_settings_cross_sell_button_settings', apply_filters( 'fastspring_settings_default_cross_sell_button_settings', fastspring_settings_default_cross_sell_button_settings() ) );
	}
	add_settings_section(
		'cross_sellt_section',
		__( 'Cross-Sell Button Settings', 'fastspring' ),
		'fastspring_xssettings_section_callback',
		'fastspring_settings_cross_sell_button_settings'
	);
	add_settings_field(
		'fastspring_xsclass',
		__( 'Cross-Sell Button Class', 'fastspring' ),
		'fastspring_xsclass_render',
		'fastspring_settings_cross_sell_button_settings',
		'cross_sellt_section'
	);
	add_settings_field(
		'fastspring_xstext',
		__( 'Cross-Sell Button Text', 'fastspring' ),
		'fastspring_xstext_render',
		'fastspring_settings_cross_sell_button_settings',
		'cross_sellt_section'
	);
	add_settings_field(
		'fastspring_xsicon',
		__( 'Cross-Sell Button Icon', 'fastspring' ),
		'fastspring_xsicon_render',
		'fastspring_settings_cross_sell_button_settings',
		'cross_sellt_section'
	);
	register_setting(
		'fastspring_settings_cross_sell_button_settings',
		'fastspring_settings_cross_sell_button_settings',
		'fastspring_settings_validate_cross_sell_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_cross_sell_button_settings' );

function fastspring_xsclass_render(  ) {
	$options = get_option( 'fastspring_settings_cross_sell_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_cross_sell_button_settings[fastspring_xsclass]' value='<?php if($options['fastspring_xsclass']) {echo $options['fastspring_xsclass'];} else {echo 'fastspring_btn fastspring_btn-success';}?>' class="regular-text">
	</div>
	<?php
}
function fastspring_xstext_render(  ) {
	$options = get_option( 'fastspring_settings_cross_sell_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_cross_sell_button_settings[fastspring_xstext]' value='<?php if($options['fastspring_xstext']) {echo $options['fastspring_xstext'];} else {echo 'Add to Order';}?>' class="regular-text">
	</div>
	<?php
}
function fastspring_xsicon_render(  ) {
	$options = get_option( 'fastspring_settings_cross_sell_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-plus' ); ?> value='fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-plus-circle' ); ?> value='fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $options['fastspring_xsicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}

function fastspring_settings_default_up_sell_button_settings() {
	$defaults = array(
		'fastspring_usclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_ustext' => 'Upgrade Now',
		'fastspring_usicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_up_sell_button_settings', $defaults );
}

function fastspring_initialize_up_sell_button_settings() {
	if( false == get_option( 'fastspring_settings_up_sell_button_settings' ) ) {
		add_option( 'fastspring_settings_up_sell_button_settings', apply_filters( 'fastspring_settings_default_up_sell_button_settings', fastspring_settings_default_up_sell_button_settings() ) );
	}
	add_settings_section(
		'up_sell_section',
		__( 'Up-Sell Button Settings', 'fastspring' ),
		'fastspring_ussettings_section_callback',
		'fastspring_settings_up_sell_button_settings'
	);
	add_settings_field(
		'fastspring_usclass',
		__( 'Up-Sell Button Class', 'fastspring' ),
		'fastspring_usclass_render',
		'fastspring_settings_up_sell_button_settings',
		'up_sell_section'
	);
	add_settings_field(
		'fastspring_ustext',
		__( 'Up-Sell Button Text', 'fastspring' ),
		'fastspring_ustext_render',
		'fastspring_settings_up_sell_button_settings',
		'up_sell_section'
	);
	add_settings_field(
		'fastspring_usicon',
		__( 'Up-Sell Button Icon', 'fastspring' ),
		'fastspring_usicon_render',
		'fastspring_settings_up_sell_button_settings',
		'up_sell_section'
	);
	register_setting(
		'fastspring_settings_up_sell_button_settings',
		'fastspring_settings_up_sell_button_settings',
		'fastspring_settings_validate_up_sell_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_up_sell_button_settings' );



function fastspring_usclass_render(  ) {
	$options = get_option( 'fastspring_settings_up_sell_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_up_sell_button_settings[fastspring_usclass]' value='<?php echo $options['fastspring_usclass'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_ustext_render(  ) {
	$options = get_option( 'fastspring_settings_up_sell_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_up_sell_button_settings[fastspring_ustext]' value='<?php echo $options['fastspring_ustext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_usicon_render(  ) {
	$options = get_option( 'fastspring_settings_up_sell_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-plus' ); ?> value='fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-plus-circle' ); ?> value='fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $options['fastspring_usicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}

function fastspring_settings_default_eds_button_settings() {
	$defaults = array(
		'fastspring_edsclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_edstext' => 'Add to Order',
		'fastspring_edsicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_eds_button_settings', $defaults );
}

function fastspring_initialize_eds_button_settings() {
	if( false == get_option( 'fastspring_settings_eds_button_settings' ) ) {
		add_option( 'fastspring_settings_eds_button_settings', apply_filters( 'fastspring_settings_default_eds_button_settings', fastspring_settings_default_eds_button_settings() ) );
	}
	add_settings_section(
		'eds_section',
		__( 'EDS Buy Button Settings', 'fastspring' ),
		'fastspring_edssettings_section_callback',
		'fastspring_settings_eds_button_settings'
	);
	add_settings_field(
		'fastspring_edsclass',
		__( 'EDS Buy Button Class', 'fastspring' ),
		'fastspring_edsclass_render',
		'fastspring_settings_eds_button_settings',
		'eds_section'
	);
	add_settings_field(
		'fastspring_edstext',
		__( 'EDS Buy Button Text', 'fastspring' ),
		'fastspring_edstext_render',
		'fastspring_settings_eds_button_settings',
		'eds_section'
	);
	add_settings_field(
		'fastspring_edsicon',
		__( 'EDS Buy Button Icon', 'fastspring' ),
		'fastspring_edsicon_render',
		'fastspring_settings_eds_button_settings',
		'eds_section'
	);
	register_setting(
		'fastspring_settings_eds_button_settings',
		'fastspring_settings_eds_button_settings',
		'fastspring_settings_validate_eds_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_eds_button_settings' );

function fastspring_edsclass_render(  ) {
	$options = get_option( 'fastspring_settings_eds_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_eds_button_settings[fastspring_edsclass]' value='<?php echo $options['fastspring_edsclass'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_edstext_render(  ) {
	$options = get_option( 'fastspring_settings_eds_button_settings' );
	?>
	<div class="col-md-6">
		<input type='text' name='fastspring_settings_eds_button_settings[fastspring_edstext]' value='<?php echo $options['fastspring_edstext'];?>' class="regular-text">
	</div>
	<?php
}
function fastspring_edsicon_render(  ) {
	$options = get_option( 'fastspring_settings_eds_button_settings' );
	?>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-plus' ); ?> value='fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-plus-circle' ); ?> value='fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
	<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $options['fastspring_edsicon'], 'none' ); ?> value='scp'>None</label></p>
	<?php
}

function fastspring_settings_default_custom_css() {
	$defaults = array(
		'fastspring_cssclass' => '/*Add CSS here*/',
	);
	return apply_filters( 'fastspring_settings_default_custom_css', $defaults );
}

function fastspring_initialize_custom_css() {
	if( false == get_option( 'fastspring_settings_custom_css' ) ) {
		add_option( 'fastspring_settings_custom_css', apply_filters( 'fastspring_settings_default_custom_css', fastspring_settings_default_custom_css() ) );
	}
	add_settings_section(
		'custom_css_section',
		__( 'Custom CSS', 'fastspring' ),
		'fastspring_csssettings_section_callback',
		'fastspring_settings_custom_css'
	);
	add_settings_field(
		'fastspring_cssclass',
		__( 'Custom CSS', 'fastspring' ),
		'fastspring_cssclass_render',
		'fastspring_settings_custom_css',
		'custom_css_section'
	);
	register_setting(
		'fastspring_settings_custom_css',
		'fastspring_settings_custom_css',
		'fastspring_settings_validate_custom_css'
	);
}
add_action( 'admin_init', 'fastspring_initialize_custom_css' );

function fastspring_cssclass_render(  ) {
	$options = get_option( 'fastspring_settings_custom_css' );
	?>
	<div class="col-md-6">
		<textarea  rows="20" style="width:90%;" name='fastspring_settings_custom_css[fastspring_cssclass]' class="regular-text"><?php echo $options['fastspring_cssclass'];?></textarea>
	</div>
	<?php
}

function fastspring_settings_default_about() {
	$defaults = array(
	);
	return apply_filters( 'fastspring_settings_default_about', $defaults );
}

function fastspring_initialize_about() {
	if( false == get_option( 'fastspring_settings_about' ) ) {
		add_option( 'fastspring_settings_about', apply_filters( 'fastspring_settings_default_about', fastspring_settings_default_about() ) );
	}
	add_settings_section(
		'about_section',
		__( 'About', 'fastspring' ),
		'fastspring_about_section_callback',
		'fastspring_settings_about'
	);
}
add_action( 'admin_init', 'fastspring_initialize_about' );

function fastspring_general_options_callback() {
	echo '<p>' . __( 'Configure which Storefront and Store Builder Library version will be used with your WordPress pages. ', 'fastspring' ) . '</p>';
}

function fastspring_cartsettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the appearance and functionality of the shopping cart on your WordPress pages.', 'fastspring' ) . '</p>';
}

function fastspring_bbsettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the default appearance and behavior of "buy" buttons.  These settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly.', 'fastspring' ) . '</p>';
}

function fastspring_rcsettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the default appearance of "remove from cart" buttons.  For "remove from cart" buttons on your WordPress page, these default settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly. <br /><br /> For "remove from cart" buttons that appear inside the shopping cart, only the <strong>Default Remove from Cart Button Icon</strong> applies. The selected icon cannot be overridden by other means.', 'fastspring' ) . '</p>';
}

function fastspring_vcsettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the default appearance and behavior of "view cart" buttons.  These default settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog or the <strong>FastSpring View Cart Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly.', 'fastspring' ) . '</p>';
}

function fastspring_cosettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the default appearance of "checkout" buttons.  These default settings can be overridden when using the <strong>FastSpring Checkout Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly.', 'fastspring' ) . '</p>';
}

function fastspring_xssettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the appearance of "cross-sell" buttons that can appear inside the shopping cart.  These settings cannot be overridden by other means.', 'fastspring' ) . '</p>';
}

function fastspring_ussettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the appearance of "up-sell" buttons that can appear inside the shopping cart.  These settings cannot be overridden by other means.', 'fastspring' ) . '</p>';
}

function fastspring_edssettings_section_callback(  ) {
	echo '<p>' . __( 'Customize the appearance of the "EDS Buy" button that can appear inside the shopping cart.  These settings cannot be overriden by other means.', 'fastspring' ) . '</p>';
}
function fastspring_csssettings_section_callback(  ) {
	echo '<p>' . __( 'If you have knowledge of CSS, you can optionally use custom CSS to modify the appearance of all of your WordPress pages.', 'fastspring' ) . '</p>';
}
function fastspring_nav_menu_callback() {
	echo '<p>' . __( 'Select the desired functionality for nav menu items view cart link', 'fastspring' ) . '</p>';
}
function fastspring_nav_menu_checkout_callback() {
	echo '<p>' . __( 'Select the desired functionality for nav menu items checkout link.', 'fastspring' ) . '</p>';
}
function fastspring_about_section_callback(  ) {
	echo '<p>' . __( 'The FastSpring WordPress Plugin is a tool that lets you integrate your FastSpring Store with your WordPress website. Using the plugin, you can dynamically display product information and a full shopping cart, and collect customers\' payments right on your site via your FastSpring Popup Storefront. The plugin lets you do all of this and more without having to manually create any code.<br /><br />The plugin accomplishes this by providing you with an easy-to-use interface for FastSpring\'s Store Builder Library (SBL). No technical expertise is required, but familiarity with WordPress and CSS are helpful when using the plugin. Users with basic knowledge of HTML and CSS will be able to further customize their solutions on the Text tab of their WordPress pages. <br /><br />For more information or suggestions please contact <a href="mailto:support@fastspring.com">support</a>.', 'fastspring' ) . '</p>';
}

add_action( 'media_buttons', 'fastspring_buttons' );

function fastspring_buttons() {
	add_thickbox();
	?>












	<style>
		#TB_ajaxContent {
			min-width: 100% !important;
			width: auto !important;
			height: 95% !important;
			overflow-y: scroll;
		}
		#TB_ajaxContent input[type=radio]{
			position: relative !important;
		}
	</style>
<a href="#TB_inline?width=600&height=550&inlineId=buybutton" class="thickbox button" title="FastSpring Buy Buttons">FastSpring Buy Buttons</a>
<a href="#TB_inline?width=600&height=550&inlineId=prodattrib" class="thickbox button" title="FastSpring Product Attributes">FastSpring Product Attributes</a>
<a href="#TB_inline?width=600&height=550&inlineId=viewcart" class="thickbox button" title="FastSpring View Cart Buttons">FastSpring View Cart Buttons</a>
<a href="#TB_inline?width=600&height=550&inlineId=checkout" class="thickbox button" title="FastSpring Checkout Buttons">FastSpring Checkout Buttons</a>



<?php
	$fastspring_settings_general_settings = get_option( 'fastspring_settings_general_settings' );
	$fastspring_settings_shopping_cart_settings = get_option('fastspring_settings_shopping_cart_settings');
	$fastspring_settings_buy_button_settings = get_option('fastspring_settings_buy_button_settings');
	$fastspring_settings_remove_from_cart_button_settings = get_option('fastspring_settings_remove_from_cart_button_settings');
	$fastspring_settings_view_cart_button_settings = get_option('fastspring_settings_view_cart_button_settings');
	$fastspring_settings_checkout_button_settings = get_option('fastspring_settings_checkout_button_settings');
	$fastspring_settings_cross_sell_button_settings = get_option('fastspring_settings_cross_sell_button_settings');
	$fastspring_settings_up_sell_button_settings = get_option('fastspring_settings_up_sell_button_settings');
	$fastspring_settings_eds_button_settings = get_option('fastspring_settings_eds_button_settings');
	$fastspring_settings_custom_css = get_option('fastspring_settings_custom_css');
	$GLOBALS['options'] = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css);
	$options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css);


	add_filter( 'script_loader_tag', 'fastspring_add_id_to_script', 10, 3 );



	wp_register_style( 'fastspringbootstrap.min', plugins_url('public/css/bootstrap.css', __FILE__) );
	wp_enqueue_style('fastspringbootstrap.min');
	wp_register_style( 'fastspringawesome.min', plugins_url('public/css/awesome.css', __FILE__) );
	wp_enqueue_style('fastspringawesome.min');
	wp_register_script( 'fastspringbootstrapjs.min', plugins_url('public/js/bootstrap.js', __FILE__) );
	wp_enqueue_script('fastspringbootstrapjs.min');
	wp_register_script( 'fastspringapi', $options['fastspring_builder_url']);
	wp_enqueue_script('fastspringapi');
?>



<div id="checkout" style="display:none;">
    <p>
        <div id="fastspringco" style="margin: 20px;">
            <form>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Checkout Button Text</label>
                        <input id="co_text" name="co_text" type="text" value="<?php echo $options['fastspring_cotext']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Checkout Button Class</label>
                        <input id="co_class" name="co_class" type="text" value="<?php echo $options['fastspring_coclass']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="checkout">Checkout Button Icon</label><br />
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-lock' ); ?> value='fa-lock'> <i class="fa fa-lock" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                        <div class="col-sm-4">
                            <div class="radio">
                                <label>
                                    <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'> <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="radio">
                                <label>
                                    <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'> <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type='radio' name='coicon' <?php checked( $options['fastspring_coicon'], 'none' ); ?> value='scp'> None
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button id="" class="btn btn-primary" onclick="insertcheckout(event);" >Add Checkout Button</button>
                    </div>
                </div>
            </form>
        </div>
    </p>
</div>

<div id="viewcart" style="display:none;">
		<p>
		<div id="fastspringvc" style="margin: 20px;">
    <form>
        <div class="row">
            <div class="form-group col-sm-6">
                <label>View Cart Button Text</label>
                <input id="vc_text" name="vc_text" type="text" value="<?php echo $options['fastspring_vctext']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label>View Cart Button Class</label>
                <input id="vc_class" name="vc_class" type="text" value="<?php echo $options['fastspring_vcclass']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="checkout">View Cart Button Icon</label><br />
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-lock' ); ?> value='fa-lock'> <i class="fa fa-lock" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-chevron-right' ); ?> value='fa-chevron-right'> <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-chevron-circle-right' ); ?> value='fa-chevron-circle-right'> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-arrow-right' ); ?> value='fa-arrow-right'> <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-arrow-circle-right' ); ?> value='fa-arrow-circle-right'> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-shopping-basket' ); ?> value='fa-shopping-basket'> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'fa-shopping-cart' ); ?> value='fa-shopping-cart'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type='radio' name='vcicon' <?php checked( $options['fastspring_vcicon'], 'none' ); ?> value='scp'> None
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button id="" class="btn btn-primary" onclick="insertviewcart(event);" >Add View Cart Button</button>
            </div>
        </div>
    </form>
</div>
		</p>
		</div>




	<div id="buybutton" style="display:none;">
		<p>


    <div id="fastspringbb" style="margin: 20px;">
    <form>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="checkout">Button Action</label><br />
                    <div class="col-sm-6">
                    <div class="radio">
                    <label>
                        <input type="radio" name="checkout" id="checkout" value="false" <?php if($options['fastspring_bbaction'] == 'addtocart') { echo 'checked'; } ;?> onclick="noncheckout();">
                        Add to Cart
                    </label>
                </div>
                </div>
                    <div class="col-sm-6">
                    <div class="radio">
                    <label>
                        <input type="radio" name="checkout" id="checkout" value="true" <?php if($options['fastspring_bbaction'] == 'checkout') { echo 'checked'; };?> onclick="noncheckout();">
                        Checkout
                    </label>
                </div>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="form-group col-sm-6">
                <label for="bb_path">Select Product</label>
                <select id="bbpathidselect" name="bbpathidselect" onchange="bbenableadd()" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="bb_text">Buy Button Text</label>
                <input id="bb_text" name="bb_text" type="text" value="<?php echo $options['fastspring_bbtext']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="bb_class">Buy Button Class</label>
                <input id="bb_class" name="bb_class" type="text" value="<?php echo $options['fastspring_bbclass']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="checkout">Buy Button Icon</label><br />
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label class="active">
                                <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-shopping-basket" <?php checked( $options['fastspring_bbicon'], 'fa-shopping-basket' ); ?> />
                                &nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">

                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-shopping-cart" <?php checked( $options['fastspring_bbicon'], 'fa-shopping-cart' ); ?> />
                            &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-chevron-right" <?php checked( $options['fastspring_bbicon'], 'fa-chevron-right' ); ?> />
                            &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-chevron-circle-right" <?php checked( $options['fastspring_bbicon'], 'fa-chevron-circle-right' ); ?> />
                            &nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-plus" <?php checked( $options['fastspring_bbicon'], 'fa-plus' ); ?> />
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-plus-circle" <?php checked( $options['fastspring_bbicon'], 'fa-plus-circle' ); ?> />
                            &nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-arrow-right" <?php checked( $options['fastspring_bbicon'], 'fa-arrow-right' ); ?> />
                            &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa-arrow-circle-right" <?php checked( $options['fastspring_bbicon'], 'fa-arrow-circle-right' ); ?> />
                            &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="" <?php checked( $options['fastspring_bbicon'], 'none' ); ?> />
                            &nbsp;None&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
            </div>
        </div>

		<span class="nncheckout">
		<div class="row ncheckout">
            <div class="form-group col-sm-6">
                <label for="checkout">Secondary Button Function</label><br />
                    <div class="col-sm-6">
                    <div class="radio">
                    <label>
                        <input type="radio" name="vc_rfc" value="vc" <?php if($options['fastspring_bbsecondaryaction'] == 'viewcart') { echo 'checked'; };?> onclick="vcrfcfunction(event);">
                        View Cart
                    </label>
                </div>
                </div>
                    <div class="col-sm-6">
                    <div class="radio">
                    <label>
                        <input type="radio" name="vc_rfc" value="rfc" <?php if($options['fastspring_bbsecondaryaction'] == 'removefromcart') { echo 'checked'; };?> onclick="vcrfcfunction(event);">
                        Remove from Cart
                    </label>
                </div>
                </div>
            </div>
        </div>
		<div class="row vcsection ncheckout">
            <div class="form-group col-sm-6">
                <label for="bbvc_text">View Cart Button Text</label>
                <input id="bbvc_text" name="bbvc_text" type="text" value="<?php echo $options['fastspring_vctext']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row vcsection ncheckout">
            <div class="form-group col-sm-6">
                <label for="bbvc_class">View Cart Button Class</label>
                <input id="bbvc_class" name="bbvc_class" type="text" value="<?php echo $options['fastspring_vcclass']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row vcsection ncheckout">
            <div class="form-group col-sm-6">
                <label for="checkout">View Cart Button Icon</label><br />
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label class="active">
                                <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-shopping-basket" <?php checked( $options['fastspring_vcicon'], 'fa-shopping-basket' ); ?> />
                                &nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">

                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-shopping-cart" <?php checked( $options['fastspring_vcicon'], 'fa-shopping-cart' ); ?> />
                            &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-chevron-right" <?php checked( $options['fastspring_vcicon'], 'fa-chevron-right' ); ?> />
                            &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-chevron-circle-right" <?php checked( $options['fastspring_vcicon'], 'fa-chevron-circle-right' ); ?> />
                            &nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-plus" <?php checked( $options['fastspring_vcicon'], 'fa-plus' ); ?> />
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-plus-circle" <?php checked( $options['fastspring_vcicon'], 'fa-plus-circle' ); ?> />
                            &nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-arrow-right" <?php checked( $options['fastspring_vcicon'], 'fa-arrow-right' ); ?> />
                            &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa-arrow-circle-right" <?php checked( $options['fastspring_vcicon'], 'fa-arrow-circle-right' ); ?> />
                            &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="" <?php checked( $options['fastspring_vcicon'], 'none' ); ?> />
                            &nbsp;None&nbsp;&nbsp;
                        </label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row rfcsection ncheckout" style="display:none;">
            <div class="form-group col-sm-6">
                <label for="rc_text">Remove from Cart Button Text</label>
                <input id="rc_text" name="rc_text" type="text" value="<?php echo $options['fastspring_rctext']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row rfcsection ncheckout" style="display:none;">
            <div class="form-group col-sm-6">
                <label for="rc_class">Remove from Cart Button Class</label>
                <input id="rc_class" name="rc_class" type="text" value="<?php echo $options['fastspring_rcclass']; ?>" class="form-control" />
            </div>
        </div>
        <div class="row rfcsection ncheckout" style="display:none;">
            <div class="form-group col-sm-6">
                <label>Remove from Cart Button Icon</label><br />
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-times" <?php checked( $options['fastspring_rcicon'], 'fa-times' ); ?> />
                                &nbsp;<i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-times-circle" <?php checked( $options['fastspring_rcicon'], 'fa-times-circle' ); ?> />
                                &nbsp;<i class="fa fa-times-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-trash" <?php checked( $options['fastspring_rcicon'], 'fa-trash' ); ?> />
                                &nbsp;<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-trash-alt" <?php checked( $options['fastspring_rcicon'], 'fa-trash-alt' ); ?> />
                                &nbsp;<i class="fa fa-trash-alt" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-minus" <?php checked( $options['fastspring_rcicon'], 'fa-minus' ); ?> />
                                &nbsp;<i class="fa fa-minus" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="fa-minus-circle" <?php checked( $options['fastspring_rcicon'], 'fa-minus-circle' ); ?> />
                                &nbsp;<i class="fa fa-minus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="rcIcon" id="rcIcon" value="" <?php checked( $options['fastspring_rcicon'], 'none' ); ?> />
                                &nbsp;None&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</span>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="bbaddfastspringbutton"></label>
                <button id="bbaddfastspringbutton" name="bbaddfastspringbutton" class="btn btn-primary" onclick="bbinsertfastspring(event);" disabled >Add Fastspring Buy Button</button>
            </div>
        </div>
    </form>
</div>
		</p>
	</div>




	<div id="prodattrib" style="display:none;">
		<p>
		<div id="fastspringpa" style="margin: 20px;">
    <form>
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Select Product</label>

                <select id="attribpathidselect" name="attribpathidselect" class="form-control" onchange="paenableadd();">

                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="checkout">Select the Product Attribute to be Inserted</label><br />
                <div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="path" />
                            Product Path
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="name" />
                            Product Name
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="summary" />
                            Product Summary
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="full" />
                            Product Full Description
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="price" />
                            Product Price - <em>'Pretty' price with currency symbol – string</em>
                        </label>
                    </div>
                </div>

				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="priceValue" />
                            Product Price Value - <em>Price value – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="priceTotal" />
                            Product Price Total - <em>(quantity x priceValue) 'Pretty' price with currency symbol – no discounts included – string</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="priceTotalValue" />
                            Product Price Total Value - <em>(quantity x priceValue) no discounts included – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="unitPrice" />
                            Unit Price - <em>(quantity x priceValue – unitDiscountValue) 'Pretty' price – string</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="unitPriceValue" />
                            Unit Price Value - <em>(quantity x priceValue – unitDiscountValue) – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="unitDiscountValue" />
                            Unit Discount Value - <em>Discount value for each unit – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="discountPercentValue" />
                            Unit Discount Percent Value - <em>Discount percentage for each unit – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="discountTotal" />
                            Discount Total - <em>Discount 'Pretty' price total for product – string</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="discountTotalValue" />
                            Discount Total Value - <em>Discount price total for product – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="total" />
                            Product Total - <em>'Pretty' price total after any discounts – string</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="totalValue" />
                            Product Total Value - <em>Price total after any discounts – numeric</em>
                        </label>
                    </div>
                </div>
				<div class="col-sm-12">
                    <div class="radio">
                        <label>
                            <input type="radio" name="pacheckout" id="attrib" value="image" />
                            Product Image
                        </label>
                    </div>
                </div>
				<div class="row">
					<div class="form-group col-sm-6" id="insertimage" >
						<label for="img_class">Product Image Class</label>
						<input id="img_class" name="img_class" type="text" class="form-control" />
					</div>
				</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="paaddfastspringbutton"></label>
                <button id="paaddfastspringbutton" name="paaddfastspringbutton" class="btn btn-primary" onclick="painsertfastspring(event);" disabled >Add FastSpring Product Attribute</button>
            </div>
        </div>
    </form>
</div>
		</p>
	</div>









<?php
}

if ( ! is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {
	add_action( 'wp_footer', 'fastspring_cart' );
	add_action( 'wp_enqueue_scripts', 'fastspringgrid' );
	add_action( 'wp_enqueue_scripts', 'fastspring_popover' );
	add_action( 'wp_enqueue_scripts', 'fastspring_fontawesome' );
	add_action( 'wp_enqueue_scripts', 'fspopover' );
	add_action( 'wp_enqueue_scripts', 'fastspring_cscrolljs' );
	add_action( 'wp_enqueue_scripts', 'fastspring_cscrollcss' );
}

function fastspring_add_color_picker( $hook ) {
	if( is_admin() ) {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'custom-script-handle', plugins_url( 'public/js/fastspring.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
}
add_action( 'admin_enqueue_scripts', 'fastspring_add_color_picker' );

function fastspringgrid() {
    wp_register_style( 'fastspringgrid', plugins_url('public/css/fastspringgrid.css', __FILE__) );
    wp_enqueue_style( 'fastspringgrid' );
}
function fastspring_popover() {
    wp_register_style( 'fastspring_popover', plugins_url('public/css/popover.css', __FILE__) );
    wp_enqueue_style( 'fastspring_popover' );
}
function fastspring_fontawesome() {
    wp_enqueue_style('fastspring_fontawesome', plugins_url('public/css/awesome.css', __FILE__) );
    wp_enqueue_style( 'fastspring_fontawesome' );
}
function popoverjs() {
    wp_register_script( 'fastspring_popoverjs', plugins_url('public/js/popover.js', __FILE__) );
    wp_enqueue_script( 'fastspring_popoverjs' );
}
function fspopover() {
    wp_register_script( 'fspopover', plugins_url('public/js/fs-popover.js', __FILE__),  array( 'jquery' ) );
    wp_enqueue_script( 'fspopover' );
}
function fastspring_cscrolljs() {
    wp_register_script( 'fastspring_cscrolljs', plugins_url('public/js/jquery.mCustomScrollbar.concat.min.js', __FILE__) );
    wp_enqueue_script( 'fastspring_cscrolljs' );
}
function fastspring_cscrollcss() {
    wp_register_style( 'fastspring_cscrollcss', plugins_url('public/css/jquery.mCustomScrollbar.min.css', __FILE__),  array( 'jquery' ) );
    wp_enqueue_style( 'fastspring_cscrollcss' );
}

function fastspring_cart(){
    $fastspring_settings_general_settings = get_option( 'fastspring_settings_general_settings' );
    $fastspring_settings_shopping_cart_settings = get_option('fastspring_settings_shopping_cart_settings');
    $fastspring_settings_buy_button_settings = get_option('fastspring_settings_buy_button_settings');
    $fastspring_settings_remove_from_cart_button_settings = get_option('fastspring_settings_remove_from_cart_button_settings');
    $fastspring_settings_view_cart_button_settings = get_option('fastspring_settings_view_cart_button_settings');
    $fastspring_settings_checkout_button_settings = get_option('fastspring_settings_checkout_button_settings');
    $fastspring_settings_cross_sell_button_settings = get_option('fastspring_settings_cross_sell_button_settings');
    $fastspring_settings_up_sell_button_settings = get_option('fastspring_settings_up_sell_button_settings');
    $fastspring_settings_eds_button_settings = get_option('fastspring_settings_eds_button_settings');
    $fastspring_settings_custom_css = get_option('fastspring_settings_custom_css');
    $options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css);
    require_once plugin_dir_path( __FILE__ ) . 'includes/fastspringmodal.php';
}


add_filter( 'nav_menu_link_attributes', 'fastspring_nav_menu_opencart', 10, 3 );
function fastspring_nav_menu_opencart( $atts, $item, $args )
{
	$options = get_option('fastspring_settings_nav_menu');
	$options2 = get_option('fastspring_settings_view_cart_button_settings');
	$value = array();
	if (isset($options['fastspring_viewcartmenuitems']) && ! empty($options['fastspring_viewcartmenuitems'])) {
		$value = $options['fastspring_viewcartmenuitems'];
	}
	if(in_array($item->ID, $value)) {
		$atts['data-fsc-opencart'] = ' ';
		if($options2['fastspring_vcshowhide'] == 'hide') {
			$atts['data-fsc-selections-smartdisplay'] = ' ';
			$atts['style'] = 'display:none;';
		}
		$atts['onclick'] = 'openCart();';
	}
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'fastspring_nav_menu_checkout', 10, 3 );
function fastspring_nav_menu_checkout( $atts, $item, $args )
{
	$options = get_option('fastspring_settings_nav_menu');
	$value = array();
	if (isset($options['fastspring_checkoutmenuitems']) && ! empty($options['fastspring_checkoutmenuitems'])) {
		$value = $options['fastspring_checkoutmenuitems'];
	}
	if(in_array($item->ID, $value)) {
		$atts['data-fsc-action'] = 'Checkout';
		$atts['data-fsc-selections-smartdisplay'] = ' ';
		$atts['style'] = 'display:none;';
 	}
	return $atts;
}

?>