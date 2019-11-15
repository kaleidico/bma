<?php
/**
 * Enqueue scripts and styles.
 */
function bma_scripts() {
    //--Styles
    wp_enqueue_style( 'bma-style', get_stylesheet_directory_uri() );

    //--Scripts
    wp_enqueue_script( 'matchheightjs', '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), false, true );
    wp_enqueue_script( 'bma-core', get_stylesheet_directory_uri() . '/js/core.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'bma_scripts' );

/** ACF Theme Options **/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
    ));
}

/* Add Menus */
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
    register_nav_menu( 'footer', __( 'Footer', 'bma' ) );
}


/** REGISTER WIDGETS **/
function wp_amrock_register_sidebars() {
    register_sidebar(array(
        'id' => 'footer-col-1',
        'name' => 'Footer Column 1',
        'before_widget' => '<div class="footer-col footer-col-1">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'id' => 'footer-col-2',
        'name' => 'Footer Column 2',
        'before_widget' => '<div class="footer-col footer-col-2">',
        'after_widget' => '</div>',
    ));
}
add_action( 'widgets_init', 'wp_amrock_register_sidebars' );

// filter the Gravity Forms button type
add_filter("gform_submit_button_1", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fab fa-telegram-plane'></i></span></button>";
}
add_filter("gform_submit_button_3", "form_submit_button3", 10, 2);
function form_submit_button3($button, $form){
    return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fab fa-telegram-plane'></i></span></button>";
}

/**
 *  Custom Post Type for Lean Exprts
 */
add_action( 'init', 'lean_experts_cpt' );

function lean_experts_cpt() {
    register_post_type( 'lean_experts', array(
        'labels' => array(
            'name' => 'Lean Experts',
            'singular_name' => 'Lean Expert',
            'menu_name' => 'Lean Experts'
        ),
        'description' => 'Lean Experts',
        'public' => true,
        'menu_position' => 6,
        'has_archive' => true,
        'supports' => array( 'thumbnail', 'title', 'editor' )
    ));
}

/**
 *  Custom Post Type for Events
 */
add_action( 'init', 'events_cpt' );

function events_cpt() {
    register_post_type( 'bma_events', array(
        'labels' => array(
            'name' => 'BMA Events',
            'singular_name' => 'BMA Event',
            'menu_name' => 'BMA Events'
        ),
        'description' => 'BMA Events',
        'public' => true,
        'menu_position' => 6,
        'has_archive' => true,
        'supports' => array( 'thumbnail', 'title', 'editor' )
    ));
}


function get_category_posts_tags() {

$postsStr = "";
$tagsStr = "";
$tagArray = array();

if ( $_POST["category_ids"]!="" ) {	

		$custom_query = new WP_Query( 
		array( 
			'cat' =>  explode("," , $_POST["category_ids"]),
			'posts_per_page' => -1			
		  ) 
		);
		
		if ($custom_query->have_posts()) :
		while ($custom_query->have_posts()) : $custom_query->the_post();
			$posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					$all_tags[] = $tag->term_id;
				}
			}
		endwhile;
		wp_reset_postdata();
		endif; 
		
		$tags_arr = $all_tags_arr = array_unique($all_tags);
		$tags_str = implode(",", $tags_arr);
		
	if ( $_POST["exclude_tag_ids"] != "" )
	{
		$exclude_tags_arr = explode("," , $_POST["exclude_tag_ids"]); //array($_POST["tag_ids"]);
		$tags_arr = array_diff($tags_arr, $exclude_tags_arr);
		$tags_str = implode(",", $tags_arr);
	}


if(count($tags_arr) == 0) $tags_arr = array(-1);
	
$args = array( 'posts_per_page' => -1, 'category' => explode("," , $_POST["category_ids"]), 'tag__in' => $tags_arr );
$myposts = get_posts( $args );

$postTitles = "";
foreach ( $myposts as $post ) : setup_postdata( $post ); 

	$postUrl = get_permalink($post->ID);
	$postImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID));	
	
	$postsStr .= '<div class="col-xs-12 col-sm-6 col-md-4 post_item" ><div class="post_img" ><a href="'. $postUrl .'"  ><img src="'. $postImage .'" class="img-fluid" /></a></div><h2 class="post_name" >'.$post->post_title.'</h2></div>';
	
	$postTitles .= $post->post_title;
					
endforeach;

wp_reset_postdata();
	
$tagArray = get_tags(array('include' => implode(",", $all_tags_arr)));

if ( count($tagArray)>0 )
	
	foreach($tagArray as $tagValue) {
		$tagsStr .= '<label class="btn btn-categorytags"><input name="leancategorytags" class="form-control leancategorytags" type="checkbox" value="'.$tagValue->term_id.'" ><i class="fa fa-circle"></i>'.$tagValue->name.'</label>';
	}
}

$postData = array("posts"=>$postsStr,"tags"=>$tagsStr,"cat_ids"=>$_POST["category_ids"],"tag_ids"=>$tags_str );
echo json_encode($postData);
die(); 

}

add_action('wp_ajax_get_category_posts_tags', 'get_category_posts_tags');
add_action('wp_ajax_nopriv_get_category_posts_tags', 'get_category_posts_tags');

// NUMERIC PAGINATION FOR BLOG
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<nav aria-label=\"...\"><ul class=\"pagination\"><!--span>Page ".$paged." of ".$pages."</span-->";
         echo "";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"page-item active\"><span class=\"page-link\">".$i."</span></li>":"<li class=\"page-item\"><a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class=\"page-link\" href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a class=\"page-link\" href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
         echo "</ul></nav>\n";
     }
}
add_action( 'pre_get_posts' ,'wp_query_post_type_bma_event', 1, 1 );
function wp_query_post_type_bma_event( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'bma_events' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 2 );
    }
}