<?php
	wp_footer();
	$imagePath = get_stylesheet_directory_uri() . '/image';
	$currentLang = get_locale();
	$top_page_id = get_option('page_on_front');
	$ticket = get_field( 'ticket', $top_page_id );
	$title = $ticket[ 'title' ];
	$url = $ticket[ 'url' ];
	$site_flow_value = $ticket[ 'site_flow' ];
	// 固定ページ 'program' のIDを取得
	$program_page_id = get_page_by_path('program')->ID;
	// 'globalnav_on' カスタムフィールドの値を取得
	$globalnav_on_value = get_post_meta($program_page_id, 'globalnav_on', true);
?>
<?php if ($site_flow_value) : ?>
<div class="c-footer__ticket">
	<a href="<?php if ($url) { echo $url; } ?>" target="_blank">
		<?php if ($currentLang != 'en_US') : ?>
		<span>チケット好評発売中</span>
		<?php else: ?>
		<span>Tickets now on sale</span>
		<?php endif; ?>
	</a>
</div>
<?php endif; ?>
<footer id="footer" class="c-footer" role="contentinfo">
	<div class="c-footer__wrapper">
		<div class="c-footer__section">
			<div class="c-footer__section-link">
				<ul>
					<li><a href="<?php echo home_url('about'); ?>">ABOUT</a></li>
					<li><a href="<?php echo home_url('news'); ?>">NEWS</a></li>
					<li><a href="<?php echo home_url('exhibitors'); ?>">EXHIBITORS</a></li>
					<li><a href="https://art-scenes.net/ja/fairs/31/artworks" target="_blank">ARTWORKS</a></li>
					<?php if ($globalnav_on_value) : ?>
					<li><a href="<?php echo home_url('program'); ?>">PROGRAM</a></li>
					<?php endif; ?>
					<li><a href="<?php echo home_url('access'); ?>">ACCESS</a></li>
					<li><a href="<?php echo home_url('partners'); ?>">PARTNERS</a></li>
				</ul>
				<div class="c-footer__section-link-vip">
					<a href="<?php echo home_url('vip'); ?>"><span>VIP-LOGIN</span></a>
				</div>
			</div>
			<div class="c-footer__mail">
				<h2>NEWSLETTER</h2>
				<div class="c-footer__mail-area">
					<?php if ($currentLang != 'en_US') : ?>
					<p>最新情報をメールにてお届けします。<br>
					送信することで、<a href="<?php echo home_url('privacy-policy'); ?>" target="_blank">プライバシーポリシー</a>に同意します。</p>
					<?php else: ?>
					<p>Receive our latest news by email.<br>
					By submitting, I agree to the <a href="<?php echo home_url(); ?>/privacy-policy" target="_blank">Privacy Policy</a>.</p>
					<?php endif; ?>
					<div class="c-footer__mail-form">
						<?php echo do_shortcode('[mc4wp_form id=260]'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="c-footer__links">
			<div class="c-footer__links-link">
				<ul>
					<li><a href="<?php echo home_url('contact'); ?>">CONTACT</a></li>
					<li><a href="<?php echo home_url('press'); ?>">PRESS</a></li>
					<li><a href="<?php echo home_url('archives'); ?>">ARCHIVES</a></li>
					<li><a href="<?php echo home_url('privacy-policy'); ?>">PRIVACY POLICY</a></li>
				</ul>
			</div>
			<div class="c-footer__links-social">
				<ul>
					<li><a href="https://bit.ly/3qgb3ee" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-twitter-white.svg" alt="TWITTER"></a></li>
					<li><a href="https://bit.ly/3qhZjIj" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-instagram-white.svg" alt="INSTAGRAM"></a></li>
					<li><a href="https://bit.ly/428gJo1" target="_blank"><img src="<?php echo $imagePath; ?>/icon-social-facebook-white.svg" alt="FACEBOOK"></a></li>
				</ul>
			</div>
		</div>
		<div class="c-footer__copyright">
			<small>© 2015-2023 ART FAIR ASIA FUKUOKA.<br>All Rights Reserved.</small>
		</div>
	</div>
</footer>
</body>

</html>
