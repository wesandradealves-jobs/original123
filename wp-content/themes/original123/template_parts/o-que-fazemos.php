        <ul class="o-que-fazemos-menu">
          <?php
          	if(!$o_que_fazemosID){
          		$o_que_fazemosID = get_page_by_path( 'o-que-fazemos' );
          	} 
            foreach (get_field('o_que_fazemos', $o_que_fazemosID) as $key => $value) {
              if(is_front_page()) {
                if(!$value['eh_case']){
                  echo '<li><a href="" title="'.$value['titulo'].'">'.$value['titulo'].'</a></li>';
                }
              } else {
                echo '<li><a href="" title="'.$value['titulo'].'">'.$value['titulo'].'</a></li>';
              }
            }
          ?>
        </ul>