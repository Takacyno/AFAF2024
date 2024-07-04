<?php include('header.php'); ?>

<main class="p-privacy">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="p-privacy__wrapper">
				<div class="c-area__content-main margin-right">
					<div class="c-title">
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="p-privacy__content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
