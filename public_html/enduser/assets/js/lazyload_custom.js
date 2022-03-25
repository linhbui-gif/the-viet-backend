function lazyVideo() {
    var arrIframe = $(".lazyload");
    arrIframe.css('display', 'block')
    $('.loading').css('display', 'none')
    $(arrIframe).each(function (index, v) {
        var dom = $(v);
        var src = dom.attr("data-src");
        dom.attr("src", src);
    });

}
setTimeout(function () {
    lazyVideo();
}, 800);
