<?php get_header(); ?>
<?php if($post->post_name != 'contato') : ?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<section class="<?php echo $post->post_name; ?>">
	<div class="container">
		<div>
			<h2 class="title"><?php the_title(); ?></h2>
			<div class="box">
				<div class="box-inner">
					<div class="box-content">
						<div>
							<?php 
								switch ($post->post_name) {
									case 'nossa-equipe':
										box_title(false, 'UM TIME ESPECIALIZADO EM NOTÍCIA', 'h2', false);
							            $query_args = array(
							              'post_type' => 'nossa-equipe',
							              'order' => 'ASC',
							              'orderby' => 'name',              
							              'posts_per_page' => -1
							            );
							            $query = new WP_Query( $query_args );
							            while ( $query->have_posts() ) : $query->the_post();
							                ?>
<div id="<?php echo get_the_title(); ?>" class="box">
	<div class="box-inner">
		<div class="box-content">
			<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')) : ?>
				<div class="thumbnail" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
			<?php endif; ?>
			<div>
				<?php
					box_title(false, get_the_title(), 'h2', get_field('cargo'));
					the_content(); 
				?>
			</div>
		</div>
	</div>
</div>					                
							                <?php 
							            endwhile;
							            wp_reset_query();
							            wp_reset_postdata();  										
										break;
									case 'o-que-fazemos':
										get_template_part('template_parts/o-que-fazemos');
							            $query_args = array(
							              'post_type' => 'o-que-fazemos',
							              'order' => 'ASC',
							              'orderby' => 'name',              
							              'posts_per_page' => -1
							            );
							            $query = new WP_Query( $query_args );
							            while ( $query->have_posts() ) : $query->the_post();
							                ?>
											<div class="box" id="<?php echo get_the_title(); ?>">
												<div class="box-inner">
													<div class="box-content landscape">
														<div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)">
															<?php
																	box_title(false, get_the_title(), 'h2', false);
															?>
														</div>
														<div>
															<?php 
																the_content(); 
															?>
														</div>
													</div>
												</div>
												<?php if(get_field('eh_case')) : ?>
												<div class="carousel">
													<div>
														<div class="carousel-inner">
															<div class="slider">
																<!--  -->
																<?php foreach (get_field('cases') as $key => $value) { ?>
																<div class="item">
																	<?php
																	box_title('gray', 'Cases de Sucesso', 'h2', false);
																	?>
																	<div class="thumbnail" style="background-image:url(<?php echo $value['thumbnail']; ?>)"></div>
																	<div>
																		<?php if($value['texto']) : ?>
																		<p>
																			<span>
																				<?php
																				echo $value['texto'];
																				?>
																			</span>
																		</p>
																		<?php endif; ?>
																	</div>
																</div>
																<?php } ?>
																<!--  -->
															</div>
														</div>
													</div>
												</div>
												<?php endif; ?>
											</div>							                
							                <?php 
							            endwhile;
							            wp_reset_query();
							            wp_reset_postdata();   										
										break;
									default:
										// code...
										break;
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile;
endif; ?>
<?php endif; ?>
<?php get_footer(); ?>