<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$outline = get_field( 'outline' );
	$currentLang = get_locale();
?>

<main class="p-about">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title" data-bg="secondary">
					<h1>ABOUT</h1>
				</div>
				<div class="p-about__wrapper">
					<div class="p-about__hero">
						<div class="p-about__hero-content">
							<?php
								$afaf = get_field('afaf')
							?>
							<p><?php echo $afaf['afaf_summary_title'] ?></p>
							<p><?php echo $afaf['afaf_summary'] ?></p>
						</div>
						<div class="p-about__hero-picture">
							<img src="<?php echo $afaf['afaf_img']['url']; ?>" alt="写真：ART FAIR ASIA FUKUOKAの様子">
						</div>
					</div>
					<div class="p-about__content">
						<h2>ART FAIR ASIA FUKUOKA 2024<span>Outline</span></h2>
						<div class="p-about__section">
							<h3>Greeting</h3>
							<div class="p-about__greeting">
								<?php
									if ( $outline ) {
										echo $outline;
									}
								?>
								<?php if ($currentLang != 'en_US') : ?>
								<p data-greeting="end">一般社団法人 アートフェアアジア福岡</p>
								<?php else: ?>
								<p data-greeting="end">General Incorporated Association <span>ART FAIR ASIA FUKUOKA</span></p>
								<?php endif; ?>
							</div>
						</div>
						<div class="p-about__section">
							<h3>Overview</h3>
							<div class="p-about__overview">
								<?php
									if(have_rows('contents')):
								?>
								<dl>
									<?php
										while(have_rows('contents')): the_row();
											$title = get_sub_field('title');
											$details = get_sub_field('details');
									?>
									<div>
										<?php
											if ( $title ) {
												echo '<dt>' . $title . '</dt>';
											}
											if ( $details ) {
												echo '<dd>' . $details . '</dd>';
											}
										?>
									</div>
									<?php
										endwhile;
									?>
								</dl>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
