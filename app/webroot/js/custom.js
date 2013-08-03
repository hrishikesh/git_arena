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

    /* right side dropDown */

    $('.dropDownList').hide();
    $('.recentFeeds.openList').siblings('.dropDownList').show();
    $('.recentFeeds').click(function(){
        if(!($(this).hasClass('openList'))) {
            $('.recentFeeds').removeClass('openList');
            $(this).addClass('openList');
            $('.dropDownList').slideUp('slow');
            $(this).siblings('.dropDownList').slideDown('slow');
        } else {
           $(this).removeClass('openList');
            $(this).siblings('.dropDownList').slideUp('slow');
        }
    });

    /* tabing on feeds page */

    $('.tabWrap li a').click(function(){
        $('.tabWrap li a').removeClass('activeTab');
        $(this).addClass('activeTab');
        var currentHref = $(this).attr('href');
        $('.tabContent').removeClass('show').addClass('hide');
        $('currentHref').removeClass('hide').addClass('show');
    });
});