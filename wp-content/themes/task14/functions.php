<?php 
    /*
	* top page website
	*/
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Top page website',
            'menu_title'    => 'Top page website',
            'menu_slug'     => 'Top_page-theme-settings',
            'capability'    => 'edit_posts',
            'redirect'  => false
        ));
    }

	/*
	* setup post thumbnail
	*/
	if(!function_exists('agl_theme_setup'))
	{
		function agl_theme_setup()
		{
			add_theme_support('automatic-feed-links');
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'post-formats', array(
				'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
			) );
		}
		add_action('init','agl_theme_setup');
	}

	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	/*
	* pagination
	*/
	function pagination_bar($custom_query = null, $paged = null) {
		global $wp_query;
		if($custom_query) $main_query = $custom_query;
		else $main_query = $wp_query;
		$big = 999999999;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'prev_text'    => ' ',
			'next_text'    => ' ',
			'current' => max( 1, $paged),
			'prev_next'    => True,
			'total' => $total
		) );
	}

		/*
	* breadcrumb
	*/
	function dimox_breadcrumbs() {
		$delimiter = '';
		$home = 'Home'; // chữ thay thế cho phần 'Home' link
		$before = '<span class="current">'; // thẻ html đằng trước mỗi link
		$after = '</span>'; // thẻ đằng sau mỗi link
		if ( !is_home() && !is_front_page() || is_paged() ) {
			echo '<div id="crumbs">';
			global $post;
			$homeLink = get_bloginfo('url');
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				// get category cha
				// if ($thisCat->parent != 0 ) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
				
				echo $before . single_cat_title('', false) . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					if ($post_type->labels->singular_name === 'publish')
					{
						$post_type->labels->singular_name = '出版物';
					}
					if ($post_type->labels->singular_name === 'services')
					{
						$post_type->labels->singular_name = 'サービス';
					}
					if ($post_type->labels->singular_name === 'news')
					{
						$post_type->labels->singular_name = 'ニュース・お知らせ';
					}
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					echo $before . get_the_title() . $after;
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				if ($post_type->labels->singular_name === 'news')
				{
					$post_type->labels->singular_name = 'ニュース・お知らせ';
				}
				if ($post_type->labels->singular_name === 'publish')
				{
					$post_type->labels->singular_name = '出版物';
				}
				if ($post_type->labels->singular_name === 'services')
				{
					$post_type->labels->singular_name = 'サービス';
				}
				
				echo $before . $post_type->labels->singular_name . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} elseif ( is_page() && !$post->post_parent ) {
				echo $before . get_the_title() . $after;
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} elseif ( is_search() ) {
				echo $before . 'Search results for "' . get_search_query() . '"' . $after;
			} elseif ( is_tag() ) {
				echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
			} elseif ( is_author() ) {
				global $author;
				echo $before . 'Articles posted by ' . $userdata->display_name . $after;
			} elseif ( is_404() ) {
				echo $before . 'Error 404' . $after;
			}
			// if ( get_query_var('paged') ) {
			//     if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			//     echo __('Page') . ' ' . get_query_var('paged');
			//     if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			// }
			echo '</div>';
		}
	}

	/*
	* custom_post_type Publish
	*/
	if(!function_exists('create_custom_post_type'))
	{
		function create_custom_post_type() {
			/* 
			*Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin 
			*/
			$labels = array(
				'name'          => 'Publishs', //Tên post type dạng số nhiều
				'singular_name' => 'publish'   //Tên post type dạng số ít
			);
		
			/* 
			*Các tính năng được hỗ trợ trong post type
			*/
			$supports = array(
				'title',        // Post title
				'editor',       // Post content
				'excerpt',      // Allows short description
				'author',       // Allows showing and choosing author
				'thumbnail',    // Allows feature images
				'comments',     // Enables comments
				'trackbacks',   // Supports trackbacks
				'revisions',    // Shows autosaved version of the posts
				'custom-fields' // Supports by custom fields
			);
		
			/*
			* Biến $args là những tham số quan trọng trong Post Type
			*/
			$args = array(
				'labels'              => $labels,
				'description'         => 'Post type post product', // Description
				'supports'            => $supports,

				// mở category -> publish ở đây không dùng nên đóng lại
				// 'taxonomies'          => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
				
				'hierarchical'        => false, // Cho phép phân loại theo thứ bậc, nếu được đặt thành false, Custom Post tùy chỉnh sẽ hoạt động giống như Post, nếu không, nó sẽ hoạt động giống như Page
				'public'              => true,  // Đặt loại bài đăng ở chế độ công khai
				'show_ui'             => true,  // Hiển thị giao diện cho loại bài đăng này
				'show_in_menu'        => true,  // Hiển thị trong Menu Quản trị (bảng điều khiển bên trái)
				'show_in_nav_menus'   => true,  // Hiển thị trong Appearance -> Menus
				'show_in_admin_bar'   => true,  // Hiển thị trong thanh admin màu đen
				'menu_position'       => 5,     // Thứ tự vị trí hiển thị trong menu (tay trái)
				'menu_icon'           => true,  // Đường dẫn tới icon sẽ hiển thị
				'can_export'          => true,  // Có thể export nội dung bằng Tools -> Export
				'has_archive'         => true,  // Cho phép lưu trữ (month, date, year)
				'exclude_from_search' => false, // Loại bỏ khỏi kết quả tìm kiếm
				'publicly_queryable'  => true,  // Hiển thị các tham số trong query, phải đặt true
				'capability_type'     => 'post' // Allows read, edit, delete like “Post”
			);
		
			register_post_type('publish', $args); //Tạo post type với slug tên là publish và các tham số trong biến $args ở trên
		}
		/* Kích hoạt hàm tạo custom post type */
		add_action('init', 'create_custom_post_type');
	}

	/*
	* custom_post_type Services
	*/
	if(!function_exists('create_service_custom_post_type'))
	{
		function create_service_custom_post_type() {
			/*
			 * The $labels describes how the post type appears.
			 */
			$labels = array(
				'name'          => 'Services', // Plural name
				'singular_name' => 'services'   // Singular name
			);
		
			/*
			 * The $supports parameter describes what the post type supports
			 */
			$supports = array(
				'title',        // Post title
				'editor',       // Post content
				'excerpt',      // Allows short description
				'author',       // Allows showing and choosing author
				'thumbnail',    // Allows feature images
				'comments',     // Enables comments
				'trackbacks',   // Supports trackbacks
				'revisions',    // Shows autosaved version of the posts
				'custom-fields' // Supports by custom fields
			);
		
			/*
			 * The $args parameter holds important parameters for the custom post type
			 */
			$args = array(
				'labels'              => $labels,
				'description'         => 'Post type post product', // Description
				'supports'            => $supports,
				'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
				'public'              => true,  // Makes the post type public
				'show_ui'             => true,  // Displays an interface for this post type
				'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
				'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
				'show_in_admin_bar'   => true,  // Displays in the black admin bar
				'menu_position'       => 5,     // The position number in the left menu
				'menu_icon'           => true,  // The URL for the icon used for this post type
				'can_export'          => true,  // Allows content export using Tools -> Export
				'has_archive'         => true,  // Enables post type archive (by month, date, or year)
				'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
				'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
				'capability_type'     => 'post', // Allows read, edit, delete like “Post”
				'show_in_rest' => true,
				'label'        => 'services',
			);
		
			register_post_type('services', $args); //Create a post type with the slug is ‘product’ and arguments in $args.
		}
		add_action('init', 'create_service_custom_post_type');
		
		add_action('rest_api_init', 'register_rest_images' );
		function register_rest_images(){
			register_rest_field( array('services'),
				'fimg_url',
				array(
					'get_callback'    => 'get_rest_featured_image',
					'update_callback' => null,
					'schema'          => null,
				)
			);
		}
		
		function get_rest_featured_image( $object, $field_name, $request ) {
			if( $object['featured_media'] ){
				$img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
				return $img[0];
			}
			return false;
		}
	}

	/*
	* Create Services Taxonomy
	*/
	function create_services_taxonomy() {
		/* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
		$labels = array(
			'name' => 'Services Category',
			'singular' => 'Services Category',
			'menu_name' => 'Services Category',
		);
	
		/* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest' 				 => true,
		);

		/* Hàm register_taxonomy để khởi tạo taxonomy */
		register_taxonomy('services-products', 'services', $args);
	}
	// Hook into the 'init' action
	add_action( 'init', 'create_services_taxonomy', 0 );
?>