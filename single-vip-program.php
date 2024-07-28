<?php
	include('header.php');
	$dates = get_field( 'dates' );
	$hours = get_field( 'hours' );
	$location = get_field( 'location' );
	$contents = get_field( 'contents' );
	$is_finished = get_field('status') != "受付中";
	$entry = get_field( 'entry' );
	$currentLang = get_locale();
?>

<main class="p-vip" data-news="detail">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('vip'); ?>"><span>VIP-PROGRAM</span></a>
				</div>
				<div class="p-vip__aply-side">
					<?php if ($is_finished): ?>
						<?php if ($currentLang != 'en_US') : ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply-finished"><?php echo $entry["entry_finished_label"]; ?></a>
						<?php else: ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply-finished"><?php echo $entry["entry_finished_label"]; ?></a>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($currentLang != 'en_US') : ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply"><?php echo $entry["entry_label"]; ?></a>
						<?php else: ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply"><?php echo $entry["entry_label"]; ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="c-area__content-main margin-right">
				<div class="p-vip__detail-header">
					<div class="p-vip__detail-sub-header">
						<?php if(have_rows('date and time')): ?>
							<div class="p-vip__detail-header-dates">
								<?php
									$dateTimes = get_field('date and time');
									$week = array( "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat")
								?>
								<p class="p-vip__detail-header-date">
									<?php echo $dateTimes[0]['start_date']; ?>
									<span>
										(<?php echo $week[date("w", strtotime($dateTimes[0]['start_date']))] ?>)
									</span>
								</p>
								<?php
									foreach(array_slice($dateTimes, 1) as $dateTime):
										$date = $dateTime['start_date'];
										$hours = $dateTime['hours'];
								?>
									<p><?php echo get_field('is_date_consecutive') ? '-' : ',' ?></p>
									<p class="p-vip__detail-header-date">
										<?php echo mb_substr($date, mb_strrpos($date, '/') + 1, mb_strlen($date)); ?>
										<span>
											(<?php echo $week[date("w", strtotime($date))] ?>)
										</span>
									</p>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<p class="p-vip__detail-header-section">
							<?php echo get_field('vip_section') ?>
						</p>
					</div>
					<h1><?php the_title(); ?></h1>
				</div>
				<?php // header ここまで ?>
				<div class="p-vip__detail-content">
					<?php
						if (has_post_thumbnail()):
					?>
					<div class="p-vip__detail-thumbnail">
						<?php the_post_thumbnail('full'); ?>
					</div>
					<?php endif; ?>
					<?php echo $contents; ?>
					<?php if ($is_finished): ?>
					<div class="ly__center">
						<?php if ($currentLang != 'en_US') : ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply-finished padding-x-115"><?php echo $entry["entry_finished_label"]; ?></a>
						<?php else: ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply-finished padding-x-115"><?php echo $entry["entry_finished_label"]; ?></a>
						<?php endif; ?>
					</div>
					<?php else: ?>
						<div class="ly__center">
						<?php if ($currentLang != 'en_US') : ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply padding-x-115"><?php echo $entry["entry_label"]; ?></a>
						<?php else: ?>
						<a href="<?php echo $entry["entry_url"]; ?>" class="p-vip__aply padding-x-115"><?php echo $entry["entry_label"]; ?></a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include('footer.php'); ?>
