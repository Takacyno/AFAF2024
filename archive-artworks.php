<?php
  get_header();
  $postNum = wp_count_posts('artworks');
  $currentLang = get_locale();
  $pagingNum = 24;
  $page = get_query_var('page') ? intval(get_query_var('page')) : 1;
  $keyQuery = get_query_var('key');
  $sectionsQuery = get_query_var('sections');
  $typeQuery = get_query_var('type');
  $tagsQuery = get_query_var('tags');
  $artworkSections = array('Galleries', 'Collaboration', 'Feature');
  // $artworkSections = [];
  // $terms = get_terms('section', array(
	// 	'orderby'    => 'count',
	// 	'order' => 'DESC',
	// ));
  // foreach ( $terms as $term ):
  //   $args=array(
  //     'post_type' => array('artworks'),
  //     'posts_per_page' => -1,
  //     'meta_query' => array(
  //       'relation' => 'AND',
  //       array (
  //         'key' => 'artworks_section',
  //         'value' => $term->name,
  //         'compare' => 'LIKE'
  //       )
  //     )
  //   );
  //   query_posts( $args );
  //   if(have_posts()):
  //     $artworkSections[] = $term->name;
  //   endif;
  //   wp_reset_postdata();
  // endforeach;
  $artworkTypes = array("Installation", "Painting", "Photography", "Sculpture", "Craft", "Prints", "Video", "Drawing", "Antiquities", "Others");
  $artworkTags = array("First piece", "Master");
?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/infinite-scroll.js"></script>
<main class="p-exhibitors">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side p-artworks__side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
        <div class="p-artworks__side-form">
          <form class="p-artworks__side-form-key js-side-key" action="" onsubmit="return false">
            <input class="p-artworks__side-form-key-input js-side-key-input" placeholder="作家名・作品名を検索" name="key" value="<?php echo $keyQuery ? $keyQuery : "" ?>" />
          </form>
          <div class="p-artworks__side-form-section">
            <p class="p-artworks__side-form-label">Section</p>
            <div class="p-artworks__side-form-body">
              <?php for ($i = 0; $i < count($artworkSections); $i++): ?>
                <div class="p-artworks__side-form-row js-artworks__side-form-row-section">
                  <input class="p-artworks__side-form-ckeckbox js-artworks__side-form-checkbox-section" type="checkbox" id="<?php echo $artworkSections[$i]; ?>" <?php echo is_array($sectionsQuery) && in_array($artworkSections[$i], $sectionsQuery) ? "checked" : "" ?> />
                  <label for="<?php echo $artworkSections[$i]; ?>"><?php echo $artworkSections[$i]; ?></label>
                </div>
              <?php endfor; ?>
            </div>
          </div>
          <div class="p-artworks__side-form-type">
            <p class="p-artworks__side-form-label">Type</p>
            <div class="p-artworks__side-form-body">
              <?php for ($i = 0; $i < count($artworkTypes); $i++): ?>
                <div class="p-artworks__side-form-row js-artworks__side-form-row-type">
                  <input class="p-artworks__side-form-ckeckbox js-artworks__side-form-checkbox-type" type="checkbox" id="<?php echo $artworkTypes[$i]; ?>" <?php echo is_array($typeQuery) && in_array($artworkTypes[$i], $typeQuery) ? "checked" : "" ?> />
                  <label for="<?php echo $artworkTypes[$i]; ?>"><?php echo $artworkTypes[$i]; ?></label>
                </div>
              <?php endfor; ?>
            </div>
          </div>
          <div class="p-artworks__side-form-tags">
            <?php for ($i = 0; $i < count($artworkTags); $i++): ?>
              <div class="p-artworks__side-form-row-tag js-artworks__side-form-row-tag">
                <input class="js-artworks__side-form-checkbox-tag" type="checkbox" id="<?php echo $artworkTags[$i]; ?>" <?php echo is_array($tagsQuery) && in_array($artworkTags[$i], $tagsQuery) ? "checked" : "" ?> />
                <label for="<?php echo $artworkTags[$i]; ?>"><?php echo $artworkTags[$i]; ?></label>
              </div>
            <?php endfor; ?>
          </div>
          <button class="p-artworks__side-form-reset" hide="<?php echo $keyQuery || $sectionsQuery || $typeQuery || $tagsQuery ? "false" : "true" ?>">Clear</button>
        </div>
			</div>
			<div class="c-area__content-main">
        <div class="c-title">
					<h1>ARTWORKS</h1>
          <a class="p-artworks__artscenes-header-link" href="https://art-scenes.net/ja/fairs/35" target="_blank">購入やお問い合せはこちらから</a>
				</div>
        <div class="p-artworks__form">
          <button class="p-artworks__form-button">絞り込み</button>
          <div class="p-artworks__form-inner" hide="<?php echo $keyQuery || $sectionsQuery || $typeQuery || $tagsQuery ? "false" : "true" ?>">
          <form class="p-artworks__side-form-key js-key" action="" onsubmit="return false">
            <input class="p-artworks__side-form-key-input js-key-input" placeholder="作家名・作品名を検索" name="key" value="<?php echo $keyQuery ? $keyQuery : "" ?>" />
          </form>
          <div class="p-artworks__side-form-section">
            <p class="p-artworks__side-form-label">Section</p>
            <div class="p-artworks__side-form-body">
              <?php for ($i = 0; $i < count($artworkSections); $i++): ?>
                <div class="p-artworks__side-form-row js-artworks__side-form-row-section">
                  <input class="p-artworks__side-form-ckeckbox js-artworks__side-form-checkbox-section" type="checkbox" id="<?php echo $artworkSections[$i]; ?>" <?php echo is_array($sectionsQuery) && in_array($artworkSections[$i], $sectionsQuery) ? "checked" : "" ?> />
                  <label for="<?php echo $artworkSections[$i]; ?>"><?php echo $artworkSections[$i]; ?></label>
                </div>
              <?php endfor; ?>
            </div>
          </div>
          <div class="p-artworks__side-form-type">
            <p class="p-artworks__side-form-label">Type</p>
            <div class="p-artworks__side-form-body">
              <?php for ($i = 0; $i < count($artworkTypes); $i++): ?>
                <div class="p-artworks__side-form-row js-artworks__side-form-row-type">
                  <input class="p-artworks__side-form-ckeckbox js-artworks__side-form-checkbox-type" type="checkbox" id="<?php echo $artworkTypes[$i]; ?>" <?php echo is_array($typeQuery) && in_array($artworkTypes[$i], $typeQuery) ? "checked" : "" ?> />
                  <label for="<?php echo $artworkTypes[$i]; ?>"><?php echo $artworkTypes[$i]; ?></label>
                </div>
              <?php endfor; ?>
            </div>
          </div>
          <div class="p-artworks__side-form-tags">
            <?php for ($i = 0; $i < count($artworkTags); $i++): ?>
              <div class="p-artworks__side-form-row-tag js-artworks__side-form-row-tag">
                <input class="js-artworks__side-form-checkbox-tag" type="checkbox" id="<?php echo $artworkTags[$i]; ?>" <?php echo is_array($tagsQuery) && in_array($artworkTags[$i], $tagsQuery) ? "checked" : "" ?> />
                <label for="<?php echo $artworkTags[$i]; ?>"><?php echo $artworkTags[$i]; ?></label>
              </div>
            <?php endfor; ?>
          </div>
          <button class="p-artworks__side-form-reset" hide="<?php echo $keyQuery || $sectionsQuery || $typeQuery || $tagsQuery ? "false" : "true" ?>">Clear</button>
          </div>
        </div>
        <div class="p-artworks">
        <?php
          $args=array(
            'post_type' => array('artworks'),
            'posts_per_page' => $pagingNum,
            'offset'         => ($page - 1) * $pagingNum,
            'meta_query' => array(
              'relation' => 'AND'
            )
          );
          if ($keyQuery) {
            $args['meta_query'][] = array(
              'relation' => 'OR',
              array(
                'key' => 'artisitprofile_artist_name',
                'value' => $keyQuery,
                'compare' => 'LIKE'
              ),
              array(
                'key' => 'title',
                'value' => $keyQuery,
                'compare' => 'LIKE'
              )
            );
          }
          if (is_array($sectionsQuery)) {
            $sections = array(
              'relation' => 'OR'
            );
            foreach($sectionsQuery as $section) {
              $sections[] = array(
                'key' => 'artworks_section',
                'value' => $section,
                'compare' => 'LIKE'
              );
            }
            $args['meta_query'][] = $sections;
          }
          if (is_array($typeQuery)) {
            $types = array(
              'relation' => 'OR'
            );
            foreach($typeQuery as $type) {
              $types[] = array(
                'key' => 'type',
                'value' => $type,
                'compare' => 'LIKE'
              );
            }
            $args['meta_query'][] = $types;
          }
          if (is_array($tagsQuery)) {
            $tags = array(
              'relation' => 'OR'
            );
            foreach($tagsQuery as $tag) {
              $tags[] = array(
                'key' => 'artworks_tags',
                'value' => $tag,
                'compare' => 'LIKE'
              );
            }
            $args['meta_query'][] = $tags;
          }
          $query = new WP_Query( $args );
          if($query->have_posts()):
          while($query->have_posts()): $query->the_post();
        ?>
          <div name="<?php echo the_title(); ?>" class="p-artworks__item">
            <button type="button" class="p-artworks__card js-artworks__card" id="<?php echo $post->ID; ?>">
              <div class="p-artworks__card-thumbnail">
                <!-- <?php the_post_thumbnail('full', $post->ID); ?> -->
                <img src="<?php echo get_field("artworks_thumbnail_img") ?>" />
              </div>
              <div class="p-artworks__card-info">
                <p class="p-artworks__card-artist-name"><?php echo get_field('artisitprofile', $post->ID)['artist_name']; ?></p>
                <p class="p-artworks__card-title"><?php echo get_field('title'); ?></p>
                <?php if (!empty(get_field('artworks_tags'))): ?>
                  <p class="p-artworks__card-tag"><?php echo get_field('artworks_tags')[0]; ?></p>
                <?php endif; ?>
              </div>
            </button>
            <div class="p-artworks__modal" display="false">
              <div class="p-artworks__modal-overlay"></div>
              <div class="p-artworks__modal-container">
                <div class="p-artworks__modal-filter js-artworks__modal-filter"></div>
                <div class="p-artworks__modal-body">
                  <button class="p-artworks__modal-close-button js-artworks__modal-close-button">
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
        <?php
          endwhile;
          else:
        ?>
          <p class="p-artworks__empty">指定した条件での検索結果は見つかりませんでした。<br />検索条件またはキーワードを変更し再度検索してください。</p>
        <?php
          endif;
          wp_reset_postdata();
        ?>
        </div>
        <div class="p-artworks__paging">
          <?php
            echo paginate_links(array(
              'total' => $query->max_num_pages,
              'current' => $page,
              'format' => '?page=%#%',
              'show_all' => false,
              'end_size' => 2,
              'mid_size' => 2,
              'prev_next' => true,
              'prev_text' => 'Prev',
              'next_text' => 'Next',
              'type' => 'plain'
            ));
          ?>
        </div>
        <a class="p-artworks__artscenes-link" href="https://art-scenes.net/ja/fairs/35" target="_blank">購入やお問い合せはこちらから</a>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
