<?php
	include('header.php');
	$currentLang = get_locale();
	// access
	$access = get_field( 'access' );
	$venue = $access[ 'venue' ];
	$address = $access[ 'address' ];
	$website = $access[ 'website' ];
	$maps = $access[ 'maps' ];
	$access_method = $access[ 'access' ];
?>

<main class="p-access">
	<div class="c-title" data-sp="secondary">
		<h1>ACCESS</h1>
	</div>
	<div class="c-area__content">
		<div class="p-access__wrapper">
			<div class="p-access__section js-fadein">
				<h2>VISITOR<span>INFORMATION</span></h2>
				<div class="p-access__information">
					<?php
						// topから
						$top_page_id = get_option('page_on_front');
						$dates = get_field( 'dates', $top_page_id );
						$title = $dates[ 'title' ];
						$contents = $dates[ 'contents' ];
						if ( $dates ):
					?>
						<div class="p-access__information-item">
							<?php if ( $title ) : ?>
							<h3><?php echo $title; ?></h3>
							<?php endif; ?>
							<?php if ( $contents ) : ?>
							<div class="p-access__information-details"><?php echo $contents; ?></div>
							<?php endif; ?>
						</div>
					<?php
						endif;
						$hours = get_field( 'hours', $top_page_id );
						$title = $hours[ 'title' ];
						$contents = $hours[ 'contents' ];
						if ( $hours ):
					?>
						<div class="p-access__information-item">
							<?php if ( $title ) : ?>
							<h3><?php echo $title; ?></h3>
							<?php endif; ?>
							<?php if ( $contents ) : ?>
							<div class="p-access__information-details"><?php echo $contents; ?></div>
							<?php endif; ?>
						</div>
					<?php
						endif;
						$ticket = get_field( 'ticket', $top_page_id );
						$title = $ticket[ 'title' ];
						$site_flow_value = $ticket[ 'site_flow' ];
						if ($site_flow_value) :
					?>
					<div class="p-access__information-item">
						<h3>Ticket</h3>
						<?php if ( $title ) : ?>
						<div class="p-access__information-details"><?php echo $title; ?></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( $access ) : ?>
			<div class="p-access__section js-fadein">
				<div class="p-access__content">
					<h2>ACCESS</h2>
					<div class="p-access__content-information">
						<h3><?php echo $venue; ?></h3>
						<p><?php echo $address; ?></p>

						<?php if ( $website ) : ?>
						<div class="p-access__content-link">
							<a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a>
						</div>
						<?php endif; ?>

						<?php if ( $access_method ): ?>
						<div class="p-access__content-method">
							<?php echo $access_method; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( $maps ) : ?>
				<div class="p-access__iframe">
					<?php echo $maps; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
