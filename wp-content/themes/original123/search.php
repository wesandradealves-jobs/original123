<?php get_header(); ?>

   <section class="<?php echo get_queried_object()->slug; ?>">

      <div class="container">

        <div>

          <h2 class="title">Resultados da busca para: "<?php echo $_GET['s']; ?>"</h2>

          <div class="box">

            <div class="box-inner">

            	<div class="box-content">

            		<div>

			            <ul class="list">

							<?php if ( have_posts () ) : 

								while (have_posts()) : 

								the_post(); 

								if(get_post_type() == 'fontes_juridicas') :

					              echo '<li>

					                <div class="box">

					                  <div class="box-inner post-'.get_post_type().'">

					                    <div class="box-content">

					                      <div class="thumbnail" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full').')"></div>

					                      <div>

					                        <h3 class="title">'.get_the_title().'</h3>

					                        ';

											$excerpt = get_the_excerpt();

											$excerpt .= (get_field('email')) ? '<br><br>'.get_field('email') : '';

											$excerpt .=  (get_field('telefone')) ? ' / '.get_field('telefone') : '';

					                        echo '

					                        <p>

					                        	'.$excerpt.'

					                        </p>

					                      </div>

					                    </div>

					                  </div>

					                </div>

					              </li>';

					             else :

					              echo '<li>

					                <div class="box">

					                  <div class="box-inner post-'.get_post_type().'">

					                    <div class="box-content landscape">

					                      <div>

					                        <h3 class="title">

					                          <a class="excerpt" href="'.get_the_permalink().'"><small class="date">'.get_the_title().'</small></a>

					                        </h3>

					                        <p>'.get_the_excerpt().'</p>';

					                      echo '

					                      </div>

					                    </div>

					                  </div>

					                </div>

					              </li>';

					             endif;

							endwhile;

						else :

							?>

							<p>Nenhum resultado encontrado</p>

							<?php

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

		.pg-search .box-inner .box-content.landscape>:not(.thumbnail){

			padding: 0;

		}

		.pg-search .list{

			flex-flow: column wrap;

		}

		.list>li{

			padding: 0 !important;

			width: 100%;

		}

     </style>	

<?php get_footer(); ?>