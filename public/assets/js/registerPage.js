$(window).on('resize', Resize);

$(window).ready(Resize);

$('.registerDoctor').on('click', function(){
    $('.RegisterDoctorForm').css('display', 'block');
    $('.RegisterWrapper').css('filter', 'grayscale(100%)')
})

$('.RegisterDoctorForm i').on('click', function(){
    $('.RegisterDoctorForm').css('display', 'none');
    $('.RegisterWrapper').css('filter', 'none')
})


$('.registerUser').on('click', function(){
    $('.RegisterUserForm').css('display', 'block');
    $('.RegisterWrapper').css('filter', 'grayscale(100%)')
})

$('.RegisterUserForm i').on('click', function(){
    $('.RegisterUserForm').css('display', 'none');
    $('.RegisterWrapper').css('filter', 'none')
})


// Resizing register page with triangles

function Resize(){

    // "GOLD PROPORTIONS" are the best screen proportions of width and height for standard properties 
    // in styles.css on Full Screen
    const goldScreenProportions = 2.1954; // 1348px / 614px  (width / height)

    const currentWindowWidth = $('.RegisterWrapper').innerWidth();
    const currentWindowHeight = $('.RegisterWrapper').innerHeight();
    var currentScreenProportions;

    const orientation = window.innerWidth > window.innerHeight ? "Landscape" : "Portrait";

    if (orientation == "Landscape")
    {
        currentScreenProportions = (currentWindowWidth / currentWindowHeight).toFixed(4);
        SetTheBestSkewBannerWidth(currentScreenProportions, goldScreenProportions);
    }
    else if (orientation == "Portrait")
    {
        currentScreenProportions = (currentWindowHeight / currentWindowWidth).toFixed(4);
        SetTheBestSkewBannerWidth(currentScreenProportions, goldScreenProportions);
    }

    SetSkewValue(currentWindowWidth, currentWindowHeight)
}

function SetTheBestSkewBannerWidth(proportions, goldProportions)
{
    $('.SkewBanner1').css('width', `calc(100vw * (100vw * (1 - ${proportions})));`)
    $('.SkewBanner2').css('width', `calc(100vw * (100vw * (1 - ${proportions})));`)
}

function SetSkewValue(aLength, bLenght)
{
     var skewDegree = (Math.atan2(aLength, bLenght) * 180/Math.PI).toFixed(4);

    $('.SkewBanner1').css('transform', `skewX(-${skewDegree}deg)`);
    $('.SkewBanner2').css('transform', `skewX(-${skewDegree}deg)`);

    $('.DoctorRegisterBackground').css('transform', `skewX(${skewDegree}deg)`)
    $('.UserRegisterBackground').css('transform', `skewX(${skewDegree}deg)`)

}