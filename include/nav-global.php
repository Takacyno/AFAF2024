<?php
// 固定ページ 'program' のIDを取得
$program_page_id = get_page_by_path('program')->ID;
// 'globalnav_on' カスタムフィールドの値を取得
$globalnav_on_value = get_post_meta($program_page_id, 'globalnav_on', true);
?>
<div class="c-nav-global">
	<ul>
		<li><a href="<?php echo home_url('news'); ?>">NEWS</a></li>
		<li><a href="<?php echo home_url('exhibitors'); ?>">EXHIBITORS</a></li>
		<li><a href="<?php echo home_url('about'); ?>">ABOUT</a></li>
		<li><a href="https://art-scenes.net/ja/fairs/31/artworks" target="_blank">ARTWORKS</a></li>
		<?php /* if ($globalnav_on_value) : ?>
		<li><a href="<?php echo home_url('program'); ?>">PROGRAM</a></li>
		<?php endif; */ ?>
		<li><a href="<?php echo home_url('access'); ?>">VISIT</a></li>
		<li><a href="<?php echo home_url('partners'); ?>">PARTNERS</a></li>
	</ul>
	<div class="c-nav-global__vip">
		<a href="<?php echo home_url('vip'); ?>">VIP LOGIN</a>
	</div>
</div>
