<?php
	include('header.php');
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$currentLang = get_locale();
?>

<main class="p-vip">
	<div class="c-title" data-bg="secondary">
		<h1>PROGRAM</h1>
	</div>
	<div class="c-area__content">
		<div class="p-vip__wrapper" data-page="program">
			<div class="p-vip__list-wrapper">
				<h2><span>PUBLIC</span></h2>
				<?php
					$args = array(
						'post_type' => 'program', /* カスタム投稿名 */
						'order' => 'ASC',
						'tax_query' => array(
							array(
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
									$status = get_the_terms($post -> ID, 'program-status');
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
								$section = get_the_terms($post -> ID, 'program-section');
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
		</div>
		<?php
			if(have_rows('associated_repeat')):
		?>
			<div class="p-vip__associated">
			<h2>ASSOCIATED PROGRAMS</h2>
				<?php
					while(have_rows('associated_repeat')): the_row();
						$event = get_sub_field('associated_event');
						$date = get_sub_field('associated_date');
						$information = get_sub_field('associated_information');
				?>
					<div class="p-vip__associated-item">
						<h3><?php echo $event; ?></h3>
						<span><?php echo $date; ?></span>
						<div class="p-vip__associated-content">
							<?php echo $information; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php include('footer.php'); ?>
