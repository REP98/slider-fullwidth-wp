/**
 * SPFP js loader
 */
window.debug = true;
global.debug = true;
//SASS
import "./sass/style.scss";

//JS
//LOAD DEPENDECIES
//LOAD LAZYLOAD
import lozad from 'lozad';
import isMobile from 'ismobilejs';
window.isMobile = isMobile;
global.isMobile = isMobile;

import screenfull from 'screenfull';
window.ScreenFull = screenfull;
global.ScreenFull = screenfull;

import Plyr from 'plyr';
window.Plyr = Plyr;
global.Plyr = Plyr;

import $ from "jquery";
window.$ = $;
global.$ = $;

import scrollify from "jquery-scrollify";

function empty(arg){
	let und;
	const emptyVal = [undefined, null, false, 0, 0.0, '', '0', '0.0', und];
	let l = emptyVal.length;

	if(typeof arg === undefined || typeof arg === null){ return true; }

	for(let i = 0;  i < l; i++){
		if(arg === emptyVal[i]) return true;
	}
	if(typeof arg === 'object'){
		for(let i in arg){
			if(hasProp(arg, i)) return false;
		}

		return arg.length == 0;
	}
	return false;
}

$.empty = empty;

$(function(){
	//VAR LIST
	//IS MOBILE
	var IsDev = false,
		wMobile = window.isMobile,
		isPhone = wMobile.phone,
		isTablet = wMobile.tablet,
		isDdesktop = (isPhone === false && !isTablet  === false),

		PlyrDefaults = {
			fn:{
				enterfullscreen:function(event){
					console.log("PLYR.FullScreen",event);
					$.scrollify.update();
				},
				exitfullscreen:function(event) {
					console.log("PLYR.ExitFullScreen",event);
					$.scrollify.update();
				}
			},
			Options: {
					iconUrl :'https://cdn.plyr.io/3.6.3/plyr.svg',
					controls: [
						'play-large',
						'rewind',
						'play',
						'fast-forward',
						'progress',
						'current-time',
						'duration',
						'mute',
						'volume',
						'airplay'
					],
					volume:0.5,
					blankVideo:'video/blank.mp4',
					youtube:{
						controls:0,
						modestbranding:0,
						noCookie:false,
						rel: 0,
						iv_load_policy: 3,
						showinfo:0
					},
					debug:IsDev
				}};

	//MOBILE
	if(isPhone){ $('html').removeClass('istablet').addClass('isphone'); }
	else if(isTablet){ $('html').removeClass('isphone').addClass('istablet'); }
	else if(isDdesktop){ $('html').removeClass('isphone istablet'); }
	
	//PLYR VIDEO
	$('.vplyr').each(function(){
		var src = $(this).data('src');
		if(src != undefined){
			$(this).attr('src', src);
		}

		var player = new Plyr(this, PlyrDefaults.Options);

		$(this).on('enterfullscreen', PlyrDefaults.fn.enterfullscreen);
		$(this).on('enterfullscreen', PlyrDefaults.fn.exitfullscreen);

		$(this).data('video', player);
	});
	
	//SCROLLING
	if(typeof $.scrollify == 'function'){
		$.scrollify({
			section:"section",
			sectionName:'sectionName',
			//interstitialSection:'.showmenu,.artpost-logo,aside',
			scrollbars:false,
			updateHash:false,
			before:function(i,panels) {
				var ref = panels[i].attr('id');
				$('.rp-container section').each(function(){ $(this).removeClass('show')});
				$('a.active').each(function(){ $(this).removeClass('active'); $(this).parent('li').removeClass('active'); });
				$('a[href="#'+ref+'"]').addClass('active');
				$('a[href="#'+ref+'"]').parent('li').addClass('active');
				panels[i].addClass('show');
				if(i > 0){ $('.btn_scroll_btn').hide();}
					else { $('.btn_scroll_btn').show(); }

				$('.vplyr').each(function() {
					if($(this).data('video') !== undefined){
						$(this).data('video').pause();
					}					
				});
			},
			afterResize:function(){
				if($('html').hasClass('isphone')){
					if($.scrollify.current().find('video').length > 0){
						if(screen.orientation.type.indexOf('landscape') > -1){
							$.scrollify.current().find('video').data('video').fullscreen.enter();
						}else{
							if($.scrollify.current().find('video').data('video').fullscreen.active){
								$.scrollify.current().find('video').data('video').fullscreen.exit();
							}
						}
					}
					
				}
			},
			afterRender:function(){
				$('.rp-container section').each(function() {
					var n = $(this).index();
					var id = $(this).attr('id');
					if(n == $.scrollify.currentIndex()){
						$('a[href="#'+id+'"]').addClass('active');
						$('a[href="#'+id+'"]').parent('li').addClass('active');
						$(this).addClass('show');
					}else{
						$('a[href="#'+id+'"]').removeClass('active');
						$('a[href="#'+id+'"]').parent('li').removeClass('active');
						$(this).removeClass('show');
					}
					
				});

				$('a.rp-moveto').on('click',function(e){
					e.preventDefault();
					var i = $(this).attr('href');
					var ix = $(i).index();
					var move  = $.scrollify.move(ix);
				});

				if($('.lazyload').length > 0){
					lozad('.lazyload',{
						threshold: 0.1,
						enableAutoReload: true,
						load:function(el){
							el.src = $(el).data('src');
						}
					}).observe();
				}
				if($('.lazyload-bg').length > 0){
					lozad('.lazyload-bg',{
						threshold: 0.1,
					}).observe();
				}
				if($('.lazyload-vd').length > 0){
					lozad('.lazyload-vd',{
						threshold: 0.1,
					}).observe();
				}
			}
		});
	}

	//MENÚ MOVIL
	$('.rp-dropdown-close, .rp-dropdown').on('click',function(e){
		e.preventDefault();
		$(".rp-menulist").toggleClass('open');
		$(".rp-dropdown").toggleClass('active');
	});
	$('.rp-menulist .moveto').on('click',function(e){
		e.preventDefault();
		$(".rp-menulist").toggleClass('open');
		$(".rp-dropdown").toggleClass('active');
	});

	//FullScreen
	$('.rp-fullscreen a').click(function(event) {
		event.preventDefault();
		if(screenfull.isEnabled){
			screenfull.toggle();
		}
	});
	$('.btn_scroll_btn').on('click', function(e){
		e.preventDefault();
		$.scrollify.instantNext();
	})
})