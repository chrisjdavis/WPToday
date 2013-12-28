<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">

<title>WP TODAY: Latest World and US WP News</title>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php wp_head(); ?>

<script type="text/javascript">
	var $ = jQuery.noConflict();
	if ( typeof(WPTDY) == "undefined" ) { WPTDY = {}; }
		WPTDY.url = "<?php bloginfo('home'); ?>/";
		WPTDY.site_title = "WP TODAY: Latest World and US WP News";
		WPTDY.non_poppers = ["<?php bloginfo('home'); ?>/", <?php echo USACore::_cat_urls(); ?>];
		WPTDY.entity_title = "<?php echo USACore::_find_title( $_SERVER ); ?>";
</script>
</head>
<body>

<?php get_template_part( 'partials/nav' ); ?>
