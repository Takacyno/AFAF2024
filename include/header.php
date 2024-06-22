<?php
	//トップページ以外の場合の処理
	if( !is_front_page() and !is_home() ):
?>
<header class="c-header">
<?php else: ?>
<header class="c-header" data-header="front">
<?php endif; ?>
	<div class="c-header__wrapper">

	</div>
</header>
