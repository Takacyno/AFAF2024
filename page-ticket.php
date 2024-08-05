<?php
  include('header.php');
  $currentLang = get_locale();
?>
  <main class="p-archives">
    <div class="c-area__content">
      <div class="c-area__content-inner">
        <div class="c-area__content-side">
          <div class="c-area__content-back">
            <a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
          </div>
          <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__side-link">
            チケット購入ページ
          </a>
        </div>
        <div class="c-area__content-main">
          <div class="c-title" data-title="minimal">
            <h1><?php the_title(); ?></h1>
          </div>
          <div class="p-ticket__wrapper">
            <div class="p-ticket__wrapper-highlights">
              <div class="p-ticket__wrapper-highlights-head">
                <h3>ART FAIR ASIA FUKUOKA2024のみどころ</h3>
                <?php $heading = get_field('highlight__heading'); ?>
                <h4><?php echo $heading['heading_lead']; ?></h4>
                <?php echo $heading['heading_text']; ?>
              </div>
              <div class="p-ticket__wrapper-highlights-body">
                <?php
                  $highlights = get_field('ticket-highlights');
                  $index = 0;
                  if (isset($_POST['index'])) {
                    $index = $_POST['index'];
                  }
                ?>
                <div class="p-ticket__wrapper-highlights-card">
                  <div class="p-ticket__wrapper-highlights-card-thumbnail">
                    <img src="<?php echo $highlights[$index]['ticket-highlight_img']['url']; ?>" />
                    <h5><?php echo $highlights[$index]['ticket-highlight_title']; ?></h5>
                  </div>
                  <?php echo $highlights[$index]['ticket-highlight_text']; ?>
                </div>
              </div>
              <div class="p-ticket__wrapper-highlights-pagination">
                <form method="post" action="">
                  <input class="p-ticket__wrapper-highlights-pagination-input" name="index" value="<?php echo $index == 0 ? count($highlights) - 1 : $index - 1 ?>" />
                  <button class="p-ticket__wrapper-highlights-back" type="submit"></button>
                </form>
                <form method="post" action="">
                  <input class="p-ticket__wrapper-highlights-pagination-input" name="index" value="<?php echo $index == count($highlights) - 1 ? 0 : $index + 1 ?>" />
                  <button class="p-ticket__wrapper-highlights-next" type="submit"></button>
                </form>
              </div>
            </div>
            <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__link">
              チケット購入ページ
            </a>
            <div class="p-ticket__tickets">
              <h2 class="p-ticket__tickets-title">Ticket</h2>
              <div class="p-ticket__tickets-wrapper">
                <?php if (have_rows('ticket_type')): ?>
                  <?php
                    while(have_rows('ticket_type')): the_row();
                    $ticket_type_name = get_sub_field('ticket_type_name');
                    $dates = get_sub_field('dates');
                    $price = get_sub_field('price');
                    $features = get_sub_field('features');
                  ?>
                    <div class="p-ticket__tickets-inner">
                      <h3>
                        <?php echo $ticket_type_name; ?>
                      </h3>
                      <div>
                        <div>
                          <p class="p-ticket__tickets-label" lang="<?php echo $currentLang == 'ja' ? 'ja' : 'en' ?>">
                            <span>
                              <?php echo $currentLang == 'ja' ? '販売期間' : 'Sales period'; ?>
                            </span>
                          </p>
                          <p class="p-ticket__tickets-value">
                            <?php echo $dates['start']; ?>
                            -
                            <?php echo mb_substr($dates['end'], mb_strrpos($dates['end'], '/') + 1, mb_strlen($dates['end'])); ?>
                          </p>
                        </div>
                        <div>
                          <p class="p-ticket__tickets-label" lang="<?php echo $currentLang == 'ja' ? 'ja' : 'en' ?>">
                            <span>
                              <?php echo $currentLang == 'ja' ? '価格' : 'Price'; ?>
                            </span>
                          </p>
                          <p class="p-ticket__tickets-value"><?php echo $price; ?></p>
                        </div>
                        <?php echo $features; ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="p-ticket__precautions">
              <h2><?php echo $currentLang == "ja" ? "注意事項" : "Precautions"; ?></h2>
              <?php echo get_field('attention'); ?>
            </div>
            <div class="p-ticket__benefits">
              <h2><?php echo $currentLang == "ja" ? "特典" : "Benefits"; ?></h2>
              <div class="p-ticket__benefits-inner">
                <?php if (have_rows('public_benefits')): ?>
                  <?php
                    while(have_rows('public_benefits')): the_row();
                    $img = get_sub_field('img');
                    $title = get_sub_field('benefits_title');
                    $benefits_text = get_sub_field('benefits_text');
                    $period = get_sub_field('period');
                    $location = get_sub_field('location');
                    $contents = get_sub_field('contents');
                  ?>
                    <div class="p-ticket__benefits-card">
                      <img src="<?php echo $img['url']; ?>" />
                      <div class="p-ticket__benefits-card-body">
                        <p>
                          <span class="p-ticket__benefits-card-title">
                            <?php echo $title; ?>
                          </span>
                        </p>
                        <div class="p-ticket__benefits-card-info">
                          <div class="p-ticket__benefits-card-info-row">
                            <p class="p-ticket__benefits-card-info-label">
                              <?php echo $currentLang == "ja" ? "販売期間" : "Sales period" ?>
                            </p>
                            <p>
                              <?php echo $period['start']; ?>
                              -
                              <?php echo mb_substr($period['end'], strpos($period['end'], '/') + 1, mb_strlen($period['end'])); ?>
                            </p>
                          </div>
                          <div class="p-ticket__benefits-card-info-row">
                            <p class="p-ticket__benefits-card-info-label">
                              <?php echo $contents['contents_label']; ?>
                            </p>
                            <?php echo $contents['contents_text']; ?>
                          </div>
                          <div class="p-ticket__benefits-card-info-row">
                            <p class="p-ticket__benefits-card-info-label">
                              <?php echo $location['label']; ?>
                            </p>
                            <?php echo $location['location']; ?>
                          </div>
                        </div>
                        <?php echo $contents['contents_text']; ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
            <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__link">
              チケット購入ページ
            </a>
          </div>
        </div>
      </div>
    <div>
</main>
<?php include('footer.php'); ?>
