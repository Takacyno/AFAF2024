<?php
	include('header.php');
	$number = get_field( 'number' );
	$contents = get_field( 'contents' );
	$location = get_field( 'location' );
	$enGallery = get_field( 'en-gallery' );
	$currentLang = get_locale();

	$section = get_the_terms($post -> ID, 'section');
	foreach($section as $term) {
		$sectionName = $term->name;
		if ($sectionName === 'Curation') {
			$curationFlag = true;
		}
	}
?>

<main class="p-exhibitors" data-news="detail">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="p-exhibitors__detail-back">
					<a href="<?php echo home_url('exhibitors'); ?>"><span>All Exhibitiors</span></a>
				</div>
				<div class="p-exhibitors__detail-meta">
					<dl>
						<div>
							<dt>SECTION</dt>
							<dd>
								<?php
									$section = get_the_terms($post -> ID, 'section');
									foreach($section as $term) {
										$sectionName = $term->name;
										echo $sectionName;
									}
								?>
							</dd>
						</div>
						<?php /*
						<div>
							<dt>BOOTH</dt>
							<dd><?php echo $number; ?></dd>
						</div>
						*/ ?>
					</dl>
					<p><?php echo $location; ?></p>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="p-exhibitors__detail-header">
					<?php if ($currentLang != 'en_US') : ?>
						<?php if ($enGallery) : ?>
							<h1><?php the_title(); ?></h1>
							<span><?php echo $enGallery; ?></span>
						<?php else: ?>
							<h1 lang="en"><?php the_title(); ?></h1>
						<?php endif; ?>
					<?php else: ?>
					<h1 lang="en"><?php the_title(); ?></h1>
					<?php endif; ?>
				</div>
				<?php // header ここまで ?>
				<?php
						if ($curationFlag === true) :
							if (has_post_thumbnail()):
					?>
						<div class="p-exhibitors__detail-thumbnail">
							<?php the_post_thumbnail('full'); ?>
						</div>
					<?php endif; endif; ?>
				<div class="p-exhibitors__detail-content">
					<?php echo get_field('summary'); ?>
				</div>
				<div class="p-exhibitors__detail-information">
					<?php
						if(have_rows('address')):
					?>
					<div class="p-exhibitors__detail-address">
						<?php
							while(have_rows('address')): the_row();
								$postal_code = get_sub_field('postal_code');
								$house = get_sub_field('house');
						?>
						<p>
							<?php
								if ( $postal_code ) {
									echo '<span>' . $postal_code . '</span>';
								}
								if ( $house ) {
									echo '<span>' . $house . '</span>';
								}
							?>
						</p>
						<?php
							endwhile;
						?>
					</div>
					<dl>
						<?php
							if(!empty(get_field('tel'))):
						?>
							<div>
								<dt>Tel</dt>
								<dd>
								<?php echo get_field('tel'); ?>
								</dd>
							</div>
						<?php
							endif;
							if(have_rows('email')):
						?>
							<div>
								<dt>Email</dt>
								<dd>
								<?php
									while(have_rows('email')): the_row();
										$email = get_sub_field('email_address');
								?>
									<p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
								<?php endwhile; ?>
								</dd>
							</div>
						<?php
							endif;
							if(!empty(get_field('website'))):
						?>
							<div>
								<dt>Website</dt>
								<dd>
								<a href="<?php echo get_field('website'); ?>" target="_blank"><?php echo get_field('website'); ?></a>
								</dd>
							</div>
						<?php
							endif;
						?>
					</dl>
					<?php endif; ?>
				</div>
				<?php // ここからartist ?>
				<?php /*
					<div class="p-exhibitors__detail-artist">
						<?php
							$exclude_duplicates = array();
							$args = array(
								'post_type' => 'artworks',
								'posts_per_page' => -1,
								'meta_query' => array(
									array(
										'key' => 'gallery',
										'value' => '"' . get_the_ID() . '"',
										'compare' => 'LIKE',
										'_locale' => $currentLang,
									),
								)
							);

							$artworks_query = new WP_Query($args);
							if ($artworks_query->have_posts()) :
						?>
						<h2>ARTISTS</h2>
						<ul>
							<?php
								while ($artworks_query->have_posts()) :
									$artworks_query->the_post();
									$name = get_field('name');
									$artists_url = get_field('artists-url');

									// 'name' の値が同じ投稿を除外する
									if (!in_array($name, $exclude_duplicates)) :
										$exclude_duplicates[] = $name;
										// 投稿の表示処理
										// 例：投稿のタイトルを表示
							?>
								<li><a href="<?php echo $artists_url; ?>" target="_blank"><?php echo $name; ?></a></li>
							<?php endif; endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); endif; ?>
					</div>
				*/ ?>

				<?php // ここからartworks ?>
				<?php /*
					<?php
						// カスタム投稿タイプ artworks のカスタムフィールド gallery の値が
						// 現在の投稿 ID の文字列と一致している投稿を取得する。
						// https://www.advancedcustomfields.com/resources/querying-relationship-fields/
						$artworks = get_posts(array(
							'post_type' => 'artworks',
							'meta_key' => 'order', // カスタムフィールド名
							'orderby' => array(
								'meta_value_num' => 'DESC', // カスタムフィールドの数値として降順
								'date' => 'DESC', // 更新日時を降順
							),
							'meta_query' => array(
								array(
									'key' => 'gallery',
									'value' => '"' . get_the_ID() . '"',
									'compare' => 'LIKE',
								),
							),
						));
						if ($artworks):
					?>
						<div class="p-exhibitors__detail-online">
							<h2>ARTWORKS</h2>
							<?php
								$gallery_artwork = get_field('gallery-artwork');
								if ($gallery_artwork) :
							?>
							<a href="<?php echo $gallery_artwork; ?>" target="_blank"><span>VIEW ALL</span></a>
							<?php endif; ?>
						</div>
						<ul class="p-exhibitors__detail-artworks-list">
							<?php
								$artworksNum = 0;
								foreach ($artworks as $post):
								setup_postdata($post);
								$name = get_field('name');
								// $artists_url = get_field('artists-url');
								$year = get_field('year');
								$medium = get_field('medium');
								$size = get_field('size');
								$artwork_url = get_field('artwork-url');
								$artworksNum++;
							?>
							<li class="p-exhibitors__detail-artworks-item">
								<a href="<?php echo $artwork_url; ?>" target="_blank">
									<?php
										if (has_post_thumbnail()):
									?>
									<div class="p-exhibitors__detail-artworks-thumbnail">
										<?php the_post_thumbnail('full'); ?>
									</div>
									<?php endif; ?>
									<p class="p-exhibitors__detail-artworks-name"><?php echo $name; ?></p>
									<h3><?php the_title(); ?></h3>
									<ul>
										<li class="p-exhibitors__detail-artworks-year"><?php echo $year; ?></li>
										<li class="p-exhibitors__detail-artworks-medium"><?php echo $medium; ?></li>
										<li class="p-exhibitors__detail-artworks-size"><?php echo $size; ?></li>
									</ul>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php if( $artworksNum > 18 ) : // 18 ?>
						<div class="p-exhibitors__detail-more">
							<button type="button" class="p-exhibitors__detail-more-button"><span>Load more</span></button>
						</div>
						<?php endif; ?>
						<?php if ($gallery_artwork) : ?>
						<div class="p-exhibitors__detail-online-link">
							<a href="<?php echo $gallery_artwork; ?>" target="_blank"><span>VIEW ALL</span></a>
						</div>
						<?php endif; ?>
					<?php wp_reset_postdata(); endif; ?>
				*/ ?>
				<?php
					// 以下からLeading Asiaのみ
					if(have_rows('profile_repeat')):
				?>
					<div class="p-exhibitors__detail-profile">
						<h2>CURATOR PROFILE</h2>
						<?php
							while(have_rows('profile_repeat')): the_row();
								$thumbnail = wp_get_attachment_image_src(get_sub_field('profile_thumbnail'), 'full');
								$name = get_sub_field('profile_name');
								$text = get_sub_field('profile_text');
						?>
						<div class="p-exhibitors__detail-profile-item">
							<div class="p-exhibitors__detail-profile-thumbnail">
								<img src="<?php echo $thumbnail[0]; ?>" alt="">
							</div>
							<div class="p-exhibitors__detail-profile-text">
								<h3><?php echo $name; ?></h3>
								<p><?php echo $text; ?></p>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="p-exhibitors__detail-pager" data-pager="sp">
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
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<?php include('footer.php'); ?>
