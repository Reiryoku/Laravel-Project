/* ==========================================================================
   Defer images and iframes
   ========================================================================== */
function init() {
	var imgDefer = document.getElementsByTagName('img');
	for (var i = 0; i < imgDefer.length; i++) {
		if (imgDefer[i].getAttribute('data-original')) {
			imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-original'));
		}
	}
	var vidDefer = document.getElementsByTagName('iframe');
	for (var j = 0; j < vidDefer.length; j++) {
		if (vidDefer[j].getAttribute('data-original')) {
			vidDefer[j].setAttribute('src', vidDefer[j].getAttribute('data-original'));
		}
	}
}
window.onload = init;
/* ==========================================================================
   Lazy Load
   ========================================================================== */
$(document).ready(function () {
	$("img.lazy").lazyload({
		effect: "fadeIn",
		effectTime: 1000
	});
});
$(document).ready(function () {
	$("div.lazy").lazyload({
		effect: "fadeIn",
		effectTime: 1000
	});
});
/* ==========================================================================
   Disqus Comments
   ========================================================================== */
latest_comment_disqus('subztv', 6, '9v4bEuOB9DZ0OAzb5rLmhKYv95SyqDPk9l9YPSECYsHP2HreoIdditto1MCNzkKK');

function latest_comment_disqus(username, count, apikey) {
		$.ajax({
			url: 'https://disqus.com/api/3.0/forums/listPosts.json?forum=' + username + '&limit=' + count + '&related=thread&api_key=' + apikey,
			crossDomain: true,
			dataType: 'json'
		}).done(function (data) {
			var html = '';
			html += '';
			$.each(data.response, function (i, item) {
				var m = data.response[i].raw_message;
				html += '<div class="col-sm-12">';
				html += '<div class="comment-wrapper">';
				html += '<div class="above-comment">';
				html += '<a href="' + data.response[i].author.profileUrl + '" target="_blank">';
				html += '<div class="user-avatar">';
				html += '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="' + data.response[i].author.avatar.small.permalink + '" class="lazy" />';
				html += '</div>';
				html += '</a>';
				html += '<div class="user-name">';
				html += '<h4>';
				html += '<a class="username" href=' + data.response[i].author.profileUrl + '" target="_blank">';
				html += data.response[i].author.name;
				html += '</a>';
				html += '<div class="labels">';
				html += '<span class="date">';
				html += data.response[i].createdAt;
				html += '</span>';
				html += '</div>';
				html += '</h4>';
				html += '</div>';
				html += '</div>';
				html += '<div class="comment vissible">';
				html += m.substr(0, 300);
				html += '</div>';
				html += '<div class="under-comment">';
				html += '<div class="interactions">';
				html += '<a class="alt btn-comment-reply" href="' + data.response[i].thread.link + '" target="_blank">';
				html += '<div class="fa fa-reply"></div>';
				html += data.response[i].thread.title.replace(' - SubzTV - Ελληνικοί Υπότιτλοι Ταινιών και Σειρών', '');
				html += '</a>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			});
			html += '';
			$('#latest-comments .row').html(html);
		});
	}
	/* ==========================================================================
	   Facebook
	   ========================================================================== */
window.fbAsyncInit = function () {
	FB.init({
		appId: '1022916317749905',
		xfbml: true,
		version: 'v2.5'
	});
};
(function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {
		return;
	}
	js = d.createElement(s);
	js.type = 'text/javascript';
	js.id = id;
	js.src = "//connect.facebook.net/el_GR/sdk.js";
	js.async = true;
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
/* ==========================================================================
   Twitter
   ========================================================================== */
! function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0],
		p = /^http:/.test(d.location) ? 'http' : 'https';
	if (!d.getElementById(id)) {
		js = d.createElement(s);
		js.type = 'text/javascript';
		js.id = id;
		js.src = p + "://platform.twitter.com/widgets.js";
		js.async = true;
		fjs.parentNode.insertBefore(js, fjs);
	}
}(document, "script", "twitter-wjs");
/* ==========================================================================
   Google Analytics
   ========================================================================== */
(function (i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o),
		m = s.getElementsByTagName(o)[0];
	a.type = 'text/javascript';
	a.id = 'google-analytics';
	a.src = g;
	a.async = 1;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-67510511-1', 'auto');
ga('send', 'pageview');
/* ==========================================================================
  Google Fonts
  ========================================================================== */
/*
   	WebFontConfig = {
    google: { families: [ 'Open+Sans+Condensed:300,300italic,700' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.type = 'text/javascript';
	wf.id = 'google-fonts';
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();   
  */
/* ==========================================================================
   Bg Loading
   ========================================================================== */
$(window).load(function () {
	$("#loading-bg").fadeOut(500, "linear");
});

$(function () {
	$(window).on("scroll", function () {
		if ($(window).scrollTop() > 50) {
			$(".navbar-fixed-top").addClass("transparent");
		} else {
			//remove the background property so it comes transparent again (defined in your css)
			$(".navbar-fixed-top").removeClass("transparent");
		}
	});
});