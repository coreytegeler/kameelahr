$(function() {
  var $cells, $filters, filterCells;
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
  $(window).resize(function() {
    $cells.isotope();
    return $cells.find('.cell').each(function(i, cell) {
      var $cell, left, right, top;
      $cell = $(cell);
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
        return $cell.addClass('top');
      }
    });
  }).resize();
  $filters.on('click', function(e) {
    var $filter, $parent;
    if (!$cells.length) {
      return;
    }
    e.preventDefault();
    $filter = $(this);
    $parent = $filters.parent();
    if ($parent.is(':not(.filtered)')) {
      $filters.each(function() {
        return $(this).removeClass('selected');
      });
      $parent.addClass('filtered');
      $filter.addClass('selected');
    } else {
      $filter.toggleClass('selected');
    }
    return filterCells();
  });
  filterCells = function() {
    var query;
    query = [];
    $filters.each(function(i, filter) {
      var slug;
      if ($(filter).is('.selected') && (slug = $(filter).attr('data-filter'))) {
        return query.push('.' + slug);
      }
    });
    if (query.length) {
      query = query.join();
    } else {
      query = '';
    }
    return $cells.isotope({
      filter: query
    });
  };
  return filterCells();
});
