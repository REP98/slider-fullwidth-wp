		@if(!empty($modal))
		@include('modal')
		@endif
		<script type="text/javascript" src="@assets('js/script.js')"></script>
		<?php wp_footer(); ?>
		<script type="text/javascript" defer>
			window.addEventListener('load', function(){
				console.log('HOLA',$)
				setTimeout(function(){
					var hide = function(){
						//Style
						var style = JSON.parse('{!!$style!!}');
						if(!$.isPlainObject(style)){
							$.each(style,function(n, v){
								document.documentElement.setProperty(n,v);
							});						
						}
						if($('#preload').length > 0){
							$('#preload').toggleClass('hidde');	
						}						
					}
					if($ === undefined){
						var SI = setInterval(function(){
							if($ !== undefined){
								clearInterval(SI);
								hide();
							}
						},500);
					}else{ hide(); }
				}, 500);

			})
		</script>
	</body>
</html> 