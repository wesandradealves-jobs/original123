<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
  <head>
    <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title').' - '.get_bloginfo('description')); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_meta(); ?>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php
    wp_head();
    global $post;
    $menu = wp_get_nav_menu_items('header');
    $current_user = wp_get_current_user();
    include('inc/_util.php');
    ?>
  </head>
  <body
    <?php
    if (is_front_page()) {
    echo 'class="pg-home"';
    } else if(is_author()){
    echo 'class="pg-author pg-profile pg-interna"';
    } else if(is_archive()){
    echo 'class="pg-archive pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_category()){
    echo 'class="pg-category pg-interna pg-'.get_queried_object()->slug.'"';
    } else if(is_search()){
    echo 'class="pg-search pg-interna"';
    } else if(is_single()){
    echo 'class="pg-single pg-interna"';
    } else if(is_404()){
    echo 'class="pg-404 pg-interna"';
    } else {
    echo 'class="pg-interna pg-'.str_replace(' ','-',strToLower(get_the_title())).' page_id_'.$post->ID.'"';
    }
    ?>>
    <div id="wrap">
      <?php if($menu) : ?>
      <nav class="menu">
        <div>
          <a href="javascript:void(0)" onclick="closeMenu()">
            <i class="fal fa-close"></i>
            <span>Fechar</span>
          </a>
          <ul>
            <?php
            foreach (wp_get_nav_menu_items('header') as $key => $value) :
              if($value->title == 'Guia de Fontes Jurídicas' && !is_user_logged_in()){
                if($value->title != 'Guia de Fontes Jurídicas'){
                  echo '<li><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a></li>';
                }
              } else {
                  echo '<li><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a></li>';
              }
            endforeach;
            ?>
          </ul>
          <?php if(!is_front_page()) : ?>
            <script>
              $(document).ready(function () {
                $( ".menu ul li a" ).each(function() {
                  if($( this ).attr('href').indexOf('#') > -1){
                    $( this ).click(function(event) {
                      var url = $( this ).children('a').attr('href'),
                          siteUrl = '<?php echo home_url(); ?>',        
                          url_montada = 'http://' + siteUrl.replace('http://','') + '/#' + url.split('#')[1];   

                          window.location = url_montada;           
                      event.preventDefault();
                    });                       
                  }
                });
              });
            </script>
          <?php endif; ?>
        </div>
      </nav>
      <?php endif; ?>
      <?php if($current_user->ID) : ?>
      <div class="topbar">
        <div class="container">
          <p>
            Você está logado como: <b><?php print_r($current_user->user_login); ?></b> (<?php echo ($current_user->roles[0]=='administrator') ? '<a href="'.get_admin_url().'">Dashboard</a> - ' : ''; ?><?php echo wp_loginout(site_url()); ?>)</p>
          </div>
        </div>
        <?php endif; ?>
        <header class="header">
          <div class="container">
            <?php if($menu) : ?>
            <nav class="navigation">
              <button onclick="mobileNavigation(this)" class="hamburger hamburger--collapse" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
              </button>
              <label>Menu</label>
            </nav>
            <?php endif; ?>
            <form role="search" method="get" id="searchform" class="searchbar" action="<?php echo site_url(); ?>">
              <button>
              <i class="fal fa-search"></i>
              </button>
              <input type="text" value="" name="s" id="s" />
            </form>
            <h1 class="logo">
            <?php get_template_part('template_parts/logo'); ?>
            </h1>
            <div class="header-info">
              <?php get_template_part('template_parts/socialnetworks'); ?>
              <?php get_template_part('template_parts/contato'); ?>
            </div>
          </div>
        </header>
        <main class="main" <?php echo ($post->post_name == 'contato') ? 'style="display: none"' : ''; ?>>