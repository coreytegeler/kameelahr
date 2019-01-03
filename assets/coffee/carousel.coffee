jQuery ($) ->
	transitionEnd = 'transitionend webkitTransitionEnd oTransitionEnd'

	slideWidth = ->
		return $(window).innerWidth() * .8

	resizeCarousel = ->
		carousels = $('.carousel')
		carousels.each ->
			carousel = $(this)
			slides = carousel.find('.slide')
			slidesLength = slides.length
			slidesWrapper = carousel.find('.slides')
			currentSlide = carousel.find('.slide.current')
			leftSlide = currentSlide.prev().addClass('left')
			rightSlide = currentSlide.next().addClass('right') 
			currentIndex = currentSlide.index()
			left = currentIndex * -slideWidth()
			slidesWrapper.addClass('static')
			slidesWidth = slidesLength * slideWidth()
			slidesWrapper.css
				width: slidesWidth
			# 	x: left
			slides.each (i, slide) ->
				imageUrl = $(slide).find('img').attr('src')
				image = new Image
				slide = $(this)
				image.onload = ->
					width = image.width
					height = image.height
					ratio = width / height
					if width >= height
						slide.addClass('landscape')
					else
						slide.addClass('portrait')
					if !parseInt(slide.css('width'))
						slide.css width: slideWidth()
				image.src = imageUrl


	setupCarousel = ->
		$('.carousel').each (i, carousel) ->
			$(this).find('.slide:first-child').addClass('current')
			$(carousel).imagesLoaded ->
				$(carousel).addClass('loaded')


	$('body').on 'mouseenter', '.carousel.loaded:not(.sliding) .arrow', ->
		$arrow = $(this)
		direction = $arrow.attr('data-direction')
		carousel = $arrow.parents('.carousel')
		carousel.attr('data-direction', direction)

	$('body').on 'mouseleave', '.carousel.loaded .arrow', ->
		$arrow = $(this)
		carousel = $arrow.parents('.carousel')
		carousel.attr('data-direction', '')

	$('body').on 'click', '.carousel.loaded:not(.sliding) .arrow', (e) ->
		$arrow = $(this)
		carousel = $arrow.parents('.carousel')
		direction = $arrow.attr('data-direction')
		carousel.slide(direction)

	$('body').on 'click', '.carousel.loaded:not(.sliding) .slide.current', (e) ->
		slide = $(this)
		scroll = slide.find('.scroll')
		carousel = slide.parents('.carousel')
		if scroll.is('.bottom')
			top = 0
		else
			top = $(document).height()
		scroll.animate
			scrollTop: top
		, 500

	$('.carousel .slide .scroll').scroll (e) ->
		scroll = $(this)
		slide = scroll.parents('.slide')
		if this.scrollHeight - scroll.scrollTop() <= slide.innerHeight()
			scroll.addClass('bottom')
		else
			scroll.removeClass('bottom')

	$(document).keydown (e) ->
		carousel = $('.carousel')
		if carousel.is '.sliding'
			return
		if e.which == 37
			e.preventDefault()
			carousel.slide('left')
		else if e.which == 39
			e.preventDefault()
			carousel.slide('right')
		else
			return

	$.fn.slide = (direction) ->
		carousel = $(this)
		$arrow = carousel.find('.arrow.'+direction)
		carousel.addClass('sliding')
		direction = $arrow.attr('data-direction')
		carousel = $arrow.parents('.carousel')
		slidesWrapper = carousel.find('.slides')
		currentSlide = carousel.find('.slide.current')
		# currentIndex = currentSlide.index()
		$firstSlide = carousel.find('.slide').first()
		$lastSlide = carousel.find('.slide').last()
		slidesWrapper.removeClass('static')
		# currentSlide.find('.scroll').animate
		# 	scrollTop: 0
		# , 500
		switch direction
			when 'left'
				$nextSlide = currentSlide.prev('.slide')
				$resetSlide = carousel.find('.slide').last()
				# console.log $nextSlide
				# left += slideWidth()
			when 'right'
				$nextSlide = currentSlide.next('.slide')
				$resetSlide = carousel.find('.slide').first()
				# console.log $nextSlide
				# left -= slideWidth()
		if !$nextSlide.length
			$nextSlide = $resetSlide
		left = $nextSlide[0].offsetLeft
		if left != 0
			left = -left
		console.log left

		currentSlide.removeClass('current')
		$nextSlide.addClass('current')
		slidesWrapper.transition
			x: left
		, 500

		carousel.removeClass('sliding')

		resizeCarousel()
		

	$ ->
		setupCarousel()
		resizeCarousel()

	$(window).resize () ->
		resizeCarousel()
