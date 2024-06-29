<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<title><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?091901">
	<link rel="stylesheet" href="https://use.typekit.net/yya4ezy.css">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/script.js?082501" async></script>
	<?php wp_head();?>
	<script>
		(function(d) {
			var config = {
			kitId: 'fsd6tks',
			scriptTimeout: 3000,
			async: true
			},
			h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
		})(document);
	</script>
</head>

<body>
	<?php
		$imagePath = get_stylesheet_directory_uri() . '/image';
		$currentLang = get_locale();
		$top_page_id = get_option('page_on_front');
		$ticket = get_field( 'ticket', $top_page_id );
		$title = $ticket[ 'title' ];
		$url = $ticket[ 'url' ];
		$site_flow_value = $ticket[ 'site_flow' ];
		//トップページ以外の場合の処理
		if( !is_front_page() and !is_home() ):
	?>
		<header class="c-header">
			<div class="c-header__wrapper">
				<div class="c-header__logo">
					<a href="<?php echo home_url(); ?>">
						<h1>AFAF 2024</h1>
					</a>
				</div>
				<div class="c-header__contents">
				<div class="c-header__nav-bg"></div>
					<div class="c-header__nav">
						<div class="c-header__nav-wrapper">
							<?php include('include/nav-global.php'); ?>
							<div class="c-header__nav-ticket">
								<a style="pointer-events: none; color: #adadad;" href="<?php if ($url) { echo $url; } ?>" target="_blank"><span>TICKET</span></a>
								<?php if ( $title ) : ?>
								<span><?php echo $title; ?></span>
								<?php endif; ?>
							</div>
							<div class="c-header__nav-links">
								<ul class="c-header__nav-links-list">
									<li><a href="<?php echo home_url('contact'); ?>">CONTACT</a></li>
									<li><a href="<?php echo home_url('archives'); ?>">ARCHIVES</a></li>
									<li><a href="<?php echo home_url('privacy-policy'); ?>">PRIVACY POLICY</a></li>
									<li><a href="<?php echo home_url('press'); ?>">PRESS</a></li>
								</ul>
								<ul class="c-header__nav-links-social">
									<li><a href="https://bit.ly/3qgb3ee" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-x.svg" alt="X"></a></li>
									<li><a href="https://bit.ly/3qhZjIj" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-instagram.svg" alt="INSTAGRAM"></a></li>
									<li><a href="https://bit.ly/428gJo1" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-facebook.svg" alt="FACEBOOK"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="c-header__menu-button">
						<div class="c-header__ticket">
							<a style="pointer-events: none; color: #adadad;" href="<?php if ($url) { echo $url; } ?>" target="_blank"><span>TICKET</span></a>
							<?php if ( $title ) : ?>
							<span><?php echo $title; ?></span>
							<?php endif; ?>
						</div>
						<div class="c-header__lang">
							<?php echo do_shortcode('[bogo]'); ?>
						</div>
					</div>
					<button type="button" class="c-header__button" aria-expanded="false">
						<span>MENU OPEN</span>
					</button>
				</div>
			</div>
		</header>
	<?php else: ?>
		<header class="c-header">
			<div class="c-header__wrapper" page="top">
				<div class="c-header__logo">
					<a href="<?php echo home_url(); ?>">
						<h1>ART FAIR ASIA<br />FKUOKA<br />2024</h1>
					</a>
				</div>
				<div class="c-header__contents">
					<div class="c-header__nav-bg"></div>
					<div class="c-header__nav">
						<div class="c-header__nav-wrapper">
							<?php include('include/nav-global.php'); ?>
							<div class="c-header__nav-ticket">
								<a style="pointer-events: none; color: #adadad;" href="<?php if ($url) { echo $url; } ?>" target="_blank"><span>TICKET</span></a>
								<?php if ( $title ) : ?>
								<span><?php echo $title; ?></span>
								<?php endif; ?>
							</div>
							<div class="c-header__nav-links">
								<ul class="c-header__nav-links-list">
									<li><a href="<?php echo home_url('contact'); ?>">CONTACT</a></li>
									<li><a href="<?php echo home_url('archives'); ?>">ARCHIVES</a></li>
									<li><a href="<?php echo home_url('privacy-policy'); ?>">PRIVACY POLICY</a></li>
									<li><a href="<?php echo home_url('press'); ?>">PRESS</a></li>
								</ul>
								<ul class="c-header__nav-links-social">
									<li><a href="https://bit.ly/3qgb3ee" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-x.svg" alt="X"></a></li>
									<li><a href="https://bit.ly/3qhZjIj" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-instagram.svg" alt="INSTAGRAM"></a></li>
									<li><a href="https://bit.ly/428gJo1" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-facebook.svg" alt="FACEBOOK"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="c-header__menu-button">
						<div class="c-header__ticket">
							<a style="pointer-events: none; color: #adadad;" href="<?php if ($url) { echo $url; } ?>" target="_blank"><span>TICKET</span></a>
							<?php if ( $title ) : ?>
							<span><?php echo $title; ?></span>
							<?php endif; ?>
						</div>
						<div class="c-header__lang">
							<?php echo do_shortcode('[bogo]'); ?>
						</div>
					</div>
					<button type="button" class="c-header__button" aria-expanded="false">
						<span>MENU OPEN</span>
					</button>
				</div>
			</div>
		</header>
	<?php endif; ?>
</body>
