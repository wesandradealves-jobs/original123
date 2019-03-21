<?php if(get_theme_mod('telefone')||get_theme_mod('email')) : ?>
<p class="contato-info">
  <?php if(get_theme_mod('email')) : ?><span><i><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/envelope<?php echo (did_action( 'get_footer' )) ? 'g' : ''; ?>.png" alt="<?php echo get_theme_mod('email'); ?>"/></i><span><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></span></span><?php endif; ?><?php if(get_theme_mod('telefone')) : ?><span><i><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/phone<?php echo (did_action( 'get_footer' )) ? 'g' : ''; ?>.png" alt="<?php echo get_theme_mod('email'); ?>" alt=""></i><span><?php echo get_theme_mod('telefone'); ?></span></span><?php endif; ?>
</p>
<?php endif; ?>