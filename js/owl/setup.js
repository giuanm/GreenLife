$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$("div img").click(function(){
    $("html, body").animate({scrollTop:$("header").offset().top},1000);
})

$("nav ul li:eq(0)").click(function(){
    $("html, body").animate({scrollTop:$("section#quemSomos").offset().top},1000);
})

$("nav ul li:eq(1)").click(function(){
    $("html, body").animate({scrollTop:$("section#pqReciclar").offset().top},1000);
})

$("nav ul li:eq(2)").click(function(){
    $("html, body").animate({scrollTop:$("section#comoFazer").offset().top},1000);
})

$("nav ul li:eq(3)").click(function(){
    $("html, body").animate({scrollTop:$("section#quemContatar").offset().top},1000);
})