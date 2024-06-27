<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
?>

<main class="p-404">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="p-404__section">
				<div>
					<h1>404</h1>
					<h2>Page Not Fount</h2>
				</div>
				<p>お探しのページは見つかりませんでした。<br />トップページから再度アクセスをお願いいたします。</p>
				<div class="p-404__top-link">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
