// burger menu

$(document).ready(function() {
    $('.burger-wrapper').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('openNav');
        $('.header-nav-menu').toggleClass('openNav');
        $('body').toggleClass('ov-hidden')
    })
})

$('.testimonial-list').slick({
    dots: false,
    infinite: true,
    speed: 300,
    arrows: true,
    autoplay: false,
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
        {
        breakpoint: 1120,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
        }
        },
        {
        breakpoint: 800,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }
    ]
});

// Stick Header
$(window).scroll(function(){
    var sticky = $('.header'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) {
        sticky.addClass('fixed');
        $('body').addClass('is-fixed');
    } else {
        sticky.removeClass('fixed');
        $('body').removeClass('is-fixed');
    }
    
});

// filter portfolio
$(function () {
		
    var filterList = {
    
        init: function () {
        
            // MixItUp plugin
            // http://mixitup.io
            $('#featured-list').mixItUp({
              selectors: {
              target: '.featured-item',
              filter: '.filter'	
          },
          load: {
            filter: '.all'  
          }     
            });								
        
        }

    };
    
    // Run the show!
    filterList.init();
    
    
});		

// scroll to top
$(document).ready(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() > 100) {
            $('.scroll-top').addClass('fixed');
            
        }else {
            $('.scroll-top').removeClass('fixed');
            
        }
    });

    $('.scroll-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    })

});


var $this = $('.feat-list--more');
if ($this.find('.feat-item--more').length > 2) {
    $('.feat-list--more').append('<div><a href="javascript:;" class="feat-link showMore"></a></div>');
}

// If more than 2 Education feat-list, hide the remaining
$('.feat-list .feat-item--more').slice(0,3).addClass('shown');
$('.feat-list .feat-item--more').not('.shown').hide();
$('.feat-list .feat-link').on('click',function(){
    $('.feat-list .feat-item--more').not('.shown').toggle(300);
    $(this).toggleClass('showLess');
    $('.plan-list-content').toggleClass('changeHeight')
});


// Quick & dirty toggle to demonstrate intensive-modal toggle behavior
$('.intensive-modal-toggle').on('click', function(e) {
    e.preventDefault();
    $('.intensive-modal').toggleClass('is-visible');
});

// Accordion Result page
$(function() {
    $('.result-accordion-title').click(function(j) {
      
    var dropDown = $(this).closest('.result-accordion-card').find('.result-accordion-panel');
        $(this).closest('.result-accordion-wrapper').find('.result-accordion-panel').not(dropDown).slideUp();
        
        if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        } else {
        $(this).closest('.result-accordion-wrapper').find('.result-accordion-title.active').removeClass('active');
        $(this).addClass('active');
        }
        
        dropDown.stop(false, true).slideToggle();
        j.preventDefault();
    });
});