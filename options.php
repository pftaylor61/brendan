<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'brendan'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise-2.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => esc_html__( 'Left aligned', 'brendan' ),
		'center' => esc_html__( 'Center aligned', 'brendan' ),
		'right' => esc_html__( 'Right aligned', 'brendan' )
	);

	// Number of shop products
	$shop_products_settings = array(
		'4' => esc_html__( '4 Products', 'brendan' ),
		'8' => esc_html__( '8 Products', 'brendan' ),
		'12' => esc_html__( '12 Products', 'brendan' ),
		'16' => esc_html__( '16 Products', 'brendan' ),
		'20' => esc_html__( '20 Products', 'brendan' ),
		'24' => esc_html__( '24 Products', 'brendan' ),
		'28' => esc_html__( '28 Products', 'brendan' )
	);

	$options = array();

	$options[] = array(
		'name' => esc_html__( 'Basic Settings', 'brendan' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Background', 'brendan' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'brendan' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'brendan' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'brendan' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'brendan' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'brendan' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'brendan'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'brendan'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'brendan' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'brendan' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'brendan' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'brendan' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Google+', 'brendan' ),
		'desc' => esc_html__( 'Enter your Google+ URL.', 'brendan' ),
		'id' => 'social_googleplus',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'brendan' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'brendan' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'SlideShare', 'brendan' ),
		'desc' => esc_html__( 'Enter your SlideShare URL.', 'brendan' ),
		'id' => 'social_slideshare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Dribbble', 'brendan' ),
		'desc' => esc_html__( 'Enter your Dribbble URL.', 'brendan' ),
		'id' => 'social_dribbble',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Tumblr', 'brendan' ),
		'desc' => esc_html__( 'Enter your Tumblr URL.', 'brendan' ),
		'id' => 'social_tumblr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'brendan' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'brendan' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Bitbucket', 'brendan' ),
		'desc' => esc_html__( 'Enter your Bitbucket URL.', 'brendan' ),
		'id' => 'social_bitbucket',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Foursquare', 'brendan' ),
		'desc' => esc_html__( 'Enter your Foursquare URL.', 'brendan' ),
		'id' => 'social_foursquare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'brendan' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'brendan' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'brendan' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'brendan' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'brendan' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'brendan' ),
		'id' => 'social_flickr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'brendan' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'brendan' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'RSS', 'brendan' ),
		'desc' => esc_html__( 'Enter your RSS Feed URL.', 'brendan' ),
		'id' => 'social_rss',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced settings', 'brendan' ),
		'type' => 'heading' );

	/*
         * Remove Banner background, as Banner not available in this theme
         */
        /*
        $options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'brendan' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'brendan' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );
         * 
         */

	$options[] = array(
		'name' => esc_html__( 'Footer Background Color', 'brendan' ),
		'desc' => esc_html__( 'Select the background color for the footer.', 'brendan' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => esc_html__( 'Footer Content', 'brendan' ),
		'desc' => esc_html__( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'brendan' ),
		'id' => 'footer_content',
		'std' => brendan_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => esc_html__( 'Footer Content Position', 'brendan' ),
		'desc' => esc_html__( 'Select what position you would like the footer content aligned to.', 'brendan' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	if( brendan_is_woocommerce_active() ) {
		$options[] = array(
		'name' => esc_html__( 'WooCommerce settings', 'brendan' ),
		'type' => 'heading' );

		$options[] = array(
			'name' => esc_html__('Shop sidebar', 'brendan'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Shop page', 'brendan'),
			'id' => 'woocommerce_shopsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__('Products sidebar', 'brendan'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Single Product page', 'brendan'),
			'id' => 'woocommerce_productsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Cart, Checkout & My Account sidebars', 'brendan' ),
			'desc' => esc_html__( 'The &lsquo;Cart&rsquo;, &lsquo;Checkout&rsquo; and &lsquo;My Account&rsquo; pages are displayed using shortcodes. To remove the sidebar from these Pages, simply edit each Page and change the Template (in the Page Attributes Panel) to the &lsquo;Full-width Page Template&rsquo;.', 'brendan' ),
			'type' => 'info' );

		$options[] = array(
			'name' => esc_html__('Shop Breadcrumbs', 'brendan'),
			'desc' => esc_html__('Display the breadcrumbs on the WooCommerce pages', 'brendan'),
			'id' => 'woocommerce_breadcrumbs',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Shop Products', 'brendan' ),
			'desc' => esc_html__( 'Select the number of products to display on the shop page.', 'brendan' ),
			'id' => 'shop_products',
			'std' => '12',
			'type' => 'select',
			'class' => 'mini',
			'options' => $shop_products_settings );

	}

	return $options;
}

add_action( 'optionsframework_after','brendan_options_display_sidebar' );

/**
 * dewi admin sidebar
 */
function brendan_options_display_sidebar() { 
        // replaceable variables
        $ocws_theme_screenshot_thumb = "brendan400.png";
        $ocws_theme_op_text = "<p><strong>Brendan</strong> is a fully responsive theme for Wordpress, based on my foundational Qohelet theme. Like Qohelet, it has been built on the shoulders of giants, utilizing a number of other technologies, such as: 1. The Quark starter theme by Anthony Horton. 2. Quark is in turn built upon Underscores by Automattix. 3. Quark utilizes Normalize, Modernizr and Options Framework. 4. Many other smaller amounts of other technologies have been incorporated, so that I did not re-invent the wheel.<br /><br />Brendan moccu Altae (or Brendan the Navigator) is believed to have traveled from Ireland to North America in the 6th Century.</p>";
        
	 ?>
        <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="ocws_postbox">
	    		<h3><?php esc_attr_e( 'About Brendan', 'brendan' ); ?></h3>
                        <img src="<?php echo get_template_directory_uri().'/assets/'.$ocws_theme_screenshot_thumb; ?>" style="margin-right:auto; margin-left:auto; width:300px;" />
      			<div class="ocws_inside_box"> 
                            <?php echo $ocws_theme_op_text; ?>
	      			
      			</div><!-- ocws_inside_box -->
	    	</div><!-- .ocws_postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
        
        
<?php
}
?>