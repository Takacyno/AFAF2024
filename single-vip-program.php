<?php
	include('header.php');
	$dates = get_field( 'dates' );
	$hours = get_field( 'hours' );
	$location = get_field( 'location' );
	$contents = get_field( 'contents' );
	$is_finished = get_the_terms($post -> ID, 'vip-status')[0]->name != "受付中";
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
					<h1><?php the_title(); ?></h1>
				</div>
				<?php // header ここまで ?>
				<div class="p-vip__detail-content">
					<?php
						$dates = get_field( 'dates' );
						$hours = get_field( 'hours' );
					?>
					<div class="p-vip__detail-header-dates">
						<?php
							if ($dates) :
						?>
						<span class="p-vip__detail-header-date"><?php echo $dates; ?></span>
						<?php
							endif;
							if ($hours) :
						?>
						<span class="p-vip__detail-header-hours"><?php echo $hours; ?></span>
						<?php endif; ?>
					</div>
					<?php if ($location) : ?>
					<dl class="p-vip__detail-venue">
						<?php if ($currentLang != 'en_US') : ?>
						<dt>会場:</dt>
						<?php else: ?>
						<dt>VENUE:</dt>
						<?php endif; ?>
						<dd><?php echo $location; ?></dd>
					</dl>
					<?php
						endif;
						$section = get_the_terms($post -> ID, 'vip-program-section');
						if ( $section ) :
					?>
					<ul class="p-vip__detail-taxonomy">
						<?php
							foreach($section as $term) {
								$sectionName = $term->name;
								echo '<li class="p-vip__detail-taxonomy-item">' . $sectionName . '</li>';
							}
						?>
					</ul>
					<?php endif; ?>
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
