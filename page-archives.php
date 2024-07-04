<?php include('header.php'); ?>

<main class="p-archives">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title" data-title="minimal">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="p-archives__wrapper">
						<div class="p-archives__section">
							<div class="p-archives__section-heading">
								<h2>Closing Report</h2>
							</div>
							<div class="p-archives__list">
								<?php
									if(have_rows('closing')):
								?>
									<ul>
										<?php
											while(have_rows('closing')): the_row();
												$title = get_sub_field('title');
												$pdf = get_sub_field('pdf');
										?>
											<li><a href="<?php echo $pdf; ?>" target="_blank"><span><?php echo $title ?></span></a></li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
						<div class="p-archives__section">
							<div class="p-archives__section-heading">
								<h2>VR</h2>
							</div>
							<div class="p-archives__vr">
								<h3>2022</h3>
								<?php
									if(have_rows('vr')):
								?>
									<ul>
										<?php
											while(have_rows('vr')): the_row();
												$url = get_sub_field('url');
												$year = get_sub_field('year');
										?>
											<div class="p-archives__vr-item">
												<div class="p-archives__vr-iframe">
													<iframe src="<?php echo $url; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
												</div>
												<a href="<?php echo $url; ?>">View Full Screen</a>
											</div>
										<?php endwhile; ?>
									</ul>
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
