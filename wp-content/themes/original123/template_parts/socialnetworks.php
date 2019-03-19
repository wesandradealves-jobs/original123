<?php if ( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('linkedin') || get_theme_mod('youtube')) : ?>
	<ul class="socialnetworks">
		<?php if ( get_theme_mod('facebook') ) : ?>
		<li>
				<a href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
		</li>
		<?php endif; ?>
		<?php if ( get_theme_mod('twitter') ) : ?>
		<li>
				<a href="<?php echo get_theme_mod('twitter');  ?>" title="Twitter" target="_blank"><i class="fab fa-twitter-square"></i></a>
		</li>
		<?php endif; ?>
		<?php if ( get_theme_mod('linkedin') ) : ?>
		<li>
				<a href="<?php echo get_theme_mod('linkedin');  ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin-square"></i></a>
		</li>
		<?php endif; ?>
		<?php if ( get_theme_mod('youtube') ) : ?>
		<li>
				<a href="<?php echo get_theme_mod('youtube');  ?>" title="Youtube" target="_blank"><i class="youtube"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/youtube.png" alt="Youtube"></i></a>
		</li>
		<?php endif; ?>
	</ul>
 <?php endif; ?>	