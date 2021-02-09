<section
	id="{{$id}}"
	data-section-name="{{$id}}"
	style="background: #000;"
	class="rp-section @if(empty($videfull)) lazyload-bg" data-placeholder-background="#000" data-background-image="{{$bgimg}}" @else " @endif
>
{!!$extra!!}
	@if(!empty($videfull))
	<div class="ply-content ply-fullscreen @if($nocontrol) ply-no-control @endif">
		@if(is_array($videfull))
			@if(array_key_exists('provider', $videfull))
				<div class="vplyr" data-plyr-provider="{{$videofull['provider']}}" data-plyr-embed-id="{{$videofull['id']}}"></div>
			@else
				<div class="vplyr plyr__video-embed" id="{{$id}}-video">
					{!!$videfull['iframe']!!}
				</div>
			@endif
		@else
		<video autobuffer autoloop loop @if(!$nocontrol) controls @endif
			class="lazyload-vd vplyr" 
			data-poster="{{$videopost}}"
			data-src="{{$videfull}}">
		</video>
		@endif
	</div>
	@endif
	@foreach($rpcontent as $rep)
	<div class="rp-content w-{{$rep['width']}} txt-{{$rep['Talign']}} align-{{$rep['align']}} {{$rep['clsextra']}}">
		<div class="rpcont">
			<h2 class="dh">{{$rep['title']}}</h2>
			<div style="font-size: 140%; line-height: 130%;">{!!$rep['content']!!}</div>
		</div>
	</div>
	@endforeach
</section>
