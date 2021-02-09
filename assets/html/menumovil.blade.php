<div class="rp-menumovil">
	<button type="button" class="btn rp-dropdown">
		<span class="icon las la-bars"></span>
	</button>
	<ul class="rp-menulist">
		<li><a href="#" class="rp-dropdown-close"><span class="icon las la-times"></span></a></li>
		@foreach($idSection as $id => $section)
		<li><a href="#{{$id}}" class="rp-moveto" data-hidden=".rp-menumovil">{{$section['title']}}</a></li>
		@endforeach
		<li><a href="{{$back}}"><span class="icon las la-power-off"></span>{{__('Salir',SPFP_TEXT_DOMAIN)}}</a></li>
	</ul>
</div>