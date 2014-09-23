$(window).load(function(){

	var $container = $('.article_block');

    //Isotope
	$container.isotope({
		itemSelector : '.element',
		masonry: {
          columnWidth: 1
        }
	});

});
