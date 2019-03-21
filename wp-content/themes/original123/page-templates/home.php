<?php /* Template Name: Home */ ?>
<?php
  get_header();
  $homeID = get_page_by_path( 'home' );
  $quem_somosID = get_page_by_path( 'quem-somos' );
  $nossa_equipeID = get_page_by_path( 'nossa-equipe' );
  $o_que_fazemosID = get_page_by_path( 'o-que-fazemos' );
  $nossos_parceirosID = get_page_by_path( 'nossos-parceiros' );

  $paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
  $paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;  
?>
<section class="home">
  <div class="container">
    <div>
      <?php
        $query_args = array(
            'post_type' => 'page',
            'post__in' => array($homeID->ID)
        );
        $query = new WP_Query( $query_args );
        if($query){
          while ( $query->have_posts() ) : $query->the_post();
            the_content();
          endwhile;
        }
        wp_reset_query();
        wp_reset_postdata();
      ?> 
      <div class="clientes-na-imprensa">
        <!--  -->
        <?php $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'ORDER' => 'DESC',
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
            <?php
            box_title(false, 'Clientes na Imprensa', false, false);
            ?>
            <div class="box-content">
              <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
              <div>
                <small class="date"><?php the_date(); ?></small>
                <h3 class="title">
                <a href="<?php the_permalink(); ?>" class="excerpt"><span><?php echo substr(get_the_excerpt(), 0, 140).'...'; ?></span></a>
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
    </div>
    <?php
    if(get_field('sessao_guia_de_fontes_juridicas', $homeID->ID)) :
    ?>
    <div>
      <div class="box guia-de-fontes-juridicas">
        <div class="box-inner">
          <?php
          box_title(false, get_field('sessao_guia_de_fontes_juridicas', $homeID->ID)['label'], 'h2', false);
          ?>
          <div class="box-content">
            <p>
              <?php echo get_field('sessao_guia_de_fontes_juridicas', $homeID->ID)['texto']; ?>
            </p>
            <!--  -->
            <?php if(!is_user_logged_in()) : ?>
            <form class="loginform" name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
              <p><strong>Para procurar uma fonte ou fazer o download do guia completo, faça o login para acessar.</strong></p>
              <span class="fieldset">
                <span>
                  <input id="user_login" type="text" size="20" value="" placeholder="Usuário" name="log">
                </span>
                <span>
                  <input id="user_pass" type="password" size="20" placeholder="Senha" value="" name="pwd"></p>
                </span>
              </span>
              <span class="fieldset">
                <a class="leia-mais" href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . get_permalink()); ?>">Ainda não sou cadastrado.</a>
                <button class="btn btn-1" value="Login" name="wp-submit">Entrar</button>
                <input type="hidden" value="1" name="testcookie">
              </span>
            </form>
            <!--  -->
            <?php endif; ?>
            <?php
            $query_args = array(
            'post_type' => 'fontes_juridicas',
            'posts_per_page' => 5,
            'ORDER' => 'DESC',
            'orderby'        => 'rand'
            );
            $query = new WP_Query( $query_args );
            if($query) : ?>
            <div class="carousel">
              <h4>Veja alguns exemplos</h4>
              <div>
                <div class="carousel-inner">
                  <div class="slider">
                    <!--  -->
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item">
                      <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>)"></div>
                      <div>
                        <?php
                        box_title('gray', get_the_title(), 'h2', false);
                        ?>
                        <?php if(get_the_excerpt()) : ?>
                        <p>
                          <span>
                            <?php
                            $excerpt = get_the_excerpt();
                            echo substr($excerpt, 0, 140);
                            ?>
                          </span>
                          <?php if(get_field('telefone')||get_field('email')) : ?>
                          <small>
                          <?php
                          echo (get_field('email')) ? get_field('email') : '';
                          echo (get_field('telefone')) ? ' / '.get_field('telefone') : '';
                          ?>
                          </small>
                          <?php endif; ?>
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
<?php if($quem_somosID->ID || $o_que_fazemosID->ID) : ?>
<section id="<?php print_r(get_page_by_path( 'quem-somos' )->post_name); ?>" class="<?php print_r(get_page_by_path( 'quem-somos' )->post_name); ?>">
  <div class="container">
    <div class="inner-session">
      <div>
        <h2 class="title"><?php echo get_the_title($quem_somosID->ID); ?></h2>
        <p>
          <?php
          print_r(get_page_by_path( 'quem-somos' )->post_content);
          ?>
        </p>
      </div>
      <?php if($nossa_equipeID || get_field('equipe', $nossa_equipeID)) : ?>
      <div class="nossa-equipe">
        <h2 class="title"><?php echo get_the_title($nossa_equipeID); ?></h2>
        <div class="box">
          <div class="box-inner">
            <?php if(get_field('rotulo_da_sessao', $nossa_equipeID)) : box_title(false, get_field('rotulo_da_sessao', $nossa_equipeID), 'h2', false); ?>
            <?php endif; ?>
            <div class="box-content">
              <p>
                <?php
                echo get_page_by_path( 'nossa-equipe' )->post_content;
                ?>
              </p>
              <a href="<?php echo get_the_permalink($nossa_equipeID); ?>" class="leia-mais">Conheça nossos profissionais</a>
            </div>
          </div>
        </div>
        <?php if(get_field('equipe', $nossa_equipeID)) : ?>
        <ul>
          <?php
          foreach (get_field('equipe', $nossa_equipeID) as $key => $value) {
          ?>
          <li>
            <a title="<?php echo $value['nome'].' - '.$value['cargo']; ?>" class="thumbnail" href="<?php echo get_the_permalink($nossa_equipeID).'#'.$value['nome']; ?>" style="background-image:url(<?php echo ($value['thumbnail']) ? $value['thumbnail'] : get_template_directory_uri().'/assets/imgs/nopic.png'; ?>)"></a>
          </li>
          <?php
          }
          ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
    <?php if($o_que_fazemosID->ID || get_field('o_que_fazemos', $o_que_fazemosID->ID)) : ?>
    <div class="o-que-fazemos inner-session">
      <h2 class="title"><?php echo get_the_title($o_que_fazemosID->ID); ?></h2>
      <div>
        <div class="box">
          <div class="box-inner">
            <?php if(get_field('rotulo_da_sessao', $o_que_fazemosID->ID)) : box_title(false, get_field('rotulo_da_sessao', $o_que_fazemosID->ID), 'h2', false); ?>
            <?php endif; ?>
            <div class="box-content">
              <p>
                <?php
                print_r(get_page_by_path( 'o-que-fazemos' )->post_content);
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php if(get_field('o_que_fazemos', $o_que_fazemosID->ID)) : ?>
      <div>
        <?php get_template_part('template_parts/o-que-fazemos'); ?>
      </div>
      <?php endif ;?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<section class="clientes-na-imprensa">
  <div class="container">
    <?php
    $query_args = array(
    'post_type' => 'post',
    
    'paged'          => $paged1,
    'posts_per_page' => 4,
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
    <div id="clientes-na-imprensa" class="inner-session">
      <h2 class="title">Clientes na Imprensa</h2>
      <ul class="list">
        <?php
        $i = 0;
        while ( $query->have_posts() ) :
        $query->the_post();
        $i++;
        echo '
        <li id="post_id_'.get_the_id().'">
          <div class="box">
            <div class="box-inner">';
              if($i >= 3) :
              box_title(false, get_the_title(), 'h2', get_the_date());
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
      
      <?php
        $pag_args1 = array(
            'format'  => '?paged1=%#%#clientes-na-imprensa',
            'current' => $paged1,
            'total'   => $query->max_num_pages,
            'add_args' => array( 'paged2' => $paged2 )
        );
        echo paginate_links( $pag_args1 );
      ?>
    </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
    ?>
    <?php
    $query_args = array(
    'post_type' => 'post',
    'paged'          => $paged2,
    'posts_per_page' => 4,
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
    <div id="sugestoes-de-pauta" class="inner-session sugestoes-de-pauta">
      <h2 class="title">Sugestões de Pauta</h2>
      <ul class="list">
        <?php
        while ( $query->have_posts() ) :
        $query->the_post();
        echo '<li id="post_id_'.get_the_id().'">
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
      <?php
        $pag_args2 = array(
            'format'  => '?paged2=%#%#sugestoes-de-pauta',
            'current' => $paged2,
            'total'   => $query->max_num_pages,
            'add_args' => array( 'paged1' => $paged1 )
        );
        echo paginate_links( $pag_args2 );
      ?>
    </div>
    <?php endif;
    wp_reset_query();
    wp_reset_postdata();
    ?>
  </div>
</section>
<?php if($nossos_parceirosID->ID || get_field('parceiros', $nossos_parceirosID->ID)) : ?>
<?php get_template_part('template_parts/parceiros'); ?>
<?php endif; ?>
<?php get_footer(); ?>