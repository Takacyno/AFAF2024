<?php get_header(); ?>

<main class="p-news">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="p-news__detail-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title">
					<h1>NEWS</h1>
				</div>
				<?php
					$term = get_queried_object();
					$paged = get_query_var('paged') ?: 1;
					$args = array(
						'post_type' => array('news'), /* 投稿タイプを指定 */
						'paged' => $paged,
						'orderby' => 'menu_order',
						'order' => 'DESC',
						'posts_per_page' => '-1' /* 20件を取得 */
					);
				?>
				<ul class="p-news__list">
				<?php setup_postdata( $args ); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li class="p-news__list-item">
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
								<span class="p-news__list-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
								<span class="p-news__list-title"><?php the_title(); ?></span>
							</a>
						<?php else: ?>
							<a href="<?php echo the_permalink( $post->ID ); ?>">
								<span class="p-news__list-date"><?php echo $monthArray[$month] .' ' . $date . ', ' . $year; ?></span>
								<span class="p-news__list-title"><?php the_title(); ?></span>
							</a>
						<?php endif; ?>
					</li>
				<?php endwhile; endif; ?>
				</ul>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
