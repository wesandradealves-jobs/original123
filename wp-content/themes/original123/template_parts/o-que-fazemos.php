        <ul class="o-que-fazemos-menu">

          <?php

            $query_args = array(
              'post_type' => 'o-que-fazemos',
              'order' => 'ASC',
              'orderby' => 'name',              
              'posts_per_page' => -1
            );
            $query = new WP_Query( $query_args );
            while ( $query->have_posts() ) : $query->the_post();
              echo '<li><a href="" class="box-title gray-scheme" title="'.get_the_title().'">
                    <span>
                      <span class="inner">'.get_the_title().'</span>
                    </span> 
              </a></li>';                
            endwhile;
            wp_reset_query();
            wp_reset_postdata();   
          ?>

        </ul>