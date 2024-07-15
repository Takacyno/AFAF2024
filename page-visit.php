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
	$information = get_field( 'information');
	$vip_hours = $information['hours']['vip_hours'];
	$public_hours = $information['hours']['public_hours'];
	$ticket = $information['ticket']['ticket_ad'];
?>

<main class="p-access">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title" data-sp="secondary">
					<h1>VISITOR INFORMATION</h1>
				</div>
				<div class="p-access__wrapper">
					<?php if ( $access ) : ?>
						<div class="p-access__section border-bottom">
							<div class="p-access__title">
								<h2>Schedule</h2>
							</div>
							<div class="p-access__content">
								<p>
									<span>VIP View</span><br />
									<?php echo $vip_hours ?><br />
									<span>PUBLIC View</span><br />
									<?php echo $public_hours ?><br />
								</p>
							</div>
						</div>
						<div class="p-access__section border-bottom">
							<div class="p-access__title">
								<h2>Ticket</h2>
							</div>
							<div class="p-access__content">
								<p>
									<?php echo $ticket ?><br />
								</p>
							</div>
						</div>
						<div class="p-access__section">
							<div class="p-access__title">
								<h2>Venue</h2>
							</div>
							<div class="p-access__content">
								<h3><?php echo $venue; ?></h3>
								<?php if ( $maps['google_url'] ) : ?>
									<a href="<?php echo $maps['google_url']; ?>" target="_blank"><?php echo $address; ?></a>
								<?php endif; ?>
							</div>
						</div>
						<?php if ( $maps['iframe'] ) : ?>
							<div class="p-access__iframe">
								<?php echo $maps['iframe']; ?>
							</div>
						<?php endif; ?>
						<div class="p-access__section">
							<div class="p-access__title">
								<h2>Getting There</h2>
							</div>
							<div class="p-access__content">
								<?php echo $access_method; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
