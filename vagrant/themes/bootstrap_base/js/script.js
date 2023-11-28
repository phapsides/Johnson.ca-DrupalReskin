// SCRIPTS

jQuery(document).ready(function ($) {
  
  // header search bar
  $('.search-trigger').on('click', function(e){
    e.preventDefault();
    $(this).hide();
    $('.search-reveal').addClass('open');
  });
  
  // homepage links
  // $('.tasks-menu .dropdown-toggle').on('click', function(e){
  //   e.preventDefault();
     
  //   $('.tasks-menu').find('.dropdown-menu').slideUp(500);
    
  //   if(!$(this).parent().hasClass('open')){
  //      $(this).parent().find('.dropdown-menu').slideDown(800);
  //    }     
  // });
});