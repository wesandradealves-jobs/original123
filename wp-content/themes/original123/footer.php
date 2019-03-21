</main>
<footer class="footer">
<div class="container">
	<h2 class="title">Contato</h2>
	<div>
		<form class="contactform" method="POST" action="<?php echo site_url('PHPMailer/send.php') ?>">
			<span>
				<input required="required" type="text" name="nome" placeholder="Nome *">
			</span>
			<span>
				<input required="required" type="text" name="empresa" placeholder="Empresa *">
			</span>
			<span>
				<input required="required" type="email" name="email" placeholder="E-mail *">
			</span>
			<span>
				<input type="tel" name="telefone" placeholder="Telefone" class="telefone">
			</span>
			<span>
				<textarea required="required" name="mensagem" placeholder="Deixe aqui sua mensagem *"></textarea>
			</span>
			<!-- 		      <span>
					<button class="btn btn-1">Enviar</button>
			</span>
			-->
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
			<div id="map" class="map"></div>
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
<?php if($post->post_name != 'contato') : ?>
<a onclick="backToTop(this)" href="javascript:void(0)" class="backToTop">
	<i class="fal fa-angle-up"></i>
	<span>Voltar ao topo</span>
</a>
<?php endif; ?>
</footer>
</div>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC5QMfSnVnSCcmkFag0ygrXzj2QJ9usEG4'></script>
<noscript>Seu Navegador pode não aceitar javascript.</noscript>

<script>
	<?php 
		$lat = explode(',', get_theme_mod('maps'))[0];
		$lng = explode(',', get_theme_mod('maps'))[1];
		echo '
			function init_map(){
				var mapOptions = {
				  center: new google.maps.LatLng('.$lat.', '.$lng.'),
				  zoom: 15,
				  disableDefaultUI: false,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var marker = new google.maps.Marker({
                    position: "'.get_theme_mod('maps').'",
                    map: map
                });				
				var map = new google.maps.Map(document.getElementById("map"),
				            mapOptions);
				var marker = new google.maps.Marker({position: {lat: '.$lat.', lng: '.$lng.'}, map: map});	
			}
		    google.maps.event.addDomListener(window, "load", init_map);
	    '; 
    ?>
</script>
<noscript>Seu Navegador pode não aceitar javascript.</noscript>
<?php
	if(!is_front_page()){
		echo "
<script>
	$(document).ready(function () {
			$( '.menu>div>ul>li' ).each(function() {
				if($(this).children().attr('href').indexOf('#') != -1){
					var url = $(this).children().attr('href');
					$(this).children().attr('href',  '".home_url()."/'+url);
				}
			});
			});
</script>
<noscript>Seu Navegador pode não aceitar javascript.</noscript>
";
}
?>
<script>
	$(document).ready(function () {
			$( ".o-que-fazemos-menu a" ).each(function() {
				$(this).click(function(event) {
					event.preventDefault();
					function convertToSlug(Text)
					{
					return Text
					.toLowerCase()
					.replace(/[^\w ]+/g,'')
					.replace(/ +/g,'-')
					;
					}
					var slug = $(this).text().trim();
					if($('body').is('.pg-interna')){
						if($('[id*="'+slug+'"]').offset().top){
						$('html, body').stop(true, false).animate({
						scrollTop: $('[id*="'+slug+'"]').offset().top
							}, 1000);
						}
					} else {
window.location = '<?php echo get_the_permalink($o_que_fazemosID); ?>' + 'o-que-fazemos#' + slug;
}
});
});
});
</script>
<noscript>Seu Navegador pode não aceitar javascript.</noscript>
<?php wp_footer(); ?>
</body>
</html>