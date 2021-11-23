$(document).ready(function () {
    $('.selectpicker').selectpicker();
    /*sticky nav bar*/
    var header_height= $('header .seconed-nav').outerHeight();
    $(window).scroll(function () {
        var scroll_height= $(window).scrollTop();
        if(scroll_height>header_height){
            $('header  .seconed-nav').addClass('sticky')
        }else {
            $('header  .seconed-nav').removeClass('sticky')
        }
    });

// plugin defaults
    $.extend({
        teletype: {
            defaults: {
                delay: 100,
                pause: 800,
                text: []
            }
        }
    });

    $('#target').teletype({
        text: [
            'مرحبا بك في مكتبة اقرأ',
            'عليك الاعتناء بغذاء عقلك ',
            'أنت شخص مثقف :)!'
        ]
    });
    $('#target').addClass('target')

    $('#cursor').teletype({
        text: ['|', ' '],
        delay: 0,
        pause: 5000
    });
    $('#cursor').addClass('cursor');

    /*End type write*/

});
