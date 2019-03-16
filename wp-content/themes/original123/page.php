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

		              	<h2 class="box-title"><?php echo get_field('rotulo_da_sessao'); ?></h2>

		              	<?php endif; ?>

		              <?php endif; ?>

	                  <div class="box-content">

	              		<div>

				              <?php 

				              	switch ($post->post_name) {

				              		case 'nossos-parceiros': $k = 0;

				              							              			if(get_field('o_que_fazemos', get_page_by_path( 'o-que-fazemos' ))){

				              				foreach (get_field('o_que_fazemos',get_page_by_path( 'o-que-fazemos' )) as $key => $value) {
                                                if(!$value['eh_case']) :
				              					?>

												<div id="<?php echo $value['titulo']; ?>" class="box simple <?php echo ($value['eh_case']) ? 'carousel' : ''; ?>">

												<div class="box-inner">

												  <h2 class="box-title"><?php echo $value['titulo']; ?></h2>

												  <div class="box-content landscape">

												  	<?php if(!$value['eh_case']) : ?>

													    <div class="thumbnail" style="background-image:url(<?php echo $value['thumbnail']; ?>)"></div>

													    <div>

													    <div>

															<p><?php echo $value['texto']; ?></p>

														</div>

													<?php else : ?>

												        <div>

												          <div class="carousel-inner">

												          	<div class="slider">

															<?php 

																foreach ($value['cases'] as $key => $value) {

																	echo '

															            <div class="item">

															                <div class="thumbnail" style="background-image:url('.$value['thumbnail'].')"></div>

															                <div>

															                  <p>'.$value['texto'].'</p>

															                </div>

															            </div>

															            ';

																}

															?>

															</div>

												          </div>

												        </div>

												    <?php endif; ?>

												  </div>

												</div>

												</div>

				              					<?php
                                                endif;
				              				}
				              			}


				              			get_template_part('template_parts/parceiros');

				              		break;

				              		case 'o-que-fazemos':

				              			get_template_part('template_parts/o-que-fazemos');

				              			if(get_field('o_que_fazemos')){

				              				foreach (get_field('o_que_fazemos') as $key => $value) {

				              					?>

												<div id="<?php echo $value['titulo']; ?>" class="box simple <?php echo ($value['eh_case']) ? 'carousel' : ''; ?>">

												<div class="box-inner">

												  <h2 class="box-title"><?php echo $value['titulo']; ?></h2>

												  <div class="box-content landscape">

												  	<?php if(!$value['eh_case']) : ?>

													    <div class="thumbnail" style="background-image:url(<?php echo $value['thumbnail']; ?>)"></div>

													    <div>

													    <div>

															<p><?php echo $value['texto']; ?></p>

														</div>

													<?php else : ?>

												        <div>

												          <div class="carousel-inner">

												          	<div class="slider">

															<?php 

																foreach ($value['cases'] as $key => $value) {

																	echo '

															            <div class="item">

															                <div class="thumbnail" style="background-image:url('.$value['thumbnail'].')"></div>

															                <div>

															                  <p>'.$value['texto'].'</p>

															                </div>

															            </div>

															            ';

																}

															?>

															</div>

												          </div>

												        </div>

												    <?php endif; ?>

												  </div>

												</div>

												</div>

				              					<?php

				              				}

				              			}

				              		break;

				              		case 'nossa-equipe':

				              		 	?>

					                      <!-- Equipe -->

					                      <?php 
					                      	foreach (get_field('equipe') as $key => $value) {

					                      		?>

							                      <div id="<?php echo $value['nome']; ?>" class="box bx-subtitle">

							                        <div class="thumbnail" style="background-image: url(<?php echo $value['thumbnail']; ?>)"></div>

							                        <div class="box-inner">

														<div class="title-section">
							                          		<h2 class="box-title"><?php echo $value['nome']; ?> </h2>
							                          		<span>
							                          			<small class="date"><?php echo $value['cargo']; ?></small>
							                          		</span>
														</div>


							                          <div class="box-content landscape">

							                            <div>

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

	           </div>

	         </section>

		<?php endwhile;

		endif; ?>

	<?php endif; ?>
<?php get_footer(); ?>