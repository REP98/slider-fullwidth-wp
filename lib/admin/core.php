<?php
namespace Bin;

use Bin\Tpl;


/**
 * CORE FROM SPFP
 */
class Spfp_Core
{
	public $Tpl;
	public $cap = 'edit_posts';

	public $instances = array();

	public $icons_dark='data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MDggNTA4IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUwOCA1MDgiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGc+PHBhdGggZD0ibTI1NCAzNzZjLTIyLjA1NiAwLTQwIDE3Ljk0NC00MCA0MHMxNy45NDQgNDAgNDAgNDAgNDAtMTcuOTQ0IDQwLTQwLTE3Ljk0NC00MC00MC00MHptMCA2MGMtMTEuMDI4IDAtMjAtOC45NzItMjAtMjBzOC45NzItMjAgMjAtMjAgMjAgOC45NzIgMjAgMjAtOC45NzIgMjAtMjAgMjB6bS0xNDAtNTRjLTE4Ljc0OCAwLTM0IDE1LjI1Mi0zNCAzNHMxNS4yNTIgMzQgMzQgMzQgMzQtMTUuMjUyIDM0LTM0LTE1LjI1Mi0zNC0zNC0zNHptMCA0OGMtNy43MiAwLTE0LTYuMjgtMTQtMTRzNi4yOC0xNCAxNC0xNCAxNCA2LjI4IDE0IDE0LTYuMjggMTQtMTQgMTR6bTI4MC00OGMtMTguNzQ4IDAtMzQgMTUuMjUyLTM0IDM0czE1LjI1MiAzNCAzNCAzNCAzNC0xNS4yNTIgMzQtMzQtMTUuMjUyLTM0LTM0LTM0em0wIDQ4Yy03LjcyIDAtMTQtNi4yOC0xNC0xNHM2LjI4LTE0IDE0LTE0IDE0IDYuMjggMTQgMTQtNi4yOCAxNC0xNCAxNHptLTYwLTIzMGMyOS43NzYgMCA1NC0yNC4yMjQgNTQtNTRzLTI0LjIyNC01NC01NC01NC01NCAyNC4yMjQtNTQgNTQgMjQuMjI0IDU0IDU0IDU0em0wLTg4YzE4Ljc0OCAwIDM0IDE1LjI1MiAzNCAzNHMtMTUuMjUyIDM0LTM0IDM0LTM0LTE1LjI1Mi0zNC0zNCAxNS4yNTItMzQgMzQtMzR6bTE2NCA4MS4wN2M1LjUxIDAgMTAgNC40OSAxMCAxMHMtNC40OSAxMC0xMCAxMC0xMC00LjQ5LTEwLTEwIDQuNDktMTAgMTAtMTB6bS00ODggMjBjLTUuNTEgMC0xMC00LjQ4LTEwLTEwIDAtNS41MSA0LjQ5LTEwIDEwLTEwczEwIDQuNDkgMTAgMTBjMCA1LjUyLTQuNDkgMTAtMTAgMTB6bTQ2OC0xMzEuNDI4aC01MHYtMTkuNjQyYzAtNS41MjMtNC40NzctMTAtMTAtMTBoLTMyOGMtNS41MjMgMC0xMCA0LjQ3Ny0xMCAxMHYyMGgtNTBjLTE2LjU2OSAwLTMwIDEzLjQzMS0zMCAzMHY0NS43MjNjMCA1LjMxOCA0IDkuOTczIDkuMzA2IDEwLjMzNCA1LjgyMi4zOTcgMTAuNjk0LTQuMjM2IDEwLjY5NC05Ljk3NnYtNDYuMDgxYy4wMS01LjUgNC41LTkuOTkgMTAtMTBoNTB2MjA2aC01MGMtNS41LS4wMS05Ljk5LTQuNS0xMC0xMHYtNDkuOTNjMC01Ljc0LTQuODcyLTEwLjM3My0xMC42OTQtOS45NzYtNS4zMDYuMzYxLTkuMzA2IDUuMDE2LTkuMzA2IDEwLjMzNHY0OS41NzJjMCAxNi41NjkgMTMuNDMxIDMwIDMwIDMwaDUwdjIwYzAgNS41MjMgNC40NzcgMTAgMTAgMTBoMzI4YzUuNTIzIDAgMTAtNC40NzcgMTAtMTB2LTIwLjM1OGg1MGMxNi41NjkgMCAzMC0xMy40MzEgMzAtMzB2LTQ5LjU3MmMwLTUuMzE4LTQtOS45NzMtOS4zMDYtMTAuMzM0LTUuODIyLS4zOTYtMTAuNjk0IDQuMjM3LTEwLjY5NCA5Ljk3NnY0OS45M2MtLjAxIDUuNS00LjUgOS45OS0xMCAxMGgtNTB2LTIwNmg1MGM1LjUuMDEgOS45OSA0LjUgMTAgMTB2NDYuMDgxYzAgNS43NCA0Ljg3MiAxMC4zNzMgMTAuNjk0IDkuOTc2IDUuMzA2LS4zNjEgOS4zMDYtNS4wMTYgOS4zMDYtMTAuMzM0di00NS43MjNjMC0xNi41NjktMTMuNDMxLTMwLTMwLTMwem0tNzAtOS42NDJ2MjYyLjE3MmwtMTMzLjIyNi0xMjQuNTM4Yy0xNi45NzctMTUuODctNDMuNTczLTE1Ljg2OS02MC41NDkgMGwtMjkuOTAxIDI3Ljk1MS03My4xMTEtOTEuMzg4Yy0zLjAwOC0zLjc2LTYuODc3LTYuNTgyLTExLjIxNC04LjI5NXYtNjUuOTAyem0tMzA4IDkyLjE5NSA5OS42MDEgMTI0LjVjOC4zMjIgMTAuNDAyIDIzLjkzOS0yLjA5MiAxNS42MTctMTIuNDk0bC0xOC4zNjItMjIuOTUzIDMxLjAyOC0yOS4wMDRjOS4zMTctOC43MSAyMy45MTYtOC43MSAzMy4yMzMgMGwxMjEuNjkgMTEzLjc1NmgtMjgyLjgwN3oiLz48L2c+PC9zdmc+';
	public $icons_white='data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjxzdmcKICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIgogICB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiCiAgIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKICAgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIgogICB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSIKICAgaWQ9IkNhcGFfMSIKICAgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTA4IDUwOCIKICAgaGVpZ2h0PSI1MTIiCiAgIHZpZXdCb3g9IjAgMCA1MDggNTA4IgogICB3aWR0aD0iNTEyIgogICB2ZXJzaW9uPSIxLjEiCiAgIHNvZGlwb2RpOmRvY25hbWU9InNsaWRlcl93aGl0ZS5zdmciCiAgIGlua3NjYXBlOnZlcnNpb249IjAuOTIuMiAoNWMzZTgwZCwgMjAxNy0wOC0wNikiPgogIDxtZXRhZGF0YQogICAgIGlkPSJtZXRhZGF0YTExIj4KICAgIDxyZGY6UkRGPgogICAgICA8Y2M6V29yawogICAgICAgICByZGY6YWJvdXQ9IiI+CiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+CiAgICAgICAgPGRjOnR5cGUKICAgICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9wdXJsLm9yZy9kYy9kY21pdHlwZS9TdGlsbEltYWdlIiAvPgogICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPgogICAgICA8L2NjOldvcms+CiAgICA8L3JkZjpSREY+CiAgPC9tZXRhZGF0YT4KICA8ZGVmcwogICAgIGlkPSJkZWZzOSIgLz4KICA8c29kaXBvZGk6bmFtZWR2aWV3CiAgICAgcGFnZWNvbG9yPSIjZmZmZmZmIgogICAgIGJvcmRlcmNvbG9yPSIjNjY2NjY2IgogICAgIGJvcmRlcm9wYWNpdHk9IjEiCiAgICAgb2JqZWN0dG9sZXJhbmNlPSIxMCIKICAgICBncmlkdG9sZXJhbmNlPSIxMCIKICAgICBndWlkZXRvbGVyYW5jZT0iMTAiCiAgICAgaW5rc2NhcGU6cGFnZW9wYWNpdHk9IjAiCiAgICAgaW5rc2NhcGU6cGFnZXNoYWRvdz0iMiIKICAgICBpbmtzY2FwZTp3aW5kb3ctd2lkdGg9IjEzNjYiCiAgICAgaW5rc2NhcGU6d2luZG93LWhlaWdodD0iNzQ1IgogICAgIGlkPSJuYW1lZHZpZXc3IgogICAgIHNob3dncmlkPSJmYWxzZSIKICAgICBpbmtzY2FwZTp6b29tPSIwLjQ2MDkzNzUiCiAgICAgaW5rc2NhcGU6Y3g9IjI1NiIKICAgICBpbmtzY2FwZTpjeT0iMjU2IgogICAgIGlua3NjYXBlOndpbmRvdy14PSItOCIKICAgICBpbmtzY2FwZTp3aW5kb3cteT0iLTgiCiAgICAgaW5rc2NhcGU6d2luZG93LW1heGltaXplZD0iMSIKICAgICBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJDYXBhXzEiIC8+CiAgPGcKICAgICBpZD0iZzQiCiAgICAgc3R5bGU9ImZpbGw6I2ZmZmZmZiI+CiAgICA8cGF0aAogICAgICAgZD0ibTI1NCAzNzZjLTIyLjA1NiAwLTQwIDE3Ljk0NC00MCA0MHMxNy45NDQgNDAgNDAgNDAgNDAtMTcuOTQ0IDQwLTQwLTE3Ljk0NC00MC00MC00MHptMCA2MGMtMTEuMDI4IDAtMjAtOC45NzItMjAtMjBzOC45NzItMjAgMjAtMjAgMjAgOC45NzIgMjAgMjAtOC45NzIgMjAtMjAgMjB6bS0xNDAtNTRjLTE4Ljc0OCAwLTM0IDE1LjI1Mi0zNCAzNHMxNS4yNTIgMzQgMzQgMzQgMzQtMTUuMjUyIDM0LTM0LTE1LjI1Mi0zNC0zNC0zNHptMCA0OGMtNy43MiAwLTE0LTYuMjgtMTQtMTRzNi4yOC0xNCAxNC0xNCAxNCA2LjI4IDE0IDE0LTYuMjggMTQtMTQgMTR6bTI4MC00OGMtMTguNzQ4IDAtMzQgMTUuMjUyLTM0IDM0czE1LjI1MiAzNCAzNCAzNCAzNC0xNS4yNTIgMzQtMzQtMTUuMjUyLTM0LTM0LTM0em0wIDQ4Yy03LjcyIDAtMTQtNi4yOC0xNC0xNHM2LjI4LTE0IDE0LTE0IDE0IDYuMjggMTQgMTQtNi4yOCAxNC0xNCAxNHptLTYwLTIzMGMyOS43NzYgMCA1NC0yNC4yMjQgNTQtNTRzLTI0LjIyNC01NC01NC01NC01NCAyNC4yMjQtNTQgNTQgMjQuMjI0IDU0IDU0IDU0em0wLTg4YzE4Ljc0OCAwIDM0IDE1LjI1MiAzNCAzNHMtMTUuMjUyIDM0LTM0IDM0LTM0LTE1LjI1Mi0zNC0zNCAxNS4yNTItMzQgMzQtMzR6bTE2NCA4MS4wN2M1LjUxIDAgMTAgNC40OSAxMCAxMHMtNC40OSAxMC0xMCAxMC0xMC00LjQ5LTEwLTEwIDQuNDktMTAgMTAtMTB6bS00ODggMjBjLTUuNTEgMC0xMC00LjQ4LTEwLTEwIDAtNS41MSA0LjQ5LTEwIDEwLTEwczEwIDQuNDkgMTAgMTBjMCA1LjUyLTQuNDkgMTAtMTAgMTB6bTQ2OC0xMzEuNDI4aC01MHYtMTkuNjQyYzAtNS41MjMtNC40NzctMTAtMTAtMTBoLTMyOGMtNS41MjMgMC0xMCA0LjQ3Ny0xMCAxMHYyMGgtNTBjLTE2LjU2OSAwLTMwIDEzLjQzMS0zMCAzMHY0NS43MjNjMCA1LjMxOCA0IDkuOTczIDkuMzA2IDEwLjMzNCA1LjgyMi4zOTcgMTAuNjk0LTQuMjM2IDEwLjY5NC05Ljk3NnYtNDYuMDgxYy4wMS01LjUgNC41LTkuOTkgMTAtMTBoNTB2MjA2aC01MGMtNS41LS4wMS05Ljk5LTQuNS0xMC0xMHYtNDkuOTNjMC01Ljc0LTQuODcyLTEwLjM3My0xMC42OTQtOS45NzYtNS4zMDYuMzYxLTkuMzA2IDUuMDE2LTkuMzA2IDEwLjMzNHY0OS41NzJjMCAxNi41NjkgMTMuNDMxIDMwIDMwIDMwaDUwdjIwYzAgNS41MjMgNC40NzcgMTAgMTAgMTBoMzI4YzUuNTIzIDAgMTAtNC40NzcgMTAtMTB2LTIwLjM1OGg1MGMxNi41NjkgMCAzMC0xMy40MzEgMzAtMzB2LTQ5LjU3MmMwLTUuMzE4LTQtOS45NzMtOS4zMDYtMTAuMzM0LTUuODIyLS4zOTYtMTAuNjk0IDQuMjM3LTEwLjY5NCA5Ljk3NnY0OS45M2MtLjAxIDUuNS00LjUgOS45OS0xMCAxMGgtNTB2LTIwNmg1MGM1LjUuMDEgOS45OSA0LjUgMTAgMTB2NDYuMDgxYzAgNS43NCA0Ljg3MiAxMC4zNzMgMTAuNjk0IDkuOTc2IDUuMzA2LS4zNjEgOS4zMDYtNS4wMTYgOS4zMDYtMTAuMzM0di00NS43MjNjMC0xNi41NjktMTMuNDMxLTMwLTMwLTMwem0tNzAtOS42NDJ2MjYyLjE3MmwtMTMzLjIyNi0xMjQuNTM4Yy0xNi45NzctMTUuODctNDMuNTczLTE1Ljg2OS02MC41NDkgMGwtMjkuOTAxIDI3Ljk1MS03My4xMTEtOTEuMzg4Yy0zLjAwOC0zLjc2LTYuODc3LTYuNTgyLTExLjIxNC04LjI5NXYtNjUuOTAyem0tMzA4IDkyLjE5NSA5OS42MDEgMTI0LjVjOC4zMjIgMTAuNDAyIDIzLjkzOS0yLjA5MiAxNS42MTctMTIuNDk0bC0xOC4zNjItMjIuOTUzIDMxLjAyOC0yOS4wMDRjOS4zMTctOC43MSAyMy45MTYtOC43MSAzMy4yMzMgMGwxMjEuNjkgMTEzLjc1NmgtMjgyLjgwN3oiCiAgICAgICBpZD0icGF0aDIiCiAgICAgICBzdHlsZT0iZmlsbDojZmZmZmZmIiAvPgogIDwvZz4KPC9zdmc+Cg==';
	
	function __construct()
	{
		$this->Tpl = Tpl::get_instance();
	}

	function initialize(){
		
		add_action( 'init', array($this, 'init'), 5 );
		add_action( 'init', array($this, 'register_post_types'), 5 );
		add_action( 'init', array($this, 'register_post_template'), 5 );
		add_action( 'admin_menu', 				array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts',	array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts',	array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'current_screen',			array( $this, 'current_screen' ) );
		add_action( 'wp_enqueue_script', 		array( $this, 'wp_enqueue_script' ) );

		add_action( 'manage_spfp_posts_custom_column', array($this, 'manage_spfp_posts_custom_column'), 10,2 );
		add_filter( 'manage_spfp_posts_columns', array($this, 'manage_spfp_posts_columns'), 10,2);

		add_action( 'manage_spfp-group_posts_custom_column', array($this, 'manage_spfp_group_posts_custom_column'), 10,2 );
		add_filter( 'manage_spfp-group_posts_columns', array($this, 'manage_spfp_group_posts_columns'), 10,2);
		
	}

	function init(){
		if( !did_action('plugins_loaded') ) {
			return;
		}

		do_action( 'spfp/init', SPFP_VERSION );
	}

	function register_post_types(){
		register_post_type('spfp-group',[
			'labels'             => array(
				'name'               => __('Sliders Posts', SPFP_TEXT_DOMAIN),
				'singular_name'      => __('Slider Post', SPFP_TEXT_DOMAIN),
				'add_new'            => __('Agregar Slider', SPFP_TEXT_DOMAIN),
				'add_new_item'       => __('Agregar Grupo de Slider', SPFP_TEXT_DOMAIN),
				'edit_item'          => __('Editar Grupo de Slider', SPFP_TEXT_DOMAIN),
				'new_item'           => __('Nuevo  Grupo de Slider', SPFP_TEXT_DOMAIN),
				'view_item'          => __('Ver Sliders', SPFP_TEXT_DOMAIN),
				'search_items'       => __('Buscar Slider', SPFP_TEXT_DOMAIN),
				'not_found'          => __('Slider No encontrado', SPFP_TEXT_DOMAIN),
				'not_found_in_trash' => __('Slider No encontrado en la papelera', SPFP_TEXT_DOMAIN),
			),
			'public'             =>true,
			'hierarchical'       =>true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'menu_icon'          =>$this->icons_white,
			'_builtin'           => false,
			'capability_type'    => 'post',
			'capabilities'       => array(
				'edit_post'          => $this->cap,
				'delete_post'        => $this->cap,
				'edit_posts'         => $this->cap,
				'delete_posts'       => $this->cap,
			),
			'supports'           => array('title'),
			'rewrite'            => false,
		]);
		register_post_type('spfp',[
			'labels'             => array(
				'name'               => __('Secciones', SPFP_TEXT_DOMAIN),
				'singular_name'      => __('Sección', SPFP_TEXT_DOMAIN),
				'add_new'            => __('Agregar Sección', SPFP_TEXT_DOMAIN),
				'add_new_item'       => __('Agregar Sección', SPFP_TEXT_DOMAIN),
				'edit_item'          => __('Editar Sección', SPFP_TEXT_DOMAIN),
				'new_item'           => __('Nuevo Sección', SPFP_TEXT_DOMAIN),
				'view_item'          => __('Ver Sección', SPFP_TEXT_DOMAIN),
				'search_items'       => __('Buscar Sección', SPFP_TEXT_DOMAIN),
				'not_found'          => __('Sección No encontrado', SPFP_TEXT_DOMAIN),
				'not_found_in_trash' => __('Sección No encontrado en la papelera', SPFP_TEXT_DOMAIN),
			),
			'public'             =>false,
			'hierarchical'       =>true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'_builtin'           => false,
			'capability_type'    => 'post',
			'capabilities'       => array(
				'edit_post'          => $this->cap,
				'delete_post'        => $this->cap,
				'edit_posts'         => $this->cap,
				'delete_posts'       => $this->cap,
			),
			'supports'           => array('title'),
			'rewrite'            => false,
			'query_var'          => false,
		]);
	}

	function register_post_template(){
		if(! file_exists(get_template_directory().'/single-spfp-group.php')){
			copy(SPFP_PLUGIN_DIR.'/templates/single-spfp-group.php',get_template_directory().'/single-spfp-group.php');
		}
	}

	function admin_menu() {
		// Vars.
		$slug = 'edit.php?post_type=spfp-group';
		$cap = $this->cap;

		// Add menu items.
		add_menu_page(
			__('Slider Post FullScreen', SPFP_TEXT_DOMAIN),
			__('Slider Post',SPFP_TEXT_DOMAIN),
			$cap,
			$slug,
			false,
			$this->icons_white,
			6
		);
		add_submenu_page( 
			$slug,
			__('Secciones del Slider',SPFP_TEXT_DOMAIN), 
			__('Lista de Secciones',SPFP_TEXT_DOMAIN), 
			$cap, 
			"edit.php?post_type=spfp"
		);
		add_submenu_page( 
			$slug,
			__('Nuevo Grupo de Slide',SPFP_TEXT_DOMAIN), 
			__('Agregar Sliders',SPFP_TEXT_DOMAIN), 
			$cap, 
			"post-new.php?post_type=spfp-group"
		);
		add_submenu_page( 
			$slug,
			__('Nueva Sección de Slide',SPFP_TEXT_DOMAIN), 
			__('Agregar Sección',SPFP_TEXT_DOMAIN), 
			$cap, 
			"post-new.php?post_type=spfp"
		);
		/*add_submenu_page( 
			$slug, 
			'Demo', 
			"Demo",  https://www.gnu.org/licenses/
			$cap, 
			SPFP_PLUGIN_URL."/demo/index.php"
		);*/
	}

	function admin_enqueue_scripts() {
		wp_enqueue_style( 'spfp-global' );
	}

	function wp_enqueue_script() {
		wp_enqueue_style( 'spfp-global-frontend' );
		wp_register_style( 'spfp-global-frontend', SPFP_PLUGIN_URL.'assets/css/main.min.css', false, '0.0.7' );
		wp_register_script( 'spfp-global-frontend', SPFP_PLUGIN_URL.'assets/js/script.js', array(), '0.0.7', true );
	}

	function current_screen( $screen ){
		if( isset( $screen->post_type ) && 
			($screen->post_type === 'spfp'  || $screen->post_type === 'spfp-group' )
			) {
			add_action( 'in_admin_header',		array( $this, 'in_admin_header' ) );
		}
	}

	function in_admin_header(){
		echo $this->Tpl->view('admin.logo',[
			'title'=>'Slider Post FUllPAGE',
			'version'=>SPFP_VERSION
		]);
	}

	function manage_spfp_posts_columns($columns)
	{
		return [
			'cb'=> '<input type="checkbox" />',
			'thumbnail'=>__('Imagen', SPFP_TEXT_DOMAIN)	,
			'title'=>__('Titulo de Secciones', SPFP_TEXT_DOMAIN),
			'author'=>__('Autor',SPFP_TEXT_DOMAIN),
			'date'=>__('Fecha',SPFP_TEXT_DOMAIN)
		];
	}

	function manage_spfp_posts_custom_column($column, $post_id){
		global $post;
		switch ($column) {
			case 'thumbnail':
				$img = get_field('spfp_bgimg',$post_id);
				if(!empty($img) && !empty($img[0]))
				{
					echo '<img src="'.$img[0]['sizes']['thumbnail'].'" style="width: 64px; heigth: 64px;">';
				}else{
					echo '<img src="'.SPFP_PLUGIN_URL.'assets/multimedia/image.svg">';
				}
			break;
		}
	}

	function manage_spfp_group_posts_columns($columns){
		return [
			'cb'=> '<input type="checkbox" />',
			'thumbnail'=>__('Imagen', SPFP_TEXT_DOMAIN)	,
			'title'=>__('Titulo de Slides', SPFP_TEXT_DOMAIN),
			'author'=>__('Autor',SPFP_TEXT_DOMAIN),
			'count_section'=>__('Cantidad de Secciones',SPFP_TEXT_DOMAIN),
			'date'=>__('Fecha',SPFP_TEXT_DOMAIN)
		];
	}

	function manage_spfp_group_posts_custom_column($column, $post_id){
		global $post;
		switch ($column) {
			case 'thumbnail':
				echo '<img src="'.SPFP_PLUGIN_URL.'assets/multimedia/slide.svg">';
			break;
			case 'count_section':
				echo get_field('spfp_numberpost', $post_id);
			break;
		}
	}

	function get_instance( $class ) {
		$name = strtolower($class);
		return isset($this->instances[ $name ]) ? $this->instances[ $name ] : null;
	}

	function new_instance( $class ) {
		$instance = new $class();
		$name = strtolower($class);
		$this->instances[ $name ] = $instance;
		return $instance;
	}

	function get_url_video($shortVideo){
		$res = '/(src=\")(\w\S+)(\")/m';
		
		if(stripos( $shortVideo, 'iframe' ) !== false){
			return ['iframe'=> $shortVideo];
		}

		preg_match_all($res, $shortVideo, $matches, PREG_SET_ORDER, 0);
		$url = (!empty($matches) && !empty($matches[0]))  ? $matches[0][2] : '';
		$parse = parse_url($url);
		if($parse){
			if(stripos( $parse['host'], 'youtube' ) !== false || stripos( $parse['host'], 'youtu.be' ) !== false){
				return [
					'provider'=>'youtube',
					'id'=>substr($parse['path'], 1)
				];
			}
			else if(stripos( $parse['host'], 'vimeo' ) !== false){
				return [
					'provider'=>'vimeo',
					'id'=>substr($parse['path'], 1)
				];
			}
		}
		return $url;
	}

	function get_menu_data($arg)
	{
		$menu = [];
		foreach ($arg as $value) {
			$menu[$value['id']] = [
				'title'=>$value['child_post']->post_title,
				'isvideo'=>$value['isvideofull'],
				'img'=>$value['cardimg'],
				'ext'=>$value['cardtext']
			];
		}
		return $menu;
	}

	function getTextCard($value)
	{
		$val = strip_tags($value);
		$len = strlen($val);
		if($val > 50){
			$val = substr($val, 0, 50);
		}
		return $val;
	}

	function get_children_slider( $data_post ){
		$data = array_merge([
			'post_type'=>'spfp',
			'post_status'=>'publish'
		], $data_post);
		$child_data = get_children( $data );
		$SlideChild = [];
		$ID = $data_post['post_parent'];
		foreach ($child_data as $child) {
			$fields = get_fields($child->ID);
			$fields['video'] = !empty($fields['video']) ? $this->get_url_video( $fields['video'] ) : $fields['video'];
			$cID = 'slide_'.$ID."-".$child->ID;
			$Childata = [
				'id'=>$cID,
				'nocontrol'=>($fields['showcontent'] != true),
				'videfull'=>'',
				'videopost'=>'',
				'isvideofull'=>false,
				'bgimg'=>'',
				'cardimg'=>'',
				'cardtext'=>'',
				'rpcontent'=>[
					'width'=>$fields['width'],
					'align'=>$fields['align'],
					'Talign'=>$fields['Talign'],
					'clsextra'=>'',
					'title'=> $fields['showtitle'] ? $child->post_title : '' ,
					'content'=>''
				],
				'extra'=>'',
				'child_post'=>$child
			];

			if(!empty($fields['video'])){
				$Childata['isvideofull'] = true;
				$Childata['videfull'] = $fields['video'];
				if($fields['showcontent'] == false){
					$Childata['rpcontent']['content'] = $fields['content'];
				}else{
					$Childata['rpcontent']['title'] = '';
					$Childata['rpcontent']['content'] = '';
					$Childata['cardtext'] = $this->getTextCard($fields['content']);
				}
				$img = $fields['bgimg'];
				if(!empty($img)){
					if(count($img) > 1){
						$Childata['videopost'] = $img[0]['url'];
						$Childata['cardimg'] = $img[1]['sizes']['medium'];
					}else{
						$Childata['videopost'] = $img[0]['url'];
						$Childata['cardimg'] = $img[0]['sizes']['medium'];
					}
				}
			}else{
				$Childata['rpcontent']['content'] = $fields['content'];
				$img = $fields['bgimg'];
				if(!empty($img)){
					if(count($img) > 1){
						$Childata['bgimg'] = $img[0]['url'];
						$Childata['cardimg'] = $img[1]['sizes']['medium'];
					}else{
						$Childata['bgimg'] = $img[0]['url'];
						$Childata['cardimg'] = $img[0]['sizes']['medium'];
					}
				}
			}

			$Childata['extra'] = '
				<style>
					#'.$cID.' .rp-content .rpcont > h2{ color: '.$fields['title_fg'].';}
					#'.$cID.' .rp-content .rpcont > div{ color: '.$fields['content_fg'].';}
					#'.$cID.' .rp-content .rpcont > div *{ color: '.$fields['content_fg'].' !important;}
				</style>
			';
			//COMPATIBILIDAD CON MULPLES CONTENIDO PROXIMAMENTE
			$Childata['rpcontent'] = [$Childata['rpcontent']];
			$SlideChild[] = $Childata;			
		}

		$MenuChild = $this->get_menu_data($SlideChild);

		return [
			'content'=>$SlideChild,
			'idSection'=>$MenuChild
		];
	}
}
function spfp() {
	global $spfp;
	
	// Instantiate only once.
	if( !isset($spfp) ) {
		$spfp = new Spfp_Core();
		$spfp->initialize();
	}
	return $spfp;
}

// Instantiate.

spfp();

?>