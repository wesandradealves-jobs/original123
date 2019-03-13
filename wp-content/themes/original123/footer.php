		</main>
		<footer class="footer">
			<div class="container">
			  <h2 class="title">Contato</h2>
			  <div>
			    <form class="contactform" method="POST" action="<?php site_url('PHPMailer/send.php') ?>">
			      <span>
			        <input type="text" name="nome" placeholder="Nome">
			      </span>
			      <span>
			        <input type="text" name="empresa" placeholder="Empresa">
			      </span>
			      <span>
			        <input type="email" name="email" placeholder="E-mail">
			      </span>
			      <span>
			        <input type="tel" name="telefone" placeholder="Telefone" class="Telefone">
			      </span>
			      <span>
			        <textarea name="mensagem" placeholder="Deixe aqui sua mensagem"></textarea>
			      </span>
			    </form>
			  </div>
			  <div>
			    <h2 class="logo">
			      <?php get_template_part('template_parts/logo'); ?>
			    </h2>
			    <?php get_template_part('template_parts/contato'); ?>
			    <?php if(get_theme_mod('maps')||get_theme_mod('endereco')) : ?>
			    <div>
					<?php if(get_theme_mod('maps')) : ?>		    	
						<div class="map"></div>
					<?php endif; ?>
					<?php if(get_theme_mod('endereco')) : ?>
						<p>
							<?php echo get_theme_mod('endereco'); ?>
						</p>
					<?php endif; ?>
			    </div>
			    <?php endif; ?>
			  </div>
			</div>
			<a onclick="backToTop(this)" href="javascript:void(0)" class="backToTop">
			  <i class="fal fa-angle-up"></i>
			  <span>Voltar ao topo</span>
			</a>
		</footer>
	</div> 
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC5QMfSnVnSCcmkFag0ygrXzj2QJ9usEG4'></script>
    <noscript>Seu Navegador pode não aceitar javascript.</noscript> 
    <script>
      var mapProp = {
          zoom: 18,
          center: new google.maps.LatLng(<?php echo get_theme_mod('maps'); ?>), 
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.TERRAIN
      };  

      var pos = {lat: <?php echo explode(",", get_theme_mod('maps'))[0]; ?>, lng: <?php echo explode(",", get_theme_mod('maps'))[1]; ?>};

      var map = new google.maps.Map(document.querySelector(".map"),mapProp);
      
      var marker = new google.maps.Marker({position: pos, map: map, title: "<?php echo get_bloginfo('title'); ?>"});

      google.maps.event.addDomListener(window, "load", init_map);
    </script>
    <noscript>Seu Navegador pode não aceitar javascript.</noscript> 
    <script>
    	$(document).ready(function () {
			$( ".o-que-fazemos-menu a" ).each(function() {
				$(this).click(function(event) {
					event.preventDefault();

					var slug = convertToSlug($(this).text()),
						el = $('#'+slug);

					if($('body').is('.pg-interna')){
						if(el.length){
						    $('html, body').stop(true, false).animate({
						        scrollTop: el.offset().top
						    }, 1000);	
						}
					} else {
						window.location = '<?php echo get_the_permalink($o_que_fazemosID); ?>' + 'o-que-fazemos#' + slug;
					}
				});
			});
		});    	
    </script>
    <?php wp_footer(); ?>
  </body>
</html>