jQuery(document).ready(function($) {
  $('.tab-title').on('click', function(){
      var index = $('.tab-title').index(this);
      $('.tab-title').removeClass('selected'); 
      $(this).addClass('selected');
      $('.post.show').removeClass('show');
      $('.post').eq(index).addClass('show');
    });
  });