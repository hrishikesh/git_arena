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
        var currentHref = $(this).attr('href');
        $('.tabWrap li a').removeClass('activeTab');
        $(this).addClass('activeTab');
        $('.tabContent').removeClass('show').addClass('hide');
        $(currentHref).removeClass('hide').addClass('show');
    });

    /* graph charts */
    $('#detailChart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Git commits rate per user'
        },
        subtitle: {
            text: 'Github.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Commits Rate'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Anamika',
            data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

        }, {
            name: 'Vikas',
            data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

        }, {
            name: 'Harshal',
            data: [48, 38, 39, 41, 47, 48, 59, 59, 52, 65, 59, 51]

        }, {
            name: 'Hrishikesh',
            data: [42, 33, 34, 39, 52, 75, 57, 60, 47, 39, 46, 51]

        }]
    });

});