jQuery(function($) {
  var fixCarouselHeight, resizeCarousel, setupCarousel, transitionEnd;
  transitionEnd = 'transitionend webkitTransitionEnd oTransitionEnd';
  resizeCarousel = function() {
    var $carousels, windowWidth;
    $carousels = $('.carousel');
    windowWidth = $(window).innerWidth();
    return $carousels.each(function() {
      var $carousel, $currentSlide, $slides, $slidesWrapper, currentIndex, left, slidesLength;
      $carousel = $(this);
      $slides = $carousel.find('.slide');
      slidesLength = $slides.length;
      $slidesWrapper = $carousel.find('.slides');
      $currentSlide = $carousel.find('.slide.current');
      currentIndex = $currentSlide.index();
      left = -1 * currentIndex * windowWidth;
      $slidesWrapper.addClass('static');
      $slidesWrapper.css({
        width: slidesLength * windowWidth,
        x: left
      });
      return $slides.each(function(i, slide) {
        var $slide, image, imageUrl;
        imageUrl = $(slide).find('.image').css('backgroundImage');
        if (imageUrl) {
          imageUrl = imageUrl.replace('url(', '').replace(')', '').replace(/"/g, '');
        } else {
          return;
        }
        image = new Image;
        $slide = $(this);
        image.onload = function() {
          var height, ratio, width;
          width = image.width;
          height = image.height;
          ratio = width / height;
          if (width >= height) {
            $slide.addClass('landscape');
          } else {
            $slide.addClass('portrait');
          }
          if (!parseInt($slide.css('width'))) {
            $slide.css({
              width: 'calc(100%/' + slidesLength + ')'
            });
          }
          if ($slide.is('.current')) {
            return fixCarouselHeight($slide);
          }
        };
        return image.src = imageUrl;
      });
    });
  };
  fixCarouselHeight = function($slide) {
    var $caption, $carousel, captionHeight, height, minHeight;
    $carousel = $slide.parents('.carousel');
    $caption = $slide.find('.caption');
    captionHeight = $caption.innerHeight();
    minHeight = $carousel.css('content').replace(/['"]+/g, '');
    height = 'calc(' + minHeight + ' + ' + captionHeight + 'px)';
    return $carousel.transition({
      'height': height
    }, 200, 'out');
  };
  setupCarousel = function() {
    $('.carousel').each(function(i, carousel) {
      $(this).find('.slide:first-child').addClass('current');
      return $(carousel).imagesLoaded(function() {
        return $(carousel).addClass('loaded');
      });
    });
    $('body').on('mouseenter', '.carousel.loaded .arrow:not(.no)', function() {
      var $arrow, $carousel, direction;
      $arrow = $(this);
      direction = $arrow.attr('data-direction');
      $carousel = $arrow.parents('.carousel');
      return $carousel.attr('data-direction', direction);
    });
    $('body').on('mouseleave', '.carousel.loaded .arrow', function() {
      var $arrow, $carousel;
      $arrow = $(this);
      $carousel = $arrow.parents('.carousel');
      return $carousel.attr('data-direction', '');
    });
    $('body').on('click', '.carousel.loaded .arrow:not(.no)', function() {
      var $arrow, $carousel, $currentSlide, $firstSlide, $lastSlide, $nextSlide, $slidesWrapper, currentIndex, delay, direction, left, windowWidth;
      $arrow = $(this);
      direction = $arrow.attr('data-direction');
      windowWidth = $(window).innerWidth();
      $carousel = $arrow.parents('.carousel');
      $slidesWrapper = $carousel.find('.slides');
      $currentSlide = $carousel.find('.slide.current');
      currentIndex = $currentSlide.index();
      $firstSlide = $carousel.find('.slide').first();
      $lastSlide = $carousel.find('.slide').last();
      left = parseInt($slidesWrapper.css('left'));
      $slidesWrapper.removeClass('static');
      switch (direction) {
        case 'left':
          $nextSlide = $currentSlide.prev('.slide');
          left += windowWidth;
          break;
        case 'right':
          $nextSlide = $currentSlide.next('.slide');
          left -= windowWidth;
      }
      if (!$nextSlide.length) {
        switch (direction) {
          case 'left':
            $lastSlide.insertBefore($firstSlide);
            $nextSlide = $lastSlide;
            $slidesWrapper.addClass('static');
            currentIndex = $currentSlide.index();
            left = -1 * currentIndex * windowWidth;
            $slidesWrapper.css({
              x: left
            });
            left += windowWidth;
            break;
          case 'right':
            $firstSlide.insertAfter($lastSlide);
            $nextSlide = $firstSlide;
            $slidesWrapper.addClass('static');
            currentIndex = $currentSlide.index();
            left = -1 * currentIndex * windowWidth;
            $slidesWrapper.css({
              x: left
            });
            left -= windowWidth;
        }
        delay = 100;
      } else {
        delay = 0;
      }
      fixCarouselHeight($nextSlide);
      return setTimeout((function() {
        $slidesWrapper.removeClass('static');
        $arrow.addClass('no');
        $slidesWrapper.stop();
        $currentSlide.removeClass('current');
        $nextSlide.addClass('current');
        return $slidesWrapper.transition({
          x: left
        }, function() {
          switch (direction) {
            case 'left':
              $lastSlide.insertBefore($firstSlide);
              break;
            case 'right':
              $firstSlide.insertAfter($lastSlide);
          }
          resizeCarousel();
          return $arrow.removeClass('no');
        });
      }), delay);
    });
    return resizeCarousel();
  };
  $(function() {
    return setupCarousel();
  });
  return $(window).resize(function() {
    return setupCarousel();
  });
});
