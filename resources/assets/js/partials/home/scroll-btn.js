$(document).ready(function () {
    let scroll_btn = $('.scroll-btn');
    let html_and_body = $('html, body');
    let about_me_section = $('#about-me');

    scroll_btn.click(function () {
        html_and_body.animate({
            scrollTop: about_me_section.offset().top
        }, 5)
    });
});
