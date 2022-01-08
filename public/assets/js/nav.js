
 // Menu scrolling for Desktop Navigation

var prevScrollpos = window.pageYOffset;
$(window).on('scroll', function() 
{
    var currentScrollPos = window.pageYOffset;
    if( currentScrollPos > ($('.Banner').position().top + $('.Banner').outerHeight(true)) * 0.8 ) // main page values
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


