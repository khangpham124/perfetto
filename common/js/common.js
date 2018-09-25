/*-----------------------------------------------------------
jquery-rollover.js
jquery-opacity-rollover.js
-------------------------------------------------------------*/

/*-----------------------------------------------------------
jquery-rollover.js　※「_on」画像を作成し、class="over"を付ければOK
-------------------------------------------------------------*/

$(document).ready(function() {
    setTimeout(function() {
        $('.loading').fadeOut(300);
        $("body").removeClass("noScroll");
    }, 1000);
});

$('.hamburger').click(function() {
    $('.naviSp').slideToggle(400);
});

function initRollOverImages() {
    var image_cache = new Object();
    $("img.over").each(function(i) {
        var imgsrc = this.src;
        var dot = this.src.lastIndexOf('.');
        var imgsrc_on = this.src.substr(0, dot) + '_on' + this.src.substr(dot, 4);
        image_cache[this.src] = new Image();
        image_cache[this.src].src = imgsrc_on;
        $(this).hover(
            function() { this.src = imgsrc_on; },
            function() { this.src = imgsrc; });
    });
}

$(document).ready(initRollOverImages);

/*-----------------------------------------------------------
jquery-opacity-rollover.js　※class="opa"を付ければOK
-------------------------------------------------------------*/

$(document).ready(function() {
    $("img.opa").fadeTo(0, 1.0);
    $("img.opa").hover(function() {
            $(this).fadeTo(200, 0.5);
        },
        function() {
            $(this).fadeTo(200, 1.0);
        });
});

$('.biggerlink').biggerlink();

var forEach = function(t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};
var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
            this.classList.toggle("is-active");
        }, false);
    });
}

function createCookie(name, value, hours) {
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}


function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}


function eraseCookie(name) { createCookie(name, "", -1); }

function listCookies() {
    var theCookies = document.cookie.indexOf('compare').split(';');
    var aString = '';
    for (var i = 1; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i - 1] + "\n";
    }
    return aString;
}



$(window).scroll(function() {
    if ($(this).scrollTop() >= 600) {
        $('#pageTop').css('opacity', 1);
        $('#pageTop').css('bottom', '30px');
    } else {
        $('#pageTop').css('opacity', 0);
        $('#pageTop').css('bottom', '50px');
    }
});
$('#pageTop').click(function() { $('body,html').animate({ scrollTop: 0 }, 800); });

$(".btnBuy").click(function() {
    $('.overlay').fadeToggle(200);
    $('.popup').fadeToggle(200);
});

$(".langBar").click(function() {
    $('.overlay').fadeToggle(200);
    $('.iconLang').fadeIn(200);
});

$(".overlay").click(function() {
    $(this).fadeOut(200);
    $('.iconLang').fadeOut(200);
});

$(function() {
    $(".iconLang li a").click(function() {
        var lang = $(this).attr('data-lang');
        createCookie('lang_web', lang, 24);
        location.reload();
    });
});

/*=====================================================
meta: {
  title: "jquery-opacity-rollover.js",
  version: "2.1",
  copy: "copyright 2009 h2ham (h2ham.mail@gmail.com)",
  license: "MIT License(http://www.opensource.org/licenses/mit-license.php)",
  author: "THE HAM MEDIA - http://h2ham.seesaa.net/",
  date: "2009-07-21"
  modify: "2009-07-23"
}
=====================================================*/
(function($) {

    $.fn.opOver = function(op, oa, durationp, durationa) {

            var c = {
                op: op ? op : 1.0,
                oa: oa ? oa : 0.2,
                durationp: durationp ? durationp : 'fast',
                durationa: durationa ? durationa : 'fast'
            };


            $(this).each(function() {
                $(this).css({
                    opacity: c.op,
                    filter: "alpha(opacity=" + c.op * 100 + ")"
                }).hover(function() {
                    $(this).fadeTo(c.durationp, c.oa);
                }, function() {
                    $(this).fadeTo(c.durationa, c.op);
                })
            });
        },

        $.fn.wink = function(durationp, op, oa) {

            var c = {
                durationp: durationp ? durationp : 'slow',
                op: op ? op : 1.0,
                oa: oa ? oa : 0.8
            };

            $(this).each(function() {
                $(this).css({
                    opacity: c.op,
                    filter: "alpha(opacity=" + c.op * 100 + ")"
                }).hover(function() {
                    $(this).css({
                        opacity: c.oa,
                        filter: "alpha(opacity=" + c.oa * 100 + ")"
                    });
                    $(this).fadeTo(c.durationp, c.op);
                }, function() {
                    $(this).css({
                        opacity: c.op,
                        filter: "alpha(opacity=" + c.op * 100 + ")"
                    });
                })
            });
        }

})(jQuery);