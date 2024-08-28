<?php
  $artist = get_field("artisitprofile", $post->ID);
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
  $exhibitors = (new WP_Query( $exhibitors_args ));
?>
<div class="p-artworks__image">
  <?php $images = get_field("artworks_original", $post->ID); ?>
  <img class="js-artworks__image" src="<?php echo $images[0]["artworks_original_image"]; ?>" />
  <div class="p-artworks__images">
    <?php foreach($images as $image): ?>
      <div>
        <img class="js-artworks__thumbnail" src="<?php echo $image["artworks_original_image"]; ?>" />
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="p-artworks__info">
  <div>
    <p class="p-artworks__info-artistname">
      <?php echo $artist["artist_name"]; ?>
    </p>
    <p class="p-artworks__info-title">
      <?php echo the_title(); ?>
    </p>
    <div class="p-artworks__info-details">
      <?php if(!empty(get_field("year", $post->ID))): ?>
        <p><?php echo get_field("year", $post->ID); ?></p>
      <?php endif; ?>
      <?php if(!empty(get_field("type", $post->ID))): ?>
        <p><?php echo get_field("type", $post->ID); ?></p>
      <?php endif; ?>
      <?php if(!empty(get_field("size", $post->ID))): ?>
        <p><?php echo get_field("size", $post->ID); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="p-artworks__info-exhibitors">
    <?php
      if($exhibitors->have_posts()):
      while($exhibitors->have_posts()): $exhibitors->the_post();
    ?>
      <div class="p-artworks__info-exhibitor">
        <p class="p-artworks__info-exhibitor-name"><?php echo the_title(); ?></p>
        <a class="p-artworks__info-exhibitor-link" href="<?php echo the_permalink( $post->ID ); ?>">Detail</a>
      </div>
      <div class="p-artworks__info-exhibitor-details">
        <dl>
          <dt>SECTION: </dt>
          <dd>
            <?php
              $section = get_the_terms($post -> ID, 'section');
              foreach($section as $term) {
                $sectionName = $term->name;
                echo sprintf("<span>%s</span>", $sectionName);
              }
            ?>
          </dd>
        </dl>
        <?php if(!empty(get_field('booth‐number', $post->ID))): ?>
          <dl>
            <dt>BOOTH: </dt>
            <dd>
              <?php echo get_field('booth‐number', $post->ID); ?>
            </dd>
          </dl>
        <?php endif; ?>
      </div>
    <?php
      endwhile;
      endif;
    ?>
  </div>
</div>
<div class="p-artworks__artist-profile">
  <?php if ($artist['artiststatement'] || $artist['exhibition_history']['solo'] || $artist['exhibition_history']['group'] || $artist['awards_history']): ?>
    <p class="p-artworks__artist-profile-heading">Artist Profile</p>
    <div class="p-artworks__artist-profile-inner">
      <?php if (!empty($artist['artiststatement'])): ?>
      <p><?php echo $artist['artiststatement']; ?></p>
      <?php endif; ?>
      <?php if ($artist['exhibition_history']['solo']): ?>
        <div>
          <p>【 SOLO Exhibition 】</p>
          <?php echo $artist['exhibition_history']['solo']; ?>
        </div>
      <?php endif; ?>
      <?php if ($artist['exhibition_history']['group']): ?>
        <div>
          <p>【 Group Exhibition 】</p>
          <?php echo $artist['exhibition_history']['group']; ?>
        </div>
      <?php endif; ?>
      <?php if ($artist['awards_history']): ?>
        <div>
          <p>【 Award 】</p>
          <?php echo $artist['awards_history']; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
<div class="p-artworks__info-exhibitors-sp">
    <?php
      if($exhibitors->have_posts()):
      while($exhibitors->have_posts()): $exhibitors->the_post();
    ?>
      <div class="p-artworks__info-exhibitor">
        <p class="p-artworks__info-exhibitor-name"><?php echo the_title(); ?></p>
        <a class="p-artworks__info-exhibitor-link" href="<?php echo the_permalink( $post->ID ); ?>">Detail</a>
      </div>
      <div class="p-artworks__info-exhibitor-details">
        <dl>
          <dt>SECTION: </dt>
          <dd>
            <?php
              $section = get_the_terms($post -> ID, 'section');
              foreach($section as $term) {
                $sectionName = $term->name;
                echo sprintf("<span>%s</span>", $sectionName);
              }
            ?>
          </dd>
        </dl>
        <?php if(!empty(get_field('booth‐number', $post->ID))): ?>
          <dl>
            <dt>BOOTH: </dt>
            <dd>
              <?php echo get_field('booth‐number', $post->ID); ?>
            </dd>
          </dl>
        <?php endif; ?>
      </div>
    <?php
      endwhile;
      endif;
    ?>
  </div>
