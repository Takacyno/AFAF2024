<?php
  get_header();
  $typeQuery = get_query_var('type');
  $currentLang = get_locale();
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
					<h1>ARTWORKS</h1>
				</div>
        <div class="p-artworks">
          <?php
            $args=array(
              'post_type' => array('artworks'),
              'order' => 'DESC',
              'posts_per_page'=> -1,
              'meta_query' => array(
                'relation' => 'OR'
              )
            );
            if (is_array($typeQuery)) {
              foreach($typeQuery as $type) {
                $args['meta_query'][] = array(
                  'key' => 'type',
                  'value' => $type,
                  'compare' => 'LIKE'
                );
              }
            }
            query_posts( $args );
            if(have_posts()):
            while(have_posts()): the_post();
          ?>
            <div name="<?php echo the_title(); ?>" class="p-artworks__item">
              <button type="button" class="p-artworks__card">
                <div class="p-artworks__card-thumbnail">
                  <?php the_post_thumbnail('full', $post->ID); ?>
                </div>
                <p><?php echo get_field('artisitprofile', $post->ID)['artist_name']; ?></p>
                <p><?php echo the_title(); ?></p>
                <?php echo $artworkID ?>
              </button>
              <div class="p-artworks__modal" display="false">
                <div class="p-artworks__modal-overlay"></div>
                <div class="p-artworks__modal-body">
                  <button class="p-artworks__modal-close-button">close</button>
                  <?php the_post_thumbnail('full', $post->ID); ?>
                  <p><?php echo get_field('artisitprofile', $post->ID)['artist_name']; ?></p>
                  <p><?php echo the_title(); ?></p>
                  <?php
                    $exhibitors_args=array(
                      'post_type' => array('exhibitors'),
                      'order' => 'ASC',
                      'posts_per_page'=> -1,
                      'meta_query' => array(
                        array(
                          'key' => 'artworks',
                          'value' => '"'.$post->ID.'"',
                          'compare' => 'LIKE'
                        )
                      )
                    );
                    $exhibitors = new WP_Query( $exhibitors_args );
                    if($exhibitors->have_posts()):
                    while($exhibitors->have_posts()): $exhibitors->the_post();
                  ?>
                    <p><?php echo get_the_title(); ?></p>
                    <p><?php echo get_field('booth‐number', $post->ID); ?></p>
                  <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                  ?>
                </div>
              </div>
            </div>
          <?php
            endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
