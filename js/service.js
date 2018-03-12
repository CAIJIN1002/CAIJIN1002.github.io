$(function(){
  
  $('.form_msg').focus(function(){
    $(this).parent().find('.form_label').addClass('is-active'); 
    $(this).addClass('is-focus');
  });
  
  $('.form_msg').blur(function(){
    
    var msg_length = $(this).val().length;
    if ( msg_length == 0){
    
      $(this).parent().find('.form_label').removeClass('is-active');    
      $(this).removeClass('is-focus');
    }
      
  });
    
    
    
  
});