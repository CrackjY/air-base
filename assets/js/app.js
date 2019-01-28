/*$('body').on('click', '.btn-navigation', () => {
    $('.btn-navigation').find('.barre').toggleClass('orange');
    $('.sidebar').toggleClass('is-open');
});*/

$('div.msg-auth-success').fadeOut(10000);

$('body').on('click', '.li-pseudo', () => {
    $('.sub-profile-ul').toggle();
});
