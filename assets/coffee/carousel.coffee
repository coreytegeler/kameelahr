jQuery ($) ->
	carousel = $('#carousel')
	transitionEnd = 'transitionend webkitTransitionEnd oTransitionEnd'

	slideWidth = ->
		return $(window).innerWidth() * .8

	# resizeCarousel = ->
	# 	carousels.each ->
	# 		carousel = $(this)
	# 		carouselWidth = carousel.innerWidth()
	# 		slides = carousel.find('.slide')
	# 		slidesLength = slides.length
	# 		slidesWrapper = carousel.find('.slides')
	# 		slidesWidth = slidesLength * slideWidth()
	# 		slidesHeight = slidesWrapper.innerHeight()


	setupCarousel = ->
		carousel.imagesLoaded ->
			carousel.addClass('loaded')

	$('body').on 'mouseenter', '#carousel.loaded .arrow', ->
		direction = $(this).attr('data-direction')
		carousel.attr('data-direction', direction)

	$('body').on 'mouseleave', '#carousel.loaded .arrow', ->
		carousel.attr('data-direction', '')

	$('body').on 'click', '#carousel.loaded .arrow', (e) ->
		direction = $(this).attr('data-direction')
		carousel.slide(direction)

	# $('body').on 'click', '#carousel.loaded .slide.current', (e) ->
	# 	slide = $(this)
	# 	scroll = slide.find('.scroll')
	# 	if scroll.is('.bottom')
	# 		top = 0
	# 	else
	# 		top = $(document).height()
	# 	scroll.animate
	# 		scrollTop: top
	# 	, 500

	$('#carousel .slide .scroll').scroll (e) ->
		scroll = $(this)
		slide = scroll.parents('.slide')
		if this.scrollHeight - scroll.scrollTop() <= slide.innerHeight()
			scroll.addClass('bottom')
		else
			scroll.removeClass('bottom')

	$(document).keydown (e) ->
		switch e.which
			when 37
				e.preventDefault()
				carousel.slide('left')
			when 39
				e.preventDefault()
				carousel.slide('right')
			else
				return

	$.fn.slide = (direction) ->
		arrow = carousel.find('.arrow.'+direction)
		direction = arrow.attr('data-direction')
		carousel = arrow.parents('#carousel')
		currentSlide = carousel.find('.slide.current')
		currentCaption = $('.caption.current')
		switch direction
			when 'left'
				nextSlide = currentSlide.prev('.slide')
				resetSlide = carousel.find('.slide').last()
				nextCaption = currentCaption.prev('.caption')
				resetCaption = $('.caption').last()
			when 'right'
				nextSlide = currentSlide.next('.slide')
				resetSlide = carousel.find('.slide').first()
				console.log currentCaption
				nextCaption = currentCaption.next('.caption')
				resetCaption = $('.caption').first()
		if !nextSlide.length
			nextSlide = resetSlide
			nextCaption = resetCaption


		currentSlide.removeClass('current')
		nextSlide.addClass('current')
		currentCaption.removeClass('current')
		nextCaption.addClass('current')
		

	$ ->
		setupCarousel()