<?php
// 固定ページ 'program' のIDを取得
$program_page_id = get_page_by_path('program')->ID;
// 'globalnav_on' カスタムフィールドの値を取得
$globalnav_on_value = get_post_meta($program_page_id, 'globalnav_on', true);
$currentLang = get_locale();
?>
<div class="c-nav-global">
	<ul class="c-nav-global-sns">
		<li><a href="https://bit.ly/3qgb3ee" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-x.svg" class="sns-icon-x" alt="X"></a></li>
		<li><a href="https://bit.ly/3qhZjIj" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-instagram.svg" alt="INSTAGRAM"></a></li>
		<li><a href="https://bit.ly/428gJo1" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-facebook.svg" alt="FACEBOOK"></a></li>
	</ul>
	<ul class="c-nav-global-menu">
		<li><a href="<?php echo home_url('news'); ?>">NEWS</a></li>
		<li><a href="<?php echo home_url('exhibitors'); ?>">EXHIBITORS</a></li>
		<li><a href="<?php echo home_url('about'); ?>">ABOUT</a></li>
		<li>
			<a href="<?php echo home_url('artworks'); ?>">ARTWORKS</a>
		</li>
		<?php /* if ($globalnav_on_value) : ?>
		<li><a href="<?php echo home_url('program'); ?>">PROGRAM</a></li>
		<?php endif; */ ?>
		<li><a href="<?php echo home_url('visit'); ?>">VISIT</a></li>
		<li><a href="<?php echo home_url('partners'); ?>">PARTNERS</a></li>
	</ul>
</div>
