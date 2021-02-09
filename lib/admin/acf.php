<?php

use Bin\Tpl;

if(! function_exists('spfp_acf_groud_load')){
	function spfp_acf_groud_load(){
		/**
		 * Registra Grupo 1
		 */
		$fields = [
			[
				'key'=>'spfp_numberpost',
				'label'=>__('Cantidad de Secciones a mostrar',SPFP_TEXT_DOMAIN),
				'name'=>'number_post',
				'type'=>'number',
				'required'=>1,
				'default_value'=>5,
				'wrapper' => array (
					'width' => '30',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_orderpost',
				'label'=>__('Ordenar por ',SPFP_TEXT_DOMAIN),
				'name'=>'orderpost_spfp',
				'type'=>'select',
				'required'=>1,
				'choices'=>[
					'date'=>'Fecha',
					'name'=>'Nombre'
				],
				'default_value'=>'date',
				'wrapper' => array (
					'width' => '35',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_asendpost',
				'label'=>__('Orden de Muestra',SPFP_TEXT_DOMAIN),
				'name'=>'asendpost',
				'type'=>'select',
				'required'=>1,
				'choices'=>[
					'asc'=>'Asendente',
					'desc'=>'Desendente'
				],
				'default_value'=>'desc',
				'wrapper' => array (
					'width' => '35',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_logo',
				'label'=>__('Logo del Slider',SPFP_TEXT_DOMAIN),
				'name'=>'logo_spfp',
				'type'=>'image',
				'return_format'	=> 'url',
				'preview_size'=>'thumbnail',
				'instructions'=>__('Por defecto intentara cargar el icono del sitio actual',SPFP_TEXT_DOMAIN),
				'default_value'=>SPFP_PLUGIN_URL."assets/multimedia/artpost.png",
				'required'=>0
			],
			[
				'key'=>'spfp_back',
				'label'=>__('Enlace de retorno',SPFP_TEXT_DOMAIN),
				'name'=>'link_back',
				'type'=>'link',
				'return_format'=>'url',
				'instructions'=>__('Indique la URL para el botón volver, por defecto se retornara a la raiz de su sitio web',SPFP_TEXT_DOMAIN),
				'default_value'=>site_url(),
				'required'=>0
			]
		];
		acf_add_local_field_group([
			'key'=>'spfp_config_groudslider',
			'title'=>__('Mostrar',SPFP_TEXT_DOMAIN),
			'fields'=>$fields,
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp-group',
					),
				),
			),
			'menu_order'=>0,
			'position'=>'normal',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
		/**
		 * Registra Colores y Estilo
		 */
		$style = [
			[
				'key'=>'spfp_slide_padding',
				'label'=>__('Relleno del Sliders',SPFP_TEXT_DOMAIN),
				'name'=>'section_padding',
				'type'=>'number',
				'instructions'=>__('Cantidad de relleno dentro del Slider, su valor es en PX', SPFP_TEXT_DOMAIN),
				'required'=>1,
				'min'=>0,
				'max'=>500,
				'step'=>1,
				'default_value'=>50,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_margin',
				'label'=>__('Margenes del Sliders',SPFP_TEXT_DOMAIN),
				'name'=>'section_margin',
				'type'=>'number',
				'instructions'=>__('Cantidad de margen del Slider, su valor es en PX',SPFP_TEXT_DOMAIN),
				'required'=>1,
				'min'=>0,
				'max'=>500,
				'step'=>1,
				'default_value'=>0,
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_msm1',
				'label'=>__('Fondo de la Caja de Texto',SPFP_TEXT_DOMAIN),
				'type'=>'message',
				'message'=>__('Establezca aquí un color de fondo de la caja que contendrá la info dentro del slider, si elige mas de un color se utilizara un degradado, por defecto se utilizan 3 colores para un degradado, si solo quiere un color establezca a trasparente los demás, además recuerde colocar transparencia a sus colores para evitar ocultar la imagen de fondo.',SPFP_TEXT_DOMAIN),
				'wrapper' => array (
					'width' => '100',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_content_bg1',
				'label'=>'',
				'name'=>'content_bg[1]',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'rgba(0,0,0,0.80)',
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_content_bg2',
				'label'=>'',
				'name'=>'content_bg[2]',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'rgba(32, 32, 32, 0.66)',
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_content_bg3',
				'label'=>'',
				'name'=>'content_bg[3]',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'rgba(255,255,255,0)',
				'wrapper' => array (
					'width' => '34',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_menu_bg',
				'label'=>__('Fondo del Menú',SPFP_TEXT_DOMAIN),
				'name'=>'menu_bg',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'rgba(0,0,0,0.80)',
				'wrapper' => array (
					'width' => '34',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_menu_fg',
				'label'=>__('Color del Texto del Menú',SPFP_TEXT_DOMAIN),
				'name'=>'menu_fg',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'fff',
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spfp_slide_video__squema',
				'label'=>__('Color de Esquema del vídeo',SPFP_TEXT_DOMAIN),
				'name'=>'video__squema',
				'type'=>'color_picker',
				'required'=>0,
				'default_value'=>'#737F84',
				'wrapper' => array (
					'width' => '33',
					'class' => '',
					'id' => '',
				),
			]

		];
		acf_add_local_field_group([
			'key'=>'spfp_config_style_groudslider',
			'title'=>__('Apariencia del Slider',SPFP_TEXT_DOMAIN),
			'fields'=>$style,
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp-group',
					),
				),
			),
			'menu_order'=>1,
			'position'=>'normal',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
	}
}
if(! function_exists('spfp_acf_load')){
	function spfp_acf_load(){
		/**
		 * Agrega el Campo de Contenido
		 */
		acf_add_local_field_group([
			'key'=>'spfp_field_contents',
			'title'=>'Configuración',
			'fields'=>[
				[
					'key'=> 'spfp_content',
					'label'=>__('Contenido(Opcional si solo quiere vídeo)',SPFP_TEXT_DOMAIN),
					'name'=>'content',
					'instructions'=>__('Máximo de caracteres permitido es 500 ',SPFP_TEXT_DOMAIN),
					'type'=>'wysiwyg',
					'tabs'=>'all',
					'required'=>0,
					'maxlength'=>'500',
					'placeholder' => __('Escriba contenido a mostrar',SPFP_TEXT_DOMAIN),
					'wrapper' => array (
						'width' => '100',
						'class' => '',
						'id' => '',
					),
				]
			],
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp',
					),
				),
			),
			'menu_order'=>0,
			'position'=>'normal',
			'style'=>'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
		/**
		 * Parametros de Configuracion de la sección
		 */
		$fields = [
			[
				'key'=> 'spfp_showtitle',
				'label'=>__('Mostrar Titulo?',SPFP_TEXT_DOMAIN),
				'name'=>'showtitle',
				'type'=>'true_false',
				'required'=>0,
				'message'=>__('Indique si desea que el titulo sea visible en el contenido del Slider',SPFP_TEXT_DOMAIN),
				'ui'=>1,
				'ui_on_text'=>__('SI',SPFP_TEXT_DOMAIN),
				'ui_off_text'=>__('NO',SPFP_TEXT_DOMAIN),
				'default_value'=>1
			],
			[
				'key'=> 'spfp_width',
				'label'=>__('Ancho'),
				'name'=>'width',
				'type'=>'select',
				'instructions'=>__('Establece el ancho que ocupara el contenido del post dentro del Slider',SPFP_TEXT_DOMAIN),
				'required'=>1,
				'choices' =>[
					25=>'25%',
					50=>'50%',
					75=>'75%',
					100=>'100%'
				],
				'wrapper' => array (
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'default_value'=>50
				
			],
			[
				'key'=>'spfp_btng_taling',
				'label'=>__('Alineación del Texto',SPFP_TEXT_DOMAIN),
				'name'=>'Talign',
				'type'=>'button_group',
				'instructions'=>__('Establece la alineación horizontal del Texto',SPFP_TEXT_DOMAIN),
				'required'=>1,
				'choices' =>[
					'left'=>__('Izquierda',SPFP_TEXT_DOMAIN),
					'center'=>__('Centro',SPFP_TEXT_DOMAIN),
					'right'=>__('Derecha',SPFP_TEXT_DOMAIN)
				],
				'wrapper' => array (
					'width' => '35',
					'class' => '',
					'id' => '',
				),
				'default_value'=>'left'
			],
			[
				'key'=>'spfp_align',
				'label'=>__('Alineación del Contenido Vertical',SPFP_TEXT_DOMAIN),
				'name'=>'align',
				'type'=>'button_group',
				'instructions'=>__('Establece la alineación vertical del post dentro del Slider',SPFP_TEXT_DOMAIN),
				'required'=>1,
				'choices' =>[
					'baseline'=>__('Base',SPFP_TEXT_DOMAIN),
					'center'=>__('Centro',SPFP_TEXT_DOMAIN),
					'end'=>__('Pie',SPFP_TEXT_DOMAIN),
					'start'=>__('Inicio',SPFP_TEXT_DOMAIN),
					'stretch'=>__('Estrecho',SPFP_TEXT_DOMAIN)
				],
				'wrapper' => array (
					'width' => '35',
					'class' => '',
					'id' => '',
				),
				'default_value'=>'center'
			],
			[
				'key'=> 'spfp_video',
				'label'=>__('Vídeo(opcional)',SPFP_TEXT_DOMAIN),
				'name'=>'video',
				'type'=>'oembed',
				'instructions'=>__('Seleccione un vídeo de fondo',SPFP_TEXT_DOMAIN),
				'required'=>0,
				'wrapper' => array (
					'width' => '100',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=> 'spfp_showcontent',
				'label'=>__('Ocultar Contenido cuando se muestre un vídeo en pantalla completa?',SPFP_TEXT_DOMAIN),
				'name'=>'showcontent',
				'type'=>'true_false',
				'required'=>0,
				'message'=>__('Indique si al mostrar el vídeo previamente seleccionado se ocultara el contenido',SPFP_TEXT_DOMAIN),
				'ui'=>1,
				'ui_on_text'=>__('SI',SPFP_TEXT_DOMAIN),
				'ui_off_text'=>__('NO',SPFP_TEXT_DOMAIN),
				'default_value'=>1
			],
			[
				'key'=> 'spfp_bgimg',
				'label'=>'Imagen',
				'name'=>'bgimg',
				'type'=>'gallery',
				'return_format'=>'array',
				'preview_size'=>'thumbnail',
				'instructions'=>__('Establezca la imagen de Fondo y la de la tarjeta lateral, si agrega solo una imagen, se usara para ambas secciones, por defecto se usara la segunda imagen agregada. Solo puede agregar maximo 2 imágenes en este campo.',SPFP_TEXT_DOMAIN),
				'required'=>1,
				'max'=>2,
				'min_width'=>36,
				'min_height'=>36,
				'max_width'=>0,
				'max_height'=>0,
				'wrapper' => array (
					'width' => '100',
					'class' => '',
					'id' => '',
				),
			],
		];
		
		acf_add_local_field_group([
			'key'=>'spfp_field',
			'title'=>__('Configuración',SPFP_TEXT_DOMAIN),
			'fields'=>$fields,
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp',
					),
				),
			),
			'menu_order'=>1,
			'position'=>'normal',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
		/**
		 * Styles
		 */
		$fields1 = [
			[
				'key'=>'spf_title_color',
				'label'=>__('Color del Titulo',SPFP_TEXT_DOMAIN),
				'name'=>'title_fg',
				'type'=>'color_picker',
				'required'=>1,
				'default_value'=>'#FFFFFF',
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			],
			[
				'key'=>'spf_content_color',
				'label'=>__('Color del Contenido',SPFP_TEXT_DOMAIN),
				'name'=>'content_fg',
				'type'=>'color_picker',
				'required'=>1,
				'default_value'=>'#bababa',
				'wrapper' => array (
					'width' => '50',
					'class' => '',
					'id' => '',
				),
			]
		];
		acf_add_local_field_group([
			'key'=>'spfp_field_style',
			'title'=>__('Estilo de la sección mostrada',SPFP_TEXT_DOMAIN),
			'fields'=>$fields1,
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp',
					),
				),
			),
			'menu_order'=>2,
			'position'=>'normal',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
		/**
		 * Ground SideBar
		 */
		acf_add_local_field_group([
			'key'=>'spf_get_slider_groud',
			'title'=>'Sliders',
			'fields'=>[
				[
					'key'=>'spfp_sliders_get',
					'label'=>'Sliders',
					'type'=>'post_object',
					'name'=>'sliders_to_slider',
					'post_type'=>'spfp-group',
					'required'=>1,
					'instructions'=>__('Seleccione al nombre del grupo de slider al que pertenece',SPFP_TEXT_DOMAIN),
					'return_format'	=> 'id',
				]
			],
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'spfp',
					),
				),
			),
			'menu_order'=>1,
			'position'=>'side',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		]);
	}
}



function spfp_acf_filter_post($post_id){
	if(! empty($post_id) && 'spfp' == get_post_type( $post_id )){
		$parent = get_field('spfp_sliders_get', $post_id);
		$data = [
			'ID'=>$post_id,
			'post_parent'=>$parent
		];
		wp_update_post( $data );
	}
	
}

add_action( 'spfp/init', 'spfp_acf_groud_load');
add_action( 'spfp/init', 'spfp_acf_load');
add_action( 'acf/save_post', 'spfp_acf_filter_post', 20 );

/**
 * Filtros
 */
function spfp_acf_maxlen_content( $valid, $value, $field, $input){
	if($valid !== true){ return $valid; }

	if(strlen($value) > 500){
		$n = abs(strlen($value) - 500);
		return __('EL contenido del campo es muy largo, el máximo permitido es 500 y su contenido es de '.strlen($value).' favor elimine '.$n.' caracteres.',SPFP_TEXT_DOMAIN);
	}
	return $valid;
}

function spfp_acf_filter_slider_from_postobject($args, $field, $post_id){
	$args['post_status'] = 'publish';
	return $args;
}


add_filter( 'acf/validate_value/type=wysiwyg', 'spfp_acf_maxlen_content', 10, 4 );
add_filter( 'acf/fields/post_object/query', 'spfp_acf_filter_slider_from_postobject', 10, 4 );
?>