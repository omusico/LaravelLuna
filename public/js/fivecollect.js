$(document).ready(function () {
    //setOutTime();
});

function setOutTime() {
    var currenturl = "/collectLotteryData?lottery_type="
    $.ajax({
        type: "get",
        url: currenturl+"sdfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"gdfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"shfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"jxfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"zjfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"cqfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"liaoningfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"hljfive",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });

    setTimeout("setOutTime()",30000);
}