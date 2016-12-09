    /* jshint strict: false */

    var $body       = $('body');    /* ,
        $characters = $('.characters'),
        $posters    = $('.characters-poster'),
        $names      = $('.characters-list a'),
        $label      = $('.characters-label');*/

  /*  var backgrounds = [
        { src: 'images/DSC_0001.jpg', valign: 'top' },
        { src: 'images/DSC_0001.jpg', valign: 'top' },
        { src: 'images/DSC_0001.jpg', valign: 'top' },
        { src: 'images/DSC_0001.jpg', delay: 6500, video: [
            'img/intro.mp4',
            'img/intro.ogv',
            'img/intro.webm'
        ] },
    ];*/

 var backgrounds = [
        { src: 'images/temp/castillo.jpg', valign: 'top' },
        { src: 'images/temp/castillo2.jpg', valign: 'top' },
        { src: 'images/temp/castillo3.jpg', valign: 'top' },
    
       

    ];

    $('html').addClass('animated');

    var displayBackdrops = false;

    $body.vegas({
      // transition: 'swirlLeft2',
        transition: ['fade', 'swirlLeft', 'kenburns'],
        preload: true,
        overlay: '/js/vegas/dist/overlays/01.png',
        transitionDuration: 4000,
        delay: 10000, //retardo d transiciones
        slides: backgrounds,
        walk: function (nb, settings) {
            if (settings.video) {
                $('.logo').addClass('collapsed');
            } else {
                $('.logo').removeClass('collapsed');
            }
        }
    });

  
    // JavaScript Debounce Function
    // By David Walsh
    // http://davidwalsh.name/javascript-debounce-function
    function debounce (func, wait, immediate) {
        var timeout;
        
        return function () {
            var context = this, 
                args = arguments,
                later = function() {
                    timeout = null;

                    if (!immediate) {
                        func.apply(context, args);
                    }
                },
                callNow = immediate && !timeout;

            clearTimeout(timeout);
            timeout = setTimeout(later, wait || 500);

            if (callNow) {
                func.apply(context, args);
            }
        };
    }
    