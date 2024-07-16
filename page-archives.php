<?php
	include('header.php');
	$vr = get_field('vr');
	$vr2024 = [];
	$vr2023 = [];
	$vr2022 = [];
	foreach ( $vr as $item ):
		if ($item['year'] == '2024'):
			$vr2024[] = $item;
		elseif ($item['year'] == '2023'):
			$vr2023[] = $item;
		else:
			$vr2022[] = $item;
		endif;
	endforeach;
?>

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
								<?php
									if(count($vr2024)):
								?>
									<div>
									<h3>2024</h3>
										<ul>
											<?php
												foreach ($vr2024 as $item):
											?>
												<div class="p-archives__vr-item">
													<div class="p-archives__vr-iframe">
														<iframe src="<?php echo $item['url']; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
													</div>
													<a href="<?php echo $item['url']; ?>">View Full Screen</a>
												</div>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
								<?php
									if(count($vr2023)):
								?>
									<div>
									<h3>2023</h3>
										<ul>
											<?php
												foreach ($vr2023 as $item):
											?>
												<div class="p-archives__vr-item">
													<div class="p-archives__vr-iframe">
														<iframe src="<?php echo $item['url']; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
													</div>
													<a href="<?php echo $item['url']; ?>">View Full Screen</a>
												</div>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
								<?php
									if(count($vr2022)):
								?>
									<div>
										<h3>2022</h3>
										<ul>
											<?php
												foreach ($vr2022 as $item):
											?>
												<div class="p-archives__vr-item">
													<div class="p-archives__vr-iframe">
														<iframe src="<?php echo $item['url']; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
													</div>
													<a href="<?php echo $item['url']; ?>">View Full Screen</a>
												</div>
											<?php endforeach; ?>
										</ul>
									</div>
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
