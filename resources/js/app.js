require('./bootstrap');

//dashboard
$('#menu').click(function () {
    $('#subHeader').removeClass("m-0");
    $('#subMain').removeClass("m-0");
    $('#subMainTwo').removeClass("m-0");
    $('#sidebar').addClass('show');
});

$('#menu-close').click(function () {
    $('#subHeader').addClass("m-0");
    $('#subMain').addClass("m-0");
    $('#subMainTwo').addClass("m-0");
    $('#sidebar').addClass('hide');
    $('#sidebar').removeClass('show');
});

if($(".sidebar-active").offset()){
    let screenHeight = $(window).height();
    let currentMenuHeight = $(".sidebar-active").offset().top;

    if(currentMenuHeight > screenHeight*0.8 ){
        $(".sidebar-menu").animate({
            scrollTop:currentMenuHeight-100
        },1000)
    }
}

