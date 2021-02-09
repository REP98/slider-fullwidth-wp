<!DOCTYPE html>
<html {{language_attributes()}}>
	<head>
		<meta charset="{{bloginfo( 'charset' )}}" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>{{$post_title}}</title>
		<link rel="preconnect" href="https://maxst.icons8.com">
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<?php wp_head(); ?>
		<link rel="stylesheet" type="text/css" href="@assets('css/main.min.css')">
		<style type="text/css">
			#wpadminbar{
				display: none !important;
				visibility: hidden !important;
				opacity: 0 !important;
			}
		</style>
	</head>
	<body data-id="{{$data_id}}">
		@if($preload)
		@include('preloader')
		@endif