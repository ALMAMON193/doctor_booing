$(document).ready(function(){
  $('.menu-icon').click(function(){
      
      $('.sidebar').toggleClass('active');
      $('body').toggleClass('no-scroll');
  });

  $('.close-sidebar-icon').click(function(){
      
      $('.sidebar').removeClass('active');
      $('body').toggleClass('no-scroll');
  });

  // Close the sidebar if clicking outside of it
  $(document).click(function(event) {
      // Check if the click is outside the sidebar and the menu button
      if (!$(event.target).closest('.sidebar, .menu-icon').length) {
          if ($('.sidebar').hasClass('active')) {
              $('.sidebar').removeClass('active');
              $('body').removeClass('no-scroll');
          }
      }
  });
});