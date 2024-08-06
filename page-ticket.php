<?php
  include('header.php');
  $week = array( "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
  $now = strtotime(date("Y/m/d H:i"));
  $before_tickets = [];
  $active_tickets = [];
  $finished_tickets = [];
  if (have_rows('ticket_type')) {
    foreach(get_field('ticket_type') as $ticket) {
      echo strtotime($ticket['dates']['end']) < $now ? "true" : "false";
      if ($now < strtotime($ticket['dates']['start'])) {
        $before_tickets[] = $ticket;
      } else if (strtotime($ticket['dates']['end']) < $now) {
        $finished_tickets[] = $ticket;
      } else {
        $active_tickets[] = $ticket;
      }
    }
  }
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
            <?php echo $currentLang == "ja" ? "チケット購入ページ" : "Ticket Sales Page" ?>
          </a>
        </div>
        <div class="c-area__content-main">
          <div class="c-title" data-title="minimal">
            <h1><?php the_title(); ?></h1>
          </div>
          <div class="p-ticket__wrapper">
            <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__link">
              <?php echo $currentLang == "ja" ? "チケット購入ページ" : "Ticket Sales Page" ?>
            </a>
            <div class="p-ticket__wrapper-highlights">
              <div class="p-ticket__wrapper-highlights-head">
                <h3><?php echo $currentLang == "ja" ? "ART FAIR ASIA FUKUOKA2024のみどころ" : "Highlights of ART FAIR ASIA FUKUOKA 2024"; ?></h3>
                <?php $heading = get_field('highlight__heading'); ?>
                <h4><?php echo $heading['heading_lead']; ?></h4>
                <?php echo $heading['heading_text']; ?>
              </div>
              <div class="p-ticket__wrapper-highlights-body">
                <?php
                  $highlights = get_field('ticket-highlights');
                  foreach($highlights as $item):
                ?>
                  <div class="p-ticket__wrapper-highlights-card">
                    <div class="p-ticket__wrapper-highlights-card-thumbnail">
                      <img src="<?php echo $item['ticket-highlight_img']['url']; ?>" />
                      <h5><?php echo $item['ticket-highlight_title']; ?></h5>
                    </div>
                    <?php echo $item['ticket-highlight_text']; ?>
                  </div>
                <?php endforeach; ?>
              </div>
              <!-- <div class="p-ticket__wrapper-highlights-body">
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
              </div> -->
              <!-- <div class="p-ticket__wrapper-highlights-pagination">
                <form method="post" action="">
                  <input class="p-ticket__wrapper-highlights-pagination-input" name="index" value="<?php echo $index == 0 ? count($highlights) - 1 : $index - 1 ?>" />
                  <button class="p-ticket__wrapper-highlights-back" type="submit"></button>
                </form>
                <form method="post" action="">
                  <input class="p-ticket__wrapper-highlights-pagination-input" name="index" value="<?php echo $index == count($highlights) - 1 ? 0 : $index + 1 ?>" />
                  <button class="p-ticket__wrapper-highlights-next" type="submit"></button>
                </form>
              </div> -->
            </div>
            <div class="p-ticket__tickets">
              <h2 class="p-ticket__tickets-title">Ticket</h2>
              <div class="p-ticket__tickets-wrapper">
                <?php for ($i = 0; $i < 3; $i++): ?>
                  <?php
                    $statuses = array("active", "before", "finished");
                    $tickets = $i == 0 ? $active_tickets : ($i == 1 ? $before_tickets : $finished_tickets);
                    foreach($tickets as $ticket):
                  ?>
                    <?php
                      $ticket_type_name = $ticket['ticket_type_name'];
                      $dates = $ticket['dates'];
                      $price = $ticket['price'];
                      $features = $ticket['features'];
                    ?>
                    <div class="p-ticket__tickets-inner" status="<?php echo $statuses[$i]; ?>">
                      <h3>
                        <?php echo $ticket_type_name; ?>
                        <?php echo $i == 1 ? "<span>COMING SOON</span>" : "" ?>
                      </h3>
                      <div>
                        <div>
                          <p class="p-ticket__tickets-label" lang="<?php echo $currentLang == 'ja' ? 'ja' : 'en' ?>">
                            <span>
                              <?php echo $currentLang == 'ja' ? '販売期間' : 'Sales period'; ?>
                            </span>
                          </p>
                          <p class="p-ticket__tickets-value">
                            <?php
                              $start = explode(" ", $dates['start']);
                              $end = explode(" ", $dates['end']);
                            ?>
                            <?php echo $start[0]; ?>
                            <span>(<?php echo $week[date("w", strtotime($dates['start']))]; ?>) <?php echo $start[1]; ?></span>
                            <wbr />
                            -
                            <?php echo mb_substr($end[0], strpos($end[0], '/') + 1, mb_strlen($dates['end'])); ?>
                            <span>(<?php echo $week[date("w", strtotime($dates['end']))]; ?>) <?php echo $end[1]; ?></span>
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
                      <?php if ($i == 2): ?>
                        <div class="p-ticket__tickets-finished-box">
                          <p class="p-ticket__tickets-finished-text">
                            <?php echo $ticket_type_name ?>
                            <?php echo $currentLang == "ja" ? "は<wbr />販売終了しました": "<wbr />sales have ended." ?>
                          </p>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                <?php endfor; ?>
              </div>
            </div>
            <div class="p-ticket__precautions">
              <h2><?php echo $currentLang == "ja" ? "注意事項" : "Precautions"; ?></h2>
              <?php echo get_field('attention'); ?>
            </div>
            <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__link">
              <?php echo $currentLang == "ja" ? "チケット購入ページ" : "Ticket Sales Page" ?>
            </a>
            <?php if (have_rows('public_benefits')): ?>
              <div class="p-ticket__benefits">
                <h2><?php echo $currentLang == "ja" ? "特典" : "Privilege"; ?></h2>
                <div class="p-ticket__benefits-inner">
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
                                <?php echo $currentLang == "ja" ? "販売期間" : "Period" ?>
                              </p>
                              <p>
                                <?php echo $period['start']; ?>
                                <span>
                                (<?php echo $week[date("w", strtotime($period['start']))]; ?>)
                                </span>
                                -
                                <?php echo mb_substr($period['end'], strpos($period['end'], '/') + 1, mb_strlen($period['end'])); ?>
                                <span>
                                  (<?php echo $week[date("w", strtotime($period['end']))]; ?>)
                                </span>
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
                              <p>
                                <?php echo $location['location']; ?>
                              </p>
                            </div>
                            <?php echo $contents['contents_text']; ?>
                          </div>
                        </div>
                      </div>
                    <?php endwhile; ?>
                </div>
              </div>
            <?php endif; ?>
            <a href="<?php echo get_field('ticket_url'); ?>" class="p-ticket__link">
              <?php echo $currentLang == "ja" ? "チケット購入ページ" : "Ticket Sales Page" ?>
            </a>
          </div>
        </div>
      </div>
    <div>
</main>
<?php include('footer.php'); ?>
