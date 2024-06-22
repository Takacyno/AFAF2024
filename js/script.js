(function() {
	'use strict';

	jQuery(function() {
		// smooth scroll
		jQuery('a[href^="#"]').click(function() {
			var speed = 500;
			var href= jQuery(this).attr("href");
			var target = jQuery(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
			return false;
		});

		// header
		let $headerLogo = jQuery('.c-header__logo');
		let $headerButton = jQuery('.c-header__button');
		let $headerNav = jQuery('.c-header__nav');
		let $headerSpMenuFlg = false;
		$headerButton.click(function () {
			let expanded = jQuery(this).attr('aria-expanded');
			if (expanded === 'false') {
				jQuery(this).attr('aria-expanded', 'true');
				$headerNav.attr('aria-hidden', 'false');
				jQuery('body').attr('data-menu', 'show');
				$headerSpMenuFlg = true;
			} else {
				jQuery(this).attr('aria-expanded', 'false');
				$headerNav.attr('aria-hidden', 'true');
				jQuery('body').removeAttr('data-menu');
				$headerSpMenuFlg = false;
			}
		});
		function FixedAnime() {
			var scroll = jQuery(window).scrollTop();
			if(scroll >= 48){ //上から48pxスクロールされたら
				$headerLogo.attr('data-fixed', 'true');
			} else {
				$headerLogo.removeAttr('data-fixed');
			}
		}
		// 画面をスクロールをしたら動かしたい場合の記述
		$(window).scroll(function () {
			if ($headerSpMenuFlg === false) {
				FixedAnime();/* スクロール途中からヘッダーを出現させる関数を呼ぶ*/
			}
		});
		jQuery(window).resize(function(){
			if ( jQuery('html').width() > 1320 ) {
				if ($headerSpMenuFlg === true) {
					$headerButton.attr('aria-expanded', 'false');
					$headerNav.attr('aria-hidden', 'true');
					jQuery('body').removeAttr('data-menu');
					$headerSpMenuFlg = false;
				}
			}
		});
	});

	jQuery(function() {
		const $front_artist_slider = jQuery('.p-front__exhibitors-galleries-slider');
		if ($front_artist_slider.length) {
			$front_artist_slider.slick({
				infinite: true,
				slidesToShow: 3,
				// slidesToScroll: 1,
				dots: false,
				speed: 8000,
				autoplay: true,
				autoplaySpeed: 0,
				arrows: false,
				variableWidth: true,
				cssEase: 'linear',
				draggable: false,
				pauseOnHover: false,
				pauseOnFocus: false,
				swipe: false,
				responsive: [{
					breakpoint: 767,  //ブレイクポイントを指定
					settings: {
						slidesToScroll: 1,
					},
				}]
			});
		}
		const $front_artist_slider_reverse = jQuery('.p-front__exhibitors-galleries-slider-reverse');
		if ($front_artist_slider_reverse.length) {
			$front_artist_slider_reverse.slick({
				infinite: true,
				slidesToShow: 3,
				// slidesToScroll: 1,
				dots: false,
				speed: 8000,
				autoplay: true,
				autoplaySpeed: 0,
				arrows: false,
				variableWidth: true,
				cssEase: 'linear',
				rtl: true,
				draggable: false,
				pauseOnHover: false,
				pauseOnFocus: false,
				swipe: false,
				responsive: [{
					breakpoint: 767,  //ブレイクポイントを指定
					settings: {
						slidesToScroll: 1,
					},
				}]
			});
		}

		// hero logo
		let $heroLogo = jQuery('.p-front__hero-logo');
		if ($heroLogo.length) {
			let $heroNextWrapper = jQuery('.p-front__wrapper');
			let $headerSpMenuFlg = false;
			let $heroNextWrapperTop = $heroNextWrapper.offset().top;
			console.log($heroNextWrapperTop);
			function FixedAnime() {
				var scroll = jQuery(window).scrollTop();
				if(scroll >= 48) { //上から48pxスクロールされたら
					if (scroll >= $heroNextWrapperTop) {
						$heroLogo.attr('data-fixed', 'false');
					} else {
						$heroLogo.attr('data-fixed', 'true');
					}
				} else {
					$heroLogo.removeAttr('data-fixed');
				}
			}
			// 画面をスクロールをしたら動かしたい場合の記述
			$(window).scroll(function () {
				if ($headerSpMenuFlg === false) {
					FixedAnime();/* スクロール途中からヘッダーを出現させる関数を呼ぶ*/
				}
			});
		}

		// front用
		// const $frontHeroLogo = jQuery('.p-front__hero-logo');
		// const setObserver = () => {
		// 	//コールバック関数の定義
		// 	const callback = (entries) => {
		// 	//各 entry（IntersectionObserverEntry オブジェクト）に対して
		// 	entries.forEach( (entry) => {
		// 		//監視対象の要素が領域内に入った場合の処理
		// 		if (entry.isIntersecting) {
		// 		//監視対象の要素（entry.target）に inView クラスを追加
		// 		$heroLogo.attr('data-fixed', 'false');
		// 		} else { //監視対象の要素が領域外になった場合の処理
		// 		//監視対象要素から inView クラスを削除
		// 		$heroLogo.removeAttr('data-fixed', 'false');
		// 		}
		// 	});
		// 	}
		// 	//オプション
		// 	const options = {
		// 		root: null,
		// 		threshold: [0.1]
		// 	}
		// 	//引数にコールバック関数とオプションを指定してオブザーバーを生成
		// 	const observer = new IntersectionObserver(callback, options);
		// 	//監視対象の要素（target クラスを指定した要素）を全て取得
		// 	const targets = document.querySelectorAll('.front-about-end');
		// 	//全ての監視対象要素を observe() メソッドに指定
		// 	targets.forEach( (elem) => {
		// 	//observe() に監視対象の要素を指定
		// 	observer.observe(elem);
		// 	});
		// }
		// //上記関数の実行
		// setObserver();
		// document.addEventListener('DOMContentLoaded', () => {
		// 	//DOM ツリーの構築（解析）が完了した時点で呼び出す
		// 	setObserver();
		// });
	});

	jQuery(function() {
		// exhibitorsタブ
		const $exhibitorsHeading = jQuery('#exhibitorsHeading');
		let $exhibitorsHeadingFlg = false;
		if ($exhibitorsHeading.length) {
			// let $exhibitorsHeadingOff = $exhibitorsHeading.offset();
			let $exhibitorsHeadingTop = $exhibitorsHeading.offset().top;
			$exhibitorsHeadingTop = $exhibitorsHeadingTop - 120;
			// console.log($exhibitorsHeadingTop);
			var spFlg = false;
			function FixedAnime() {
				var scroll = jQuery(window).scrollTop();
				if(scroll >= $exhibitorsHeadingTop ){
					$exhibitorsHeading.attr('data-fixed', 'true');
				} else {
					$exhibitorsHeading.removeAttr('data-fixed');
				}
			}
			// 画面をスクロールをしたら動かしたい場合の記述
			jQuery(window).scroll(function () {
				if ($exhibitorsHeadingFlg === false) {
					FixedAnime();/* スクロール途中からヘッダーを出現させる関数を呼ぶ*/
				}
			});
			jQuery(window).resize(function(){
				if ( jQuery('html').width() > 768 ) {
					// PC幅だったら
					if (spFlg) {
						// SPからPC幅になったタイミング
						spFlg = false; // フラグ変更
						let $exhibitorsHeadingOff = $exhibitorsHeading.offset();
						$exhibitorsHeadingTop = $exhibitorsHeadingOff.top;
						$exhibitorsHeadingTop = $exhibitorsHeadingTop - 120;
						// console.log($exhibitorsHeadingTop);
					}
				} else {
					// SP幅だったら
					if (!spFlg) {
						// PCからSP幅になったタイミング
						spFlg = true;
					}
				}
			});
		}
		const $exhibitorsSectionAnchorTab = jQuery('.p-exhibitors__section-exhibitors');
		const $exhibitorsTabButton = jQuery('.p-exhibitors__section-tab button');
		const $exhibitorsTabPanel = jQuery('.p-exhibitors__section-tabpanel div');
		if ($exhibitorsTabButton) {
			// 1つめのタブが選択・表示されるように設定
			// $exhibitorsTabButton.attr('aria-selected', 'false');
			// $exhibitorsTabButton.eq(0).attr('aria-selected', 'true');
			// $exhibitorsTabPanel.attr('aria-hidden', 'true');
			// $exhibitorsTabPanel.eq(0).attr('aria-hidden', 'false');

			$exhibitorsTabButton.click(function () {
				let selected = jQuery(this).attr('aria-selected');
				if (selected === 'false') {
					// もともと選択されていないタブを選択した場合
					// すべてのタブを未選択状態に
					$exhibitorsTabButton.attr('aria-selected', 'false');
					// 押されたタブを選択状態に
					jQuery(this).attr('aria-selected', 'true');
					// すべてのタブパネルを非表示
					$exhibitorsTabPanel.attr('aria-hidden', 'true');
					// 押されたタブのcontrols取得
					let controls = jQuery(this).attr('aria-controls');
					// console.log(controls);
					jQuery('#' + controls).attr('aria-hidden', 'false');
					let target = jQuery('#' + controls);
					let position = jQuery(target).offset().top - 200 + 'px';
					jQuery('html,body').animate({scrollTop: position}, 400);
					return false;
				}
			});
			$exhibitorsSectionAnchorTab.click(function () {
				let index = jQuery('.p-exhibitors__section-exhibitors').index(this);
				index = index + 1;
				let selected = jQuery(this).attr('aria-selected');
				if (selected === 'false') {
					// もともと選択されていないタブを選択した場合
					// すべてのタブを未選択状態に
					$exhibitorsTabButton.attr('aria-selected', 'false');
					// 押されたタブを選択状態に
					$exhibitorsTabButton.eq(index).attr('aria-selected', 'true');
					// すべてのタブパネルを非表示
					$exhibitorsTabPanel.attr('aria-hidden', 'true');
					// 押されたタブのcontrols取得
					let controls = jQuery(this).attr('aria-controls');
					// console.log(controls);
					jQuery('#' + controls).attr('aria-hidden', 'false');
					let target = jQuery('#' + controls);
					let position = jQuery(target).offset().top - 200 + 'px';
					jQuery('html,body').animate({scrollTop: position}, 400);
					return false;
				}
			});

			const $exhibitorsAccordion = jQuery('.p-exhibitors__section-accordion');
			const $exhibitorsAccordionClose = jQuery('.p-exhibitors__section-information-close');
			const $exhibitorsAccordionContent = jQuery('.p-exhibitors__section-information');
			$exhibitorsAccordion.click(function () {
				jQuery(this).attr('aria-expanded', 'true');
				jQuery(this).next().slideToggle();
			});
			$exhibitorsAccordionClose.click(function () {
				jQuery(this).parent().prev().attr('aria-expanded', 'false');
				jQuery(this).parent().slideToggle();
			});
			const $breakpointSp = 799;
			let $accordionSpFlg = false;
			function exhibitorsAccordionResponsive() {
				$accordionSpFlg = true;
				$exhibitorsAccordionContent.attr('aria-hidden', 'true');
			};
			if (jQuery('html').width() < $breakpointSp) {
				// リロード最初の判定
				exhibitorsAccordionResponsive();
			}
			jQuery(window).resize(function() {
				if (jQuery('html').width() < $breakpointSp) {
					if ($accordionSpFlg === false) {
						// SP幅になって初めての処理
						exhibitorsAccordionResponsive();
						$exhibitorsAccordionContent.hide();
					}
				} else if (jQuery('html').width() > $breakpointSp) {
					if ($accordionSpFlg === true) {
						// PC幅になって初めての処理
						$accordionSpFlg = false;
						$exhibitorsAccordionContent.show();
						$exhibitorsAccordionContent.removeAttr('aria-hidden');
					}
				}
			});
		}
	});

	jQuery(function() {
		const $artworksListColumn = jQuery('.p-exhibitors__detail-artworks-list');
		const $breakpointSp_s = 375;
		const $breakpointPcMin = 767;
		if ($artworksListColumn.length) {
			function masonry_execute() {
				if ( jQuery('html').width() > $breakpointPcMin ) {
					$artworksListColumn.masonry({
						itemSelector: '.p-exhibitors__detail-artworks-item',   //コンテンツを指定
						columnWidth: 236,           //カラム幅を設定
						gutter: 25,
						horizontalOrder: true
					});
				} else if (jQuery('html').width() <= $breakpointSp_s ) {
					$artworksListColumn.masonry({
						itemSelector: '.p-exhibitors__detail-artworks-item',   //コンテンツを指定
						columnWidth: 155,           //カラム幅を設定
						gutter: 17,
						fitWidth: true,
						horizontalOrder: true
					});
				} else {
					$artworksListColumn.masonry({
						itemSelector: '.p-exhibitors__detail-artworks-item',   //コンテンツを指定
						columnWidth: 162,           //カラム幅を設定
						gutter: 17,
						fitWidth: true,
						horizontalOrder: true
					});
				}
			}
			masonry_execute(); //masonry_execute関数を実行

			$(window).resize(function(){ //ウィンドウがリサイズされたら、再度masonry_execute関数を実行
				masonry_execute();
			});

			const $artworksMore = jQuery('.p-exhibitors__detail-more');
			const $artworksMoreButton = jQuery('.p-exhibitors__detail-more-button');
			const $artworksListColumnHeight = $artworksListColumn.height();
			const $artworksListColumnMinHeight = 2220; // 2220
			// const $artworksListColumnMinSPHeight = 2018;
			console.log($artworksListColumnHeight);
			if ($artworksListColumnHeight > $artworksListColumnMinHeight) {
				$artworksListColumn.attr('data-more', 'true');
			} else {
				$artworksMore.hide();
			}
			$artworksMoreButton.click(function () {
				$artworksListColumn.removeAttr('data-more');
				$artworksMore.hide();
			});
		}
	});

	jQuery(function() {
		const setObserver = () => {
			//コールバック関数の定義
			const callback = (entries) => {
			//各 entry（IntersectionObserverEntry オブジェクト）に対して
			entries.forEach( (entry) => {
				//監視対象の要素が領域内に入った場合の処理
				if (entry.isIntersecting) {
				//監視対象の要素（entry.target）に inView クラスを追加
				entry.target.setAttribute('data-view', 'show');
				} else { //監視対象の要素が領域外になった場合の処理
				//監視対象要素から inView クラスを削除
				}
			});
			}
			//オプション
			const options = {
				root: null,
				threshold: [0, 0.5]
			}
			//引数にコールバック関数とオプションを指定してオブザーバーを生成
			const observer = new IntersectionObserver(callback, options);
			//監視対象の要素（target クラスを指定した要素）を全て取得
			const targets = document.querySelectorAll('.js-fadein');
			//全ての監視対象要素を observe() メソッドに指定
			targets.forEach( (elem) => {
			//observe() に監視対象の要素を指定
			observer.observe(elem);
			});
		}
		//上記関数の実行
		setObserver();
		document.addEventListener('DOMContentLoaded', () => {
			//DOM ツリーの構築（解析）が完了した時点で呼び出す
			setObserver();
		});
	});
})();
