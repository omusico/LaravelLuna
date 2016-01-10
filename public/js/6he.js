var ReFlashSecond;
var SysSecond = 0;

var pls = "合单双,单双,大小,色波";//需要获取的赔率玩法 
var nowZWF = "特码B";
var nowWei = "特码";

var XiaoNums;
var lianmatype = "直选";

var ReFlashSecond = window.setInterval(SetRemainTime, 1000);


//页面初始化
$(document).ready(function () {
    //$('#QuickBar').dialog({
    //    autoOpen: true,
    //    resizable: false,
    //    width: 200,
    //    draggable: true,
    //    position: ['right', 'top']
    //});
    var quickbar = $('#QuickBar').parent();
    quickbar.css("top", 280);
    quickbar.css("left", $(window).width() - quickbar.outerWidth(true));
    //$("#allbetarea").tabs();
    $("#tabs").show();
    //$(".game_list_bar .radioset_tm").buttonset();
    //$(".game_list_bar .radioset_sx").buttonset();
    //$(".game_list_bar .radioset_lm").buttonset();
    //$(".game_list_bar .radioset_zxbz").buttonset();

    buildBall();
    initXiaoNums();
    addClicks();

    //initGame(GameEnter);
    //setTimeout(function () { getLastResult(ResultEnter); }, 2000);
    //setTimeout(function () { getSYED(); }, 1000);


    initWf($("#TM ul li a").get(0));


});
//将时间减去1秒，计算天、时、分、秒 
function SetRemainTime() {
    if (SysSecond > 0) {
        var second = Math.floor(SysSecond % 60);             // 计算秒     
        var minite = Math.floor((SysSecond / 60) % 60);      //计算分 
        var hours = Math.floor(SysSecond / 60 / 60);
        if (second < 10) {
            second = "0" + second
        }
        if (minite < 10) {
            minite = "0" + minite
        }
        SysSecond = SysSecond - 1;
        $("#reciprocal").html(hours + ":" + minite + ":" + second);
    } else {

        //block("封盘中");

        if (SysSecond == 0)
        // initGame(GameEnter);
            SysSecond = SysSecond - 1;

    }
}

function buildBall() {
    var lmball = "";

    for (var num = 1; num <= 49; num++) {
        var strnum = num;
        if (num < 10)
            strnum = "0" + num;

        lmball += '<a href="javascript:void(0);" class="lm_num_' + num + '"  tp2="' + strnum + '"><span>' + strnum + '</span></a> ';
    }
    $("#LM_Ball").append(lmball);
    $("#DT_DM").append(lmball);
    $("#DTSB_DM").append(lmball);
    $("#DT_TM").append(lmball);
    $("#DTSX_DM").append(lmball);
    $("#ZXBZ_Ball").append(lmball);
}


//取上期结果
function ResultEnter(str) {


    var result = $.parseJSON(str);
    if (!result.Success) {
        //showMassage(result.Massage);
        return;
    }
    $("#lastResultTerm").html(result.Data.DropDate);

    $("#d_ball1").attr("class", "div_ball_" + result.Data.num1).html(result.Data.num1);
    $("#d_ball2").attr("class", "div_ball_" + result.Data.num2).html(result.Data.num2);
    $("#d_ball3").attr("class", "div_ball_" + result.Data.num3).html(result.Data.num3);
    $("#d_ball4").attr("class", "div_ball_" + result.Data.num4).html(result.Data.num4);
    $("#d_ball5").attr("class", "div_ball_" + result.Data.num5).html(result.Data.num5);
    $("#d_ball6").attr("class", "div_ball_" + result.Data.num6).html(result.Data.num6);
    $("#d_ball7").attr("class", "div_ball_" + result.Data.num7).html(result.Data.num7);
}

function GameEnter(str) {


    var result = $.parseJSON(str);
    if (!result.Success) {
        showMassage(result.Massage);
        setTimeout(function () {
            initGame(GameEnter);
        }, 5000);
        return;
    }
    Current_Term = result.Data.DropDate;
    var IsOpen = result.Data.IsOpen;
    var CloseTime = result.Data.CloseTime;
    var CloseSecond = result.Data.CloseSecond;

    if (IsOpen)//正开盘 
    {
        SysSecond = CloseSecond; //这里获取倒计时的起始时间

        $("#memRound").html(Current_Term);
        $("#openingTimer_LOCALTIME").html(CloseTime);
        initPL();
        unBlock();
        getThisTermBet();
    } else //未开盘 
    {
        Current_Term = "";
        //block("封盘中");
        //$("#memRound").html("未开放下注");
        //$("#openingTimer_LOCALTIME").html("封盘中");

        setTimeout(function () {
            initGame(GameEnter);
        }, 60000);


    }


}
function addClicks() {
    $(".game_list_bar label").unbind('click').click(function () {
        $('#QuickBar').dialog("close");
        initWf(this);
    });
    $("#Content_TM .game_list_bar label").unbind('click').click(function () {
        $('#QuickBar').dialog("close");
        var wei = $(this).attr("wei");
        //if (wei == "半波") {
        //    $("#HKMS-NUM .banball").show();
        //    $("#HKMS-NUM .ball").hide();
        //    $(".content_right #HKMS-DSDX,.content_right #HKMS-COR").hide();
        //}
        //else {
        //    $("#HKMS-NUM .banball").hide();
        //    $("#HKMS-NUM .ball").show();
        //    $(".content_right #HKMS-DSDX,.content_right #HKMS-COR").show();
        //}
        if (wei === "7" || wei === "7B") {
            $("#tema_type").show();
            $("#btnksms").click();
        } else {
            $("#tema_type").hide();
            $("#tm_ybms").show();
            $("#tm_ksms").hide();
        }
        initWf(this);
    });
    $("#SX ul li a").unbind('click').click(function () {
        initWf(this);
    });
    $("#TM ul li a").unbind('click').click(function () {
        //$('#QuickBar').dialog("close");
        var wei = $(this).attr("wei");
        if (wei === "7" || wei === "7B") {
            $("#tema_type").show();
            $("#QuickBar").show();
            $("#btnksms").click();
        } else {
            $("#tema_type").hide();
            $("#QuickBar").hide();
            $("#tm_ybms").show();
            $("#tm_ksms").hide();
        }
        initWf(this);
    });
    $(".content_left .ball a").unbind('click').bind("click", function () {
        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $(".content_right a").unbind('click').bind("click", function () {
        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $("#Content_SX .xiao a").unbind('click').bind("click", function () {

        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $("#Content_SX  .zhongxiao a").unbind('click').bind("click", function () {

        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $("#Content_SX  .weixiao a").unbind('click').bind("click", function () {

        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $("#Content_SX  .qisebo a").unbind('click').bind("click", function () {

        addToBetList($(this).attr("tp3"), $(this).attr("tp2"), $(this).attr("rate"));
    });
    $("#lianxiao_type li").unbind('click').bind("click", function () {

        initLianxiao($(this).attr("wf"));
        singleSelected(this);
    });
    $("#lianwei_type li").unbind('click').bind("click", function () {

        initLianwei($(this).attr("wf"));
        singleSelected(this);
    });
    $("#duoxiao_type li").unbind('click').bind("click", function () {

        initDuoxiao($(this).attr("wf"));
        singleSelected(this);
    });
    $("#tema_type li").unbind('click').bind("click", function () {
        var disid = $(this).attr("disid");
        $(".tm_ms").hide();
        $("#" + disid).show();
        //todo fixt this
        //if (disid === "tm_ksms")
        //    $('#QuickBar').dialog("open");
        //else
        //    $('#QuickBar').dialog("close");
        singleSelected(this);
    });
    $(".lianxiao  a").unbind('click').bind("click", function () {
        toggleSelected(this);
    });
    $(".lianwei  a").unbind('click').bind("click", function () {
        toggleSelected(this);
    });
    $(".duoxiao  a").unbind('click').bind("click", function () {
        duoxiaoClick(this);
    });
    $("#LM_Ball  a").unbind('click').bind("click", function () {

        toggleSelected(this);
    });
    $("#ZXBZ_Ball  a").unbind('click').bind("click", function () {

        toggleSelected(this);
    });
    $("#SXDP  a").unbind('click').bind("click", function () {

        toggleSelected(this);
    });

    $("#DTSB_DM  a").unbind('click').bind("click", function () {

        dtsb_dmClick(this);
    });
    $("#DTSB_TM  a").unbind('click').bind("click", function () {

        toggleSingleSelected(this);
    });
    $("#WSDP  a").unbind('click').bind("click", function () {

        toggleSelected(this);
    });
    $("#XCWS  a").unbind('click').bind("click", function () {

        toggleSingleSelected(this);
    });
    $("#btnlianxiao").unbind('click').bind("click", function () {

        addToBetList_lianxiao();
    });
    $("#btnlianwei").unbind('click').bind("click", function () {
        addToBetList_lianwei();
    })
    $("#btnduoxiao").unbind('click').bind("click", function () {

        addToBetList_duoxiao();
    });
    $("#btnksmstobet,#btn_bet").unbind('click').bind("click", function () {
        addToBetList_ksms();
    });
    $("#btnlianma").unbind('click').bind("click", function () {

        addToBetList_LM();
    });
    $("#btnZXBZ").unbind('click').bind("click", function () {

        addToBetList_ZXBZ();
    });

    $("#lianma_type  li").unbind('click').bind("click", function () {
        onLianmaTypeChange(this);
        singleSelected(this);
    });

    $("#DT_DM  a").unbind('click').bind("click", function () {
        dt_dmClick(this);

    });
    $("#DT_TM  a").unbind('click').bind("click", function () {
        dt_tmClick(this);

    });
    $("#DTSX_TM  a").unbind('click').bind("click", function () {

        dtsx_tmClick(this);
    });
    $("#DTSX_DM  a").unbind('click').bind("click", function () {

        dtsx_dmClick(this);
    });
    $("#QuickMenu  input").unbind('click').bind("click", function () {

        quickInput(this);
    });


}
function block(msg) {
    if (!blocked) {
        $(".content").block({message: msg});
        blocked = true;
    }
}
function unBlock() {
    $(".content").unblock();
    blocked = false;
}
function gamebarClick(id) {

    $("#" + id + " .game_list_bar  label").get(0).click();
}
function initWf(obj) {

    var wei = $(obj).attr("wei");
    var grp = $(obj).attr("grp");
    if (grp)
        $('#Content_LM .' + grp).hide(100);
    else
        $('#lianma_type li').show(100);

    setGameContentDisplay(wei);
    pls = wei;
    switch (wei) {
        case "1":
        case "2":
        case "3":
        case "4":
        case "5":
        case "6":
            $("#HKMS-DSOE a").attr("wf", "合单双");
            nowWei = "平码" + wei;
            nowZWF = "平" + wei + "特";
            //pls = getPLS();
            pls = wei;
            initTP3();
            initPL();
            break;
        case "7":
            $("#HKMS-DSOE a").attr("wf", "合码单双");
            //pls = "合码单双,合码大小,单双,大小,色波";
            nowWei = "特码";
            nowZWF = "特码A";
            pls = "TMA";
            initTP3();
            initPL();
            break;
        case "7B":
            $("#HKMS-DSOE a").attr("wf", "合码单双");
            //pls = "特码,特码合码单双,特码合码大小,特码单双,特码大小,特码色波";
            pls = "TMA";
            nowWei = "特码";
            nowZWF = "特码B";
            initTP3();
            initPL();
            break;
        case "平码":
            nowWei = "平码";
            nowZWF = "平码";
            pls = "PM";
            initTP3();
            initPL();
            break;
        case "特码生肖":
        case "总肖":
            nowWei = wei;
            nowZWF = wei;
            pls = nowZWF;

            initTP3_SX();
            initPL();
            break;
        case "一肖[中]":
            nowWei = wei;
            nowZWF = wei;
            pls = wei + ",总肖,总肖单双,正特尾数";

            initTP3_SX();
            initPL();
            break;
        case "连尾":
            initLianwei("二尾连");
            break;
        case "正肖":
            nowWei = wei;
            nowZWF = wei;
            pls = wei + ",七色波";

            initTP3_SX();
            initPL();
            break;
        case "半波":
            nowWei = wei;
            nowZWF = wei;
            //pls = wei + "单双," + wei + "大小";
            pls = "BANBO";
            $(".banball a label").html("");
            initBANBO();
            initPL();
            break;
        case "连肖":
            initLianxiao("二肖碰");
            break;
        case "多肖":
            initDuoxiao("多肖中");
            break;
        case "四全中":
        case "三全中":
        case "二全中":
        case "特串":
            nowWei = wei;
            nowZWF = wei;
            pls = wei;
            initPL();
            break;
        case "二中特":
            nowWei = wei;
            nowZWF = wei;
            pls = "二中特中特,二中特中二";

            initPL();
            break;
        case "三中二":
            nowWei = wei;
            nowZWF = wei;
            pls = "三中二中二,三中二中三";
            initPL();
            break;

        default:
            nowWei = wei;
            nowZWF = wei;
            pls = wei;
            initPL();
            break;

    }

}
function setGameContentDisplay(wei) {

    switch (wei) {
        case "1":
        case "2":
        case "3":
        case "4":
        case "5":
        case "6":
        case "7":
        case "7B":
            $(".content_left").show(100);
            $(".content_right").show(100);
            $("#HKMS-NUM .banball").hide();
            $("#HKMS-NUM .ball").show();
            $(".content_right #HKMS-DSDX,.content_right #HKMS-COR").show();
            $(".content_right #HKMS-BANBO").hide();
            break;
        case "平码":
            $(".content_left").show(100);
            $(".content_right").hide(100);
            break;
        case "半波":
            $("#HKMS-NUM .banball").show();
            $("#HKMS-NUM .ball").hide();
            $(".content_right #HKMS-DSDX,.content_right #HKMS-COR").hide();
            $(".content_right #HKMS-BANBO").show();
            break;
        case "特码生肖":
            $(".duoxiao").hide(100);
            $(".xiao").show(100);
            $(".zhongxiao").hide(100);
            $(".lianxiao").hide(100);
            $(".qisebo").hide(100);
            $(".lianwei").hide(100);
            break;
        case "正肖":
            $(".duoxiao").hide(100);
            $(".lianxiao").hide(100);
            $(".zhongxiao").hide(100);
            $(".xiao").show(100);
            $(".qisebo").show(100);
            $(".lianwei").hide(100);
            break;
        case "一肖[中]":
            $(".duoxiao").hide(100);
            $(".lianxiao").hide(100);
            $(".qisebo").hide(100);
            $(".xiao").show(100);
            $(".zhongxiao").show(100);
            $(".lianwei").hide(100);
            break;
        case "正特尾数":
            $(".duoxiao").hide(100);
            $(".lianxiao").hide(100);
            $(".qisebo").hide(100);
            $(".xiao").hide(100);
            $(".zhongxiao").hide(100);

            $(".lianwei").hide(100);
            break;
        case "连肖":

            $(".xiao").hide(100);
            $(".zhongxiao").hide(100);
            $(".qisebo").hide(100);
            $(".lianxiao").show(100);
            $(".duoxiao").hide(100);
            $(".lianwei").hide(100);
            break;
        case "连尾":

            $(".xiao").hide(100);
            $(".zhongxiao").hide(100);
            $(".qisebo").hide(100);
            $(".lianxiao").hide(100);
            $(".duoxiao").hide(100);
            $(".lianwei").show(100);
            break;
        case "多肖":

            $(".xiao").hide(100);
            $(".zhongxiao").hide(100);
            $(".qisebo").hide(100);
            $(".lianxiao").hide(100);
            $(".duoxiao").show(100);
            $(".lianwei").hide(100);
            break;
        case "四全中":
        case "三全中":
        case "二全中":
        case "特串":
        case "二中特":
        case "三中二":
            $("#lianma_type  li").get(0).click();

            $("#Content_LM a").removeClass("selected");
            break;
        default:
            $("#Content_ZXBZ a").removeClass("selected");
            break;
    }

}
function initLianwei(wf) {
    nowWei = wf;
    nowZWF = wf;
    pls = nowZWF;
    initTP3_lianwei();
    initPL();
    clearSelected();
}
function initXiaoNums() {
    if (XiaoNums) {
        XiaoNums = XiaoNums.replace(/&#39;/g, "'");
        var json = eval("(" + XiaoNums + ")");
        $.each(json, function (idx, val) {
            $(".xiaonum a[tp2='" + val.xiao + "'] span").html(val.nums);
        });
    }
}
function initLianxiao(wf) {

    nowWei = wf;
    nowZWF = wf;
    pls = nowZWF;
    initTP3_lianxiao();

    initPL();
    clearSelected();
}
//todo when do duoxiao need to be fix
function initDuoxiao(wf) {
    nowWei = wf;
    nowZWF = wf;
    pls = nowZWF;
    $(".duoxiao .lm_name").html(wf);
    $(".duoxiao .lm_pl").html("0");
    $(".duoxiao a ").removeClass("selected");
    var dsrates = $("#dxrates");
    if (dsrates.html() == "") {
        block("");
        var data = {"GameType": getGameType(), "WF": "多肖", "t": new Date()};

        $.ajax({
            type: "post",
            dataType: "text",
            url: "/GameInit/GetOdds",
            data: data,
            async: true,
            error: function (dt) {
                //setTimeout(function () { getpl() }, 1000);
            },
            success: function (dt) {
                unBlock();
                var pls = $.parseJSON(dt);
                if (!pls.Success) {
                    showMassage(pls.Massage);
                    return;
                }
                var ratehtml = "";
                var ratecount = 0;
                var jobj = $.parseJSON(pls.Data);
                for (var i = 0; i < jobj.length; i++) {
                    var rateinfo = jobj[i];
                    var tp2 = rateinfo.tp2;
                    var tp3 = rateinfo.tp3;
                    var rate = rateinfo.rate;
                    var rowid = encodeURI(tp3 + tp2).replace(/%/g, "").replace(/\*/g, "").replace(/,/g, "");
                    ratehtml += "<li id='" + rowid + "'>" + rate + "</li>";
                    ratecount += rate * 1;

                }
                dsrates.attr("ratecount", ratecount);
                dsrates.html(ratehtml);
            }
        });
    }

}

function getPLS() {
    return nowWei + pls.replace(/,/g, "," + nowWei) + "," + nowZWF;

}
function initTP3() {
    $("#ksms_ball input").attr("TP3", nowZWF);
    $("#HKMS-NUM a").attr("TP3", nowZWF);
    $(".content_right a").each(function () {
        //var tp3 = nowWei + $(this).attr("wf");
        var tp3 = nowZWF ;
        $(this).attr("TP3", tp3);

    });
    $(".content_left a label").html("0");

}
function initBANBO() {
    $("#HKMS-BANBO a").each(function () {
        //var tp3 = nowWei + $(this).attr("wf");
        var tp3 = nowZWF;
        $(this).attr("TP3", tp3);
    });
}
function initTP3_SX() {
    $(".xiao a").attr("TP3", nowZWF);

    $("#Content_SX a label").html("0");

}
function initTP3_lianxiao() {
    $(".lianxiao a").attr("TP3", nowZWF);

    $(".lianxiao a label").html("0");
}
function initTP3_lianwei() {
    $(".lianwei a").attr("TP3", nowZWF);

    $(".lianwei a label").html("0");
}
//取赔率
function initPL() {

    $("#cc").append("<div class='jloading datagrid-mask' style='display:block;z-index:9999'></div>");
    $("#cc").append("<div class=\"jloading datagrid-mask-msg\" style=\"display:block;left:50%;top: 50%\">正在加载赔率，请稍候</div>");
    //$(".right_content").block({ message: "正在获取赔率..." });
    var data = {"GameType": getGameType(), "WF": pls};

    $.ajax({
        type: "post",
        dataType: "text",
        url: "/get6heodds",
        data: data,
        async: true,
        error: function (dt) {

        },
        success: function (dt) {
            //dt = JSON.parse(dt);
            $("#cc > div.jloading").remove();
            bindpl(dt);
            //$(".right_content").unblock();
        }
    });


}
//绑定赔率
function bindpl(obj) {

    var jobj = $.parseJSON(obj);
    //if (!pls.Success) {
    //    showMassage(pls.Massage);
    //    return;
    //}
    //if (!pls.Data) {
    //    //showMassage("获取赔率超时,请重试");
    //    $(".right_content").unblock();
    //    return;
    //}
    //var jobj = $.parseJSON(pls.Data);

    var lmwf = ",四全中,三全中,二全中,特串,二中特,三中二,";
    if (lmwf.indexOf("," + nowZWF + ",") >= 0) {
        bindpl_lm(jobj);
        return;
    }
    var zxbzwf = ",3中一,4中一,5中一,6中一,5不中,6不中,7不中,8不中,9不中,10不中,11不中,12不中,";
    if (zxbzwf.indexOf("," + nowZWF + ",") >= 0) {
        bindpl_zxbz(jobj);
        return;
    }
    var tmwf = ",特码A,特码B,";
    if (tmwf.indexOf("," + nowZWF + ",") >= 0) {
        bindpl_tm(jobj);
        return;
    }

    //for (var i = 0; i < jobj.length; i++) {
    for (var key in jobj) {
        //var rateinfo = jobj[i];
        //var tp2 = rateinfo.tp2;
        //var tp3 = rateinfo.tp3;
        //var rate = rateinfo.rate;
        var tp2 = key;
        var tp3 = nowZWF;
        var rate = jobj[key];

        var taget = $("a[tp3='" + tp3 + "'][tp2='" + tp2 + "']");
        taget.attr("rate", rate);
        $(taget).find("label").html(rate);

    }


}
function bindpl_tm(jobj) {
    //for (var i = 0; i < jobj.length; i++) {
    for (var key in jobj) {
        //var rateinfo = jobj[i];
        //var tp2 = rateinfo.tp2;
        //var tp3 = rateinfo.tp3;
        //var rate = rateinfo.rate;
        var tp2 = key;
        var tp3 = nowZWF;
        var rate = jobj[key];
        if (nowZWF === "特码B" && !isNaN(key)) {
            tp3 = "特码B";
            rate = rate - tbmplus;
        }

        var taget = $("a[tp3='" + tp3 + "'][tp2='" + tp2 + "']");
        taget.attr("rate", rate);
        $(taget).find("label").html(rate);
        var taget2 = $("input[tp3='" + tp3 + "'][tp2='" + tp2 + "']");
        taget2.attr("rate", rate);

        var pllabel = $("label[for='" + taget2.attr('id') + "']").get(1);
        if (pllabel)
            $(pllabel).html(rate);

        if (isNaN(key)) {
            if(key =="单" || key =="双"){
                tp3 ="特码单双";
            }
            if(key =="大" || key =="小"){
                tp3 ="特码大小";
            }
            if(key =="合单" || key =="合双"){
                tp3 ="特码合码单双";
            }
            if(key =="合大" || key =="合小"){
                tp3 ="特码合码大小";
            }
            if(key =="红波" || key =="绿波" || key=="蓝波"){
                tp3 ="特码色波";
            }
            var taget3 = $("input[tp3='" + tp3 + "'][tp2='" + tp2 + "']");
            taget3.attr("rate", rate);

            var pllabel = $("label[for='" + taget3.attr('id') + "']").get(1);
            if (pllabel)
                $(pllabel).html(rate);

        }
    }


}
function bindpl_lm(jobj) {
    var rate = "", rate1 = "", rate2 = "";
    var tp3 = "", tp31 = "", tp32 = "";
    var lmwf = ",二中特,三中二,";

    for (var i = 0; i < jobj.length; i++) {
        var rateinfo = jobj[i];


        if (lmwf.indexOf("," + nowZWF + ",") >= 0) {
            if (rateinfo.tp3 === "二中特中特" || rateinfo.tp3 === "三中二中二") {
                rate1 = rateinfo.rate;
                tp31 = rateinfo.tp3;

            }
            if (rateinfo.tp3 === "二中特中二" || rateinfo.tp3 === "三中二中三") {
                rate2 = rateinfo.rate;
                tp32 = rateinfo.tp3;
            }
            if (rate1 !== "" && rate2 !== "") {
                rate = rate1 + "," + rate2
                tp3 = tp31 + ",  " + tp32;
                break;
            }
        }
        else {
            tp3 = rateinfo.tp3;
            rate = rateinfo.rate;
            break;
        }

    }
    if (tp3 !== nowZWF) {
        var reg = new RegExp(nowZWF, "g");
        tp3 = tp3.replace(reg, "");
    }

    $(".lm_name").html(tp3);
    ;
    $(".lm_pl").html(rate);


}

function bindpl_zxbz(jobj) {
    var rate = "";
    var tp3 = "";


    for (var i = 0; i < jobj.length; i++) {
        var rateinfo = jobj[i];
        tp3 = rateinfo.tp3;
        rate = rateinfo.rate;
        break;


    }

    $(".lm_name").html(tp3);
    ;
    $(".lm_pl").html(rate);


}
//加入到下注列表
function addToBetList_lianxiao() {
    var sx_list = new Array();
    var rate_list = new Array();
    var BetTotle;
    var sx_a = $(".lianxiao .xiaonum  .selected");
    var len = sx_a.length;
    var sxzhArr = new Array();
    var ratezhArr = new Array();
    sx_a.each(function () {
        sx_list.push($(this).attr("tp2"));
        rate_list.push($(this).attr("rate"))

    });


    if (len > 6) {
        showMassage("所选生肖不能超过6位");
        return false;
    }
    switch (nowZWF) {
        case "二肖碰":
            if (len < 2) {
                showMassage("所选生肖不足");
                return false;
            }
            for (var z = 0; z < len - 1; z++) {
                for (var y = z + 1; y < len; y++) {
                    if (z != y) {

                        sxzhArr.push(sx_list[z] + "," + sx_list[y]);
                        var minrate = [rate_list[z], rate_list[y]].sort(function (a, b) {
                            return a - b
                        })[0];
                        ratezhArr.push(minrate);
                    }
                }
            }
            break;
        case "三肖碰":
            if (len < 3) {
                showMassage("所选生肖不足");
                return false;
            }

            for (var k = 0; k < len - 2; k++) {
                for (var z = k + 1; z < len - 1; z++) {
                    for (var y = z + 1; y < len; y++) {
                        if (k != z && k != y && z != y) {

                            sxzhArr.push(sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                            var minrate = [rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                return a - b
                            })[0];
                            ratezhArr.push(minrate);
                        }
                    }
                }


            }
            break;
        case "四肖碰":
            if (len < 4) {
                showMassage("所选生肖不足");
                return false;
            }

            for (var j = 0; j < len - 3; j++) {
                for (var k = j + 1; k < len - 2; k++) {
                    for (var z = k + 1; z < len - 1; z++) {
                        for (var y = z + 1; y < len; y++) {
                            if (j != k && j != z & j != y && k != z && k != y && z != y) {

                                sxzhArr.push(sx_list[j] + "," + sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                                var minrate = [rate_list[j], rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                    return a - b
                                })[0];
                                ratezhArr.push(minrate);
                            }
                        }
                    }
                }

            }


            break;
        case "五肖碰":
            if (len < 5) {
                showMassage("所选生肖不足");
                return false;
            }
            for (var i = 0; i < len - 4; i++) {
                for (var j = i + 1; j < len - 3; j++) {
                    for (var k = j + 1; k < len - 2; k++) {
                        for (var z = k + 1; z < len - 1; z++) {
                            for (var y = z + 1; y < len; y++) {
                                if (i != j && i != k && i != z && i != y && j != k && j != z & j != y && k != z && k != y && z != y) {

                                    sxzhArr.push(sx_list[i] + "," + sx_list[j] + "," + sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                                    var minrate = [rate_list[i], rate_list[j], rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                        return a - b
                                    })[0];
                                    ratezhArr.push(minrate);
                                }
                            }
                        }
                    }

                }

            }

            break;


    }


    $('#betContent').dialog('open');
    for (var i = 0; i < sxzhArr.length; i++) {

        addBETContentRow(nowZWF, sxzhArr[i], sxzhArr[i], ratezhArr[i], 1);

    }

    clearSelected();

}
function addToBetList_lianwei() {
    var sx_list = new Array();
    var rate_list = new Array();
    var BetTotle;
    var sx_a = $(".lianwei .xiaonum  .selected");
    var len = sx_a.length;
    var sxzhArr = new Array();
    var ratezhArr = new Array();
    sx_a.each(function () {
        sx_list.push($(this).attr("tp2"));
        rate_list.push($(this).attr("rate"))

    });


    if (len > 6) {
        showMassage("所选尾数不能超过6位");
        return false;
    }
    switch (nowZWF) {
        case "二尾连":
            if (len < 2) {
                showMassage("所选尾数不足");
                return false;
            }
            for (var z = 0; z < len - 1; z++) {
                for (var y = z + 1; y < len; y++) {
                    if (z != y) {

                        sxzhArr.push(sx_list[z] + "," + sx_list[y]);
                        var minrate = [rate_list[z], rate_list[y]].sort(function (a, b) {
                            return a * 1 < b * 1
                        })[0];
                        ratezhArr.push(minrate);
                    }
                }
            }
            break;
        case "三尾连":
            if (len < 3) {
                showMassage("所选尾数不足");
                return false;
            }

            for (var k = 0; k < len - 2; k++) {
                for (var z = k + 1; z < len - 1; z++) {
                    for (var y = z + 1; y < len; y++) {
                        if (k != z && k != y && z != y) {

                            sxzhArr.push(sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                            var minrate = [rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                return a * 1 < b * 1
                            })[0];
                            ratezhArr.push(minrate);
                        }
                    }
                }


            }
            break;
        case "四尾连":
            if (len < 4) {
                showMassage("所选尾数不足");
                return false;
            }

            for (var j = 0; j < len - 3; j++) {
                for (var k = j + 1; k < len - 2; k++) {
                    for (var z = k + 1; z < len - 1; z++) {
                        for (var y = z + 1; y < len; y++) {
                            if (j != k && j != z & j != y && k != z && k != y && z != y) {

                                sxzhArr.push(sx_list[j] + "," + sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                                var minrate = [rate_list[j], rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                    return a * 1 < b * 1
                                })[0];
                                ratezhArr.push(minrate);
                            }
                        }
                    }
                }

            }


            break;
        case "五尾连":
            if (len < 5) {
                showMassage("所选尾数不足");
                return false;
            }
            for (var i = 0; i < len - 4; i++) {
                for (var j = i + 1; j < len - 3; j++) {
                    for (var k = j + 1; k < len - 2; k++) {
                        for (var z = k + 1; z < len - 1; z++) {
                            for (var y = z + 1; y < len; y++) {
                                if (i != j && i != k && i != z && i != y && j != k && j != z & j != y && k != z && k != y && z != y) {

                                    sxzhArr.push(sx_list[i] + "," + sx_list[j] + "," + sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);
                                    var minrate = [rate_list[i], rate_list[j], rate_list[k], rate_list[z], rate_list[y]].sort(function (a, b) {
                                        return a * 1 < b * 1
                                    })[0];
                                    ratezhArr.push(minrate);
                                }
                            }
                        }
                    }

                }

            }

            break;


    }


    $('#betContent').dialog('open');
    for (var i = 0; i < sxzhArr.length; i++) {

        addBETContentRow(nowZWF, sxzhArr[i], sxzhArr[i], ratezhArr[i], 1);

    }

    clearSelected();

}
function addToBetList_duoxiao() {
    var sx_list = new Array();
    var sx_a = $(".duoxiao .xiaonum  .selected");
    var len = sx_a.length;
    if (len < 1) {
        showMassage("请选择生肖");
        return false;
    }

    if (len > 11) {
        showMassage("所选生肖不能超过11位");
        return false;
    }
    sx_a.each(function () {
        sx_list.push($(this).attr("tp2"));

    });
    var pl = $(".duoxiao .lm_pl").html();
    var tp2 = nowZWF.substring(2) + " " + sx_list.join(",");

    addToBetList("多肖", tp2, pl);


    $(".duoxiao .lm_pl").html("0");
    $(".duoxiao a ").removeClass("selected");

}
function onLianmaTypeChange(tp) {
    lianmatype = $(tp).attr("wei");
    var disid = $(tp).attr("disid");

    $(".lmpanal").hide();
    $("#" + disid).show();


}
function addToBetList_LM() {

    switch (lianmatype) {
        case "直选":
            addToBetList_LM_Ball();
            break;
        case "生肖对碰":
            addToBetList_LM_SXDP();
            break;
        case "尾数对碰":
            addToBetList_LM_WSDP();
            break;
        case "肖串尾数":
            addToBetList_LM_XCWS();
            break;
        case "胆拖":
            addToBetList_LM_DT();
            break;
        case "胆拖色波":
            addToBetList_LM_DTSB();
            break;
        case "胆拖生肖":
            addToBetList_LM_DTSX();
            break;
    }


}
function addToBetList_LM_Ball() {


    var sx_list = new Array();


    var sx_a = $("#LM_Ball .selected");
    var len = sx_a.length;
    if (len > 6) {
        showMassage("选球数不能超过6位");
        return false;
    }
    var sxzhArr = new Array();

    sx_a.each(function () {
        sx_list.push($(this).attr("tp2"));
    });

    //四全中,三全中,二全中,特串,二中特,三中二

    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":
            if (len < 2) {
                showMassage("选球数不足");
                return false;
            }
            for (var z = 0; z < len - 1; z++) {
                for (var y = z + 1; y < len; y++) {
                    if (z != y) {

                        sxzhArr.push(sx_list[z] + "," + sx_list[y]);

                    }
                }
            }
            break;
        case "三中二":
        case "三全中":
            if (len < 3) {
                showMassage("选球数不足");
                return false;
            }

            for (var k = 0; k < len - 2; k++) {
                for (var z = k + 1; z < len - 1; z++) {
                    for (var y = z + 1; y < len; y++) {
                        if (k != z && k != y && z != y) {

                            sxzhArr.push(sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);

                        }
                    }
                }
            }
            break;
        case "四全中":
            if (len < 4) {
                showMassage("选球数不足");
                return false;
            }

            for (var j = 0; j < len - 3; j++) {
                for (var k = j + 1; k < len - 2; k++) {
                    for (var z = k + 1; z < len - 1; z++) {
                        for (var y = z + 1; y < len; y++) {
                            if (j != k && j != z & j != y && k != z && k != y && z != y) {

                                sxzhArr.push(sx_list[j] + "," + sx_list[k] + "," + sx_list[z] + "," + sx_list[y]);

                            }
                        }
                    }
                }

            }
            break;

    }

    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);

    $("#LM_Ball a ").removeClass("selected");

}
function addToBetList_LM_SXDP() {
    var sx_a = $("#SXDP  .selected");
    var len = sx_a.length;
    if (len <= 1) {
        showMassage("对碰生肖数不足 ");
        return false;

    }
    if (len > 2) {
        showMassage("对碰生肖数不能超过2位");
        return false;
    }

    var sx_list = new Array();
    sx_a.each(function () {
        sx_list.push($(this).find("span").html());
    });
    var sx1 = sx_list[0].split(".");
    var sx2 = sx_list[1].split(".");

    var sxzhArr = new Array();
    for (var x = 0; x < sx1.length; x++) {
        for (var y = 0; y < sx2.length; y++) {
            sxzhArr.push(sx1[x] + "," + sx2[y]);
        }
    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#SXDP a").removeClass("selected");

}
function addToBetList_LM_WSDP() {
    var sx_a = $("#WSDP  .selected");
    var len = sx_a.length;
    if (len <= 1) {
        showMassage("对碰数组不足 ");
        return false;

    }
    if (len > 2) {
        showMassage("对碰数组不能超过2位");
        return false;
    }

    var sx_list = new Array();
    sx_a.each(function () {
        sx_list.push($(this).find("span").html());
    });
    var sx1 = sx_list[0].split(",");
    var sx2 = sx_list[1].split(",");

    var sxzhArr = new Array();
    for (var x = 0; x < sx1.length; x++) {
        for (var y = 0; y < sx2.length; y++) {
            sxzhArr.push(sx1[x] + "," + sx2[y]);
        }
    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);

    $("#WSDP a ").removeClass("selected");

}
function addToBetList_LM_XCWS() {
    var sx_a = $("#XCWS  .xiaonum .selected");
    var ws_a = $("#XCWS .weishu .selected");

    if (sx_a.length < 1 || ws_a.length < 1) {
        showMassage("所选数组不足,请在生肖和尾数中各选一组数组! ");
        return false;

    }
    if (sx_a.length > 1 || ws_a.length > 1) {
        showMassage("所选数组超过限制,请在生肖和尾数中各选一组数组! ");
        return false;

    }


    var sx = sx_a.find("span").html().split(".");
    var ws = ws_a.find("span").html().split(",");

    var sxzhArr = new Array();
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":

            for (var z = 0; z < sx.length; z++) {
                for (var y = 0; y < ws.length; y++) {
                    if (sx[z] != ws[y]) {
                        sxzhArr.push(sx[z] + "," + ws[y]);

                    }
                }
            }
            break;
        case "三中二":
        case "三全中":


            for (var k = 0; k < sx.length; k++) {
                for (var z = 0; z < ws.length - 1; z++) {
                    for (var y = z + 1; y < ws.length; y++) {
                        if (sx[k] != ws[z] && sx[k] != ws[y]) {

                            sxzhArr.push(sx[k] + "," + ws[z] + "," + ws[y]);

                        }
                    }
                }
            }
            break;
        case "四全中":


            for (var j = 0; j < sx.length; j++) {
                for (var k = 0; k < ws.length - 2; k++) {
                    for (var z = k + 1; z < ws.length - 1; z++) {
                        for (var y = z + 1; y < ws.length; y++) {
                            if (sx[j] != ws[k] && sx[j] != ws[z] && sx[j] != ws[y]) {

                                sxzhArr.push(sx[j] + "," + ws[k] + "," + ws[z] + "," + ws[y]);

                            }
                        }
                    }
                }

            }
            break;

    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#XCWS a ").removeClass("selected");

}
function addToBetList_LM_DT() {
    var dm_a = $("#DT_DM  .selected");
    var tm_a = $("#DT_TM  .selected");
    if (dm_a.length < 1 || tm_a.length < 1) {
        showMassage("选球数量不符合投注规则");
        return;
    }
    var dm = new Array();
    var tm = new Array();

    dm_a.each(function () {
        dm.push($(this).attr("tp2"));
    });

    tm_a.each(function () {
        tm.push($(this).attr("tp2"));
    });


    var strdm = dm.join(",");
    var sxzhArr = new Array();
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":

            for (var y = 0; y < tm.length; y++) {

                sxzhArr.push(strdm + "," + tm[y]);
            }

            break;
        case "三中二":
        case "三全中":

            if (dm.length == 1) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            } else if (dm.length == 2) {
                if (tm.length < 1) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }

                for (var y = 0; y < tm.length; y++) {
                    sxzhArr.push(strdm + "," + tm[y]);


                }

            }

            break;
        case "四全中":


            if (dm.length == 1) {
                if (tm.length < 3) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var k = 0; k < tm.length - 2; k++) {
                    for (var z = k + 1; z < tm.length - 1; z++) {
                        for (var y = z + 1; y < tm.length; y++) {


                            sxzhArr.push(strdm + "," + tm[k] + "," + tm[z] + "," + tm[y]);


                        }
                    }
                }
            } else if (dm.length == 2) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            }
            else if (dm.length == 3) {
                if (tm.length < 1) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var y = 0; y < tm.length; y++) {

                    sxzhArr.push(strdm + "," + tm[y]);
                }
            }


            break;

    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#DT a ").removeClass("selected");
    $("#DT_TM a ").unbind('click').bind("click", function () {
        dt_tmClick(this);
    });
    $("#DT_DM a ").unbind('click').bind("click", function () {
        dt_dmClick(this);
    });

}
function addToBetList_LM_DTSB() {
    var dm_a = $("#DTSB_DM  .selected");
    var tm_a = $("#DTSB_TM  .selected");
    if (dm_a.length < 1 || tm_a.length < 1) {
        showMassage("选球数量不符合投注规则");
        return;
    }
    var dm = new Array();

    var tm = tm_a.attr("title").split(",");
    dm_a.each(function () {
        dm.push($(this).attr("tp2"));
    });


    var strdm = dm.join(",");
    var sxzhArr = new Array();
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":

            for (var y = 0; y < tm.length; y++) {
                if (dm[0] !== tm[y])
                    sxzhArr.push(strdm + "," + tm[y]);
            }

            break;
        case "三中二":
        case "三全中":

            if (dm.length == 1) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        if (dm[0] !== tm[z] && dm[0] !== tm[y])
                            sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            } else if (dm.length == 2) {
                if (tm.length < 1) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }

                for (var y = 0; y < tm.length; y++) {
                    if (dm[0] !== tm[y] && dm[1] !== tm[y])
                        sxzhArr.push(strdm + "," + tm[y]);


                }

            }

            break;
        case "四全中":


            if (dm.length == 1) {
                showMassage("胆码数量最少需要2位");
                return;
                //if (tm.length < 3) {
                //    showMassage("选球数量不符合投注规则");
                //    return;
                //}
                //for (var k = 0; k < tm.length - 2; k++) {
                //    for (var z = k + 1; z < tm.length - 1; z++) {
                //        for (var y = z + 1; y < tm.length ; y++) {
                //            if (dm.indexOf(tm[k]) < 0 && dm.indexOf(tm[z]) < 0 && dm.indexOf(tm[y]) < 0) 
                //                sxzhArr.push(strdm + "," + tm[k] + "," + tm[z] + "," + tm[y]); 
                //        }
                //    }
                // }
            } else if (dm.length == 2) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        if (dm.indexOf(tm[z]) < 0 && dm.indexOf(tm[y]) < 0)

                            sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            }
            else if (dm.length == 3) {
                if (tm.length < 3) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var y = 0; y < tm.length; y++) {
                    if (dm.indexOf(tm[y]) < 0)

                        sxzhArr.push(strdm + "," + tm[y]);
                }
            }


            break;

    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#DTSB a ").removeClass("selected");


}
function addToBetList_LM_DTSX() {
    var dm_a = $("#DTSX_DM  .selected");
    var tm_a = $("#DTSX_TM  .selected");
    if (dm_a.length < 1 || tm_a.length < 1) {
        showMassage("选球数量不符合投注规则");
        return;
    }
    var dm = new Array();

    var tm = new Array();
    dm_a.each(function () {
        dm.push($(this).attr("tp2"));
    });
    tm_a.each(function () {
        $.each($(this).find("span").html().split("."), function (idx, val) {
            tm.push(val);
        });
    });


    var strdm = dm.join(",");
    var sxzhArr = new Array();
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":

            for (var y = 0; y < tm.length; y++) {
                if (dm[0] !== tm[y])
                    sxzhArr.push(strdm + "," + tm[y]);
            }

            break;
        case "三中二":
        case "三全中":

            if (dm.length == 1) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        if (dm[0] !== tm[z] && dm[0] !== tm[y])
                            sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            } else if (dm.length == 2) {
                if (tm.length < 1) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }

                for (var y = 0; y < tm.length; y++) {
                    if (dm[0] !== tm[y] && dm[1] !== tm[y])
                        sxzhArr.push(strdm + "," + tm[y]);


                }

            }

            break;
        case "四全中":


            if (dm.length == 1) {
                if (tm.length < 3) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var k = 0; k < tm.length - 2; k++) {
                    for (var z = k + 1; z < tm.length - 1; z++) {
                        for (var y = z + 1; y < tm.length; y++) {

                            if (dm[0] !== tm[k] && dm[0] !== tm[z] && dm[0] !== tm[y])
                                sxzhArr.push(strdm + "," + tm[k] + "," + tm[z] + "," + tm[y]);


                        }
                    }
                }
            } else if (dm.length == 2) {
                if (tm.length < 2) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var z = 0; z < tm.length - 1; z++) {
                    for (var y = z + 1; y < tm.length; y++) {
                        if (dm[0] !== tm[z] && dm[1] !== tm[y] && dm[0] !== tm[z] && dm[1] !== tm[y])
                            sxzhArr.push(strdm + "," + tm[z] + "," + tm[y]);


                    }
                }
            }
            else if (dm.length == 3) {
                if (tm.length < 3) {
                    showMassage("选球数量不符合投注规则");
                    return;
                }
                for (var y = 0; y < tm.length; y++) {
                    if (dm[0] !== tm[y] && dm[1] !== tm[y] && dm[2] !== tm[y])
                        sxzhArr.push(strdm + "," + tm[y]);
                }
            }


            break;

    }


    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#DTSX a ").removeClass("selected");


}

function addToBetList_ZXBZ() {

    var min = nowZWF.replace(/中一/g, "").replace(/不中/g, "");
    min = min * 1;

    var sx_a = $("#ZXBZ_Ball .selected");
    var len = sx_a.length;
    if (len < min) {
        showMassage("选球数不能小于" + min + "位");
        return false;
    }
    switch (min) {
        case 3:
        case 4:
            if (len > 8) {
                showMassage("选球数请勿大于 8  位");
                return false;
            }
            break;
        case 6:
        case 5:
            if (len > (min + 3)) {
                showMassage("选球数请勿大于 " + (min + 3) + "  位");
                return false;
            }
            break;
        case 7:
        case 8:
        case 9:
        case 10:
        case 11:
        case 12:
            if (len > (min + 2)) {
                showMassage("选球数请勿大于 " + (min + 2) + "  位");
                return false;
            }
            break;

    }


    var sx_list = new Array();
    sx_a.each(function () {
        sx_list.push($(this).attr("tp2"));
    });

    var sxzhArr = getZH(sx_list, min);

    var pl = $(".lm_pl").html();
    addToBETContentByArray(nowZWF, sxzhArr, pl, 1, 0);


    $("#ZXBZ_Ball a ").removeClass("selected");

}
function addToBetList_ksms() {


    var inputs = $("#tm_ksms input");
    //if (inputs.length == 0) {
    //    return;
    //}

    //var inputs;
    //inputsall.each(function () {
    //
    //    var je = $(this).val();
    //    if (je !== "") {
    //        inputs.push(this);
    //    }
    //
    //});

    var nan;
    inputs.each(function () {

        var je = $(this).val();
        if (je !== "") {
            if (isNaN(je))
                nan = $(this);

        }

    });
    if (nan) {

        alert("输入的金额中存在无效数字,请重新输入.");
        nan.focus();
        nan.select();
        return;
    }

    //$('#betContent').dialog('open');
    inputs.each(function () {
        var tp2 = $(this).attr("tp2");
        var tp3 = $(this).attr("tp3");
        var rate = $(this).attr("rate");
        var je = $(this).val();
        if (je !== "") {
            addBETContentRow2(tp3, tp2, tp2, rate, 1, je);
            console.log(tp3, tp2, tp2, rate, 1, je);

        }

    });

    //allBetky(); //总可赢金额
    //allBetJe();
    $("#tm_ksms input ").val("");

}

function dt_dmClick(obj) {
    var tp2 = $(obj).attr("tp2");
    var tm = $("#DT_TM a[tp2='" + tp2 + "']");
    if ($(obj).hasClass("selected")) {
        tm.unbind('click').bind("click", function () {
            dt_tmClick(this);
        });
        toggleSelected(obj);
        return;
    }
    var len = $("#DT_DM .selected").length;
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":
            if (len >= 1) {
                showMassage("胆码不能超过1位");
                return false;
            }


        case "三中二":
        case "三全中":
            if (len >= 2) {
                showMassage("胆码不能超过2位");
                return false;
            }

            break;
        case "四全中":
            if (len >= 3) {
                showMassage("胆码不能超过3位");
                return false;
            }
            break;

    }

    tm.unbind("click");

    toggleSelected(obj);


}
function dt_tmClick(obj) {
    var tp2 = $(obj).attr("tp2");
    var dm = $("#DT_DM a[tp2='" + tp2 + "']");
    if ($(obj).hasClass("selected")) {
        dm.unbind('click').bind("click", function () {
            dt_dmClick(this);
        });
        toggleSelected(obj);
        return;
    }

    var len = $("#DT_TM .selected").length;
    switch (nowZWF) {

        case "三中二":
        case "三全中":
            var dmlen = $("#DT_DM .selected").length;

            if (dmlen === 1 && len >= 8) {
                showMassage("拖码不能超过8位");
                return false;
            }

            break;
        case "四全中":
            var dmlen = $("#DT_DM .selected").length;

            if (dmlen === 1 && len >= 8) {
                showMassage("拖码不能超过8位");
                return false;
            }
            if (dmlen === 2 && len >= 10) {
                showMassage("拖码不能超过10位");
                return false;
            }

            break;

    }


    dm.unbind("click");

    toggleSelected(obj);
    return true;


}
function dtsb_dmClick(obj) {

    if ($(obj).hasClass("selected")) {

        toggleSelected(obj);
        return;
    }
    var len = $("#DTSB_DM .selected").length;
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":
            if (len >= 1) {
                showMassage("胆码不能超过1位");
                return false;
            }

        case "三中二":
        case "三全中":

            if (len >= 2) {
                showMassage("胆码不能超过2位");
                return false;
            }

            break;
        case "四全中":


            if (len >= 3) {
                showMassage("拖码不能超过3位");
                return false;
            }
            break;

    }


    toggleSelected(obj);


}
function dtsx_dmClick(obj) {

    if ($(obj).hasClass("selected")) {

        toggleSelected(obj);
        return;
    }
    var len = $("#DTSX_DM .selected").length;
    switch (nowZWF) {
        case "二全中":
        case "特串":
        case "二中特":
            if (len >= 1) {
                showMassage("胆码不能超过1位");
                return false;
            }


        case "三中二":
        case "三全中":
            if (len >= 2) {
                showMassage("胆码不能超过2位");
                return false;
            }

            break;
        case "四全中":
            if (len >= 3) {
                showMassage("胆码不能超过3位");
                return false;
            }
            break;

    }

    toggleSelected(obj);

}
function dtsx_tmClick(obj) {
    if ($(obj).hasClass("selected")) {

        toggleSelected(obj);
        return;
    }
    var len = $("#DTSX_TM .selected").length;
    var dmlen = $("#DTSX_DM .selected").length;
    switch (nowZWF) {

        case "三中二":
        case "三全中":


            if (dmlen === 1 && len >= 3) {
                showMassage("拖码不能超过3组");
                return false;
            }

            break;
        case "四全中":
            if (dmlen === 1 && len >= 2) {
                showMassage("拖码不能超过2组");
                return false;
            }
            if (dmlen === 2 && len >= 3) {
                showMassage("拖码不能超过3组");
                return false;
            }

            break;

    }

    toggleSelected(obj);
    return true;


}

Number.prototype.toFixed = function (len) {
    var add = 0;
    var s, temp;
    var s1 = this + "";
    var start = s1.indexOf(".");
    if (s1.substr(start + len + 1, 1) >= 5) add = 1;
    var temp = Math.pow(10, len);
    s = Math.floor(this * temp) + add;
    return s / temp;
}

function duoxiaoClick(obj) {
    var selected = $(".duoxiao .xiaonum .selected");
    var count = selected.length;
    if ($(obj).hasClass("selected")) {
        count--;

    } else {
        count++;
        if (count > 11) {
            showMassage("生肖选择不能超过11位.");
            return false;

        }

    }
    toggleSelected(obj);


    selected = $(".duoxiao .xiaonum .selected");
    var isz = nowZWF.indexOf("不中") < 0;
    var zhongrate = 0;
    var buzhongrate = $("#dxrates").attr("ratecount") * 1000;

    selected.each(function () {
        var rateid = encodeURI("多肖" + $(this).attr("tp2")).replace(/%/g, "").replace(/\*/g, "").replace(/,/g, "");
        var rate = $("#dxrates #" + rateid).html();
        if (isz)
            zhongrate += parseInt(parseFloat(rate) * 1000);
        else
            buzhongrate -= parseInt(parseFloat(rate) * 1000);
    });
    var wfrate = isz ? (zhongrate / count / count / 1000) : (buzhongrate / (12 - count) / (12 - count) / 1000);
    $(".duoxiao .lm_pl").html(wfrate.toFixed(2));


}
function clearSelected() {
    $(".lianxiao a ").removeClass("selected");
    $(".lianwei a ").removeClass("selected");
}
var quickstate = "";
function quickInput(obj) {
    var je = $("#BetGold").val();
    if (je === "" && isNaN(je))
        return;

    var val = $(obj).val();
    if (quickstate.indexOf(val) < 0)
        quickstate += val;
    else
        quickstate = quickstate.replace(val, "");


    switch (val) {
        case "大":
            $("#ksms_ball input").each(function () {
                if ($(this).attr("tp2") >= "25") {
                    $(this).val(quickstate.indexOf(val) >= 0 ? je : "");
                }
            });
            break;
        case "小":
            $("#ksms_ball input").each(function () {
                if ($(this).attr("tp2") < "25") {
                    $(this).val(quickstate.indexOf(val) >= 0 ? je : "");
                }
            });
            break;

        case "单":
            $("#ksms_ball input").each(function () {
                if ($(this).attr("tp2") % 2 != 0) {
                    $(this).val(quickstate.indexOf(val) >= 0 ? je : "");
                }
            });
            break;
        case "双":
            $("#ksms_ball input").each(function () {
                if ($(this).attr("tp2") % 2 == 0) {
                    $(this).val(quickstate.indexOf(val) >= 0 ? je : "");
                }
            });
            break;
        case "红波":
            $("#ksms_ball .bColorR label").each(function () {
                var inputid = $(this).attr("for");
                $("#" + inputid).val(quickstate.indexOf(val) >= 0 ? je : "");
            });
            break;
        case "蓝波":
            $("#ksms_ball .bColorB label").each(function () {
                var inputid = $(this).attr("for");
                $("#" + inputid).val(quickstate.indexOf(val) >= 0 ? je : "");
            });
            break;
        case "绿波":
            $("#ksms_ball .bColorG label").each(function () {
                var inputid = $(this).attr("for");
                $("#" + inputid).val(quickstate.indexOf(val) >= 0 ? je : "");
            });
            break;
        case "鼠":
        case "牛":
        case "虎":
        case "兔":
        case "龙":
        case "蛇":
        case "马":
        case "羊":
        case "猴":
        case "鸡":
        case "狗":
        case "猪":
            var curxiaonum = "";
            if (XiaoNums) {
                XiaoNums = XiaoNums.replace(/&#39;/g, "'");
                var json = eval("(" + XiaoNums + ")");
                $.each(json, function (idx, xiaoval) {
                    if (xiaoval.xiao == val)
                        curxiaonum = xiaoval.nums;
                });
            }
            $("#ksms_ball input").each(function () {
                if (curxiaonum.indexOf($(this).attr("tp2")) >= 0) {
                    $(this).val(quickstate.indexOf(val) >= 0 ? je : "");
                }
            });
            break;
    }


}
function clearInput() {
    quickstate = "";
    $("#all-content input ").val("");
    //$('#betContent').dialog("close");
}





