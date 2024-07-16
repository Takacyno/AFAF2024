<?php
	include('header.php');
	$currentLang = get_locale();
	$press = get_field( 'press' );
	$title = $press[ 'title' ];
	$pdf = $press[ 'pdf' ];
	$filePath = get_stylesheet_directory_uri() . '/downloads';
?>

<main class="p-press">
	<div class="c-area__content">
		<div class="c-area__content-inner">
			<div class="c-area__content-side">
				<div class="c-area__content-back">
					<a href="<?php echo home_url('top'); ?>"><span>Top</span></a>
				</div>
			</div>
			<div class="c-area__content-main">
				<div class="c-title" data-title="minimal">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="p-press__wrapper">
					<div class="p-press__section">
						<div class="p-press__section-heading">
							<h2>Press Release</h2>
						</div>
						<div class="p-press__list">
							<?php
								if(have_rows('press')):
							?>
								<ul>
									<?php
										while(have_rows('press')): the_row();
											$title = get_sub_field('title');
											$pdf = get_sub_field('pdf');
									?>
										<li><a href="<?php echo $pdf; ?>" target="_blank"><span><?php echo $title ?></span></a></li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					<div class="p-press__section">
						<div class="p-press__section-heading">
							<h2>Logo</h2>
						</div>
						<div class="p-press__list">
							<ul>
								<li>
									<a href="<?php echo $filePath; ?>/ARTFAIRASIAFUKUOKA-logokit2024-2.zip" target="_blank">
										<?php if ($currentLang != 'en_US') : ?>
										<span>ロゴキット</span>
										<?php else: ?>
										<span>Logo Kit</span>
										<?php endif; ?>
									</a>
								</li>
								<li>
									<?php if ($currentLang != 'en_US') : ?>
										<p>使用ガイドラインをご確認・同意の上、注意事項の範囲に<span>従ってご使用ください。</span></p>
									<?php else: ?>
										<p>After confirming and agreeing to the usage guidelines,<br>please use within the scope of the precautions.</p>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
					<div class="p-press__section">
						<div class="p-press__section-heading">
							<h2>Contact</h2>
						</div>
						<div class="p-press__contact">
							<dl>
								<dt>Press</dt>
								<dd><a href="mailto:press@artfair.asia">press@artfair.asia</a></dd>
							</dl>
							<?php if ($currentLang != 'en_US') : ?>
							<p><a href="<?php echo home_url('privacy-policy'); ?>">プライバシーポリシー</a>をご確認の上、送信してください。</p>
							<?php else: ?>
							<p>Please check our <a href="<?php echo home_url('privacy-policy'); ?>">privacy policy</a> before sending.</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include('footer.php'); ?>
