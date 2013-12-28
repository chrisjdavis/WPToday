<?php
/**
* AMERCA TODAY functions
*
* Sets up the theme and provides some helper functions, which are used in the theme.
* @package AMERCA
* @since AMERCA 1.0
*/
class USACore
{
	public function _usa_init() {
		if ( function_exists('register_post_type') ) {
			// register_post_type( 'news',
			// 	array(
			// 		'labels' => array(
			// 			'name' => __( 'News' ),
			// 			'singular_name' => __( 'News' ),
			// 			'description' => 'Foo',
			// 		),
			// 		'public' => true,
			// 		'has_archive' => true,
			// 		'supports' => array( 'title', 'editor', 'excerpt', 'comments' ),
			// 		'taxonomies' => array( 'post_tag', 'category '),
			// 	)
			// );
		}
		
		// register_taxonomy_for_object_type( 'category', 'news' );
	}
		
	public function _scripts_styles() {
		// Loads our main stylesheet.
		wp_enqueue_style( 'oha-style', get_stylesheet_uri(), array(), '2013-09-25' );
		wp_enqueue_style( 'oha-mini-style', get_template_directory_uri() . '/css/minisite.css', array(), '2013-09-25' );
	}
	
	public function _get_post_views( $postID ){
		$count_key = 'post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		
		if( $count=='' ) {
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 ".__('Views', 'USA');
		}
		
		return $count.' '.__('Views', 'USA');
	}

	public function _set_post_views( $postID ) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		
		if($count=='') {
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}

	public function _posts_column_views( $defaults ) {
		$defaults['post_views'] = __('Views', 'USA');
		return $defaults;
	}

	/**
	 * limit function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $string
	 * @param mixed $limit
	 * @param string $break. (default: ".")
	 * @param string $pad. (default: "...")
	 * @return void
	 */
	public function _limit_words($string, $limit, $break = ".", $pad = "...") {
		$string = strip_tags($string);
		
		if( strlen($string) <= $limit ) {
			return $string;
		}
		
		if( false !== ($breakpoint = strpos($string, $break, $limit)) ) {
    		if( $breakpoint < strlen($string) - 1 ) {
				$string = substr($string, 0, $breakpoint) . $pad;
    		}
  		}
  		
		return $string;
	}
	
	public static function _list_cats($id) {
		$separator = ' ';
		$output = '<small class="cats">';
		$cats = get_the_category( $id );
			
		if( $cats ) {
			foreach( $cats as $category ) {
				$output .= '<a id="section-' . $category->slug .'" class="related_link" data-url="' . get_category_link( $category->term_id ) . '" href="#" data-title="' . $category->category_description . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
			}
			
			$output .= '</small>';
			
			echo trim($output, $separator);
		}
	}
	
	public static function _cat_urls() {
		$cats = get_categories(array('hide_empty' => 0));
		$links = array();
		
		foreach( $cats as $cat ) {
			$links[] = '"' . get_category_link( $cat->term_id ) . '"';
		}
		
		return implode( ',', $links );
	}
	
	public static function _find_title($url) {
		$slug = explode( '/', $_SERVER['REQUEST_URI'] );
		$slug = array_unique( $slug );
		$slug = array_pop( $slug );

		$cat = get_category_by_slug( $slug );
		
		if( $cat ) {	
			return $cat->category_description ? $cat->category_description : '';
		} else {
			$args = array(
				'name' => $slug,
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 1
			);
			
			$post = get_posts( $args );
			
			if($post) {
				return $post[0]->post_title ? $post[0]->post_title : '';
			}
		}
	}
}

add_filter( 'manage_posts_columns', array('USACore', '_posts_column_views') );

add_action( 'init', array('USACore', '_usa_init') );
add_action( 'wp_enqueue_scripts', array('USACore', '_scripts_styles') );
add_action( 'manage_posts_custom_column', array('USACore', '_posts_custom_column_views', 5, 2) );

add_theme_support( 'post-thumbnails' );
