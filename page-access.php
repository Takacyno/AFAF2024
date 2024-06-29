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
						<div class="p-access__section">
							<div class="p-access__title">
								<h2>Schedule</h2>
							</div>
							<div class="p-access__content">
								<p>
									<span>VIP VIEW</span><br />
									<?php echo $vip_hours ?><br />
									<span>PUBLIC VIEW</span><br />
									<?php echo $public_hours ?><br />
								</p>
							</div>
						</div>
						<div class="p-access__section">
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
								<p><?php echo $venue; ?></p>
								<p><?php echo $address; ?></p>
							</div>
						</div>
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
