<?php /* Template Name: Guia de Fontes Jurídicas */ ?>
<?php 
  if ( 0 == $current_user->ID ) {
      // wp_safe_redirect( wp_login_url() );
      wp_redirect(wp_login_url(add_query_arg('ref', $post->post_name)));
      exit;
  }  
  get_header(); 
?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<section class="<?php echo $post->post_name; ?>">
  <div class="container">
    <div>
      <h2 class="title"><?php the_title(); ?></h2>
    </div>
    <?php if(get_field(str_replace('-','_',$post->post_name))) : ?>
      <div class="box">
          <div class="box-inner">
            <div class="box-content landscape">
<!--               <div onclick="document.location='<?php echo get_field(str_replace('-','_',$post->post_name))['arquivo_pra_download']['url']; ?>';return false;" class="thumbnail" style="background-image:url(<?php echo get_field(str_replace('-','_',$post->post_name))['thumbnail']; ?>)">
                <?php
                  if(get_field(str_replace('-','_',$post->post_name))['rotulo__da_sessao']){
                    box_title(false, get_field(str_replace('-','_',$post->post_name))['rotulo__da_sessao'], 'h2', false);
                  }
                ?>
              </div>  -->             
              <div>
                <div class="box">
                    <div class="box-inner">
                      <?php box_title(false, 'Encontre a fonte jurídica por Fonte ou Nome do Veículo', 'h2', false); ?>
                      <div class="box-content">              
                        <div>
                          <form role="search" method="GET" id="searchform" action="<?php echo get_page_link($post->ID); ?>">
                            <i class="fal fa-search"></i>
                            <input type="text" value="" name="keyword" id="keyword" />
                            <button class="btn btn-1">
                              buscar
                            </button>

                            <input type="hidden" name="post" value="<?php echo str_replace('-', '_', str_replace('guia-de-', '', get_page($post->ID)->post_name)); ?>" />
                          </form>     
                          <!-- Results -->
                          <div class="carousel search-results">
                            <!-- loop -->
                            <?php 
                              if(isset($_GET['post'])){
                                add_filter( 'posts_where', 'title_filter', 10, 2 );
                                $query = new WP_Query(array(
                                  'post_type' => $_GET['post'],
                                  'title_filter' => $_GET['keyword'],
                                  'title_filter_relation' => 'OR',
                                  'meta_query' => array(
                                    'relation' => 'OR',
                                    array(
                                     'key' => 'veiculo',
                                     'value' => $_GET['keyword'],
                                     'compare' => 'LIKE'
                                    )
                                  ))
                                );
                                ?>
                                <p class="result-text">
                                  <?php 
                                    if(!$query->post_count){
                                      echo 'Nenhum resultado encontrado.';
                                    } else {
                                      echo ( ($query->post_count == 1) ? 'Foi' : 'Foram' ).' encontrado'.( ($query->post_count == 1) ? '' : 's' ).'  "'.$query->post_count.'" resultado'.( ($query->post_count == 1) ? '' : 's' ).'.';
                                    }
                                  ?>
                                </p>
                                <?php 
                                if($query->post_count){
                                  while ( $query->have_posts() ) : $query->the_post(); 
                                    ?>
                                    <div class="item result">
                                     <!--  -->
                                     <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')) : ?>
                                     <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"><a href="" class="zoomin" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></a></div>
                                      <?php endif; ?>
                                     <div>
            							<?php box_title('gray', get_the_title(), 'h2', get_field('categoria')); ?>                                               
                                       <p>
                                         <span>
                                           <?php echo get_the_content(); ?>
                                         </span>
                                       </p>
                                     </div>
                                     <div>
                                       <p>
                                         <small>
                                           <?php 
                                            if(get_field('telefone')){
                                              echo get_field('telefone');
                                            }
                                            if(get_field('email')){
                                              echo ' / '.get_field('email');
                                            }
                                            if(get_field('veiculo')){
                                              echo ' / '.get_field('veiculo');
                                            }
                                           ?>
                                         </small>
                                       </p>
                                     </div>
                                     <!--  -->
                                    </div>                                     
                                    <?php
                                  endwhile; 
                                }
                                remove_filter( 'posts_where', 'title_filter', 10, 2 );
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>  
                </div>
              </div>
            </div>
          </div>  
      </div>
    <?php endif ?>
  </div>
</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>