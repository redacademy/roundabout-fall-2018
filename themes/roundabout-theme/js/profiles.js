/**
 * profiles.js
 * To have one of the team and supporter member taxonomy selected (dramatherapists here) when the page is read.
 * To show only the profile selected members, as a filter.
 */


$( document ).ready(function() {
  //selected and active li from team member
  $('.Dramatherapists').addClass('active');
  $('.member').hide();
  $('.member.member-type-dramatherapists').show();

  //selected and active li from supporter member
  $('.Patrons').addClass('active');
  $('.supporter').hide();
  $('.supporter.supporters-type-patrons').show();

  //onclick show only one type from team member
  $('.profile-type-list a').on('click', function(event){
    event.preventDefault();
    let selector = 'member-type-' + ($(this).attr('class')).toLowerCase().split(' ')[0];
    $('.member').hide();
    $('.' + selector).fadeIn();
    $('.profile-type-list a').removeClass('active');
    $(this).addClass('active');
  });
      
  //onclick show only one type from supporter member
  $('.profile-type-list a').on('click', function(){
    let selectorSupp = 'supporters-type-' + ($(this).attr('class')).toLowerCase().split(' ')[0];
    $('.supporter').hide();
    $('.' + selectorSupp).fadeIn();
    $('.profile-type-list a').removeClass('active');
    $(this).addClass('active');
  });

});
