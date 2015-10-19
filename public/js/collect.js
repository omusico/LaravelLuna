$(document).ready(function () {
    setOutTime();
});

function setOutTime() {
    var currenturl = "/collectLotteryData?lottery_type="
    $.ajax({
        type: "get",
        url: currenturl+"jsold",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"beijin",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"fjk3",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"anhui",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"jilin",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"jsnew",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"hubei",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });
    $.ajax({
        type: "get",
        url: currenturl+"nmg",
        dataType: "json",
        cache: false,
        success: function (json) {
            console.log(json);
        }
    });

    setTimeout("setOutTime()",10000);
}