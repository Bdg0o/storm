<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 960;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail

    add_image_size('slider-image', 999999, 404, true);
    add_image_size('slider-thumb', 80, 55, true);

    add_image_size('loop-thumb', 235, 135, true);
    add_image_size('image-post', 640, 250, true);

    add_image_size('avatar-image', 98, 98, true);

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if (!is_admin()) {
    
    	wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), '1.9.1'); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!
    	
    	wp_register_script('conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/2.2.0/conditionizr.min.js', array(), '2.2.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!
        
        wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2'); // Custom scripts
        wp_enqueue_script('flexslider'); // Enqueue it!

        wp_register_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '2'); // Custom scripts
        wp_enqueue_script('magnific-popup'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!
    
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.0', 'all');
    wp_enqueue_style('flexslider'); // Enqueue it!

    wp_register_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0', 'all');
    wp_enqueue_style('magnific-popup'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 5;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text'    => '« ',
        'next_text'    => ' »'
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 25;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters 
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function create_post_type_html5()
{
    register_post_type('slider', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Slider', 'slider'), // Rename these to suit
            'singular_name' => __('Image', 'slider'),
            'add_new' => __('Ajouter', 'slider'),
            'add_new_item' => __('Ajouter', 'slider'),
            'edit' => __('Editer', 'slider'),
            'edit_item' => __('Editer l\'image', 'slider'),
            'new_item' => __('Nouvelle image', 'slider'),
            'view' => __('Voir', 'slider'),
            'view_item' => __('Voir l\'image', 'slider'),
            'search_items' => __('Rechercher une image', 'slider'),
            'not_found' => __('Aucune image', 'slider'),
            'not_found_in_trash' => __('Aucune image dans la corbeille', 'slider')
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
    ));
}

/*------------------------------------*\
    Meta Box
\*------------------------------------*/


function be_sample_metaboxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'id' => 'lienSlider',
        'title' => 'Lien du slider',
        'pages' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Url',
                'id' => 'url',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );


// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'lib/metabox/init.php' );
    }
}

/*------------------------------------*\
    Gestion des roles
\*------------------------------------*/

function modify_capabilities() {
    $subscriber_role = get_role('subscriber');
    add_role('membre', 'Membre', $subscriber_role->capabilities);
}
add_action('init','modify_capabilities');

/* Ajout des metas pour les utilisateurs */

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Informations complémentaires</h3>

    <table class="form-table">

        <tr>
            <th><label for="twitter">Joue à</label></th>

            <td>
                <!-- <input type="text" name="joue" id="joue" value="<?php echo esc_attr( get_the_author_meta( 'joue', $user->ID ) ); ?>" class="regular-text" /><br /> -->
            
                <select name="joue" id="joue">
                    <option value="">Rien actuellement</option>
                    <?php $liste = get_categories( array( 'orderby' => 'name', 'child_of' => 18, 'hide_empty' => 0 )); 
                    foreach($liste as $jeu)
                    {
                        echo '<option value="'. $jeu->term_id .'"';
                        if(get_the_author_meta( 'joue', $user->ID ) == $jeu->term_id)
                            echo ' selected="selected"';
                        echo '>'. $jeu->name .'</option>';
                    }
                    ?> 
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Age</label></th>

            <td>
                <input type="text" name="age" id="age" value="<?php echo esc_attr( get_the_author_meta( 'age', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Nationalité</label></th>

            <td>
                <input type="text" name="nationalite" id="nationalite" value="<?php echo esc_attr( get_the_author_meta( 'nationalite', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>

    </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_usermeta( $user_id, 'joue', $_POST['joue'] );
    update_usermeta( $user_id, 'age', $_POST['age'] );
    update_usermeta( $user_id, 'nationalite', $_POST['nationalite'] );
}




/************** AJOUTE POUR STORM *****************/

function the_breadcrumbs() {
 
        global $post;
        
        if (!is_home()) {
            echo '<div class="filAriane">';
            echo "<a href='";
            echo get_option('home');
            echo "'>";
            echo "Accueil";
            echo "</a>";
 
            if (is_category() || is_single()) {
 
                echo " > ";
                $cats = get_the_category( $post->ID );
 
                foreach ( $cats as $cat ){
                    echo $cat->cat_name;
                    echo " > ";
                }
                if (is_single()) {
                    the_title();
                }
            } elseif (is_page()) {
 
                if($post->post_parent){
                    $anc = get_post_ancestors( $post->ID );
                    $anc_link = get_page_link( $post->post_parent );
 
                    foreach ( $anc as $ancestor ) {
                        $output = " > <a href=".$anc_link.">".get_the_title($ancestor)."</a> > ";
                    }
 
                    echo $output;
                    the_title();
 
                } else {
                    echo ' > ';
                    echo the_title();
                }
            }
            echo '</div>';
        }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"Archive: "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"Archive: "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"Archive: "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"Author's archive: "; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blogarchive: "; echo'';}
    elseif (is_search()) {echo"Search results: "; }
}

/* Ajout de Maxime */

	// Custom du preview des articles
	function custom_excerpt_length( $length ) {
	return 32;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* Loop membre */

function loopMembre($user, $role)
{
   echo '<div class="membre-infos">
             '. get_avatar( $user->ID, 'avatar-image') .'
        <div class="infos">
            <div class="name">
                <span class="membre-name">'. $user->display_name .'</span>
                <span class="membre-rank"> ('. $role .')</span>
                <div class="ligne-membre"></div>
            </div>';
            if(get_the_author_meta( 'joue', $user->ID ))
            {
                $jeu = get_category( get_the_author_meta( 'joue', $user->ID ), false );
                echo '<div class="game">
                Joue à : <a href="'. get_category_link($jeu->cat_ID) .'" class="color-membre">'. $jeu->cat_name .'</a>
                </div>';
            }
            if(get_the_author_meta( 'age', $user->ID ))
                echo '<div class="age">
                Age : <span class="color-membre">'. get_the_author_meta( 'age', $user->ID ) .'</span>
            </div>';
            if(get_the_author_meta( 'nationalite', $user->ID ))
                echo '<div class="nationalite">
                Nationalité : <span class="color-membre">'. get_the_author_meta( 'nationalite', $user->ID ) .'</span>
            </div>';
          
     echo ' </div>
    </div>';

}
?>
