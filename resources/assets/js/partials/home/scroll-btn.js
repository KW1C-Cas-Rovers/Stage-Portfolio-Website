$(document).ready(function () {
    scroll_btn = $('.scroll-btn');
    html_and_body = $('html, body');
    about_me_section = $('#about-me');

    scroll_btn.click(function () {
        html_and_body.animate({
            scrollTop: about_me_section.offset().top
        }, 5)
    });
});
