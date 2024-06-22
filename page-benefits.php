<?php
	include('header.php');
	$currentLang = get_locale();
?>

<main class="p-benefits">
	<div class="c-area__content">
		<div class="p-benefits__wrapper js-fadein">
			<div class="p-benefits__heading">
				<h1>TICKET BENEFITS
					<?php if ($currentLang != 'en_US') : ?>
					<span>チケット特典</span>
					<?php endif; ?>
				</h1>
			</div>
			<div class="p-benefits__content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
