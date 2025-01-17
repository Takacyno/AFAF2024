<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$currentLang = get_locale();
	$id = $currentLang == 'en_US' ? 409 : 15;
	$information = get_field( 'information', $id );
	$date_info = $information[ 'date' ];
	$date_ad = $information[ 'date_ad' ];
	$vip_hours = $information['hours']['vip_hours'];
	$public_hours = $information['hours']['public_hours'];
	$access = get_field( 'access', $id );
	$venue = $access[ 'venue' ];
	$address = $access[ 'address' ];
	$google_url = $access[ 'maps' ]['google_url'];
?>
<main class="p-front">
	<div class="p-front__hero">
		<div class="p-front__hero-img">
			<picture>
			<?php if(have_rows('fv')): ?>
					<?php
						$images = [];
						while ( have_rows('fv') ) : the_row();
							$images[] = get_sub_field('fv_img');
						endwhile;
					?>
					<?php /* echo wp_get_attachment_image(intval($images[0]), 'full'); */ ?>
					<img class="p-front__hero-img-pc" src="<?php echo $images[0]['url']; ?>">
					<img class="p-front__hero-img-sp" src="<?php echo $images[1]['url']; ?>">
				<?php endif; ?>
			</picture>
		</div>
		<div class="p-front__hero-logo">
			<img src="<?php echo $imagePath; ?>/logo.svg">
			<img src="<?php echo $imagePath; ?>/date.svg">
		</div>
	</div>
	<div class="p-front__wrapper">
	<!-- <div class="p-front__section js-fadein"> -->
		<div class="p-front__section">
			<div class="p-front__heading p-front__heading-news">
				<h2>NEWS</h2>
			</div>
			<div class="p-front__content">
				<div class="p-front__news-list">
					<?php
						$args = array(
							'post_type' => 'news', /* カスタム投稿名 */
							'orderby' => 'post_date',
							'order' => 'DESC',
							'posts_per_page'=> 5 //表示件数（-1で全ての記事を表示）
						);
						query_posts( $args );
						if(have_posts()):
					?>
					<ul>
						<?php while(have_posts()):the_post(); ?>
						<li>
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
								$url = get_field( 'url' );
								if ( $url ) :
								// 外部リンクに飛ばす場合
							?>
								<?php if (get_field("internallinks")): ?>
								<a href="<?php echo $url; ?>">
									<span class="p-front__news-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
									<span class="p-front__news-title"><?php the_title(); ?></span>
								</a>
								<?php else: ?>
									<a href="<?php echo $url; ?>" target="_blank">
									<span class="p-front__news-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
									<span class="p-front__news-title"><?php the_title(); ?></span>
								</a>
								<?php endif; ?>
							<?php else: ?>
								<a href="<?php echo the_permalink( $post->ID ); ?>">
									<span class="p-front__news-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
									<span class="p-front__news-title"><?php the_title(); ?></span>
								</a>
							<?php endif; ?>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>
				<?php wp_reset_query(); ?>
				<div class="c-link">
					<a href="<?php echo home_url('news'); ?>"><span>View All</span></a>
				</div>
			</div>
		</div>
		<?php // news ここまで ?>

		<?php /*
			<div class="p-front__section js-fadein">
				<div class="p-front__heading">
					<h2>OVERVIEW</h2>
				</div>
				<div class="p-front__content">
					<div class="p-front__overview">
						<?php
							$dates = get_field( 'dates' );
							$title = $dates[ 'title' ];
							$contents = $dates[ 'contents' ];
							if ( $dates ):
						?>
						<div class="p-front__overview-item">
							<h3><?php echo $title; ?></h3>
							<div>
								<?php echo $contents; ?>
							</div>
						</div>
						<?php
							endif;
							$hours = get_field( 'hours' );
							$title = $hours[ 'title' ];
							$contents = $hours[ 'contents' ];
							if ( $hours ):
						?>
						<div class="p-front__overview-item">
							<h3><?php echo $title; ?></h3>
							<div>
								<?php echo $contents; ?>
							</div>
						</div>
						<?php
							endif;
						?>
						<div class="p-front__overview-item">
							<h3>Venue</h3>
							<?php
								// $access_data = get_page_by_path('access');
								// $access_page = get_post($access_data);
								if ($currentLang != 'en_US') :
									$accessJa = get_field( 'access', 15 );
									$venue = $accessJa[ 'venue' ];
									$address = $accessJa[ 'address' ];
									$website = $accessJa[ 'website' ];
									if ( $accessJa ) :
							?>
								<div>
									<p data-text="venue"><?php echo $venue; ?></p>
									<p><a href="<?php echo $website; ?>" target="_blank"><?php echo $address; ?></a></p>
								</div>
							<?php
									endif;
								else:
									$accessEn = get_field( 'access', 409 );
									$venue = $accessEn[ 'venue' ];
									$address = $accessEn[ 'address' ];
									$website = $accessEn[ 'website' ];
									if ( $accessEn ) :
							?>
								<div>
									<p data-text="venue"><?php echo $venue; ?></p>
									<p><a href="<?php echo $website; ?>" target="_blank"><?php echo $address; ?></a></p>
								</div>
							<?php endif; endif; ?>
						</div>
					</div>
					<div class="c-link">
						<a href="<?php echo home_url('access'); ?>"><span>HOW TO ACCESS</span></a>
					</div>
				</div>
			</div>
			<?php // overview ここまで ?>
		*/?>

		<!-- <div class="p-front__section js-fadein"> -->
		<?php wp_reset_query(); ?>
		<div class="p-front__exhibitors-area">
			<div class="p-front__section">
				<div class="p-front__heading">
					<h2>EXHIBITORS</h2>
				</div>
			</div>
			<div class="p-front__exhibitors-main">
				<div class="p-front__exhibitors-img">
					<img src="<?php echo get_field('exhibitions')['exhibitions_img']['url'] ?>">
				</div>
				<div>
					<p>
						<?php echo get_field('exhibitions')['exhibitions_text']; ?>
					</p>
					<div class="c-link">
						<a href="<?php echo home_url('exhibitors'); ?>"><span>View All</span></a>
					</div>
				</div>
			</div>
		</div>
		<?php // exhibitors ここまで ?>
		<?php if ( $access && $information ) : ?>
		<div class="p-front__info-area">
			<div class="p-front__section">
				<div class="p-front__heading">
					<h2>VISITOR INFO</h2>
				</div>
			</div>
			<div class="p-front__info-main">
				<div class="p-front__info-img">
					<img src="<?php echo get_field('access_img')['url'] ?>">
				</div>
					<div class="p-front__visitor__information">
						<div class="p-front__visitor__information-list">
							<ul>
								<li>
									<p class="p-front__visitor__information-name">Schedule</p>
									<div class="p-front__visitor__information-value">
										<div>
											<div>
												<span>VIP View</span><br />
												<?php echo $vip_hours ?>
												<p class="p-front__visitor__information-value-add"><?php echo $date_ad; ?></p>
											</div>
											<div>
												<span>Public View</span><br />
												<?php echo $public_hours ?>
											</div>
										</div>
									</div>
								</li>
								<li>
									<p class="p-front__visitor__information-name">Venue</p>
									<div class="p-front__visitor__information-value">
										<p class="p-front__visitor__information-value-heading"><?php echo $venue; ?></p>
										<?php if ( $google_url ) : ?>
											<a href="<?php echo $google_url ?>" class="p-front__visitor__information-value-address" target="_blank"><?php echo $address; ?></a>
										<?php endif; ?>
									</div>
								</li>
							</ul>
						</div>
						<div class="c-link">
							<a href="<?php echo home_url('visit'); ?>"><span>Detail</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php // visitor informatin ここまで ?>
		<?php /*
			<?php
				// topから
				$top_page_id = get_option('page_on_front');
				$map = get_field( 'map' );
				$photo_value = $map[ 'map-photo' ];
				$photo = wp_get_attachment_image_src($photo_value, 'full');
				$pdf = $map[ 'map-pdf' ];
				if ($photo) :
			?>
			<div class="p-front__section js-fadein">
				<div class="p-front__heading" data-heading="mb">
					<h2>FLOOR MAP</h2>
				</div>
				<div class="p-exhibitors__section-content">
					<div class="p-exhibitors__map">
						<div class="p-exhibitors__map-image">
							<img src="<?php echo $photo[0]; ?>" alt="">
						</div>
						<?php
							if ($pdf) :
								?>
						<div class="p-exhibitors__map-link">
							<a href="<?php echo $pdf; ?>" target="_blank">DOWNLOAD</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php
				if(have_rows('vr')):
			?>
			<div class="p-front__section js-fadein">
				<div class="p-front__heading" data-heading="mb">
					<h2>VR</h2>
				</div>
				<div class="p-archives__vr">
					<ul>
						<?php
							while(have_rows('vr')): the_row();
								$url = get_sub_field('iframe');
						?>
							<div class="p-archives__vr-item">
								<div class="p-archives__vr-iframe">
									<iframe src="<?php echo $url; ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
								<a href="<?php echo $url; ?>" target="_blank">View Full Screen</a>
							</div>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
		*/?>
	</div>
</main>
<script src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<?php include('footer.php'); ?>
