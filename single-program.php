<?php
	include('header.php');
	$dates = get_field( 'dates' );
	$hours = get_field( 'hours' );
	$location = get_field( 'location' );
	$contents = get_field( 'contents' );
	$currentLang = get_locale();
?>

<main class="p-vip" data-news="detail">
	<div class="c-area__content">
		<div class="p-vip__detail">
			<div class="p-vip__detail-side">
				<div class="p-vip__detail-back">
					<a href="<?php echo home_url('program'); ?>"><span>ALL ARTICLES</span></a>
				</div>
				<div class="p-vip__detail-meta">
					<?php if ($location) : ?>
					<dl>
						<div>
							<?php if ($currentLang != 'en_US') : ?>
							<dt>会場</dt>
							<?php else: ?>
							<dt>VENUE</dt>
							<?php endif; ?>
							<dd><?php echo $location; ?></dd>
						</div>
					</dl>
					<?php
						endif;
						$section = get_the_terms($post -> ID, 'program-section');
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
				</div>
				<div class="p-vip__detail-pager" data-pager="pc">
					<?php
						$prevpost = get_previous_post();
						$nextpost = get_next_post();
						if ( $nextpost ):
					?>
						<a href="<?php echo the_permalink($nextpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
						<?php
							$nextNextpost = get_next_post($nextpost->ID);
							if ( $nextNextpost ):
						?>
						<a href="<?php echo the_permalink($nextNextpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
						<?php endif; ?>
					<?php
						endif;
						if ( $prevpost ):
					?>
						<a href="<?php echo the_permalink($prevpost->ID); ?>" data-link="next">
							<span>NEXT</span>
						</a>
						<?php
							$prevPrevpost = get_previous_post($prevpost->ID);
							if ( $prevPrevpost ):
						?>
							<a href="<?php echo the_permalink($prevPrevpost->ID); ?>" data-link="prev">
								<span>PREV</span>
							</a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="p-vip__detail-main">
				<div class="p-vip__detail-header">
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
				</div>
			</div>
			<div class="p-vip__detail-pager" data-pager="sp">
				<?php
					$prevpost = get_previous_post();
					$nextpost = get_next_post();
					if ( $nextpost ):
				?>
					<a href="<?php echo the_permalink($nextpost->ID); ?>" data-link="prev">
						<span>PREV</span>
					</a>
					<?php
						$nextNextpost = get_next_post($nextpost->ID);
						if ( $nextNextpost ):
					?>
					<a href="<?php echo the_permalink($nextNextpost->ID); ?>" data-link="prev">
						<span>PREV</span>
					</a>
					<?php endif; ?>
				<?php
					endif;
					if ( $prevpost ):
				?>
					<a href="<?php echo the_permalink($prevpost->ID); ?>" data-link="next">
						<span>NEXT</span>
					</a>
					<?php
						$prevPrevpost = get_previous_post($prevpost->ID);
						if ( $prevPrevpost ):
					?>
						<a href="<?php echo the_permalink($prevPrevpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php include('footer.php'); ?>
