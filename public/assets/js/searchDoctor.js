//  Menu for Filtering Results on mobile devices

$('div.FilteringButton i').on('click', function()
{
    $('div.DoctorFiltering').toggleClass('DoctorsFilteringActive');
    $('div.FilteringButton').toggleClass('FilteringButtonActive');
    $('.FilteringButton i').toggleClass('ParagraphIconActive');
});


 // Menu scrolling for Desktop Navigation

 var prevScrollpos = window.pageYOffset;
 $(window).on('scroll', function() 
 {
     var currentScrollPos = window.pageYOffset;
     if(  currentScrollPos > $('.SearchResultsContent').position().top)
     {
         if (prevScrollpos > currentScrollPos) {
             $('nav.Desktop').css('top', '5vh');
             } 
             else {
             $('nav.Desktop').css('top', '-20vh');
             }
             prevScrollpos = currentScrollPos;
         }
 });

// Menu scrolling for Desktop Navigation in scrollable div with list of doctors

 var prevScrollPosInDiv = $('.SearchResultsContent div.DoctorInfo').offset().top;
 $('.SearchResultsContent').on('scroll', function()
 {
 var currentScrollPosInDiv = $('.SearchResultsContent div.DoctorInfo').offset().top;

           if (prevScrollPosInDiv < currentScrollPosInDiv) {
               $('nav.Desktop').css('top', '5vh');
               } 
               else {
               $('nav.Desktop').css('top', '-20vh');
               }
               prevScrollPosInDiv = currentScrollPosInDiv;
 });