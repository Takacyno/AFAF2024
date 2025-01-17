<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$comingSoon = get_field( 'comingsoon' );
	$loginText = get_field( 'login_text' );
	$loggedInText = get_field( 'logged_in_text' );
	$isComingsoon = $comingSoon['comingsoon_button'];
	$comingSoonText = $comingSoon['comingsoon_text'];
	$sectionQuery = get_query_var('section');
	$programComingsoon = get_field('program_comingsoon');
	$experienceComingsoon = get_field('experience_comingsoon');
	$currentLang = get_locale();
?>

<main class="p-vip">
	<?php if ($isComingsoon != true): ?>
		<?php if( !post_password_required( $post->ID ) ) : ?>
			<div class="c-area__content">
				<div class="c-area__content-inner">
					<div class="c-area__content-side">
						<div class="c-area__content-back">
							<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
						</div>
					</div>
					<div class="c-area__content-main">
						<div class="c-title" data-bg="secondary">
							<h1>VIP</h1>
						</div>
						<div class="p-vip__wrapper">
							<div class="p-vip__list-wrapper">
								<ul class="p-vip__section-tab">
									<li><button type="button" aria-controls="program" aria-selected="<?php echo $sectionQuery == "experience" ? "false" : "true" ?>">PROGRAM</button></li>
									<li><button type="button" aria-controls="experience" aria-selected="<?php echo $sectionQuery == "experience" ? "true" : "false" ?>">EXPERIENCE</button></li>
									<li><button type="button" aria-controls="contact" aria-selected="false">CONTACT</button></li>
								</ul>
								<div class="p-vip__section-tabpanel">
									<div id="program" aria-hidden="<?php echo $sectionQuery == "experience" ? "true" : "false" ?>">
										<?php
											$args = array(
												'post_type' => 'vip-program', /* カスタム投稿名 */
												'order' => 'ASC',
												'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
											);
											query_posts( $args );
											if(have_posts() && !$programComingsoon['program_comingsoon_button']):
										?>
										<ul class="p-vip__list">
											<?php while(have_posts()):the_post(); ?>
											<li>
												<?php
													$lead = get_field( 'lead' );
												?>
												<a href="<?php echo the_permalink( $post->ID ); ?>">
													<?php
														if (has_post_thumbnail()):
													?>
													<div class="p-vip__list-thumbnail">
														<?php the_post_thumbnail('full'); ?>
														<div class="p-vip__list-thumbnail-overlay"></div>
														<?php $status = get_field('status'); ?>
														<?php if ($status != "なし"): ?>
															<span class="p-vip__list-thumbnail-status" data-status="<?php echo $status == '受付中' ? "now-accepting-applications" : ($status == '受付前' ? "before" : "closed"); ?>">
																<?php echo $status; ?>
															</span>
														<?php endif; ?>
														<div class="p-vip__list-more">
															<span>READ MORE</span>
														</div>
													</div>
													<?php endif; ?>
													<div class="p-vip__list-body">
															<ul class="p-vip__list-taxonomy">
																<li class="p-vip__list-taxonomy-item"><?php echo get_field('vip_section') ?></li>
															</ul>
														<h3 class="p-vip__list-title"><?php the_title(); ?></h3>
														<span class="p-vip__list-lead"><?php echo $lead; ?></span>
														<?php if(have_rows('date and time')): ?>
															<div class="p-vip__list-date-time-location">
																<?php $week = array( "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"); ?>
																<?php if (get_field('is_date_consecutive')): ?>
																	<div>
																		<p class="p-vip__list-date">
																			<?php
																				$dateTimes = get_field('date and time');
																				echo $dateTimes[0]['start_date'];
																			?>
																			-
																			<?php
																				$lastDate = end($dateTimes)['start_date'];
																				echo mb_substr($lastDate, mb_strrpos($lastDate, '/') + 1, mb_strlen($lastDate));
																			?>
																		</p>
																		<?php foreach ($dateTimes[0]['hours'] as $hour): ?>
																			<p class="p-vip__list-time"><?php echo $hour['time']; ?></p>
																		<?php endforeach; ?>
																	</div>
																<?php else: ?>
																	<?php
																		while(have_rows('date and time')): the_row();
																			$date = get_sub_field('start_date');
																			$hours = get_sub_field('hours');
																	?>
																		<div>
																			<p class="p-vip__list-date"><?php echo $date; ?> (<?php echo $week[date("w", strtotime($date))] ?>)</p>
																			<?php if(have_rows('hours')): ?>
																				<div class="p-vip__list-hours">
																					<?php
																						while(have_rows('hours')): the_row();
																							$time = get_sub_field('time');
																					?>
																						<p class="p-vip__list-time"><?php echo $time; ?></p>
																					<?php endwhile; ?>
																				</div>
																			<?php endif; ?>
																		</div>
																	<?php endwhile; ?>
																<?php endif; ?>
																<p class="p-vip__list-location">会場　<?php echo get_field('location'); ?></p>
															</div>
														<?php endif; ?>
														<div class="p-vip__list-more-sp">
															<span>READ MORE</span>
														</div>
													</div>
												</a>
											</li>
											<?php endwhile; ?>
										</ul>
										<?php else: ?>
											<div class="p-vip__comingsoon">
												<h1>COMING SOON</h1>
												<p>
													<?php
														echo $programComingsoon['program_comingsoon_text'];
													?>
												</p>
											</div>
										<?php endif; ?>
									</div>
									<div id="experience" aria-hidden="<?php echo $sectionQuery == "experience" ? "false" : "true" ?>">
										<?php
											$args = array(
												'post_type' => 'vip_benefits', /* カスタム投稿名 */
												'order' => 'ASC',
												'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
											);
											query_posts( $args );
											if(have_posts() && !$experienceComingsoon['experience_comingsoon_button']):
										?>
										<ul class="p-vip__list">
											<?php while(have_posts()):the_post(); ?>
											<li>
												<?php
													$lead = get_field( 'vip_lead' );
													$isReadmore = get_field('readmore');
												?>
												<a style="pointer-events: <?php echo $isReadmore ? "auto" : "none" ?>;" href="<?php echo the_permalink( $post->ID ); ?>">
													<?php
														if (has_post_thumbnail()):
													?>
													<div class="p-vip__list-thumbnail">
														<?php the_post_thumbnail('full'); ?>
														<div class="p-vip__list-thumbnail-overlay"></div>
															<div class="p-vip__list-more">
																<span>READ MORE</span>
															</div>
													</div>
													<?php endif; ?>
													<div class="p-vip__list-body">
														<h3 class="p-vip__list-title"><?php the_title(); ?></h3>
														<span class="p-vip__list-lead"><?php echo $lead; ?></span>
														<?php if (get_field('readmore')): ?>
															<div class="p-vip__list-more-sp">
																<span>READ MORE</span>
															</div>
														<?php endif; ?>
													</div>
												</a>
											</li>
											<?php endwhile; ?>
										</ul>
										<?php else: ?>
											<div class="p-vip__comingsoon">
												<h1>COMING SOON</h1>
												<p>
													<?php echo $experienceComingsoon['experience_comingsoon_text']; ?>
												</p>
											</div>
										<?php endif; ?>
									</div>
									<div id="contact" aria-hidden="true">
										<?php
											$args = array(
												'post_type' => 'vip_contact', /* カスタム投稿名 */
												'order' => 'ASC',
												'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
											);
											query_posts( $args );
											if(have_posts()):
										?>
										<?php while(have_posts()):the_post(); ?>
											<div class="p-vip__contact"><?php echo get_field( 'vip_contact' ) ?></div>
										<?php endwhile; ?>
										<?php endif; ?>
									</div>
								</div>
								<?php wp_reset_query(); ?>
							</div>
							<?php /*
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
							<?php endif; */ ?>
						</div>
					</div>
				</div>
			</div>
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
						<div class="p-vip__login">
							<?php echo get_the_password_form(); //パスワード入力フォームの出力 ?>
							<?php if ($loginText) : ?>
								<div class="p-vip__login-text"><?php echo $loginText; ?></div>
							<?php endif; ?>
						</div>
					</div>
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
