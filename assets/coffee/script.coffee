$ ->
	$filters = $('.filters .filter')
	$cells = $('#cells')
	$cells.isotope
	  itemSelector: '.cell',
	  layoutMode: 'masonry',
	  transitionDuration: 0,
	  masonry:
	    columnWidth: '.cell',

	$(window).resize () ->
		$cells.isotope()
		$cells.find('.cell').each (i, cell) ->
			$cell = $(cell)
			$cell.removeClass('left right center top')
			left = $cell.position().left
			right = Math.ceil(left + $cell.innerWidth())
			top = $cell.position().top
			if( left == 0 )
				$cell.addClass 'left'
			else if( right >= $cells.innerWidth() )
				$cell.addClass 'right'
			else
				$cell.addClass 'center'
			if( top == 0 )
				$cell.addClass 'top'
	.resize()

	$filters.on 'click', (e) ->
		$filter = $(this)
		$parent = $filters.parent()
		if $parent.is(':not(.filtered)')
			$filters.each () ->
				$(this).removeClass('selected')
			$parent.addClass('filtered')
			$filter.addClass('selected')
		else
			$filter.toggleClass('selected')
		query = []
		$filters.each (i, filter) ->
			if $(filter).is('.selected') && slug = $(filter).data('filter')
				query.push('.'+slug)
		if query.length
			query = query.join()
		else
			# query = '*'
			query = ''
		$cells.isotope
			filter: query

	# $(window).mousemove (e) ->
	# 	# console.log e.screenX
	# 	x = e.screenX
	# 	a = 0
	# 	b = $(window).innerWidth()
	# 	c = .2
	# 	d = 2
	# 	size = (x-a)/(b-a) * (d-c) + c
	# 	console.log size
	# 	$cells.find('.cell').each () ->
	# 		$(this).css
	# 			fontSize: size+'em'
	# 	$cells.isotope 'layout'


		
	    