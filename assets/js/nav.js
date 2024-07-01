$(document).ready(function () {
    // 激活 Bootstrap 的下拉菜單
    $('.dropdown-toggle').dropdown();

    // 設置子選單在懸停時自動顯示
    $('.nav-item.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });
});