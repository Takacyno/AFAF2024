<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$outline = get_field( 'outline' );
	$currentLang = get_locale();
?>

<main class="p-about">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title" data-bg="secondary">
					<h1>ABOUT</h1>
				</div>
				<div class="p-about__wrapper">
					<div class="p-about__hero">
						<div class="p-about__hero-content">
							<?php if ($currentLang != 'en_US') : ?>
							<p>｢ART FAIR ASIA FUKUOKA｣は2015年より福岡で開催している、アジアをコンセプトとした日本唯一のアートフェアです。</p>
							<p>地理的にも歴史的にもアジアの玄関口として機能する福岡の街で、｢日本とアジアのアートマーケットの架け橋に｣をテーマに掲げ、アジアのこれからを背負うアーティストを紹介するとともに、国内の文化芸術の魅力をアジアへ発信し、アジアのアートマーケットを活性化する、グローバルなアートフェアを目指しています。</p>
							<?php else: ?>
							<p>ART FAIR ASIA FUKUOKA (AFAF) has been held in Fukuoka since 2015 and is the only art fair in Japan based on the concept of Asia.</p>
							<p>In the city of Fukuoka, which geographically and historically functions as the gateway to Asia, we introduce artists who will carry the future of Asia and transmit the charm of domestic culture and art to Asia under the theme of "building a bridge between the Japanese and Asian art markets". We aim to be a global art fair that revitalizes the Asian art market.</p>
							<?php endif; ?>
						</div>
						<div class="p-about__hero-picture">
							<img src="<?php echo $imagePath; ?>/pict-about-01.jpg" alt="写真：ART FAIR ASIA FUKUOKAの様子">
						</div>
					</div>
					<div class="p-about__content">
						<h2>ART FAIR ASIA FUKUOKA 2023<span>OUTLINE</span></h2>
						<div class="p-about__section">
							<h3>GREETING</h3>
							<div class="p-about__greeting">
								<?php
									if ( $outline ) {
										echo $outline;
									}
								?>
								<?php if ($currentLang != 'en_US') : ?>
								<p data-greeting="end">一般社団法人 アートフェアアジア福岡</p>
								<?php else: ?>
								<p data-greeting="end">General Incorporated Association <span>ART FAIR ASIA FUKUOKA</span></p>
								<?php endif; ?>
							</div>
						</div>
						<div class="p-about__section">
							<h3>OVERVIEW</h3>
							<div class="p-about__overview">
								<?php
									if(have_rows('contents')):
								?>
								<dl>
									<?php
										while(have_rows('contents')): the_row();
											$title = get_sub_field('title');
											$details = get_sub_field('details');
									?>
									<div>
										<?php
											if ( $title ) {
												echo '<dt>' . $title . '</dt>';
											}
											if ( $details ) {
												echo '<dd>' . $details . '</dd>';
											}
										?>
									</div>
									<?php
										endwhile;
									?>
								</dl>
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
