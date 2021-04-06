$(document).ready(function () {

	$('.toform').click(function (e) {
		e.preventDefault();
		$("html, body").animate({ scrollTop: $(".form").offset().top }, 500);
		return false;
	});
	
	var e = new Date, t = new Date(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes() + 15, 1); $(".timer").countdown({ until: t, format: "HMS", compact: !0, layout: $(".timer").html() }).removeClass("hidden"), $(".bx-slider").bxSlider({ touchEnabled: !0, auto: !0, adaptiveHeight: !0, pager: !0 })
});