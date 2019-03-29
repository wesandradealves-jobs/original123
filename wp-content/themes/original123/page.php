<?php get_header(); ?>
<?php if($post->post_name != 'contato') : ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
	<section class="<?php echo $post->post_name; ?>">
		<div class="container">
			<div>
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="box">
					<div class="box-inner">
						<?php if(get_field('rotulo_da_sessao')) : ?>
						<?php if($post->post_name == 'nossa-equipe') : ?>
						<?php
						box_title(false, get_field('rotulo_da_sessao'), 'h2', false);
						?>
						<?php endif; ?>
						<?php endif; ?>
						<div class="box-content">
							<div>
								<?php
									$sourceID = get_page_by_path( 'o-que-fazemos' );
									switch ($post->post_name) {
										case 'nossos-parceiros':
										case 'o-que-fazemos':
											if($post->post_name == 'o-que-fazemos') :
												get_template_part('template_parts/o-que-fazemos');
											else :
												$sourceID = get_page_by_path( 'nossos-parceiros' );
											endif;
											if(get_field('o_que_fazemos', $sourceID->ID)){
												foreach (get_field('o_que_fazemos', $sourceID->ID) as $key => $value) {
								?>
								<div class="box" id="<?php echo $value['titulo']; ?>">
									<div class="box-inner">
										<div class="box-content landscape">
											<div class="thumbnail" style="background-image:url(<?php echo $value['thumbnail']; ?>)">
												<?php
														box_title(false, $value['titulo'], 'h2', false);
												?>
											</div>
											<div>
												<p>
													<?php 
														echo $value['texto']; 
													?>
												</p>
											</div>
										</div>
									</div>
									<?php if($value['eh_case']) : ?>
									<div class="carousel">
										<div>
											<div class="carousel-inner">
												<div class="slider">
													<!--  -->
													<?php foreach ($value['cases'] as $key => $value) { ?>
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
								}
								}
								if($post->post_name == 'nossos-parceiros') :
								get_template_part('template_parts/parceiros');
								endif;
								break;
								case 'nossa-equipe':
								?>
								<!-- Equipe -->
								<?php
									foreach (get_field('equipe') as $key => $value) {
								?>
								<div id="<?php echo $value['nome']; ?>" class="box">
									<div class="box-inner">
										<div class="box-content">
											<div class="thumbnail" style="background-image: url(<?php echo $value['thumbnail']; ?>)"></div>
											<div>
												<?php
													box_title(false, $value['nome'], 'h2', $value['cargo']);
												?>
												<p>
													<?php echo $value['texto']; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
								<!--  -->
								<?php
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
			<?php if($post->post_name == 'o-que-fazemos') : ?>
				<?php get_template_part('template_parts/parceiros'); ?>
			<?php endif; ?>
		</div>
	</section>
	<?php endwhile;
	endif; ?>
<?php endif; ?>
<?php get_footer(); ?>