<?php /* Template Name: Home */ ?>
<?php 
  get_header(); 
  $homeID = get_page_by_path( 'home' );
  $quem_somosID = get_page_by_path( 'quem-somos' );
  $nossa_equipeID = get_page_by_path( 'nossa-equipe' );
  $o_que_fazemosID = get_page_by_path( 'o-que-fazemos' );
  $nossos_parceirosID = get_page_by_path( 'nossos-parceiros' );
?>
  <section class="home">
    <div class="container">
      <div>
        <?php if(get_field('intro', $homeID)) : ?>
          <?php echo get_field('intro', $homeID); ?>
        <?php endif; ?>
        <!--  -->
          <?php $query_args = array(
            'post_type' => 'post', 
            'posts_per_page' => 1,
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'terms' => 'clientes-na-imprensa  ',
                    'field' => 'slug',
                    'include_children' => true,
                    'operator' => 'IN'
                )
            )            
          );
          $query = new WP_Query( $query_args ); 
          if($query) :
            while ( $query->have_posts() ) : $query->the_post();
            ?>
            <div class="box">
              <div class="box-inner">
                <h2 class="box-title"><?php the_title(); ?></h2>
                <div class="box-content">
                  <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
                  <div>
                    <h3 class="title">
                      <small class="date"><?php the_date(); ?> - por: <?php the_author(); ?></small>
                      <?php if(get_the_excerpt()) : ?>
                        <a href="<?php the_permalink(); ?>" class="excerpt"><span><?php echo get_the_excerpt(); ?></span></a>
                      <?php endif; ?>
                    </h3>
                    <a class="leia-mais" href="<?php the_permalink(); ?>">Leia a Notícia</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
            endwhile;
          endif;
          wp_reset_query();
          wp_reset_postdata();
        ?>
      </div>
      <?php 
          if(get_field('sessao_guia_de_fontes_juridicas', $homeID)) :
      ?>
      <div>
        <div class="box">
          <div class="box-inner">
            <h2 class="box-title"><?php echo get_field('sessao_guia_de_fontes_juridicas', $homeID)['label']; ?></h2>
            <div class="box-content">
              <p>
                <?php echo get_field('sessao_guia_de_fontes_juridicas', $homeID)['texto']; ?>
              </p>
              <!--  -->
              <?php if(!is_user_logged_in()) : ?>
              <form class="loginform" name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
                <p><strong>Para procurar uma fonte ou fazer o download do guia completo, faça o login para acessar.</strong></p>
                <span class="inputs">
                  <!-- <input type="text" placeholder="Email"> -->
                  <input id="user_login" type="text" size="20" value="" placeholder="Usuário" name="log">
                </span>
                <span class="inputs">
                  <!-- <input type="password" placeholder="Senha"> -->
                  <input id="user_pass" type="password" size="20" placeholder="Senha" value="" name="pwd"></p>
                </span>
                <span>
                  <a href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . get_permalink()); ?>">Ainda não sou cadastrado.</a>
                  <!-- <input class="btn btn-1" id="wp-submit" type="submit" value="Login" name="wp-submit"> -->
                  <button class="btn btn-1" value="Login" name="wp-submit">Entrar</button>
                  <input type="hidden" value="1" name="testcookie">
                </span>
              </form>
              <!--  -->
              <?php endif; ?>
              <?php 
                $query_args = array(
                  'post_type' => 'fontes_juridicas', 
                  'posts_per_page' => 3,
                  'order' => 'DESC'          
                );
                $query = new WP_Query( $query_args ); 
                if($query) : ?>
                  <div class="box simple carousel">
                    <h4>Veja alguns exemplos</h4>
                    <div class="box-inner">
                      <div class="box-content landscape">
                        <div>
                          <div class="carousel-inner">
                            <div class="slider">
                              <!--  -->
                              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                              <div class="item">
                                <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
                                <div>
                                  <h2 class="box-title"><?php the_title(); ?></h2>
                                  <?php if(get_the_excerpt()) : ?>
                                    <?php 
                                      $excerpt = get_the_excerpt(); 
                                      $excerpt .= '<small style="color:#ec7129;">';
                                      $excerpt .= (get_field('email')) ? '<br><br>'.get_field('email') : '';
                                      $excerpt .=  (get_field('telefone')) ? ' / '.get_field('telefone') : '';
                                      $excerpt .= '</small>';
                                    ?>
                                    <p>
                                      <?php echo $excerpt; ?>
                                    </p>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <?php endwhile; ?>
                              <!--  -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                endif;
                wp_reset_query();
                wp_reset_postdata();                
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php if($quem_somosID) : ?>
  <section class="quem-somos">
    <div class="container">
      <div>
        <h2 class="title"><?php echo get_the_title($quem_somosID); ?></h2>
        <p><?php echo get_the_excerpt($quem_somosID); ?></p>
      </div>
      <?php if($nossa_equipeID || get_field('equipe', $nossa_equipeID)) : ?>
      <div>
          <h2 class="title"><?php echo get_the_title($nossa_equipeID); ?></h2>
          <div class="box">
            <div class="box-inner">
              <?php if(get_field('rotulo_da_sessao', $nossa_equipeID)) : ?>
              <h2 class="box-title"><?php echo get_field('rotulo_da_sessao', $nossa_equipeID); ?></h2>
              <?php endif; ?>
              <div class="box-content">
                <p>
                  <?php echo get_the_excerpt($nossa_equipeID); ?>
                </p>
                <a href="<?php echo get_the_permalink($nossa_equipeID); ?>" class="leia-mais">Conheça nossos profissionais</a>
              </div>
            </div>
          </div>
          <?php if(get_field('equipe', $nossa_equipeID)) : ?>
          <ul class="nossa-equipe">
            <?php 
              foreach (get_field('equipe', $nossa_equipeID) as $key => $value) {
                ?>
                <li>
                  <a title="<?php echo $value['nome'].' - '.$value['cargo']; ?>" class="thumbnail" href="<?php echo get_the_permalink($nossa_equipeID).'#'.to_permalink($value['nome']); ?>" style="background-image:url(<?php echo $value['thumbnail']; ?>)"></a>
                </li>
                <?php
              }
            ?>
          </ul>
          <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>
  <?php if($o_que_fazemosID || get_field('o_que_fazemos', $o_que_fazemosID)) : ?>
  <section class="o-que-fazemos">
    <div class="container">
      <h2 class="title"><?php echo get_the_title($o_que_fazemosID); ?></h2>
      <div>
        <div class="box">
          <div class="box-inner">
            <?php if(get_field('rotulo_da_sessao', $o_que_fazemosID)) : ?>
            <h2 class="box-title"><?php echo get_field('rotulo_da_sessao', $o_que_fazemosID); ?></h2>
            <?php endif; ?>
            <div class="box-content">
              <?php the_excerpt($o_que_fazemosID); ?>
            </div>
          </div>
        </div>
      </div>
      <?php if(get_field('o_que_fazemos', $o_que_fazemosID)) : ?>
      <div>
        <?php get_template_part('template_parts/o-que-fazemos'); ?>
      </div>
      <?php endif ;?>
    </div>
  </section>
  <?php endif; ?>
  <?php 
    $query_args = array(
        'post_type' => 'post', 
        'posts_per_page' => -1,
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'terms' => 'clientes-na-imprensa',
                'field' => 'slug',
                'include_children' => true,
                'operator' => 'IN'
            )
        )            
      );
      $query = new WP_Query( $query_args ); 
      if($query) :
  ?>
  <section class="clientes-na-imprensa">
    <div class="container">
      <h2 class="title">Clientes na Imprensa</h2>
      <ul class="list">
        <?php  
          $i = 0;
          while ( $query->have_posts() ) : 
              $query->the_post();
              $i++;
              echo '
              <li>
                <div class="box">
                  <div class="box-inner">';
                    if($i >= 3) :
                      echo '<h2 class="box-title">'.get_the_title().'<small class="date">'.get_the_date().'</small></h2>';
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
          endwhile;
        ?>
      </ul>
    </div>
  </section>
  <?php endif; 
    wp_reset_query();
    wp_reset_postdata();
  ?>
  <?php 
    $query_args = array(
        'post_type' => 'post', 
        'posts_per_page' => -1,
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'terms' => 'sugestoes-de-pauta',
                'field' => 'slug',
                'include_children' => true,
                'operator' => 'IN'
            )
        )            
      );
      $query = new WP_Query( $query_args ); 
      if($query) :
  ?>
  <section class="sugestoes-de-pauta">
    <div class="container">
      <h2 class="title">Sugestões de Pauta</h2>
      <ul class="list">
        <?php 
          while ( $query->have_posts() ) : 
              $query->the_post();
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
          endwhile;
        ?>
      </ul>
    </div>
  </section>
  <?php endif; 
    wp_reset_query();
    wp_reset_postdata();
  ?>
  <?php if($nossos_parceirosID || get_field('parceiros', $nossos_parceirosID)) : ?>
  <?php get_template_part('template_parts/parceiros'); ?>
  <?php endif; ?>
<?php get_footer(); ?>