$(document).ready(function () {
    $('.selectpicker').selectpicker();
    $('.mobile-nav-toggle').click(function () {
        $('body').toggleClass('mobile-nav-active');
        $(this).toggleClass('bi-list')
        $(this).toggleClass('bi-x')
    });
    $('html').removeAttr('class');
    $('.external_link').click(function () {
       $(this).next('.internal-link').fadeToggle();
       $(this).find('i.right_arrow.right').fadeToggle();
       $(this).find('i.right_arrow.down').fadeToggle();
    })
});
