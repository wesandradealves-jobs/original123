<?php 

	@ini_set( 'upload_max_size' , '64M' );

	@ini_set( 'post_max_size', '64M');

	@ini_set( 'max_execution_time', '300' );

	

    function is_login_page() {

        return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));

    }

    function title_filter( $where, $wp_query ){
         global $wpdb;
         if( $search_term = $wp_query->get( 'title_filter' ) ) :
         $search_term = $wpdb->esc_like( $search_term );
         $search_term = ' \'%' . $search_term . '%\'';
         $title_filter_relation = ( strtoupper( $wp_query->get( 'title_filter_relation' ) ) == 'OR' ? 'OR' : 'AND' );
         $where .= ' '.$title_filter_relation.' ' . $wpdb->posts . '.post_title LIKE ' . $search_term;
         endif;
         return $where;
    }

    // if (!is_admin()) {
    //     function wpb_search_filter($query) {
    //         if ($query->is_search) {
    //             $query->set('post_type', 'post');
    //         }
    //         return $query;
    //     }
    //     add_filter('pre_get_posts','wpb_search_filter');
    // }


    add_filter('query_vars', 'add_my_var');

    function add_my_var($public_query_vars) {

        $public_query_vars[] = 'paged';

        return $public_query_vars;

    }



    function cpt() {

        register_post_type('fontes_juridicas', array(

            'labels' => array(

                'name' => _x('Fontes Jurídicas', 'post type general name'),

                'singular_name' => _x('Fontes Jurídicas', 'post type singular name'),

                'add_new' => _x('Novo', 'Fontes Jurídicas'),

                'add_new_item' => __('Novo Fontes Jurídicas'),

                'edit_item' => __('Editar Fontes Jurídicas'),

                'new_item' => __('Novo Fontes Jurídicas'),

                'view_item' => __('Ver Fontes Jurídicas'),

                'search_items' => __('Buscar Fontes Jurídicas'),

                'not_found' =>  __('Nada encontrado'),

                'not_found_in_trash' => __('Nada encontrado'),

                'parent_item_colon' => ''

            ),

            'exclude_from_search' => true, // the important line here!

            'public' => true,

            'publicly_queryable' => true,

            'show_ui' => true,

            'query_var' => true,

            'rewrite' => true,

            'show_in_nav_menus' => true,

            'capability_type' => 'post',

            'hierarchical' => false,

            'menu_position' => -1,

            'supports' => array('title', 'editor', 'excerpt', 'thumbnail')

        ));  

    }     

       

    cpt();



	if ( ! function_exists( 'the_widgets_init' ) ) {

		function the_widgets_init() {

			if ( ! function_exists( 'register_sidebars' ) )

            return;

			register_sidebar(              

				array(

					'id'            => 'sidebar',

					'name'          => __( 'Sidebar' ),

					'before_widget' => '<div id="%1$s" class="widget %2$s">',

					'after_widget'  => '</div>',

					'before_title'  => '<div class="title-header"><h4 class="section-title"><strong>',

					'after_title'   => '</strong></h4></div>',

			));

		} // End the_widgets_init()

	}    



	function regScripts() {

        wp_deregister_script('jquery');

        wp_enqueue_script('vendors', get_template_directory_uri()."/assets/js/vendors.js",'',12.5, false);

        wp_enqueue_script('commons', get_template_directory_uri()."/assets/js/commons.js",'',12.6, false);

        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array(), 12.6, 'all');

	}



    // Limpeza de Painel



    function remove_menus(){

        global $post;

        remove_menu_page( 'index.php' );                  //Dashboard

        remove_menu_page( 'jetpack' );                    //Jetpack*

        // remove_menu_page( 'edit.php' );                   //Posts

        // remove_menu_page( 'upload.php' );                 //Media

        // remove_menu_page( 'edit.php?post_type=page' );    //Pages

        remove_menu_page( 'edit-comments.php' );          //Comments

        //remove_menu_page( 'themes.php' );                 //Appearance

        remove_menu_page( 'plugins.php' );                //Plugins

        // remove_menu_page( 'users.php' );                  //Users

        // remove_menu_page( 'tools.php' );                  //Tools

        // remove_menu_page( 'options-general.php' );        //Settings

    }   

    

    function wp_before_admin_bar_render() {

        echo '

            <style type="text/css">

                #menu-appearance ul.wp-submenu.wp-submenu-wrap li:not(.wp-submenu-head):not(.hide-if-no-customize),

                #wp-admin-bar-comments,

                #wp-admin-bar-new-content,

                #wp-admin-bar-updates,

                .wp_welcome_panel-hide,

                #wp-admin-bar-wp-logo,

                #wpfooter,

                #footer-upgrade,

                #welcome-panel{

                    display: none !important;

                }

            </style>

        ';

    }

    

    add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

    

    remove_action('welcome_panel', 'wp_welcome_panel');    

    

    // add_filter('acf/settings/show_admin', '__return_false');

    

    add_action('wp_before_admin_bar_render', 'wp_before_admin_bar_render');

    

    function disable_default_dashboard_widgets() {



        remove_meta_box('dashboard_right_now', 'dashboard', 'core');

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');

        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');

        remove_meta_box('dashboard_plugins', 'dashboard', 'core');

    

        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');

        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');

        remove_meta_box('dashboard_primary', 'dashboard', 'core');

        remove_meta_box('dashboard_secondary', 'dashboard', 'core');

    }

    add_action('admin_menu', 'disable_default_dashboard_widgets');

    

    if( function_exists('acf_add_local_field_group') ):

    
        acf_add_local_field_group(array(
            'key' => 'group_5c884d9a34bb1',
            'title' => 'Fontes Jurídicas',
            'fields' => array(
                array(
                    'key' => 'field_5c884da02a4e0',
                    'label' => 'Telefone',
                    'name' => 'telefone',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5c884dd55eec4',
                    'label' => 'E-mail',
                    'name' => 'email',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5c9d30b3276a8',
                    'label' => 'Veiculo',
                    'name' => 'veiculo',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'fontes_juridicas',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            'key' => 'group_5c9d15c5a6399',
            'title' => 'Guia de Fontes Jurídicas',
            'fields' => array(
                array(
                    'key' => 'field_5c9d15d104112',
                    'label' => '',
                    'name' => 'guia_de_fontes_juridicas',
                    'type' => 'group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5c9d15dc04113',
                            'label' => 'Rótulo  da Sessão',
                            'name' => 'rotulo__da_sessao',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c9d194c9eb39',
                            'label' => 'Thumbnail',
                            'name' => 'thumbnail',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'large',
                            'library' => 'uploadedTo',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_5c9d15ee04114',
                            'label' => 'Arquivo pra Download',
                            'name' => 'arquivo_pra_download',
                            'type' => 'file',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'library' => 'uploadedTo',
                            'min_size' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-templates/guia-de-fontes-juridicas.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'discussion',
                3 => 'comments',
                4 => 'revisions',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
            'active' => 1,
            'description' => '',
        ));


    acf_add_local_field_group(array(

        'key' => 'group_5c8cea882a553',

        'title' => 'Paginas',

        'fields' => false,

        'location' => array(

            array(

                array(

                    'param' => 'post_type',

                    'operator' => '==',

                    'value' => 'page',

                ),

            ),

        ),

        'menu_order' => 0,

        'position' => 'side',

        'style' => 'seamless',

        'label_placement' => 'top',

        'instruction_placement' => 'label',

        'hide_on_screen' => array(

            0 => 'discussion',

            1 => 'comments',

            2 => 'revisions',

            3 => 'slug',

            4 => 'author',

            5 => 'format',

            6 => 'tags',

            7 => 'send-trackbacks',

        ),

        'active' => 1,

        'description' => '',

    ));

    

    endif;

    

    // 	

	

    function query_post_type($query) {

        if(is_category() || is_tag()) {

        $post_type = get_query_var('post_type');

        if($post_type)

        $post_type = $post_type;

        else

        $post_type = array('nav_menu_item','post','articles');

        $query->set('post_type',$post_type);

        return $query;

        }

	}

	

    function remove_customizer_settings( $wp_customize ){

        $wp_customize->remove_section('static_front_page');

	}

	

    function get_custom_field_data($key, $echo = false) {

		$value = get_post_meta($post->ID, $key, true);

		if($echo == false) {

		return $value;

		} else {

		echo $value;

		}

	}

	

    function hide_admin_bar() {

		wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');

		return false;

	}

	

    function menu() {

        register_nav_menus(

        array(

            'header' => __( 'Header' ),

        // 'copyright' => __( 'Copyright' )

        )

        );

	}	

	

    function cc_mime_types($mimes) {

		$mimes['svg'] = 'image/svg+xml';

		return $mimes;

	}	

	

	function df_terms_clauses($clauses, $taxonomy, $args) {

        if (!empty($args['post_type'])) {

        global $wpdb;

        $post_types = array();

        foreach($args['post_type'] as $cpt) {

        $post_types[] = "'".$cpt."'";

        }

        if(!empty($post_types)) {

        $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';

        $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';

        $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';

        $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];

        }

        }

        return $clauses;

	}

	

    function sanitize( $input, $setting ) {

        global $wp_customize;

    

        $control = $wp_customize->get_control( $setting->id );

    

        if ( array_key_exists( $input, $control->choices ) ) {

            return $input;

        } else {

            return $setting->default;

        }

	}

	

    function mytheme_remove_help_tabs($old_help, $screen_id, $screen){

        $screen->remove_help_tabs();

        return $old_help;

	}



    function customizer( $wp_customize ) {

            $wp_customize->add_panel( 'customization', array(

                'priority'       => 2,

                'title'          => __('Customização')

            ));    



            // Header

            $wp_customize->add_section( 'contato' , array(

            'title'       => __( 'Contato' ),

            'panel' => 'customization',

            'priority'    => 3

            )); 

            $wp_customize->add_setting( 'maps' );

            $wp_customize->add_control('maps',  array(

                'label' => 'Maps',

                'section' => 'contato',

                'type' => 'textarea',

                'settings' => 'maps'

            ));  

            $wp_customize->add_setting( 'endereco' );

            $wp_customize->add_control('endereco',  array(

                'label' => 'Endereço',

                'section' => 'contato',

                'type' => 'textarea',

                'settings' => 'endereco'

            )); 

            $wp_customize->add_setting( 'email' );

            $wp_customize->add_control('email',  array(

                'label' => 'E-mail',

                'section' => 'contato',

                'type' => 'email',

                'settings' => 'email'

            ));

            $wp_customize->add_setting( 'telefone' );

            $wp_customize->add_control('telefone',  array(

                'label' => 'Telefone',

                'section' => 'contato',

                'type' => 'tel',

                'settings' => 'telefone'

            ));

            // Header

            $wp_customize->add_section( 'header' , array(

            'title'       => __( 'Header' ),

            'panel' => 'customization',

            'priority'    => 1

            ));           

            $wp_customize->add_setting( 'logo' );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(

            'label'    => __( 'Logo' ),

            'section'  => 'header',

            'settings' => 'logo'

            )));        

            // Social Networks

            $wp_customize->add_section( 'social_networks' , array(

            'title'       => __( 'Social Networks' ),

            'panel' => 'customization',

            'priority'    => 0

            ));    

            $wp_customize->add_setting( 'facebook' );

            $wp_customize->add_control('facebook',  array(

                'label' => 'Facebook',

                'section' => 'social_networks',

                'type' => 'url',

                'settings' => 'facebook'

            ));   

            $wp_customize->add_setting( 'twitter' );

            $wp_customize->add_control('twitter',  array(

                'label' => 'Twitter',

                'section' => 'social_networks',

                'type' => 'url',

                'settings' => 'twitter'

            ));      

            $wp_customize->add_setting( 'linkedin' );

            $wp_customize->add_control('linkedin',  array(

                'label' => 'Linkedin',

                'section' => 'social_networks',

                'type' => 'url',

                'settings' => 'linkedin'

            ));   

            $wp_customize->add_setting( 'youtube' );

            $wp_customize->add_control('youtube',  array(

                'label' => 'Youtube',

                'section' => 'social_networks',

                'type' => 'url',

                'settings' => 'youtube'

            ));                             

    }	



    function count_post_visits() {

     if( is_single() ) {

     global $post;

     $views = get_post_meta( $post->ID, 'my_post_viewed', true );

     if( $views == '' ) {

     update_post_meta( $post->ID, 'my_post_viewed', '1' ); 

     } else {

     $views_no = intval( $views );

     update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );

     }

     }

    }



    if (is_admin()) {

        if ( $current_user->roles[0] == 'subscriber') {

            $subdomain = str_replace('user_', '', $current_user->roles[0]);

            $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

            $url = str_replace($protocol, '', network_site_url());

            // wp_redirect($protocol.$subdomain.'.'.$url, 301);

            wp_redirect(get_page_link(get_page_by_path('guia-de-fontes-juridicas')), 301);

            exit;

        }

    }  



    function remove_thumbnail_support(){

        remove_post_type_support('page','comments');

        remove_post_type_support('page','revisions');

        remove_post_type_support('post','comments');

        remove_post_type_support('post','revisions');

    }

    

    add_action('init','remove_thumbnail_support');

	add_theme_support( 'post-thumbnails' );

    add_post_type_support( 'page', 'excerpt' );

    add_action( 'wp_head', 'count_post_visits' );

	add_action( 'init', 'menu' );

	add_action( 'init', 'the_widgets_init' );

	add_action( 'admin_menu', 'remove_menus' );

	add_action( 'wp_enqueue_scripts', 'regScripts' );

	add_filter( 'show_admin_bar', 'hide_admin_bar' );

	add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );

	add_action( 'customize_register', 'remove_customizer_settings', 20 );

	add_action( 'customize_register', 'customizer' );

	// add_filter('screen_options_show_screen', '__return_false'); 	

	add_filter('terms_clauses', 'df_terms_clauses', 10, 3);

	add_filter('upload_mimes', 'cc_mime_types');

    add_filter('pre_get_posts', 'query_post_type');