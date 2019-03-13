  <?php 
    if(!$nossos_parceirosID){
      $nossos_parceirosID = get_page_by_path( 'nossos-parceiros' );
    }
  ?>
  <section class="parceiros">
    <div class="container">
      <h2 class="title"><?php echo (get_page_by_path( 'nossos-parceiros' )->ID == get_the_id()) ? 'Alguns de Nossos Parceiros' : get_the_title($nossos_parceirosID); ?></h2>
      <?php if(get_field('parceiros', $nossos_parceirosID)) : ?>
      <ul class="list">
        <?php 
            $j = 0;
            foreach (get_field('parceiros', $nossos_parceirosID) as $key => $value) { $j++; ?>
              <?php 
                if(get_page_by_path( 'nossos-parceiros' )->ID == get_the_id()) :
                  if($j > 4) :
              ?>
              <li>
                <div class="box simple">
                  <div class="box-inner">
                    <div class="box-content landscape">
                      <div>
                        <p>
                          <h3 class="title"><?php echo $value['nome']; ?></h3>
                          <p><?php echo $value['texto']; ?></p>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php endif; 
              else : ?>
                <li>
                  <div class="box simple">
                    <div class="box-inner">
                      <div class="box-content landscape">
                        <div>
                          <p>
                            <h3 class="title"><?php echo $value['nome']; ?></h3>
                            <p><?php echo $value['texto']; ?></p>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> 
              <?php
              endif;
            }
        ?>
      </ul>
      <?php endif; ?>
    </div>
  </section>