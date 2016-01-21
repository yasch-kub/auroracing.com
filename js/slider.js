$(document).ready(function(){

    var num = 4;

    $('#slider .fa-angle-right').click(function(event){

        var lastNum = $("#containerPhoto").children().length;

        var n = 4;
        if (num + 4 > lastNum)
            n = lastNum - num;

        num += n;
        $("#containerPhoto").animate({
            marginLeft: '-=' + n * 25 + '%'
        }, 500);
        console.log(lastNum, num, n);
    });

    $('#slider .fa-angle-left').click(function(event){
        var n = 4;
        if (num - 4 < 4)
            n = num - 4;

        num -= n;
        $("#containerPhoto").animate({
            marginLeft: '+=' + n * 25 + '%'
        }, 500)
        console.log(num, n);
    });
});