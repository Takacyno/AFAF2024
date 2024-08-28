<?php include('header.php'); ?>
<main class="p-news" data-news="detail">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('artworks'); ?>"><span>ALL ARTWORKS</span></a>
				</div>
      </div>
      <div class="c-area__content-main">
        <div class="p-artworks__content">
          <?php include('artwork.php'); ?>
        <div class="p-artworks__content">
      </div>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>
