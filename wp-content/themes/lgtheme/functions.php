<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '3.1.2' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = generate_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'assets/css/admin/editor-style.css' );
	}
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';

//START CSS AND JS binding to theme
function themeslug_enqueue_style() {

	$post_type = get_post_type();

	// if( 'post' === $post_type ) {
	// } elseif ( 'page' === $post_type ) {
	//    echo "it is page";
	// }

	$url_arr = explode("/",$_SERVER['REQUEST_URI']);	
	{
		$current_venue = $url_arr[3];
	}
    $venue_array  = array("lemon-grove","the-ram-bar","great-hall","forum-kithcen");

    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri()."/assets/css/bootstrap.min.css", false );
    wp_enqueue_style( 'font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", false );
    wp_enqueue_style( 'our-font', "https://fonts.googleapis.com/css?family=Nunito Sans:400,700,800", false );
    wp_enqueue_style( 'lineicons', "https://cdn.lineicons.com/3.0/lineicons.css", false );
    wp_enqueue_style( 'blog', get_stylesheet_directory_uri()."/assets/css/blog.css" );
    wp_enqueue_style( 'intern_header', get_stylesheet_directory_uri()."/assets/css/intern-header.css", false );

    wp_enqueue_style( 'focused_events', get_stylesheet_directory_uri()."/assets/css/focused-events.css", false );
    wp_enqueue_style( 'booking', get_stylesheet_directory_uri()."/assets/css/booking.css", false );
    wp_enqueue_style( 'about_us', get_stylesheet_directory_uri()."/assets/css/about_us.css" );


    if(is_page('home-page'))
    {
    	wp_enqueue_style( 'our_venues', get_stylesheet_directory_uri()."/assets/css/our_venues.css", false );
    	wp_enqueue_style( 'header', get_stylesheet_directory_uri()."/assets/css/header.css", false );	
    }
    wp_enqueue_style( 'footer', get_stylesheet_directory_uri()."/assets/css/footer.css", false );
    // wp_enqueue_style( 'desk_navbar', get_stylesheet_directory_uri()."/assets/css/desk_navbar.css", false );



    if(is_page('whats-on') || is_page('private-hire') || is_page('contact') || in_array($current_venue,$venue_array) || 'post' === $post_type || 'event_listing' == $post_type || is_page('blog'))
    {
    	wp_enqueue_style( 'inter_our_venues', get_stylesheet_directory_uri()."/assets/css/intern-our_venues.css", false );
    	wp_enqueue_style( 'whats-on', get_stylesheet_directory_uri()."/assets/css/whats-on.css", false );
    	// wp_dequeue_style( WP_CONTENT_DIR.'/plugins/mobile-menu/cssmobmenu-css' );
    	// wp_dequeue_style( 'cssmobmenu' );
    }
    if(is_page('contact'))
    {
    	wp_enqueue_style( 'contactpage', get_stylesheet_directory_uri()."/assets/css/contact.css", false );
    }
}
 
function themeslug_enqueue_script() {
    wp_enqueue_script( 'bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js", false );
    wp_enqueue_script( 'myjquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js", false );
    wp_enqueue_script( 'myjquery-pagination', "https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js", false );
    wp_enqueue_script( 'myjquery', get_stylesheet_directory_uri()."/assets/js/jquery.min.js", false );
    wp_enqueue_script( 'pagingnation', get_stylesheet_directory_uri()."/assets/js/pagingnation.js", false );
    wp_enqueue_script( 'dropdown-arrow', get_stylesheet_directory_uri()."/assets/js/dropdown-arrow.js", false );
    // wp_enqueue_script( 'logo', get_stylesheet_directory_uri()."/assets/js/logo.js", false );
}
 
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );
//END CSS AND JS binding to theme


//START SET lastest 4 blog in menu
// add_filter( 'wp_get_nav_menu_items', 'custom_nav_menu_items2', 20, 2 );
function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
  $item = new stdClass();
  $item->ID = 1000000 + $order + $parent;
  $item->db_id = $item->ID;
  $item->title = $title;
  $item->url = $url;
  $item->menu_order = $order;
  $item->menu_item_parent = $parent;
  $item->type = '';
  $item->object = '';
  $item->object_id = '';
  $item->classes = array('blog_inner_menu');
  $item->target = '';
  $item->attr_title = '';
  $item->description = '';
  $item->xfn = '';
  $item->status = '';
  return $item;
}
function custom_nav_menu_items2( $items, $menu ) {
	foreach($items as $key => $val)
	{
		if ( in_array("blog_menu",$val->classes) ) {
			 $args = array(
		        'post_type' => 'post',
		        'post_status' => 'publish',
		        'order' => 'DESC',
    			'orderby' => 'ID',
    			'posts_per_page' => '3'
		    );

		    $loop = new WP_Query( $args );
		    if( $loop->have_posts() ){
		       $i = 101;
		        while( $loop->have_posts() ){
		            $loop->the_post();
		            $title = substr(get_the_title(), 0, 15);

		        	$items[] = _custom_nav_menu_item($title , get_post_permalink(), $i++, $val->ID );
		        }
		    }
		    // wp_reset_postdata();
		    wp_reset_query();

			//$items[] = _custom_nav_menu_item( 'First Child', '/some-url', 101, $val->ID );
			//$items[] = _custom_nav_menu_item( 'Second Child', '/some-url', 102, $val->ID );
			//$items[] = _custom_nav_menu_item( 'Third Child', '/some-url', 103, $val->ID );
		}

	}
  return $items;
}
//END SET lastest 4 blog in menu


//START SET main menu css according to design
class IBenic_Walker extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
	}	
    
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
  	
  	$object = $item->object;
	$type = $item->type;
	$title = $item->title;
	$description = $item->description;
	$permalink = $item->url;
	$menu_item_parent = $item->menu_item_parent;

	if ( in_array("menu-item-has-children",$item->classes) ) 
	{
		array_push($item->classes,'dropdown');
	}

	if(in_array("current_page_item",$item->classes) )// || in_array('current-menu-ancestor', $item->classes))
	{
		array_push($item->classes,'active');
	}

	if(in_array('current-menu-ancestor', $item->classes))//To remove red selected menu from Venues Menu
	{
		array_push($item->classes,'active_venue_menu');
	}	

	//START To keep current menu with different color for Venues
	if(in_array("current-menu-item",$item->classes) && in_array("drp-lemon",$item->classes) )
	{
		array_push($item->classes,'drp-lemon-hover');
	}
	if(in_array("current-menu-item",$item->classes) && in_array("drp-the_ram",$item->classes) )
	{
		array_push($item->classes,'drp-the_ram-hover');
	}
	if(in_array("current-menu-item",$item->classes) && in_array("drp-great_hall",$item->classes) )
	{
		array_push($item->classes,'drp-great_hall-hover');
	}
	if(in_array("current-menu-item",$item->classes) && in_array("drp-forum_kitchen",$item->classes) )
	{
		array_push($item->classes,'drp-forum_kitchen-hover');
	}
	//END To keep current menu with different color for Venues


		// echo '<pre>';print_r($item);
  	  $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink) { //&& $permalink != '#'
      	$output .= '<a href="' . $permalink . '">';
      } 
      // else {
      // 	$output .= '<span>';
      // }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }

      if( $permalink ) {//&& $permalink != '#' 
      	$output .= '</a>';
      } 
      // else {
      // 	$output .= '</span>';
      // }
      return $output;

  }
    
}
//END Home page blog section


//START Home page blog section
add_shortcode( 'homepageblogs', 'display_custom_post_type' );

function display_custom_post_type(){
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '6'
    );

    $string = '';
    $string .= '<section id="blog"><div class="container">';
    $loop = new WP_Query( $args );
    if( $loop->have_posts() ){
        $string .= '<div class="row list-wrapper">';
        while( $loop->have_posts() ){
            $loop->the_post();

     		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

            // $string .= '<li>' . get_the_title() . '</li>';
            $string .= '<a href="'.get_post_permalink().'"><div class="col-sm-6 col-md-4 blog-box">
              <img src="'.$image[0].'">
              <small>'.get_the_category()[0]->cat_name.'</small>
              <p class="b-maintext">'.get_the_title().'</p>
              <span class="b-arrow"><i class="fa fa-arrow-right"></i></span>
           </div></a>';
        }
        $string .= '</div>';

		$string .= '</div></section>';

    	}
		else{
			$string .= '<p>Sorry, there are no posts to display</p>';
		}

    wp_reset_postdata();
    // wp_reset_query();
    return $string;
}
//END Home page blog section



//START For Mobile menu

function wdm_register_mobile_menu() {
add_theme_support( 'nav-menus' );
register_nav_menus( array('mobile-menu' => __( 'Mobile Menu', 'wdm' )) );
}
add_action( 'init', 'wdm_register_mobile_menu' );

// load the JS file
function wdm_mm_toggle_scripts() {
    // wp_enqueue_script( 'wdm-mm-toggle', get_stylesheet_directory_uri() . '/js/mobile-menu-toggle.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'wdm_mm_toggle_scripts' );

//END For Mobile menu


// //START SET main menu css according to design
class IBenic_Walker_MobileMenu extends Walker_Nav_Menu {
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
	$indent = str_repeat( "\t", $depth );
	$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
  }	
    
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
  	// echo '<pre>';print_r($item);
  	$object = $item->object;
	$type = $item->type;
	$title = $item->title;
	$description = $item->description;
	$permalink = $item->url;
	$menu_item_parent = $item->menu_item_parent;

	$add_dropdown_toggle = "";
	$add_arrow_down = "";
	if ( in_array("menu-item-has-children",$item->classes) ) {
		
		array_push($item->classes,'dropdown');
		$add_dropdown_toggle = '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">';
		$add_arrow_down = '<i class="fa fa-arrow-down"></i> <span class="caret"></span>';
	}
	if(in_array("current_page_item",$item->classes) )
	{
		array_push($item->classes,'active');
	}
		
  	  $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
       

      //Add SPAN if no Permalink
      if( $permalink) { //&& $permalink != '#'
      	if($add_dropdown_toggle != "")
      	{
      		$output .= $add_dropdown_toggle;	
      	}
      	else
      	{
      		$output .= '<a href="' . $permalink . '">';
      	}
      } else {
      	$output .= '<span>';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }

      if( $permalink) { //&& $permalink != '#'
      	if($add_arrow_down != "")
      	{
      		$output .= $add_arrow_down."</a>";
      	}
      	else
      	{
      		$output .= '</a>';
      	}
      } else {
      	$output .= '</span>';
      }
      return $output;

  }
    
}
// //END Home page blog section


//START Whats on page venue section
add_shortcode( 'whatonpagevenues', 'display_venue_post_type' );

function display_venue_post_type(){
    $args = array(
        'post_type' => 'event_venue',
        'post_status' => 'publish',
        'orderby' => 'ID', 
        'order' => 'ASC'
    );

    $string = '';
    $string .= '<div class="container" id="our-venues" style=" width: 100%;"><div class="row our_venues-row">';
    $loop = new WP_Query( $args );
    if( $loop->have_posts() ){
    	$i = 1;
        while( $loop->have_posts() ){
        	$string .= '<div class="col-sm ov-box">';
            $loop->the_post();
            if( get_field('whats_on_page_venue_image') ){
				$file = get_field('whats_on_page_venue_image');
				$file_url = $file['url'];
            } 
			

     		// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

            // $string .= '<li>' . get_the_title() . '</li>';
            $string .= '
           	 <div class="ov-'.$i++.'">
              <a href="'.get_post_permalink().'"><img src="'.$file_url.'"></a>
             </div>
             <div class="ov-vm">
	              <a href="'.get_post_permalink().'"><p>VIEW VENUE <span><i class="fa fa-arrow-right"></i></span></p></a>
              </div>
           </div>';
        }
        $string .= '</div></div>';
    }
    // wp_reset_3postdata();
    wp_reset_query();
    return $string;
}
//END Whats on page venue section


//START Contact page
add_shortcode( 'contactpage', 'display_contactpage' );

function display_contactpage(){
    $args = array(
        'post_type' => 'event_venue',
        'post_status' => 'publish',
        'orderby' => 'ID', 
        'order' => 'ASC'
    );

    $string = '';
    $string .= '<section id="our-venues-contact"><div class="container">';
    $loop = new WP_Query( $args );
    if( $loop->have_posts() ){
    	$i = 1;
        while( $loop->have_posts() ){
        	$string .= '<div class="col-sm ov-box">';
            $loop->the_post();
            if( get_field('whats_on_page_venue_image') ){
				$file = get_field('whats_on_page_venue_image');
				$file_url = $file['url'];
            } 
			
            $string .= '
           	 <div class="ov-'.$i++.'">
              <img src="'.$file_url.'">
             </div>
             <div class="ov-vm">
	              <a href="'.get_post_permalink().'"><p>VIEW VENUE <span><i class="fa fa-arrow-right"></i></span></p></a>
              </div>
           </div>';
        }
        $string .= '</div></section>';
    }
    // wp_reset_3postdata();
    wp_reset_query();
    return $string;
}
//END Contact page




if ( ! function_exists('blogwithpagination_shortcode') ) {
    function blogwithpagination_shortcode( $atts ){

        $atts = shortcode_atts( array(
                        'per_page'  =>   6,  
                        'order'     =>  'DESC',
                        'orderby'   =>  'date'
                ), $atts );

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $args = array(
            'post_type'         =>  'post',
            'posts_per_page'    =>  $atts["per_page"], 
            'order'             =>  $atts["order"],
            'orderby'           =>  $atts["orderby"],
            'paged'             =>  $paged
        );

	$query = new WP_Query($args);
	$output .= '<section id="blog"><div class="container">';
    if($query->have_posts()) : $output;

    	$output .= '<div class="row list-wrapper">';
        while ($query->have_posts()) : $query->the_post();
        	 
        	 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 

        	 $output .= '<a href="'.get_post_permalink().'"><div class="col-sm-6 col-md-4 blog-box">
              <img src="'.$image[0].'">
              <small>'.get_the_category()[0]->cat_name.'</small>
              <p class="b-maintext">'.get_the_title().'</p>
              <span class="b-arrow"><i class="fa fa-arrow-right"></i></span>
           </div></a>';    

    	endwhile;
    	$output .= '</div>';

	    global $wp_query;
	    $args_pagi = array(
	    'base' => add_query_arg( 'paged', '%#%' ),
	    'total' => $query->max_num_pages,
	    'current' => $paged
	    );
        $output .= '<div class="post-nav">';
            $output .= paginate_links( $args_pagi);
        $output .= '</div>';

        else:

            $output .= '<p>Sorry, there are no posts to display</p>';

        endif;
        $output .= '</div></section>';

    wp_reset_postdata();

    return $output;
        }
    }

    add_shortcode('blogwithpagination', 'blogwithpagination_shortcode');


    add_shortcode('full_image_path', 'get_full_image_path');
    function get_full_image_path()
    {
    	return get_stylesheet_directory_uri();
    }
       



