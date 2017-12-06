$(function() {
  var $cells, $filters, $window, onResize;
  $window = $(window);
  $filters = $('.filters a');
  $cells = $('#cells');
  $cells.isotope({
    itemSelector: '.cell',
    layoutMode: 'masonry',
    transitionDuration: 0,
    masonry: {
      columnWidth: '.cell'
    }
  });
  onResize = function() {
    $cells.find('.cell').each(function(i, cell) {
      var $cell, $image, $img, cellWidth, fontSize, imgHeight, imgRatio, imgWidth, left, padding, right, top, windowWidth;
      $cell = $(cell);
      $image = $cell.find('.image.load');
      if ($image.length) {
        $img = $cell.find('img');
        imgWidth = Math.floor($image.attr('data-width'));
        imgHeight = Math.floor($image.attr('data-height'));
        imgRatio = imgWidth / imgHeight;
        padding = parseInt($cell.find('a').css('padding')) * 2;
        cellWidth = Math.floor($cell.innerWidth() - padding);
        $image.css({
          width: cellWidth,
          height: cellWidth / imgRatio
        });
        $image.imagesLoaded(function() {
          var $loadedImage;
          $loadedImage = $(this.elements[0]);
          $loadedImage.attr('style', '');
          $loadedImage.addClass('loaded').removeClass('load');
          return $cells.isotope();
        });
      }
      $cell.removeClass('left right center top');
      left = $cell.position().left;
      right = Math.ceil(left + $cell.innerWidth());
      top = $cell.position().top;
      if (left === 0) {
        $cell.addClass('left');
      } else if (right >= $cells.innerWidth()) {
        $cell.addClass('right');
      } else {
        $cell.addClass('center');
      }
      if (top === 0) {
        $cell.addClass('top');
      }
      if ($cell.is('.writing')) {
        windowWidth = $window.innerWidth();
        fontSize = windowWidth / 110;
        return $cell.find('.wrap').css({
          fontSize: fontSize + 'px'
        });
      }
    });
    return $cells.isotope();
  };
  return $(window).resize(function() {
    return onResize();
  }).resize();
});
