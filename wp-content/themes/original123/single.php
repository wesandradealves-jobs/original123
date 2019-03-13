<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<section class="<?php echo to_permalink(get_the_title()); ?>">
		<div class="container">
		<div>
		  <h2 class="title">
		  	<?php the_title(); ?>
			<small class="date">
				<?php the_date(); ?>
			</small>		  		
		  </h2>
		  <div class="box">
		    <div class="box-inner" style="flex-flow: column wrap">
		    	<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" height="auto" width="100%" alt="<?php echo get_the_title(); ?>">
		    	<br/>
		    	<?php the_content(); ?>
		    </div>
		   </div>
		  </div>
		 </div>
		</section>
	<?php endwhile;
	endif; ?>
<?php get_footer(); ?>