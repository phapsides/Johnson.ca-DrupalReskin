$(document).ready(function() {
 	$('.collaspedNav').click(function() {
    	$('.mobile').slideToggle(600);
    	//target the entire page, and listen for touch events
        $('html, body').on('touchmove', function(e){ 
            //prevent native touch activity like scrolling
            e.preventDefault(); 
        });
 	});
 	$('.mobile .toggle').click(function() {
        $('.mobile').slideToggle(600);
        //target the entire page, and allow native touch activity like scrolling
        $('html, body').off('touchmove');        
    });


 	




 	if($(window).width() < 767) {
    	$('#search').click(function () {
    		$(".search-form-mobile").slideToggle();
    		$('#search').toggleClass( "change" );
		});
	}
	else {
		$('#search').click(function () {
	        $(".search-form").toggle("slide");
	        $('#search').toggleClass( "change" );
	    });
	}
    
 }); // end doc ready




