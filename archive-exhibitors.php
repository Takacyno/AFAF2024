<?php
	get_header();
	$currentLang = get_locale();
	$imagePath = get_stylesheet_directory_uri() . '/image';

	$terms = get_terms('section', array(
		'orderby'    => 'count',
		'order' => 'DESC',
	));
	$exhibitorsTermNames = [];
	$exhibitorsTermSlugs = [];
	$exhibitorsHideTermSlugs = ["curation", "master"];
	$exhibitorsTermCounts = [];
	$exhibitorsTermJaCounts = [];
	$exhibitorsTermEnCounts = [];
	$exhibitorsTermDescriptions = [];
	$exhibitorsTermIds = [];
	$exhibitorsTermIdsps = [];
	$exhibitorsTermNum = 0;
	foreach ( $terms as $term ):
		$exhibitorsTermNum++;
		$exhibitorsTermName = $term->name;
		$exhibitorsTermSlug = $term->slug;
		$exhibitorsTermCount = $term->count;
		$exhibitorsTermId = $term->term_id;
		$exhibitorsTermIdsp = 'section_'.$exhibitorsTermId;
		// $exhibitorsTermEnDescription = $term->term_id;
		$exhibitorsTermDescription = $term->description;
		$exhibitorsTermNames[] = $exhibitorsTermName;
		$exhibitorsTermSlugs[] = $exhibitorsTermSlug;
		$exhibitorsTermCounts[] = $exhibitorsTermCount;
		$exhibitorsTermIds[] = $exhibitorsTermId;
		$exhibitorsTermIdsps[] = $exhibitorsTermIdsp;
		$exhibitorsTermDescriptions[] = $exhibitorsTermDescription;
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

<main class="p-exhibitors">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
			<div class="c-title">
					<h1>EXHIBITORS</h1>
				</div>
				<!-- セクション区切りのborder -->
				<!-- <div class="p-exhibitors__section js-fadein"> -->
				<div class="p-exhibitors__section">
					<div id="exhibitorsHeading" class="p-exhibitors__section-heading">
						<ul class="p-exhibitors__section-tab">
							<li><button type="button" aria-controls="all" aria-selected="true">All</button></li>
							<?php
								for ($i = 0; $i < $exhibitorsTermNum; $i++):
							?>
								<?php if (!in_array($exhibitorsTermSlugs[$i], $exhibitorsHideTermSlugs)): ?>
									<li><button type="button" aria-controls="<?php echo $exhibitorsTermSlugs[$i]; ?>" aria-selected="false"><?php echo $exhibitorsTermNames[$i]; ?></button></li>
								<?php endif; ?>
							<?php endfor; ?>
						</ul>
					</div>
					<div class="p-exhibitors__section-content">
						<div class="p-exhibitors__section-tabpanel">
							<div id="all" class="p-exhibitors__section-tabpanel-all" aria-hidden="false">
								<ul class="p-exhibitors__taxonomy">
									<?php
										$args=array(
											'post_type' => 'exhibitors', //カスタム投稿名
											'orderby' => 'meta_value',
											'meta_key' => 'sort',
											'order' => 'ASC',
											'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
										);
										query_posts( $args );
										if(have_posts()):
											$i2 = 0;
											while(have_posts()):the_post();
												$i2++;
												$number = get_field( 'number' );
									?>
									<li class="p-exhibitors__taxonomy-item">
										<a href="<?php echo the_permalink( $post->ID ); ?>">
											<?php if ($currentLang == 'en_US') : ?>
												<h3 lang="en"><?php the_title(); ?></h3>
											<?php else: ?>
												<h3><?php the_title(); ?></h3>
											<?php endif; ?>
											<?php
												$section = get_the_terms($post -> ID, 'section');
												if ( $section ) {
													foreach($section as $term) {
														$sectionName = $term->name;
														echo '<span class="p-exhibitors__taxonomy-item-location">' . $sectionName . '</span>';
													}
												}
											?>
											<?php /*
											<dl>
												<dt>Booth</dt>
												<dd><?php echo $number; ?></dd>
											</dl>
											*/ ?>
										</a>
									</li>
									<?php
										endwhile;
										endif;
									?>
								</ul>
							</div>
							<?php
								wp_reset_postdata();
								// allここまで
							?>

							<?php
								for ($i = 0; $i < $exhibitorsTermNum; $i++):
							?>
							<div id="<?php echo $exhibitorsTermSlugs[$i]; ?>" class="p-exhibitors__section-tabpanel-item" aria-hidden="true">
								<div class="p-exhibitors__taxonomy-desc">
									<?php if(get_field('img', $exhibitorsTermIdsps[$i])): ?>
										<img src="<?php echo get_field('img', $exhibitorsTermIdsps[$i])['url']; ?>" />
									<?php endif; ?>
									<?php if($currentLang == 'en_US'): ?>
										<?php echo get_field('description_en', $exhibitorsTermIdsps[$i]) ?>
									<?php else: ?>
										<?php echo $exhibitorsTermDescriptions[$i] ?>
									<?php endif; ?>
								</div>
								<ul class="p-exhibitors__taxonomy">
									<?php
										$args=array(
											'post_type' => 'exhibitors', //カスタム投稿名
											'tax_query' => array(
												array(
													'taxonomy' => 'section',
													'field' => 'slug',
													'terms' => array($exhibitorsTermSlugs[$i]),
													'_locale' => $currentLang,
												)
											),
											'orderby' => 'meta_value',
											'meta_key' => 'sort',
											'order' => 'ASC',
											'posts_per_page'=> -1 //表示件数（-1で全ての記事を表示）
										);
										query_posts( $args );
										if(have_posts()):
											$i2 = 0;
											while(have_posts()):the_post();
												$i2++;
												$number = get_field( 'number' );
									?>
									<li class="p-exhibitors__taxonomy-item">
										<a href="<?php echo the_permalink( $post->ID ); ?>">
											<h3><?php the_title(); ?></h3>
											<?php
												$section = get_the_terms($post -> ID, 'section');
												if ( $section ) {
													foreach($section as $term) {
														$sectionName = $term->name;
														echo '<span class="p-exhibitors__taxonomy-item-location">' . $sectionName . '</span>';
													}
												}
											?>
											<?php /*
											<dl>
												<dt>Booth</dt>
												<dd><?php echo $number; ?></dd>
											</dl>
											*/ ?>
										</a>
									</li>
									<?php
										endwhile;
										endif;
									?>
								</ul>
							</div>
							<?php
								endfor;
								wp_reset_postdata();
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
