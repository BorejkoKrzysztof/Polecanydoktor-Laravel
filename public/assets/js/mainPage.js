 
// SHOW DESCRIPTION ITEMS ON MAIN PAGE (Photo + Titles)
function scrollHide() {
    const windowHeight = $(window).height();
    const scrollValue = $(document).scrollTop();

     const $secondDescriptionItem = $('.img1');
     const secondDescriptionItemFromTop = $secondDescriptionItem.offset().top
     const secondDescriptionHeight = $secondDescriptionItem.outerHeight();

     var orientation = window.innerWidth > window.innerHeight ? "Landscape" : "Portrait";

     const $thirdDescriptionItem = $('.img2');
     const thirdDescriptionItemFromTop = $thirdDescriptionItem.offset().top
     const thirdDescriptionHeight = $thirdDescriptionItem.outerHeight();

     const $fourthDescriptionItem = $('.img3');
     const fourthDescriptionItemFromTop = $fourthDescriptionItem.offset().top
     const fourthDescriptionHeight = $fourthDescriptionItem.outerHeight();

    // Photo 1 and title 1
     if (scrollValue > secondDescriptionItemFromTop + secondDescriptionHeight - windowHeight*1.5) {
        $secondDescriptionItem.css('opacity', '1');
        $('.title1').css('font-size', '1.5rem');

         if (orientation == "Landscape"){
            $secondDescriptionItem.css('left','8rem');
         }
         else{
            $secondDescriptionItem.css('left','1.5rem');
         }
     }

     // Photo 2 and title 2
     if (scrollValue > thirdDescriptionItemFromTop + thirdDescriptionHeight - windowHeight*1.5) {
        $thirdDescriptionItem.css('opacity', '1');
        $('.title2').css('font-size', '1.5rem');

        if (orientation == "Landscape"){
            $thirdDescriptionItem.css('left','55vw');
         }
         else{
            $thirdDescriptionItem.css('left','calc(100vw - 26.5rem)');
         }
     }

     // Photo 3 and title 3
     if (scrollValue > fourthDescriptionItemFromTop + fourthDescriptionHeight - windowHeight*1.5) {
        $fourthDescriptionItem.css('opacity', '1');
        $('.title3').css('font-size', '1.5rem');

        if (orientation == "Landscape"){
            $fourthDescriptionItem.css('left','8rem');
         }
         else{
            $fourthDescriptionItem.css('left','1.5rem');
         }
     }
}
$(document).on('scroll', scrollHide);
