<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
?>

<main class="p-404">
	<div class="p-404__content">
		<h1><img src="<?php echo $imagePath; ?>/text-404.svg" alt="404" decoding="async"></h1>
		<div class="p-404__content-text">
			<p>The page you are looking for could not be found.<br>
			Please access again from the top page.</p>
			<p><a href="<?php echo home_url(); ?>">TOP</a></p>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
