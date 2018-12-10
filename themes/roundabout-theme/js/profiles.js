/**
 * profiles.js
 *
 */


$( document ).ready(function() {
  $('.Dramatherapists').addClass('active');
  $('.member').hide();
  $('.member.member-type-dramatherapists').show();

  $('.profile-type-list a').on('click', function(){
    event.preventDefault();
    let selector = 'member-type-' + ($(this).attr('class')).toLowerCase();
    $('.member').hide();
    $('.' + selector).fadeIn();
    $('.profile-type-list a').removeClass('active');
    $(this).addClass('active');
  });

  // $('.member').on('mouseenter', function(){
  //   $(this).find('.info').slideUp().toogleClass('info-hover');
  // });
  // $('.member').on('mouseleave', function(){
  //   $('.info').slideDown().removeClass('info-hover');
  // });


  // $( ".member" ).bind( "mouseenter mouseleave", function() {
  //   $( this ).find('.info').toggleClass( "info-hover" );
  // });

});
