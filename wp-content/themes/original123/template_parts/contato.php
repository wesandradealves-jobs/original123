<?php if(get_theme_mod('telefone')||get_theme_mod('email')) : ?>
  <p class="contato-info">
    <?php if(get_theme_mod('email')) : ?>
    <span>
      <i class="fas fa-envelope-square">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/envelope<?php echo (did_action( 'get_footer' )) ? 'b' : ''; ?>.png" alt="<?php echo get_theme_mod('email'); ?>"/>
      </i>
      <a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a>
    </span>
    <?php endif; ?>
    <?php if(get_theme_mod('telefone')) : ?>
    <span>
      <i class="fas fa-phone"></i>
      <?php echo get_theme_mod('telefone'); ?>
    </span>
    <?php endif; ?>
  </p>
<?php endif; ?>
