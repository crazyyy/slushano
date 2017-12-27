// Avoid `console` errors in browsers that lack a console.
(function() {
  var method
  var noop = function() {}
  var methods = [
    "assert",
    "clear",
    "count",
    "debug",
    "dir",
    "dirxml",
    "error",
    "exception",
    "group",
    "groupCollapsed",
    "groupEnd",
    "info",
    "log",
    "markTimeline",
    "profile",
    "profileEnd",
    "table",
    "time",
    "timeEnd",
    "timeline",
    "timelineEnd",
    "timeStamp",
    "trace",
    "warn"
  ]
  var length = methods.length
  var console = (window.console = window.console || {})

  while (length--) {
    method = methods[length]

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop
    }
  }
})()
var $ = jQuery;
if (typeof jQuery === "undefined") {
  console.warn("jQuery hasn't loaded")
} else {
  console.log("jQuery " + jQuery.fn.jquery + " has loaded")
}
// Place any jQuery/helper plugins in here.

$(document).ready(function() {
  $('.navbar-toggle').click(function() {
    $(this).toggleClass('active');
  });

  $('.tlp').tooltipster({
    animation: 'fade',
    delay: 0,
    position: 'top',
    contentAsHTML: true
  });

});

! function(a, b) {
  "use strict";

  function c() {
    if (!e) {
      e = !0;
      var a, c, d, f, g = -1 !== navigator.appVersion.indexOf("MSIE 10"),
        h = !!navigator.userAgent.match(/Trident.*rv:11\./),
        i = b.querySelectorAll("iframe.wp-embedded-content");
      for (c = 0; c < i.length; c++) {
        if (d = i[c], !d.getAttribute("data-secret")) f = Math.random().toString(36).substr(2, 10), d.src += "#?secret=" + f, d.setAttribute("data-secret", f);
        if (g || h) a = d.cloneNode(!0), a.removeAttribute("security"), d.parentNode.replaceChild(a, d)
      }
    }
  }
  var d = !1,
    e = !1;
  if (b.querySelector)
    if (a.addEventListener) d = !0;
  if (a.wp = a.wp || {}, !a.wp.receiveEmbedMessage)
    if (a.wp.receiveEmbedMessage = function(c) {
        var d = c.data;
        if (d.secret || d.message || d.value)
          if (!/[^a-zA-Z0-9]/.test(d.secret)) {
            var e, f, g, h, i, j = b.querySelectorAll('iframe[data-secret="' + d.secret + '"]'),
              k = b.querySelectorAll('blockquote[data-secret="' + d.secret + '"]');
            for (e = 0; e < k.length; e++) k[e].style.display = "none";
            for (e = 0; e < j.length; e++)
              if (f = j[e], c.source === f.contentWindow) {
                if (f.removeAttribute("style"), "height" === d.message) {
                  if (g = parseInt(d.value, 10), g > 1e3) g = 1e3;
                  else if (~~g < 200) g = 200;
                  f.height = g
                }
                if ("link" === d.message)
                  if (h = b.createElement("a"), i = b.createElement("a"), h.href = f.getAttribute("src"), i.href = d.value, i.host === h.host)
                    if (b.activeElement === f) a.top.location.href = d.value
              } else;
          }
      }, d) a.addEventListener("message", a.wp.receiveEmbedMessage, !1), b.addEventListener("DOMContentLoaded", c, !1), a.addEventListener("load", c, !1)
}(window, document);


//javasctipt
//load more click function: improved to prevent double click and fire funciton only after content has been loaded (good for slow internet connection)
$('.load-more:not(.loading)').live('click', function(e) {

  e.preventDefault();
  var $load_more_btn = $(this);
  var post_type = 'post'; // this is optional and can be set from anywhere, stored in mockup etc...
  var offset = $('.items-list .styled-block').length;
  var nonce = $load_more_btn.attr('data-nonce');

  $.ajax({
    type: "post",
    context: this,
    dataType: "json",
    url: headJS.ajaxurl,
    data: {
      action: "load_more",
      offset: offset,
      nonce: nonce,
      post_type: post_type,
      posts_per_page: headJS.posts_per_page
    },
    beforeSend: function(data) {
      // here u can do some loading animation...
      $load_more_btn.addClass('loading').html('Загрузка...'); // good for styling and also to prevent ajax calls before content is loaded by adding loading class
    },
    success: function(response) {
      console.log(response)
      if (response['have_posts'] == 1) { //if have posts:
        $load_more_btn.removeClass('loading').html('Загрузить еще');
        var $newElems = $(response['html'].replace(/(\r\n|\n|\r)/gm, '')); // here removing extra breaklines and spaces
        $('.items-list').append($newElems);
      } else {
        //end of posts (no posts found)
        $load_more_btn.removeClass('loading').addClass('end_of_posts').html('<span>End of posts</span>'); // change buttom styles if no more posts
      }
    }
  });
});

// https://code.tutsplus.com/articles/how-to-create-a-simple-post-rating-system-with-wordpress-and-jquery--wp-24474
jQuery(document).ready(function() {

  jQuery(".likes").click(function() {

    heart = jQuery(this);

    // Retrieve post ID from data attribute
    post_id = heart.data("post_id");
    var nonce = heart.attr('data-nonce');

    // Ajax call
    jQuery.ajax({
      type: "post",
      url: headJS.ajaxurl,
      data: "action=post-like&nonce=" + nonce + "&post_like=&post_id=" + post_id,
      success: function(count) {
        console.warn(count)
        // If vote successful
        if (count != "already") {
          heart.addClass("voted");
          heart.find(".number").text(count);
        }
      }
    });

    return false;
  })
})
