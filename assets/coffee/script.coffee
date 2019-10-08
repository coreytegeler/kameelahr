# document.getElementById("page").style.marginTop = document.getElementById("header").offsetHeight + "px";

jQuery ($) ->
	transitionEnd = "transitionend webkitTransitionEnd oTransitionEnd"
	page = $("#page")
	header = $("header")

	# $(window).resize (e) ->
	# 	page.css
	# 		marginTop: header.innerHeight()
	# $(window).resize()

	carousel = $(".carousel")
	captions = $(".slide-captions")
	

	slideWidth = ->
		return $(window).innerWidth() * .8

	resizeCarousel = ->
		carouselWidth = carousel.innerWidth()
		slides = carousel.find(".slide")
		slidesLength = slides.length
		slidesWrapper = carousel.find(".slides")
		slidesWidth = slidesLength * slideWidth()
		slidesHeight = slidesWrapper.innerHeight()


	setupCarousel = ->
		carousel.find(".slide:first-child").addClass("current")
		carousel.imagesLoaded ->
			carousel.addClass("loaded")


	$("body").on "mouseenter", ".carousel.loaded:not(.sliding) .arrow", ->
		$arrow = $(this)
		direction = $arrow.attr("data-direction")
		carousel.attr("data-direction", direction)

	$("body").on "mouseleave", ".carousel.loaded .arrow", ->
		$arrow = $(this)
		carousel.attr("data-direction", "")

	$("body").on "click", ".carousel.loaded:not(.sliding) .arrow", (e) ->
		$arrow = $(this)
		direction = $arrow.attr("data-direction")
		carousel.slide(direction)

	$("body").on "click", ".carousel.loaded:not(.sliding) .slide.current", (e) ->
		slide = $(this)
		scroll = slide.find(".scroll")
		if scroll.is(".bottom")
			top = 0
		else
			top = $(document).height()
		scroll.animate
			scrollTop: top
		, 500

	$(".carousel .slide .scroll").scroll (e) ->
		scroll = $(this)
		slide = scroll.parents(".slide")
		if this.scrollHeight - scroll.scrollTop() <= slide.innerHeight()
			scroll.addClass("bottom")
		else
			scroll.removeClass("bottom")

	$(document).keydown (e) ->
		if carousel.is ".sliding"
			return
		if e.which == 37
			e.preventDefault()
			carousel.slide("left")
		else if e.which == 39
			e.preventDefault()
			carousel.slide("right")
		else
			return

	$.fn.slide = (direction) ->
		arrow = carousel.find(".arrow."+direction)
		carousel.addClass("sliding")
		direction = arrow.attr("data-direction")
		slidesWrapper = carousel.find(".slides")
		currentSlide = carousel.find(".slide.current")
		firstSlide = carousel.find(".slide").first()
		lastSlide = carousel.find(".slide").last()
		slidesWrapper.removeClass("static")
		switch direction
			when "left"
				nextSlide = currentSlide.prev(".slide")
				resetSlide = carousel.find(".slide").last()
			when "right"
				nextSlide = currentSlide.next(".slide")
				resetSlide = carousel.find(".slide").first()
		if !nextSlide.length
			nextSlide = resetSlide

		currentSlide.removeClass("current")
		nextSlide.addClass("current")
		carousel.removeClass("sliding")

		nextIndex = nextSlide.data("index")
		currentCaption = captions.find("figcaption.current")
		nextCaption = captions.find("figcaption[data-index='"+nextIndex+"']")

		currentCaption.removeClass("current")
		nextCaption.addClass("current")

	$ ->
		setupCarousel()
