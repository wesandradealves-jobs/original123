<?php if(get_theme_mod('telefone')||get_theme_mod('email')) : ?>
  <p class="contato-info">
    <?php if(get_theme_mod('email')) : ?>
    <span>
      <i class="fal fa-envelope"></i>
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