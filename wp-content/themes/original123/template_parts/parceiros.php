  <?php 

    if(!$nossos_parceirosID){

      $nossos_parceirosID = get_page_by_path( 'nossos-parceiros' )->ID;

    }

  ?>

  <section class="parceiros">

      <?php if(is_front_page()) : ?> 

        <div class="container"> 

      <?php endif; ?>

      <h2 class="title"><?php echo (get_page_by_path( 'nossos-parceiros' )->ID == get_the_id()) ? 'Alguns de Nossos Parceiros' : 'Parceiros'; ?></h2>

      <?php if(get_field('parceiros', $nossos_parceirosID)) : ?>

      <ul class="list">

        <?php 

            foreach (get_field('parceiros', $nossos_parceirosID) as $key => $value) :   

            ?>

                <li>

                  <p>

                    <h3 class="title"><?php echo $value['nome']; ?></h3>

                    <p><?php echo $value['texto']; ?></p>

                  </p>

                </li> 

            <?php 

                endforeach;

            ?>

      </ul>

      <?php endif; ?>

      <?php if(is_front_page()) : ?>  

        </div>

      <?php endif; ?>

  </section>