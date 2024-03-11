window.onload=$(function () {
	$('.header-toggle').on("click", function () {
		$('.header-nav').toggleClass('open'); 
		$('.header-toggle').toggleClass('active'); 
        $('.drawer_bg').toggleClass('add_bg'); // メニューにopenクラスをつけ外しする
	});

// $(window).on("scroll", function () {
//   // ウィンドウのスクロール位置を取得
//   const scrollTop = $(this).scrollTop();

//   // スクロール位置が一番上に戻ったら
//   if (scrollTop === 0) {
//       // ヘッダーからクラスを削除
//       $(".js-header").removeClass("headerColorScroll");
//   } else {
//       // それ以外の場合はクラスを追加
//       $(".js-header").addClass("headerColorScroll");
//   }
// });


});