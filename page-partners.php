<?php
	include('header.php');
	$currentLang = get_locale();
?>

<main class="p-partners">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-main">
				<div class="c-title" data-title="minimal">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="p-partners__wrapper">
					<div class="p-partners__content">
						<?php
							if(have_rows('co_sponsored_repeat')):
						?>
							<div class="p-partners__sponsored">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>共催</h2>
								<?php else: ?>
								<h2>Co-sponsors</h2>
								<?php endif; ?>
								<ul>
									<?php
										while(have_rows('co_sponsored_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('co_sponsored_logo'), 'full');
											$link = get_sub_field('co_sponsored_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('sponsorship_repeat')):
						?>
							<div class="p-partners__sponsorship">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>協賛</h2>
								<?php else: ?>
								<h2>Partners</h2>
								<?php endif; ?>
								<ul data-sponsorship="large">
									<?php
										while(have_rows('sponsorship_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('sponsorship_logo'), 'full');
											$link = get_sub_field('sponsorship_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>

								<?php
									if(have_rows('sponsorship_repeat_small')):
								?>
									<ul data-sponsorship="small">
										<?php
											while(have_rows('sponsorship_repeat_small')): the_row();
												$logo = wp_get_attachment_image_src(get_sub_field('sponsorship_logo_small'), 'full');
												$link = get_sub_field('sponsorship_link_small');
										?>
										<li>
											<a href="<?php echo $link; ?>">
												<img src="<?php echo $logo[0]; ?>" alt="">
											</a>
										</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('assisting')):
						?>
							<div class="p-partners__special">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>助成</h2>
								<?php else: ?>
								<h2>Assisting</h2>
								<?php endif; ?>
								<ul>
									<?php
										while(have_rows('assisting')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('assisting_logo'), 'full');
											$link = get_sub_field('assisting_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('special_repeat')):
						?>
							<div class="p-partners__special">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>特別協力</h2>
								<?php else: ?>
								<h2>Special Associated Partners</h2>
								<?php endif; ?>
								<ul>
									<?php
										while(have_rows('special_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('special_logo'), 'full');
											$link = get_sub_field('special_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('associated_repeat')):
						?>
							<div class="p-partners__associated">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>協力</h2>
								<?php else: ?>
								<h2>Associated Partners</h2>
								<?php endif; ?>
								<ul class="p-partners__list">
									<?php
										while(have_rows('associated_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('associated_logo'), 'full');
											$link = get_sub_field('associated_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							$other = get_field('other_partners');
							if ($other) :
						?>
							<div class="p-partners__other">
								<?php echo $other; ?>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('media_repeat')):
						?>
							<div class="p-partners__media">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>メディアパートナー</h2>
								<?php else: ?>
								<h2>Media Partner</h2>
								<?php endif; ?>
								<ul class="p-partners__list">
									<?php
										while(have_rows('media_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('media_logo'), 'full');
											$link = get_sub_field('media_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('museum_repeat')):
						?>
							<div class="p-partners__museum">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>特別協力美術館・博物館</h2>
								<?php else: ?>
								<h2>Special Support Museum</h2>
								<?php endif; ?>
								<ul class="p-partners__list">
									<?php
										while(have_rows('museum_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('museum_logo'), 'full');
											$link = get_sub_field('museum_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php
							if(have_rows('fair_repeat')):
						?>
							<div class="p-partners__fair">
								<?php if ($currentLang != 'en_US') : ?>
								<h2>アートフェアパートナー</h2>
								<?php else: ?>
								<h2>Art Fair Partner</h2>
								<?php endif; ?>
								<ul class="p-partners__list">
									<?php
										while(have_rows('fair_repeat')): the_row();
											$logo = wp_get_attachment_image_src(get_sub_field('fair_logo'), 'full');
											$link = get_sub_field('fair_link');
									?>
									<li>
										<a href="<?php echo $link; ?>">
											<img src="<?php echo $logo[0]; ?>" alt="">
										</a>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
