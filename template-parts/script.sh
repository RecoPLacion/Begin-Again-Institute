<!-- slick -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- slick js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
	$(document).ready(function() {
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
	});
</script>