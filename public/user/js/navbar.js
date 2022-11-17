
//_________________drop Pages list at Nav____________
let Pages = document.querySelector('.Pages');
let menu = document.querySelector('.menu');

Pages.addEventListener('click',function(){
    $(".menu").slideDown(300);
})
menu.addEventListener('mouseleave',function(){
    $(".menu").slideUp(300);
})


//_________________drop Pages list at Nav____________
let Pages1 = document.querySelector('.Contact');
let menu1 = document.querySelector('.menu1');

Pages1.addEventListener('click',function(){
    $(".menu1").slideDown(300);
})
menu1.addEventListener('mouseleave',function(){
    $(".menu1").slideUp(300);
})



