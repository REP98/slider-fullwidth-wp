<aside class="rp-menu">
	<div class="rp_menu-content">
		<div class="returns">
			<a href="{{$back}}" class="fg-white-hover" title="Regresar">
				<span class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#fff" d="M 7.21875 5.78125 L 5.78125 7.21875 L 14.5625 16 L 5.78125 24.78125 L 7.21875 26.21875 L 16 17.4375 L 24.78125 26.21875 L 26.21875 24.78125 L 17.4375 16 L 26.21875 7.21875 L 24.78125 5.78125 L 16 14.5625 Z"/></svg>
				</span> 
				<span class="plyr__sr-only">volver</span>
			</a>
		</div>
		<div class="rp-timeline">
			@foreach($idSection as $id => $section)
				<div class="rp_tl-content @if($section['isvideo']) rp_card-video @endif">
					<a href="#{{$id}}" class="rp-moveto"><span class="plyr__sr-only">{{$section['title']}}</span></a>
					<div class="rp_card rp_image-header">
						<div class="rcard-header" style="background-image: url({{$section['img']}})"></div>
						<div class="rcard-content p-2">
							<h3>{{$section['title']}}</h3>
							<p class="rtext">{{$section['ext']}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="rp-fullscreen">
			<a href="#" title="Fullscreen">
				<span class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#fff" d="M 4 4 L 4 13 L 6 13 L 6 7.4375 L 14.5625 16 L 6 24.5625 L 6 19 L 4 19 L 4 28 L 13 28 L 13 26 L 7.4375 26 L 16 17.4375 L 24.5625 26 L 19 26 L 19 28 L 28 28 L 28 19 L 26 19 L 26 24.5625 L 17.4375 16 L 26 7.4375 L 26 13 L 28 13 L 28 4 L 19 4 L 19 6 L 24.5625 6 L 16 14.5625 L 7.4375 6 L 13 6 L 13 4 Z"/></svg>
				</span>
				<span class="plyr__sr-only">Full Screen</span>
			</a>
		</div> 
	</div>
</aside>