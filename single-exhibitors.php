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

	$artists = [];
	foreach (get_field('artworks') as $artwork) {
		$artisitprofile = get_field('artisitprofile', $artwork->ID);
		if (!in_array($artisitprofile['artist_name'], $artists) && !empty($artisitprofile['artist_name'])) {
			$artists[] = $artisitprofile['artist_name'];
		}
	}
?>

<main class="p-exhibitors" data-news="detail" id=<?php echo the_title(); ?>>
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('exhibitors'); ?>"><span>All Exhibitiors</span></a>
				</div>
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
							<?php echo get_field('booth‐number') ?>
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
				<div class="p-exhibitors__detail-main">
					<div class="p-exhibitors__detail-article">
						<?php if (has_post_thumbnail()): ?>
							<div class="p-exhibitors__detail-thumbnail-sp">
								<?php the_post_thumbnail('full'); ?>
								<?php
									$caption = get_post(get_post_thumbnail_id())->post_excerpt;
									if ($caption):
								?>
									<p><?php echo $caption; ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<div class="p-exhibitors__detail-content">
							<?php echo get_field('summary'); ?>
						</div>
					</div>
					<div>
						<?php if (has_post_thumbnail()): ?>
							<div class="p-exhibitors__detail-thumbnail-pc">
								<?php the_post_thumbnail('full'); ?>
								<?php
									$caption = get_post(get_post_thumbnail_id())->post_excerpt;
									if ($caption):
								?>
									<p><?php echo $caption; ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
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
					</div>
				</div>
				<?php
					$curation = get_field("curation");
					if (!empty($curation["curators_name"]) && !empty($curation["curators_profile"]) && !empty($curation["curators_img"])):
				?>
					<div class="p-exhibitors__detail-curation">
						<h2>CURATOR PROFILE</h2>
						<img src="<?php echo $curation["curators_img"]["url"]; ?>" />
						<div class="p-exhibitors__detail-curator">
							<p class="p-exhibitors__detail-curator-name">
								<?php echo $curation["curators_name"]; ?>
							</p>
							<?php echo $curation["curators_profile"]; ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="p-exhibitors__detail-relationship">
					<?php if (count($artists)): ?>
						<div class="p-exhibitors__detail-artists">
							<h2>Artists</h2>
							<div>
								<?php foreach ($artists as $artist): ?>
									<p class="p-exhibitors__detail-artists-name">
										<?php echo $artist; ?>
									</p>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if (!empty(get_field('artworks'))): ?>
						<div class="p-exhibitors__detail-artworks">
							<div class="p-exhibitors__detail-artworks-header">
								<h2>Artworks</h2>
								<a href="<?php echo get_field("gallery-artwork"); ?>">Contact</a>
							</div>
							<div>
								<?php foreach (get_field('artworks') as $post): ?>
									<div name="<?php echo the_title(); ?>" class="p-artworks__item">
										<button type="button" class="p-artworks__card js-artworks__card-exhibitor">
											<div class="p-artworks__card-thumbnail">
												<img src="<?php echo get_field("artworks_thumbnail_img", $post->ID) ?>" />
											</div>
											<div class="p-artworks__card-info">
												<p class="p-artworks__card-artist-name"><?php echo get_field('artisitprofile', $post->ID)['artist_name']; ?></p>
												<p class="p-artworks__card-title"><?php echo get_field('title', $post->ID); ?></p>
												<?php if (!empty(get_field('artworks_tags'))): ?>
													<p class="p-artworks__card-tag"><?php echo get_field('artworks_tags')[0]; ?></p>
												<?php endif; ?>
											</div>
										</button>
										<div class="p-artworks__modal" display="false">
											<div class="p-artworks__modal-overlay"></div>
											<div class="p-artworks__modal-container">
												<div class="p-artworks__modal-filter js-artworks__modal-filter-exhibitor"></div>
												<div class="p-artworks__modal-body">
													<button class="p-artworks__modal-close-button js-artworks__modal-close-button-exhibitor">
														<img src="<?php echo site_url() ?>/wp-content/themes/afaf-2024/image/icon-close.svg" />
													</button>
													<?php if (!empty(get_field('artworks_tags'))): ?>
														<p class="p-artworks__modal-tag">
															<?php echo get_field('artworks_tags')[0]; ?>
														</p>
													<?php endif; ?>
													<div class="p-artworks__modal-content">
														<div>
															<?php get_template_part('artwork'); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<?php include('footer.php'); ?>
