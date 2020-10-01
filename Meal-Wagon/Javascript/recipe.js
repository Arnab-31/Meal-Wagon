function myFunction(){
    $('#ing').css({"border-bottom":"2px solid #f1513c"});
    $('.ing').show();
    $('.steps').hide();
    $('.equip').hide();
    $('.ing').css({"visibility":"visible"});
    $('#step').css({"border":"none"});
    $('#equip').css({"border":"none"});
    $('.ing').css({"transition":"all .3s ease"})
}

$('#ing').click(function(){
    $('#ing').css({"border-bottom":"2px solid #f1513c"});
    $('.ing').show();
    $('.steps').hide();
    $('.equip').hide();
    $('.ing').css({"visibility":"visible"});
    $('#step').css({"border":"none"});
    $('#equip').css({"border":"none"});
    $('.ing').css({"transition":"all .3s ease"})
});

$('#step').click(function(){
    $('#step').css({"border-bottom":"2px solid #f1513c"});
    $('.ing').hide();
    $('.steps').show();
    $('.equip').hide();
    $('#ing').css({"border":"none"});
    $('#equip').css({"border":"none"});
    $('.steps').css({"transition":"all .3s ease"})
});

$('#equip').click(function(){
    $('#equip').css({"border-bottom":"2px solid #f1513c"});
    $('.ing').hide();
    $('.steps').hide();
    $('.equip').show();
    $('#ing').css({"border":"none"});
    $('#step').css({"border":"none"});
    $('.equip').css({"transition":"all .3s ease"})
});