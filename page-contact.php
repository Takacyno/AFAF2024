<?php
	include('header.php');
	$currentLang = get_locale();
	$executive_office = get_field('executive_office');
	$tokyo_office = get_field('tokyo_office');
	$mail_address = get_field('mail_adress');
?>

<main class="p-contact">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main margin-right">
				<div class="c-title" data-title="minimal">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="p-contact__wrapper">
					<?php if ($currentLang != 'en_US') : ?>
					<h2>ART FAIR ASIA FUKUOKA事務局</h2>
					<?php else: ?>
					<h2>ART FAIR ASIA FUKUOKA Executive Office</h2>
					<?php endif; ?>
					<div class="p-contact__content">
						<dl>
							<div>
								<dt>Address</dt>
								<dd>
									<div>
										<p>Executive Office</p>
										〒<?php echo $executive_office['post_number'] ?>
										<?php echo $executive_office['adress'] ?>
									</div>
									<div>
										<p>Tokyo Office</p>
											〒<?php echo $tokyo_office['post_number'] ?>
										<?php echo $tokyo_office['adress'] ?>
									</div>
								</dd>
							</div>
							<div>
								<dt>E-mail</dt>
								<dd>
									<div>
										<span>Office</span><a href="<?php echo $mail_address['office'] ?>"><?php echo $mail_address['office'] ?></a>
									</div>
									<div>
										<span>Press</span><a href="<?php echo $mail_address['press'] ?>"><?php echo $mail_address['press'] ?></a>
									</div>
								</dd>
							</div>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
