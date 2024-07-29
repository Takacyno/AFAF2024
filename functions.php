<?php
//サムネイル入力フィールド追加
add_theme_support('post-thumbnails');

//サムネイルカラム追加
function customize_manage_posts_columns($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter( 'manage_posts_columns', 'customize_manage_posts_columns' );

//サムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id) {
    if ( 'thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'small', array( 'style'=>'width:100px;height:auto;' ));
    } if ( isset($thum) && $thum ) {
        echo $thum;
    } else {
        echo __('None');
    }
}
add_action( 'manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2 );

function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( $query->is_post_type_archive('news') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定
    }
	if ( $query->is_post_type_archive('exhibitors') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定
    }
	if ( $query->is_post_type_archive('vip-program') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定
    }
	if ( $query->is_post_type_archive('artworks') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定
    }
	if ( $query->is_post_type_archive('program') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

add_filter('bogo_localizable_post_types', 'add_localizable_post_types', 10, 1);
function add_localizable_post_types($localizable) {
	$localizable[] = 'news';
	$localizable[] = 'exhibitors';
	$localizable[] = 'vip-program';
	$localizable[] = 'artworks';
	$localizable[] = 'program';
	$localizable[] = 'vip_benefits';
	$localizable[] = 'vip_contact';
	return $localizable;
}

//bogo 国旗アイコンを削除
add_filter( 'bogo_use_flags','bogo_use_flags_false');
function bogo_use_flags_false(){
 return false;
}

add_filter( 'bogo_language_switcher_links', function ( $links ) {
	for ( $i = 0; $i < count( $links ); $i ++ ) {
		// 日本語
		if ( 'ja' === $links[ $i ]['locale'] ) {
			$links[ $i ]['title'] = 'Japanese';
			$links[ $i ]['native_name'] = 'JP';
		}
		// 英語
		if ( 'en_US' === $links[ $i ]['locale'] || 'en' === $links[ $i ]['locale'] || 'en_NZ' === $links[ $i ]['locale'] ||'en_CA' === $links[ $i ]['locale'] ||'en_GB' === $links[ $i ]['locale'] ||'en_AU' === $links[ $i ]['locale'] ) {
			$links[ $i ]['title'] = ' English ';
			$links[ $i ]['native_name'] = ' EN ';
		}
	}
	return $links;
} );

function my_password_form() {
	return
	'<form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
	<input name="post_password" type="password" placeholder="PASSWORD" />
	<button type="submit"><span>ENTER</span></button>
	</form>';
}
add_filter('the_password_form', 'my_password_form');

function show_error_message( $form ) {
	// パスワード入力前かどうか postpass_XXXX が Cookie に保存されているかで確認。
	// Cookie がない場合はパスワード入力前なのでフォームをそのまま出力
	if ( ! isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) ) {
		return $form;
	}

	// パスワード入力前かどうかリファラーと投稿のパーマリンクを比較して確認
	if ( wp_get_raw_referer() !== get_permalink() ) {
		return $form;
	}

	// Cookie があり、パスワードが一致しない場合にメッセージを表示
	$error_message = '<p class="custom-password-message">パスワードが違います。再度確認して入力してください。</p>';
	return $error_message . $form;
}
add_filter( 'the_password_form', 'show_error_message' );

/* パスワード保護ページの「保護中:」を消す */
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
	return '%s';
}

function vip_query_vars( $qvars ) {
	$qvars[] = 'section';
	return $qvars;
	}
	add_filter( 'query_vars', 'vip_query_vars' );
?>
