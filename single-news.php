<?php include('header.php'); ?>

<main class="p-news" data-news="detail">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="p-news__detail-back">
					<a href="<?php echo home_url('news'); ?>"><span>ALL ARTICLES</span></a>
				</div>
				<div class="p-news__detail-pager" data-pager="pc">
					<?php
						$prevpost = get_previous_post();
						$nextpost = get_next_post();
						$url = get_field( 'url' );
						if ( $nextpost ):
					?>
						<?php
							if ( !get_field( 'url', $nextpost->ID) ) :
						?>
						<a href="<?php echo the_permalink($nextpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
						<?php
							else:
							$nextNextpost = get_next_post($nextpost->ID);
							if ( $nextNextpost ):
						?>
							<a href="<?php echo the_permalink($nextNextpost->ID); ?>" data-link="prev">
								<span>PREV</span>
							</a>
							<?php endif; ?>
						<?php endif; ?>
					<?php
						endif;
						if ( $prevpost ):
					?>
						<?php
							if ( !get_field( 'url', $prevpost->ID) ) :
						?>
						<a href="<?php echo the_permalink($prevpost->ID); ?>" data-link="next">
							<span>NEXT</span>
						</a>
						<?php
							else:
							$prevPrevpost = get_previous_post($prevpost->ID);
							if ( $prevPrevpost ):
						?>
							<a href="<?php echo the_permalink($prevPrevpost->ID); ?>" data-link="prev">
								<span>PREV</span>
							</a>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="p-news__detail-header">
					<h1><?php the_title(); ?></h1>
					<?php
						$year = get_the_time('Y');
						$month = get_the_time('m');
						$date = get_the_time('d');
						$monthArray = [
							"01" => "Jan",
							"02" => "Feb",
							"03" => "Mar",
							"04" => "Apr",
							"05" => "May",
							"06" => "Jun",
							"07" => "Jul",
							"08" => "Aug",
							"09" => "Sep",
							"10" => "Oct",
							"11" => "Nov",
							"12" => "Dec",
						];
					?>
					<span><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
				</div>
				<?php // header ここまで ?>
				<?php
					if (has_post_thumbnail()):
				?>
				<div class="p-news__detail-thumbnail">
					<?php the_post_thumbnail('full'); ?>
				</div>
				<?php endif; ?>
				<div class="p-news__detail-content">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="p-news__detail-pager" data-pager="sp">
				<?php
					if ( $nextpost ):
				?>
					<?php
						if ( !get_field( 'url', $nextpost->ID) ) :
					?>
					<a href="<?php echo the_permalink($nextpost->ID); ?>" data-link="prev">
						<span>PREV</span>
					</a>
					<?php
						else:
						$nextNextpost = get_next_post($nextpost->ID);
						if ( $nextNextpost ):
					?>
						<a href="<?php echo the_permalink($nextNextpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php
					endif;
					if ( $prevpost ):
				?>
					<?php
						if ( !get_field( 'url', $prevpost->ID) ) :
					?>
					<a href="<?php echo the_permalink($prevpost->ID); ?>" data-link="next">
						<span>NEXT</span>
					</a>
					<?php
						else:
						$prevPrevpost = get_previous_post($prevpost->ID);
						if ( $prevPrevpost ):
					?>
						<a href="<?php echo the_permalink($prevPrevpost->ID); ?>" data-link="prev">
							<span>PREV</span>
						</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php include('footer.php'); ?>
