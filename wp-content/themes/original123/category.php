<?php get_header(); ?>

    <section class="<?php echo get_queried_object()->slug; ?>">

      <div class="container">

        <div>

          <h2 class="title"><?php echo get_queried_object()->name; ?></h2>

          <div class="box">

            <div class="box-inner">

            	<div class="box-content">

            		<div>

			            <ul class="list">

							<?php if ( have_posts () ) :

								$i = 0; 

								while (have_posts()) : the_post(); 

									if(get_queried_object()->slug == 'sugestoes-de-pauta'){

						              echo '<li>

						                <div class="box">

						                  <div class="box-inner">

						                    <div class="box-content landscape">

						                      <div>

						                        <h3 class="title">

						                          <small class="date">'.get_the_date().'</small>

						                          <a class="excerpt" href="'.get_the_permalink().'">'.get_the_title().'</a>

						                        </h3>

						                        <p>'.get_the_excerpt().'</p>';

						                        if(get_field('autor')) :

						                          echo '

						                          <span class="box-footer">

						                            '.get_field('autor').'

						                          </span>';

						                        endif;

						                      echo '

						                      </div>

						                    </div>

						                  </div>

						                </div>

						              </li>';

									} else {

										$i++; 

						              	echo '

							              <li>

							                <div class="box">

							                  <div class="box-inner">';

							                    if($i >= 3) :

							                      echo '

												  <div class="title-section">
							                      <h2 class="box-title"><span>'.get_the_title().'</span></h2>
							                      	   <span>
															<small class="date">'.get_the_date().'</small>
							                      	   </span>
												  </div>

							                      ';

							                    endif;

							                    echo '

							                    <div class="box-content '.( ($i < 3) ? 'landscape' : '' ).'">';

							                      if($i < 3) :

							                        echo '

							                        <div class="thumbnail" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full').')"></div>';

							                      endif;

							                      echo '

							                      <div>

							                        <h3 class="title">';

							                          if($i < 3) :

							                            echo '<small class="date">'.get_the_date().'</small>';

							                          endif;

							                          echo '

							                          <a href="" class="excerpt"><span>'.get_the_excerpt().'</span></a>

							                        </h3>

							                        <a class="leia-mais" href="'.get_the_permalink().'">Leia a Notícia</a>

							                      </div>

							                    </div>

							                  </div>

							                </div>

							              </li>';

									}

								endwhile;

							endif; ?>

			            </ul>

            		</div>

          		</div>

              </div>

            </div>

          </div>

         </div>

       </div>

     </section>

     <style>

		.pg-interna .box-content.landscape .thumbnail + div {

		    margin-top: 10px;

		    padding: 0 15px;

		}     	

     </style>

<?php get_footer(); ?>