<?php

if(is_single()){
	$Tpl = $spfp->Tpl;
	while ( have_posts() ) :
		the_post();
		echo $Tpl->view('header',[
			'preload'=>true,
			'textPreload'=>'',
			'post_title'=>$post->post_title,
			'data_id'=>$post->ID
		]);
		$field = get_fields($post->ID);
		$post_child = $spfp->get_children_slider([
			'post_parent'=>$post->ID,
			'order'=>$field['asendpost'],
			'numberpost'=>$field['number_post'],
			'orderby'=>$field['orderpost_spfp']
		]);

		$styleData = [
			'--spfp-section-padding'=> ((int) $field['section_padding'] / 16).'rem',
			'--spfp-section-margin'=> ((int) $field['section_margin'] / 16).'rem',
			'--spfp-content-background'=>'linear-gradient(90deg, '.$field['content_bg[1]'].' 0%, '.$field['content_bg[2]'].' 35%, '.$field['content_bg[3]'].' 100%);',
			'--spfp-menu-background'=>$field['menu_bg'],
			'--spfp-menu-color'=>$field['menu_fg'],
			'--plyr-color-main'=>$field['video_esquema']

		];
		$logo = '';
		if(!$field['logo_spfp'] && site_icon_url() == null){
			$logo = SPFP_PLUGIN_URL."assets/multimedia/logo-white.png";
		}else if($field['logo_spfp']){
			$logo = $field['logo_spfp'];
		}else{
			$logo = site_icon_url();
		}
		$content = [];
		foreach ($post_child['content'] as $value) {
			$content[] = $Tpl->view('section', $value);
		}
		$data = [
			'logo'=>$logo,
			'back'=>$field['link_back'],
			'idSection'=>$post_child['idSection'],
			'content'=>$content
		];
		echo $Tpl->view('content',$data);
		echo $Tpl->view('footer',[
			'style'=>json_encode($styleData,JSON_HEX_QUOT)
		]);
	endwhile;
}

?>