<?php
	include('header.php');
	$number = get_field( 'number' );
	$contents = get_field( 'contents' );
	$location = get_field( 'location' );
	$enGallery = get_field( 'en-gallery' );
	$currentLang = get_locale();
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$isBooth = false;

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
				<div class="c-area__content-back">
					<a href="<?php echo home_url('exhibitors'); ?>"><span>All Exhibitiors</span></a>
				</div>
				<?php /*
				<table class="p-exhibitors__detail-meta">
					<tbody>
						<tr>
							<th>Location</th>
							<td><?php echo $location; ?></td>
						</tr>
					</tbody>
				</table>
				*/ ?>
			</div>
			<div class="c-area__content-main margin-right">
				<div class="p-exhibitors__detail-header">
					<div class="p-exhibitors__detail-section">
						<dt>SECTION: </dt>
						<dd>
							<?php
								$section = get_the_terms($post -> ID, 'section');
								foreach($section as $term) {
									$sectionName = $term->name;
									echo $sectionName;
								}
							?>
						</dd>
						<?php if ($isBooth): ?>
						<dt>BOOTH: </dt>
						<dd>
							<?php echo get_field('booth-number') ?>
						</dd>
						<?php endif; ?>
					</div>
					<div>
						<?php if ($currentLang != 'en_US') : ?>
							<?php if ($enGallery) : ?>
								<h1><?php the_title(); ?></h1>
								<span><?php echo $enGallery; ?></span>
							<?php else: ?>
								<h1><?php the_title(); ?></h1>
							<?php endif; ?>
						<?php else: ?>
							<h1 lang="en"><?php the_title(); ?></h1>
						<?php endif; ?>
					</div>
				</div>
				<?php // header ここまで ?>
				<?php if (has_post_thumbnail()): ?>
					<div class="p-exhibitors__detail-thumbnail">
						<?php the_post_thumbnail('full'); ?>
					</div>
				<?php endif; ?>
				<div class="p-exhibitors__detail-content">
					<?php echo get_field('summary'); ?>
				</div>
				<table class="p-exhibitors__detail-information">
					<tbody>
						<?php
							if(have_rows('address')):
						?>
							<tr>
								<th>Address</th>
								<td>
								<?php
									while(have_rows('address')): the_row();
										$postal_code = get_sub_field('postal_code');
										$house = get_sub_field('house');
								?>
									<p>
										<?php
											if ( $postal_code ) {
												echo '<span>〒' . $postal_code . ' </span>';
											}
											if ( $house ) {
												echo '<span>' . $house . '</span>';
											}
										?>
									</p>
								<?php
									endwhile;
								?>
							</td>
							</tr>
							<?php endif; ?>
							<?php
								if(!empty(get_field('tel'))):
							?>
								<tr>
									<th>Tel</th>
									<td>
										<?php echo get_field('tel'); ?>
									</td>
								</tr>
							<?php
								endif;
								if(have_rows('email')):
							?>
								<tr>
									<th>Email</th>
									<td>
										<?php
											while(have_rows('email')): the_row();
												$email = get_sub_field('email_address');
										?>
											<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
										<?php endwhile; ?>
									</td>
								</tr>
						<?php
							endif;
							if(have_rows('web')):
						?>
							<tr>
								<th>Website</th>
								<td class='p-exhibitors__detail-information-website'>
								<?php
									while(have_rows('web')): the_row();
										$website = get_sub_field('website');
								?>
									<a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a>
								<?php
									endwhile;
								?>
								</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
					<?php
						if(have_rows('sns')):
					?>
						<?php
							while(have_rows('sns')): the_row();
								$postal_code = get_sub_field('postal_code');
								$house = get_sub_field('house');
						?>
							<div class='p-exhibitors__detail-sns'>
								<ul>
									<?php if(get_sub_field('x_url')): ?>
										<li><a href="<?php echo get_sub_field('x_url'); ?>" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-x.svg" alt="X"></a></li>
									<?php endif; ?>
									<?php if(get_sub_field('instagram_url')): ?>
										<li><a href="<?php echo get_sub_field('instagram_url'); ?>" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-instagram.svg" alt="INSTAGRAM"></a></li>
									<?php endif; ?>
									<?php if(get_sub_field('facebook_url')): ?>
										<li><a href="<?php echo get_sub_field('facebook_url'); ?>" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-facebook.svg" alt="FACEBOOK"></a></li>
									<?php endif; ?>
								<ul>
							</div>
						<?php
							endwhile;
						?>
					<?php endif; ?>
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
			</div>
		</div>
	</div>
</main>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<?php include('footer.php'); ?>
