<?php
	include('header.php');
	$currentLang = get_locale();
?>

<main class="p-contact">
	<div class="c-title" data-title="minimal">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="c-area__content">
		<div class="p-contact__wrapper js-fadein">
			<?php if ($currentLang != 'en_US') : ?>
			<h2>アートフェアアジア福岡事務局</h2>
			<?php else: ?>
			<h2>ART FAIR ASIA FUKUOKA<br>Executive Office</h2>
			<?php endif; ?>
			<div class="p-contact__content">
				<dl>
					<div>
						<dt>EXECTIVE <span>OFFICE</span></dt>
						<?php if ($currentLang != 'en_US') : ?>
						<dd>〒810-0065 福岡県福岡市中央区地行浜1-2-5</dd>
						<?php else: ?>
						<dd>1-2-5, Jigyohama, Chuo-ku, Fukuoka City, Fukuoka</dd>
						<?php endif; ?>
					</div>
					<div>
						<dt>TOKYO OFFICE</dt>
						<?php if ($currentLang != 'en_US') : ?>
						<dd>〒150-0011 東京都渋谷区東1-25-2 丸橋ビル4階</dd>
						<?php else: ?>
						<dd>4F Maruhashi Bldg. 1-25-2 Higashi, Shibuya-ku, Tokyo</dd>
						<?php endif; ?>
					</div>
					<div>
						<dt>E-MAIL</dt>
						<dd><span>Office</span><a href="mailto:info@artfair.asia">info@artfair.asia</a></dd>
					</div>
				</dl>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
