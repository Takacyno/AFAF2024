<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$currentLang = get_locale();
	$information = get_field( 'information', 409 );
	$date_info = $information[ 'date' ];
	$date_ad = $information[ 'date_ad' ];
	$hours = $information[ 'hours' ];
	$access = get_field( 'access', 409 );
	$venue = $access[ 'venue' ];
	$address = $access[ 'address' ];
?>
<main class="p-front">
	<div class="p-front__hero">
		<div class="p-front__hero-img">
			<picture>
				<source srcset="<?php echo $imagePath; ?>/pict-top-hero.jpg" media="(min-width: 768px)">
				<img src="<?php echo $imagePath; ?>/pict-top-hero-sp.jpg" alt="">
			</picture>
		</div>
	</div>
	<div class="p-front__wrapper">
	<!-- <div class="p-front__section js-fadein"> -->
		<div class="p-front__section">
			<div class="p-front__heading">
				<h2>NEWS</h2>
			</div>
			<div class="p-front__content">
				<div class="p-front__news-list">
					<?php
						$args = array(
							'post_type' => 'news', /* カスタム投稿名 */
							'orderby' => 'menu_order',
							'order' => 'ASC',
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
									"01" => "JAN",
									"02" => "FEB",
									"03" => "MAR",
									"04" => "APR",
									"05" => "MAY",
									"06" => "JUN",
									"07" => "JUL",
									"08" => "AUG",
									"09" => "SEP",
									"10" => "OCT",
									"11" => "NOV",
									"12" => "DEC",
								];
								$url = get_field( 'url' );
								if ( $url ) :
								// 外部リンクに飛ばす場合
							?>
								<a href="<?php echo $url; ?>" target="_blank">
									<span class="p-front__news-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
									<span class="p-front__news-title"><?php the_title(); ?></span>
								</a>
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
		<div class="p-front__section">
			<div class="p-front__heading">
				<h2>EXHIBITORS</h2>
			</div>
			<?php /*
				<div class="p-front__heading">
					<?php
						if(have_rows('exhibitions')):
							while(have_rows('exhibitions')): the_row();
								$title = get_sub_field('title');

					?>
						<h2><?php echo $title; ?></h2>
					<?php
							endwhile;
						endif;
					?>
				</div>
			*/?>
			<?php /*
			<div class="p-front__content">
				<div class="p-front__exhibitors-taxonomy">
					<?php
						$terms = get_terms('section');
						$exhibitorsTermNames = [];
						$exhibitorsTermSlugs = [];
						$exhibitorsTermCounts = [];
						$exhibitorsTermJaCounts = [];
						$exhibitorsTermEnCounts = [];
						$exhibitorsTermNum = 0;
						foreach ( $terms as $term ):
							$exhibitorsTermNum++;
							$exhibitorsTermName = $term->name;
							$exhibitorsTermSlug = $term->slug;
							$exhibitorsTermCount = $term->count;
							$exhibitorsTermNames[] = $exhibitorsTermName;
							$exhibitorsTermSlugs[] = $exhibitorsTermSlug;
							$exhibitorsTermCounts[] = $exhibitorsTermCount;
						endforeach;
						for ($i = 0; $i < $exhibitorsTermNum; $i++):
							$args=array(
								'post_type' => 'exhibitors', //カスタム投稿名
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'section',
										'field' => 'slug',
										'terms' => array($exhibitorsTermSlugs[$i]),
										'_locale' => $currentLang,
									)
								),
								'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
							);
							query_posts( $args );
							if(have_posts()):
								$i2 = 0;
								while(have_posts()):the_post();
									$i2++;
								endwhile;
								$termLangCount = $i2;
								if ($currentLang != 'en_US') :
									$exhibitorsTermJaCounts[] = $termLangCount;
								else:
									$exhibitorsTermEnCounts[] = $termLangCount;
								endif;
							endif;
						endfor;
						wp_reset_postdata();
					?>
					<ul>
						<?php
							for ($i = 0; $i < $exhibitorsTermNum; $i++):
						?>
							<li><a href="#<?php echo $exhibitorsTermSlugs[$i]; ?>">
								<?php echo $exhibitorsTermNames[$i]; ?>
								<?php
									if ($currentLang != 'en_US') :
								?>
									(<?php echo $exhibitorsTermJaCounts[$i]; ?>)
								<?php
									else:
								?>
									(<?php echo $exhibitorsTermEnCounts[$i]; ?>)
								<?php endif; ?>
							</a></li>
						<?php endfor; ?>
					</ul>
				</div>
			</div>
			*/?>
		</div>
		<?php wp_reset_query(); ?>
		<div class="p-front__exhibitors-area js-fadein">
			<div class="p-front__exhibitors-introduction">
				<div class="p-front__exhibitors-introduction-item">
					<?php
						if(have_rows('exhibitions')):
							while(have_rows('exhibitions')): the_row();
								$photo = wp_get_attachment_image_src(get_sub_field('photo'), 'full');
					?>
						<div class="p-front__exhibitors-introduction-galleries">
							126
							<span>Galleries</span>
						</div>
						<div class="p-front__exhibitors-introduction-item-bg">
							<img src="<?php echo $photo[0]; ?>" alt="">
						</div>
					<?php
							endwhile;
						endif;
					?>
				</div>
				<div class="p-front__exhibitors-introduction-item">
					<?php
						if(have_rows('exhibitions')):
							while(have_rows('exhibitions')): the_row();
								$summary = get_sub_field('summary');
								$url = get_sub_field('url');
					?>
						<p><?php echo $summary; ?></p>
						<div class="c-link" data-link="secondary">
							<a href="<?php echo $url; ?>"><span>ALL GALLERIES</span></a>
						</div>
					<?php
							endwhile;
						endif;
					?>
				</div>
			</div>
			<div class="p-front__exhibitors-galleries">
				<div>
					<ul class="p-front__exhibitors-galleries-slider">
					<?php
						$args=array(
							'post_type' => 'exhibitors', //カスタム投稿名
							'orderby' => 'rand',
							'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
						);
						remove_all_filters('posts_orderby');
						query_posts( $args );
						if(have_posts()):
						while(have_posts()):the_post();
					?>
						<?php
							$enGallery = get_field('en-gallery', $post->ID);
							if (($currentLang != 'en_US') && $enGallery) :
						?>
							<li><?php echo $enGallery; ?></li>
						<?php
							else:
						?>
							<li><?php the_title(); ?></li>
						<?php endif; ?>
					<?php endwhile; endif; ?>
					</ul>
				</div>
				<?php wp_reset_query(); ?>
				<div>
					<ul class="p-front__exhibitors-galleries-slider-reverse" dir="rtl">
					<?php
						$args=array(
							'post_type' => 'exhibitors', //カスタム投稿名
							'orderby' => 'rand',
							'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
						);
						remove_all_filters('posts_orderby');
						query_posts( $args );
						if(have_posts()):
						while(have_posts()):the_post();
					?>
						<?php
							$enGallery = get_field('en-gallery', $post->ID);
							if (($currentLang != 'en_US') && $enGallery) :
						?>
							<li><?php echo $enGallery; ?></li>
						<?php
							else:
						?>
							<li><?php the_title(); ?></li>
						<?php endif; ?>
					<?php endwhile; endif; ?>
					</ul>
				</div>
				<?php wp_reset_query(); ?>
				<div>
					<ul class="p-front__exhibitors-galleries-slider">
					<?php
						$args=array(
							'post_type' => 'exhibitors', //カスタム投稿名
							'orderby' => 'rand',
							'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
						);
						remove_all_filters('posts_orderby');
						query_posts( $args );
						if(have_posts()):
						while(have_posts()):the_post();
					?>
						<?php
							$enGallery = get_field('en-gallery', $post->ID);
							if (($currentLang != 'en_US') && $enGallery) :
						?>
							<li><?php echo $enGallery; ?></li>
						<?php
							else:
						?>
							<li><?php the_title(); ?></li>
						<?php endif; ?>
					<?php endwhile; endif; ?>
					</ul>
				</div>
				<?php wp_reset_query(); ?>
			</div>
			<div class="c-link c-link-left">
					<a href="<?php echo home_url('exhibitors'); ?>"><span>View All</span></a>
				</div>
		</div>
		<?php // exhibitors ここまで ?>
		<?php if ( $access && $information ) : ?>
		<div class="p-front__section">
			<div class="p-front__heading">
				<h2>Visitor<br />Information</h2>
			</div>
			<div class="p-front__content">
				<div class="p-front__visitor__information-list">
					<ul>
						<li>
							<p class="p-front__visitor__information-name">Date</p>
							<div class="p-front__visitor__information-value">
								<p class="p-front__visitor__information-value-heading"><?php echo $date_info; ?></p>
								<p><?php echo $date_ad; ?></p>
							</div>
						</li>
						<li>
							<p class="p-front__visitor__information-name">Hours</p>
							<div class="p-front__visitor__information-value">
								<div>
									<?php echo $hours ?>
								</div>
							</div>
						</li>
						<li>
							<p class="p-front__visitor__information-name">Venue</p>
							<div class="p-front__visitor__information-value">
								<p class="p-front__visitor__information-value-heading"><?php echo $venue; ?></p>
								<p class="p-front__visitor__information-value-address"><?php echo $address; ?></p>
							</div>
						</li>
					</ul>
				</div>
				<div class="c-link">
					<a href="<?php echo home_url('access'); ?>"><span>How to access</span></a>
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
