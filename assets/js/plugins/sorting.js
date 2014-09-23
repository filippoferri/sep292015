$(window).load(function() {

    var $container = $('.article_block');

    //Isotope
    $container.isotope({
      itemSelector: '.element',
      masonry: {
        columnWidth: 1
      }
    });

    // Infinite Scroll
    $container.infinitescroll({
        navSelector  : 'div.pagination',
        nextSelector : 'div.pagination a:first',
        itemSelector : '.element',
        bufferPx     : 200,
        loading: {
            finishedMsg: '<em>Non ci sono ulteriori articoli</em>.',
            img: $templateDir+'/assets/img/ajax-loader.gif',
            msgText: "<em>Stiamo caricando articoli meno recenti...</em>",
        },
    },

    // Infinite Scroll Callback
    function( newElements ) {
        var $newElems = jQuery( newElements ).hide();
            $newElems.fadeIn();
            $container.isotope( 'appended', $newElems );
    });


});
