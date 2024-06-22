<?php
	$imagePath = get_stylesheet_directory_uri() . '/image';
	//トップページ以外の場合の処理
	if( !is_front_page() and !is_home() ):
?>
	<?php
		if (is_post_type_archive('news')) :
	?>
	<div class="c-area__hero" data-hero="default" data-page="news">
	<?php else: ?>
	<div class="c-area__hero" data-hero="default">
	<?php endif; ?>
		<div class="c-area__hero-default">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo $imagePath; ?>/hero-01.svg" alt="todo"></a>
		</div>
		<?php
			if (is_post_type_archive('news')) :
		?>
			<h1>NEWS</h1>
		<?php
			elseif (!is_singular('news')) :
		?>
			<h1><?php the_title(); ?></h1>
		<?php else: ?>
			<div><span>NEWS</span></div>
		<?php endif; ?>
	</div>
<?php
	else:
?>
	<div class="c-area__hero" data-hero="front" data-page="front">
		<div class="c-area__hero-front">
			<img src="<?php echo $imagePath; ?>/hero-front-01.svg" width="305" height="302" alt="ART FAIR ASIA FUKUOKA 2023 SEP 22-24 MARINE MESSE FUKUOKA Hall B">
		</div>
	</div>
<?php
	endif;
?>
<?php // hero ここまで ?>
