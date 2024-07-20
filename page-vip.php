<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$comingSoon = get_field( 'comingsoon' );
	$loginText = get_field( 'login_text' );
	$loggedInText = get_field( 'logged_in_text' );
	$isComingsoon = $comingSoon['comingsoon_button'];
	$comingSoonText = $comingSoon['comingsoon_text'];
	$currentLang = get_locale();
?>

<main class="p-vip">
	<?php if ($isComingsoon != true): ?>
		<?php if( !post_password_required( $post->ID ) ) : ?>
			<div class="c-title" data-bg="secondary">
				<h1>VIP</h1>
			</div>
			<div class="c-area__content">
				<div class="p-vip__wrapper">
					<div class="p-vip__text">
						<?php if ($loggedInText) { echo $loggedInText; } ?>
					</div>
					<div class="p-vip__list-wrapper">
						<h2><span>PROGRAM</span>VIPプログラム</h2>
						<?php
							$args = array(
								'post_type' => 'vip-program', /* カスタム投稿名 */
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'vip-category',
										'field' => 'slug',
										'terms' => 'program',
										'_locale' => $currentLang,
									)
								),
								'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
							);
							query_posts( $args );
							if(have_posts()):
						?>
						<ul class="p-vip__list">
							<?php while(have_posts()):the_post(); ?>
							<li>
								<?php
									$lead = get_field( 'lead' );
									$dates = get_field( 'dates' );
									$hours = get_field( 'hours' );
									$location = get_field( 'location' );
								?>
								<a href="<?php echo the_permalink( $post->ID ); ?>">
									<div class="p-vip__list-information">
									<p>
										<?php
											if ( $dates ) :
										?>
											<span><?php echo $dates; ?></span>
										<?php endif; ?>
										<?php
											if ( $hours ) :
										?>
											<span><?php echo $hours; ?></span>
										<?php endif; ?>
									</p>
									<?php
										if ( $location ) :
									?>
										<dl>
											<dt>会場</dt>
											<dd><?php echo $location; ?></dd>
										</dl>
									<?php endif; ?>
									</div>
									<?php
										if (has_post_thumbnail()):
									?>
									<div class="p-vip__list-thumbnail">
										<?php the_post_thumbnail('full'); ?>
										<?php
											$status = get_the_terms($post -> ID, 'vip-status');
											if ( $status ) {
												foreach($status as $term) {
													$statusName = $term->name;
													$sectionSlug = $term->slug;
													echo '<span class="p-vip__list-thumbnail-status" data-status="'. $sectionSlug .'">' . $statusName . '</span>';
												}
											}
										?>
									</div>
									<?php endif; ?>
									<?php
										$section = get_the_terms($post -> ID, 'vip-program-section');
										if ( $section ) :
									?>
										<ul class="p-vip__list-taxonomy">
											<?php
												foreach($section as $term) {
													$sectionName = $term->name;
													echo '<li class="p-vip__list-taxonomy-item">' . $sectionName . '</li>';
												}
											?>
										</ul>
									<?php
										endif;
									?>
									<h3 class="p-vip__list-title"><?php the_title(); ?></h3>
									<span class="p-vip__list-lead"><?php echo $lead; ?></span>
									<div class="p-vip__list-more">
										<span>READ MORE</span>
									</div>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
					<div class="p-vip__list-wrapper">
						<h2><span>PRIVILEGE</span>VIP特典</h2>
						<?php
							$args = array(
								'post_type' => 'vip-program', /* カスタム投稿名 */
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'vip-category',
										'field' => 'slug',
										'terms' => 'privilege',
										'_locale' => $currentLang,
									)
								),
								'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
							);
							query_posts( $args );
							if(have_posts()):
						?>
						<ul class="p-vip__list">
							<?php while(have_posts()):the_post(); ?>
							<li>
								<?php
									$lead = get_field( 'lead' );
									$dates = get_field( 'dates' );
									$hours = get_field( 'hours' );
									$location = get_field( 'location' );
								?>
								<a href="<?php echo the_permalink( $post->ID ); ?>">
									<div class="p-vip__list-information">
									<p>
										<?php
											if ( $dates ) :
										?>
											<span><?php echo $dates; ?></span>
										<?php endif; ?>
										<?php
											if ( $hours ) :
										?>
											<span><?php echo $hours; ?></span>
										<?php endif; ?>
									</p>
									<?php
										if ( $location ) :
									?>
										<dl>
											<dt>会場</dt>
											<dd><?php echo $location; ?></dd>
										</dl>
									<?php endif; ?>
									</div>
									<?php
										if (has_post_thumbnail()):
									?>
									<div class="p-vip__list-thumbnail">
										<?php the_post_thumbnail('full'); ?>
										<?php
											$status = get_the_terms($post -> ID, 'vip-status');
											if ( $status ) {
												foreach($status as $term) {
													$statusName = $term->name;
													$sectionSlug = $term->slug;
													echo '<span class="p-vip__list-thumbnail-status" data-status="'. $sectionSlug .'">' . $statusName . '</span>';
												}
											}
										?>
									</div>
									<?php endif; ?>
									<?php
										$section = get_the_terms($post -> ID, 'vip-program-section');
										if ( $section ) :
									?>
										<ul class="p-vip__list-taxonomy">
											<?php
												foreach($section as $term) {
													$sectionName = $term->name;
													echo '<li class="p-vip__list-taxonomy-item">' . $sectionName . '</li>';
												}
											?>
										</ul>
									<?php
										endif;
									?>
									<h3 class="p-vip__list-title"><?php the_title(); ?></h3>
									<span class="p-vip__list-lead"><?php echo $lead; ?></span>
									<div class="p-vip__list-more">
										<span>READ MORE</span>
									</div>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
					<?php
						// 'benefits' 固定ページのIDを取得
						// $benefits_page_id = get_page_by_path('benefits')->ID;
						if ($currentLang != 'en_US') {
							$benefits_page_id = 6376;
						} else {
							$benefits_page_id = 6374;
						}
						$vip_on_value = get_post_meta($benefits_page_id, 'vip_on', true);
						$benefits_page_content = apply_filters('the_content', get_post_field('post_content', $benefits_page_id));
						if ($vip_on_value) :
					?>
					<div class="p-benefits__wrapper js-fadein" data-benefits="vip">
						<div class="p-benefits__heading">
							<h1>TICKET BENEFITS
								<?php if ($currentLang != 'en_US') : ?>
								<span>チケット特典</span>
								<?php endif; ?>
							</h1>
						</div>
						<div class="p-benefits__content">
							<?php
								// 取得したコンテンツを表示
								echo $benefits_page_content;
							?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php else: ?>
			<div class="c-area__content">
				<div class="p-vip__login">
					<div class="p-vip__login-title">
						<h1>VIP-LOGIN</h1>
					</div>
					<?php echo get_the_password_form(); //パスワード入力フォームの出力 ?>
					<?php if ($loginText) : ?>
						<div class="p-vip__login-text"><?php echo $loginText; ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="c-area__content">
				<div class="c-area__content-inner">
					<div class="c-area__content-side">
						<div class="c-area__content-back">
							<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
						</div>
					</div>
					<div class="c-area__content-main">
						<div class="c-title" data-bg="secondary">
							<h1>VIP-LOGIN</h1>
						</div>
						<div class="p-vip__login-coming">
							<h1>COMING SOON</h1>
							<?php if ($comingSoonText) { echo $comingSoonText; } ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</main>

<?php include('footer.php'); ?>
