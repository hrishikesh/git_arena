$(document).ready(function(){
    var imgMale = $('.imgMale').position();
    var imgGroup = $('.imgGroup').position();
    var imgGirl = $('.imgGirl').position();

    console.log(imgMale, imgGroup, imgGirl);
//    $('.imgGitUsers').hide();

    $('.loginBox').hide();
    setTimeout(function(){
        $('.loginBox').fadeIn('slow');
    },500);
    setTimeout(function(){
        $('.imgGit').animate({
            width: 440
        },1000);
        $('.imgGroup').animate({
            marginLeft: 70,
            marginTop: 0
        },1000)
        $('.imgGitUsers').animate({
            opacity: 1
        },1000);
    },1000);
});