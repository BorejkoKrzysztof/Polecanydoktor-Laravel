//  Menu for mobile Devices

$('nav.Mobile i').on('click', function()
 {
     $('.NavMobile').toggleClass('NavMobileActive');
     $('nav.Mobile').toggleClass('activeIcon');
 });