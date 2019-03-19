            <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                <?php if(get_theme_mod('logo')) : ?>
                    <img <?php echo (is_login_page()) ? 'height="95"' : 'height="84"'; ?> src="<?php echo get_theme_mod('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                <?php else : ?>
                    <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                <?php endif; ?>
            </a> 