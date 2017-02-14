$( document ).ready(function() {
    // mobile menu
    var windowWidth = $(window).width();

    $(".toggle_mnu").click(function () {
        $(".sandwich").toggleClass("active");
    });

    if (windowWidth < 769) {
        $(".mobile-menu ul a").click(function () {
            $(".mobile-menu").fadeOut(600);
            $(".sandwich").toggleClass("active").append("<span>");
        });

        $(".toggle_mnu").click(function () {
            if ($(".mobile-menu").is(":visible")) {
                $(".mobile-menu").fadeOut(600);
                $(".mobile-menu li a").removeClass("fadeInUp animated");
            } else {
                $(".mobile-menu").fadeIn(600);
                $(".mobile-menu li a").addClass("fadeInUp animated");
            }
        });
    }
    //


    /*go up arrow*/
    $(window).scroll(function () {
        var scrollDiv = $('#Go_Top');
        $(this).hide().removeAttr("href");
        if ($(window).scrollTop() >= "250") {/*показывать при прокрутке вниз показывать медленно #Go_Top*/
            $(this).fadeIn("slow")
        };
        if ($(window).scrollTop() <= "250") {/*при прокрутке ввверх медленно скрывать #Go_Top*/
            $(scrollDiv).fadeOut("slow");
        }
        else {
            $(scrollDiv).fadeIn("slow")
        };
    });
    $('#Go_Top').click(function () {/*функция плавной прокрутки вверх при клике на стрелку "вверх"*/
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });
    /*close go up arrow*/


    //модальное окно подписки
    $('#go').click( function(event){ // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
                $('#modal_form')
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
            });
    });
    /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
    $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
        $('#modal_form, #modal_form_2')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                function(){ // пoсле aнимaции
                    $(this).css('display', 'none'); // делaем ему display: none;
                    $('#overlay').fadeOut(400); // скрывaем пoдлoжку
                }
            );
    });

});
    $(document).on("click",".send_js", function(){
      var name = $('.name_js').val();
      var mail = $('.mail_js').val();

      if(name != "" && mail != ""){
        $('#modal_form').slideUp();
        $('#modal_form_2').slideDown();
      }
      return false;
    })
