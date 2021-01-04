<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
		<div data-role="page" data-theme="b" id="jqm-home">
			<div data-role="header">
				<h1><?php bloginfo('name'); ?></h1> 
			</div>

			<div data-role="content">