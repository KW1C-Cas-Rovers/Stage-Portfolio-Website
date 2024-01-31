$(document).ready(function () {
    body = $('body')
    menu_btn = $('.menu-btn');
    overlay_menu = $('.overlay-menu');

    menu_btn.click(function () {
        $(this).toggleClass('active')
        body.toggleClass('menu-active')
        overlay_menu.toggleClass('open')
    });
});
