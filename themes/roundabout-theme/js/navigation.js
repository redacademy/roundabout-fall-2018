/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function() {
  let container, button, menu, links, i, len;

  container = document.getElementById('site-navigation');
  if (!container) {
    return;
  }

  button = container.getElementsByTagName('button')[0];
  if ('undefined' === typeof button) {
    return;
  }

  menu = container.getElementsByTagName('ul')[0];

  // Hide menu toggle button if menu is empty and return early.
  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  menu.setAttribute('aria-expanded', 'false');
  if (-1 === menu.className.indexOf('nav-menu')) {
    menu.className += ' nav-menu';
  }

  button.onclick = function() {
    if (-1 !== container.className.indexOf('toggled')) {
      container.className = container.className.replace(' toggled', '');
      button.setAttribute('aria-expanded', 'false');
      menu.setAttribute('aria-expanded', 'false');
    } else {
      container.className += ' toggled';
      button.setAttribute('aria-expanded', 'true');
      menu.setAttribute('aria-expanded', 'true');
    }
  };

  // Get all the link elements within the menu.
  links = menu.getElementsByTagName('a');

  // Each time a menu link is focused or blurred, toggle focus.
  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener('focus', toggleFocus, true);
    links[i].addEventListener('blur', toggleFocus, true);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    let self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while (-1 === self.className.indexOf('nav-menu')) {
      // On li elements toggle the class .focus.
      if ('li' === self.tagName.toLowerCase()) {
        if (-1 !== self.className.indexOf('focus')) {
          self.className = self.className.replace(' focus', '');
        } else {
          self.className += ' focus';
        }
      }

      self = self.parentElement;
    }
  }

  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */
  (function(container) {
    let touchStartFn,
      i,
      parentLink = container.querySelectorAll(
        '.menu-item-has-children > a, .page_item_has_children > a'
      );

    if ('ontouchstart' in window) {
      touchStartFn = function(e) {
        let menuItem = this.parentNode,
          i;

        if (!menuItem.classList.contains('focus')) {
          e.preventDefault();
          for (i = 0; i < menuItem.parentNode.children.length; ++i) {
            if (menuItem === menuItem.parentNode.children[i]) {
              continue;
            }
            menuItem.parentNode.children[i].classList.remove('focus');
          }
          menuItem.classList.add('focus');
        } else {
          menuItem.classList.remove('focus');
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener('touchstart', touchStartFn, false);
      }
    }
  })(container);
})();

/**
 * Burger Menu
 */

$('#toggle').click(function() {
  $(this).toggleClass('active');
  $('#overlay').toggleClass('open');
 });

/**
 * Handles adding the movement to search button when clicking
 */

$('header .icon-search').click(function(event){
  event.preventDefault();


  $('.search-field').toggle('slow');
});

$('.search-submit').click(function() { 
  $('.search-submit').hide();
  $('.search-field').hide('slow');
  if($('.search-field').val().length !== 0){
      $('.search-form').submit();
      $('.search-submit').submit();
    }else{
      $('.search-field').hide('slow');
    }
});

/**
 * Burger search button for phone devices
 */

$('.icon-search.burger').click(function(event){
  event.preventDefault();
  $('.search-field.burger').toggle('slow');
});

$('.search-submit.burger').click(function() {
  $('.search-submit.burger').hide();
  $('.search-field.burger').hide('slow');
  if($('.search-field.burger').val().length !== 0){
      $('.search-form.burger').submit();
      $('.search-submit.burger').submit();
    }else{
      $('.search-field.burger').hide('slow');
    }
});


/**
 * back to top button
 */ 
$(window).scroll(function() {
  if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      $('#return-to-top').fadeIn(200);    // Fade in the arrow
  } else {
      $('#return-to-top').fadeOut(200);   // Else fade out the arrow
  }
});
$('#return-to-top').click(function() {      // When arrow is clicked
  $('body,html').animate({
      scrollTop : 0                       // Scroll to top of body
  }, 500);
});



