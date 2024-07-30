<?php
	include('header.php');
  $contents = get_field( 'vip_text' );
  $currentLang = get_locale();
?>
<main class="p-vip" data-news="detail">
  <div class="c-area__content">
    <div class="c-area__content-inner">
      <div class="c-area__content-side">
        <div class="c-area__content-back">
          <a href="<?php echo home_url('vip'); ?>?section=experience"><span>VIP-EXPERIENCE</span></a>
        </div>
      </div>
      <div class="c-area__content-main margin-right">
				<div class="p-vip__detail-header">
					<h1><?php the_title(); ?></h1>
				</div>
        <div class="p-vip__detail-content">
          <?php if (has_post_thumbnail()): ?>
            <div class="p-vip__detail-thumbnail">
              <?php the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>
          <?php echo $contents; ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>
