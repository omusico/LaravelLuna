function typeboxHtml() {
    return '	<div id="typebox" style="display:none"><div id="typeboxWrapper">         <div id="typeboxHeader"> 			<span id="typeboxClose"></span><span id="typeboxTitle"></span> 		</div> 		<div id="typeboxContent"></div> 		<div id="typeboxFooter"> 			<button class="button" value="true" id="typeboxSubmit"> 			' + $.typebox.settings.buttonText.submit + ' 			</button>             <button class="button" value="false" id="typeboxCancel"> 			' + $.typebox.settings.buttonText.cancel + " 			</button> 		</div> 			</div></div>"
}

function clearAll(){
    //$data.codes.length = 0;
    $("#box_ball_SWHZ_num").find(".num").removeClass('OneNum_active');
    $("#box_ball_QSHZ_num").find(".num").removeClass('OneNum_active');

    $('.select_big li').removeClass('OneNum_active');
    $('.redBallBox li').removeClass('OneNum_active');
    $('.select_num1 li').removeClass('OneNum_active');
    $('.hmList li').find(".num").removeClass('OneNum_active');
    $('.mono li').removeClass('OneNum_active');
    $('.mony li').removeClass('OneNum_active');
    $dom.has_add_box.empty();
}

eval(function (p, a, c, k, e, d) {
    e = function (c) {
        return (c < a ? "" : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    }
    ;
    if (!"".replace(/^/, String)) {
        while (c--) {
            d[e(c)] = k[c] || e(c)
        }
        k = [function (e) {
            return d[e]
        }
        ];
        e = function () {
            return "\\w+"
        }
        ;
        c = 1
    }
    while (c--) {
        if (k[c]) {
            p = p.replace(new RegExp("\\b" + e(c) + "\\b", "g"), k[c])
        }
    }
    return p
}
("(5($){$.3=5(4){$.3.29(4)};$.2k($.3,{4:{E:'2j',d:'2j d',9:'2t',f:'2B',2E:{'2J':'确定','2H':'关闭'},1w:'Q',M:'12',1B:'a',1W:p,1Z:'2N',1u:p,1Q:{'3l':'33','1N':'1O'},P:6,1Y:'2T',1s:p,V:p,1H:p,3e:N,13:N,1g:R,1G:2K,2G:'1.0.1'},1g:5(){7(!$.3.1g)s N;$('J, 15, 2b').i('2a','2z');$('H').1J('<L c=\"Z\" K=\"f:'+$(n).f()+'o\"></L>')},29:5(4){$.3.4=$.2k({},$.3.4,4);$.3.1g();$.3.28();7(p!=$.3.4.V){$.3.4.V()}7(p!=$.3.4.1s){$('#1X').1a(5(){$.3.4.1s()})}7($.3.4.1w)$.3.2h();7($.3.4.13)$.3.13()},28:5(){7($('#3').r()!=0)$.3.17();$.3.1L();$('#Z').V(2v());$('#v').i('P',$.3.4.P+'o');2q($.3.4.M){T'12':$.3.12();O;T'q':$.3.q();O;T'1m':$.3.1m();O;T'Y':$.3.Y();O;T'B':$.3.B();O;T'c':$.3.c();O;2o:$.3.12();O}$('#2L').1a(5(){$.3.17()});$('#1V').1a(5(){$.3.17()})},1S:5(){s{'w':$(u).9(),'h':$(u).f(),'l':$(u).2y(),'t':$(u).2g()}},1b:5(){7(1h.1f.W(\"20 6.0\")!=-1){C=n.H.C}k 7(1h.1f.W(\"20\")!=-1){C=n.1M.2C}k 7(1h.1f.W(\"2D\")!=-1){C=n.H.1b}k 7(1h.1f.W(\"2x\")!=-1){C=n.1M.1b}k{C=n.H.C}s C},1j:5(1n){8 $t=(1n)?$('#'+1n):$('#3');8 D=$.3.1S();8 1t=(j(D.w)-j($t.2i(R)))/2;8 1o=j($t.2n(R));7(D.h>1o){8 t=(D.t+(D.h-1o)/2);$t.i({'18':1t,'11':t})}k{8 t=(D.t+(D.h/10));$t.i({'18':1t,'11':t})}s D},1L:5(){$('H').1J('<L c=\"1c\"></L>');$.3.1j('1c')},F:5(9){8 P=$.3.4.P*2;8 $1e=$('#3');7(9>0){$1e.i('9',j(9)+P+'o')}k{$1e.i('9',j($.3.4.9)+P+'o')}$.3.1j('3');$1e.25();8 1A=$.3.1b();7(1A>$('#Z').f()){$('#Z').f(1A)}7($('#1c').r()>0)$('#1c').1i().A()},12:5(){$('#Q').a($.3.4.E);$('#v').a($.3.4.d);$.3.F(0)},q:5(){8 q=22 2s();8 r;$('#v').2f('1x').a('<2r c=\"1x\" />');q.1q=5(){q.1q=p;r=$.3.2d(q.9,q.f,$.3.4.1Y);$('#1x').2u('14',q.14).i({'9':r.w+'o','f':r.h+'o'});$('#1V').a('关闭');$('#1X').1i();$.3.F(r.w)};q.14=$.3.4.d},1m:5(){$('#Q').a($.3.4.E);$.1m({M:\"3w\",3i:$.3.4.d,1B:$.3.4.1B,1p:$.3.4.1W,3k:N,3h:5(1p){$(\"#v\").a(1p);$.3.F(0)}})},Y:5(){$('#Q').a($.3.4.E);8 23=($.3.4.d.W('?')!=-1)?'&':'?';$('#v').a('<Y c=\"1r\" S=\"1r\" 3g=\"0\" 3c=\"0\" 3d=\"'+$.3.4.1Z+'\" 14=\"'+$.3.4.d+''+23+'t='+22 2O().3f()+'\" K=\"9:'+$.3.4.9+'o;f:'+$.3.4.f+'o\"></Y>');8 1C=$('#1r')[0];1C.1q=1C.3t=5(){7(1E.1I&&1E.1I!='3u'){s}k{$.3.F($.3.4.9);7($.3.4.1u!=p)$.3.4.1u()}}},B:5(){$('#3s').1i();8 B,J='';B='<15 3r=\"3n:3o-3p-3q-3b-3a\" 9=\"'+$.3.4.9+'\" f=\"'+$.3.4.f+'\"><U S=\"2V\" 1P=\"'+$.3.4.d+'\"/>';$.2W($.3.4.1Q,5(S,1v){B+='<U S=\"'+S+'\" 1P=\"'+1v+'\"></U>';J+=' '+S+'=\"'+1v+'\"'});B+='<J 14=\"'+$.3.4.d+'\" 1N=\"1O\" M=\"2U/x-2P-2Q\" 9=\"'+$.3.4.9+'\" f=\"'+$.3.4.f+'\"'+J+'></J></15>';$('#v').a(B);$.3.F($.3.4.9)},c:5(){$('#Q').a($.3.4.E);8 d=$('#'+$.3.4.d).a();8 9=$('#'+$.3.4.d).2i(R);$('#v').a(d);$.3.F(9)},2h:5(){8 1z,1D,19=N,X=$('#3').2m(0);$('#'+$.3.4.1w).1k('2S',5(e){7(!e)e=u.16;1z=e.26-j(X.K.18);1D=e.2c-j(X.K.11);19=R;$('#3').2f('2e');$(n).1k('27',5(16){7(!19)s;X.K.18=(16.26-1z)+\"o\";X.K.11=(16.2c-1D)+\"o\"})});$(n).1k('38',5(){19=N;$('#3').36('2e');$(n).35(\"27\")})},13:5(){8 1F,1y,2l=$(u).f();$(u).13(5(){1F=$(u).2g();1y=(j(2l)-$('#3').2n(R))/2;$(\"#3\").34({11:(j(1y)+1F)+\"o\"},{32:N,31:39})})},17:5(){$('#Z').A();$('#3 L').A();7($('#y').r()>0)$(\"#y\").A();$(n.H).37('#3').A();$('J, 15, 2b').i({'2a':'30'});$(n.H).2m(0).2R();7(p!=$.3.4.1H){$.3.4.1H()}},1d:5(1U,i){7($('#y').r()>0)$(\"#y\").A();8 1R=(i&&2Y i!='2X')?' 3v=\"'+i+'\"':'';8 1d='<L c=\"y\"'+1R+' K=\"1T:3m\"></L>';8 1l;7($('#3').r()>0){$('#3').V(1d);1l=$('#3').i('z-21')}k{$('H').V(1d);1l=1}$('#y').i('z-21',j(1l)+1).a(1U).3j('2A');$.3.1j('y');7($.3.4.1G>0){2p('$(\"#y\").A()',$.3.4.1G)}$('#y').1k('1a',5(){$(1E).A()})},1T:5(c,M){7(c.24().W('3')==-1){c=c.24();8 1K=/\\b(\\w)/g;c=c.2w(1K,5(m){s m.2M()});c='3'+c}7('2F'===M||1===M){$('#'+c).25()}k{$('#'+c).1i()}},d:5(d){7(!d){s $('#v').a()}k{$('#v').a(d);$.3.F(0)}},E:5(E){7(!2I){s $('#Q').a()}k{$('#Q').a(E)}},2d:5(w,h,U){8 G,I;G=$(u).9()-U;I=$(u).f()-U;7(w>G){h=h*(G/w);w=G;7(h>I){w=w*(I/h);h=I}}k 7(h>I){w=w*(I/h);h=I;7(w>G){h=h*(G/w);w=G}}s{w:j(w),h:j(h)}}})})(2Z);", 62, 219, "|||typebox|settings|function||if|var|width|html||id|content||height|||css|parseInt|else|||document|px|null|image|size|return||window|typeboxContent|||typeboxTip||remove|swf|clientHeight|vp|title|resize|maxw|body|maxh|embed|style|div|type|false|break|padding|typeboxTitle|true|name|case|param|after|indexOf|moveObj|iframe|typeboxOverlay||top|text|scroll|src|object|event|close|left|dragAbled|click|scrollHeight|typeboxLoading|tip|tb|userAgent|overlay|navigator|hide|centralize|bind|zindex|ajax|obj|th|data|onload|typeboxFrame|call|wl|iframeEvent|val|dragId|typeboxImage|dif|posX|fixHeight|dataType|ofrm|posY|this|ws|tipCloseTime|closeAfter|readyState|append|regx|loading|documentElement|quality|high|value|swfParam|htmlClass|getViewport|display|msg|typeboxCancel|postData|typeboxSubmit|calculateParams|iframeScroll|MSIE|index|new|url_spt|toLowerCase|show|clientX|mousemove|create|init|visibility|select|clientY|calculate|typeboxMove|addClass|scrollTop|drag|outerWidth|Typebox|extend|wh|get|outerHeight|default|setTimeout|switch|img|Image|500|attr|typeboxHtml|replace|Firefox|scrollLeft|hidden|fast|400|offsetHeight|Chrome|buttonText|block|version|cancel|titile|submit|6000|typeboxClose|toUpperCase|no|Date|shockwave|flash|focus|mousedown|110|application|movie|each|undefined|typeof|jQuery|visible|duration|queue|transparent|animate|unbind|removeClass|children|mouseup|300|444553540000|96B8|hspace|scrolling|parent|getTime|frameborder|success|url|fadeIn|cache|wmode|none|clsid|D27CDB6E|AE6D|11cf|classid|typeboxHeader|onreadystatechange|complete|class|POST".split("|"), 0, {}));

Number.prototype.toLeftTimeString = function () {
    var a = parseInt(this / 60 / 60 / 24, 10);
    var b = parseInt(this / 60 / 60 % 24, 10);
    var c = parseInt(this / 60 % 60, 10);
    var f = this % 60;
    var e = [];
    e.push(a.toString());
    e.push(b > 9 ? b.toString() : "0" + b.toString());
    e.push(c > 9 ? c.toString() : "0" + c.toString());
    e.push(f > 9 ? f.toString() : "0" + f.toString());
    return e[0] > 0 ? e[0] + "天" + parseInt(e[1], 10) + "小时" : e[1] + ":" + e[2] + ":" + e[3]
};

var GameType = "";
var Current_Term = "";

var betListRowID = 0;//下注列表初始ID
var blocked = false;
var imgurl_result_bg = "/Content/images/result_bg.gif";
var imgurl_an_result_bg = "/Content/images/an_result_bg.gif";
//开奖号码的显示间隔时间.毫秒
var resultDisplayTime = 500;
var Sixhe = {};

var $dom = {
    box_ball_HZ: $('#box_ball_HZ_num li'),//和值选号区
    has_add_ball: $('#has_add_ball li'), //已经添加到选区中的号码


    has_add_box: $('#has_add_ball'),
    playType: $('#playType'),
    gameName: $('#gameName'),
    countDownTime: $('#countDownTime')
};

function setOutTime(){
    if(betTime < 1){
        betTime = 600; //防止在未返回数据前不断重复执行
        $("#theCur").html("");
        loadWinInfo();
        waitAward();
    }else{
        betTime = betTime - 1;

        // 下一期自动刷新页面
        if( betTime < 1){
            setTimeout("refresh()", 5000);
        }

        gameHasEnd = 0;
        var str = betTime.toLeftTimeString();

        if($('#countDownTime').size()>0) $('#countDownTime').html(str);
    }
    setTimeout("setOutTime()", 1000);
}

function render(obj, name, FiveName, _id) {
    var _out = [];
    _out.push('<li id="li_' + obj.type + '_' + obj.code + '" data-type="' + obj.type + '" data-zhushu="' + obj.zhushu + '" data-code="' + obj.code + '" data-id="' + _id + '">');
    _out.push('<span class="txt-betsName">[' + FiveName + ']</span>');
    _out.push('<span title="' + obj.code + '" class="txt-num js-code">' + name + '</span>');
    var winval = obj.value * obj.odd;
    _out.push('<span class="txt-amount js-money" style="width:230px;float:none">下注金额<input value="' + obj.value + '" type="number" onkeyup="formatIntVal(this)" data-odd="' + obj.odd + '" onafterpaste="Five.formatIntVal(this)" name="totals[]" class="totalsVal" size="6" />元&nbsp;&nbsp;<em>可赢金额：<span class="bingoMoney">' + winval.toFixed(2) + '</span> 元</em></span>');
    _out.push('<a href="javascript:void(0);" class="txt-delNum js-del">删除</a>');
    var val = obj.code + '|' + pls + '|' + obj.type;
    _out.push('<input type="hidden" name="tmpCodes[]" class="tmpCodes" value="' + val + '" />');
    _out.push('</li>');
    $dom.has_add_box.prepend(_out.join(''));
    bindDelete();
    $('.totalsVal').each(function () {
        $(this).keyup(function () {
            showGetPrice($(this), obj);
        }).keydown(function () {
            showGetPrice($(this), obj);
        });
    })
}
function showGetPrice (that, json) {
    var odds = that.attr('data-odd');
    var val = that.val();
    val = val * odds;
    //val = formatIntVal(val);
    that.parent().find('em').html('可赢金额：<span class="bingoMoney">' + val + '</span> 元');
}
function formatIntVal(obj) {
    obj.value = obj.value.replace(/\D+/g, '');
}
function bindDelete() {
    var c = t = id = '';
    $dom.has_add_box.find('a').each(function () {
        $(this).click(function () {
            c = $(this).attr('data-code');
            t = $(this).attr('data-type');
            id = $(this).parent().attr('data-id');
            //Five.core.removeBall([], c, t);
            $(this).parent().remove();
            //if ($('#' + id).hasClass('OneNum_active')) {
            //    $('#' + id).removeClass('OneNum_active');
            //}

        });
    });
}

function getTotals () {
    var totals = 0, v = 0, _error = 0;
    $('.totalsVal').each(function () {
        v = $.trim($(this).val());
        if (v == '' || v <= 0) {
            _error += 1;
        } else {
            totals = parseInt(totals, 10) + parseInt(v, 10);
        }
    });
    if (_error > 0) {
        return false;
    }
    return totals;
}

Sixhe.submit = function(){
    var tmpCodes = $('.tmpCodes');
    if(tmpCodes.size()<=0){
        Common.tip('您还没有选择任何号码呀~~~');
    }else{
        if ($("#isLogin").val() == undefined) {
            $('#myModal').modal('show');
            return false;
        }
        //if(user.agency == '3' || user.agency=='1'){
        //    Common.tip('代理不可以投注！');
        //    return false;
        //}
        var pt = $dom.playType.val(),
            proName = $('#proName').val();
        var codes = '';
        var totals = getTotals();
        if(!totals){
            Common.tip('每一注都需要您输入投注金额！');
            return false;
        }
        //if(totals > user.points ){
        //    Common.tip('您的余额不足，请充值！');
        //    return false;
        //}
        var _limit_lowest = pt+'_chipin_l';
        var _limit_highest = pt+'_chipin_h';
        var _chipin_l = $('#'+_limit_lowest).val();
        var _chipin_h = $('#'+_limit_highest).val();
        if(!_chipin_l) _chipin_l = 0;
        if(!_chipin_h) _chipin_h = 0;
        if(_chipin_l>0 && totals < _chipin_l){
            Common.tip('您的投注最低限额为“'+_chipin_l+'”元，但您目前的投注金额为“'+totals+'”元，请修改！');
            return false;
        }
        if(_chipin_h>0 && totals > _chipin_h){
            Common.tip('您的投注最高限额为“'+_chipin_h+'”元，但您目前的投注金额为“'+totals+'”元，请修改！');
            return false;
        }

        $(".submit_btn").attr("disabled","true");

        var totalVal = $('.totalsVal') ,eachPrice = 0 ,bingoMoney=$('.bingoMoney');
        tmpCodes.each(function(i){
            eachPrice = $.trim(totalVal.eq(i).val());
            codes+=$(this).val()+'|'+eachPrice+'|'+bingoMoney.eq(i).text()+'<waf>';
        });
        var gameName = $dom.gameName.val();
        var zhushu = $('.tmpCodes').size();
        var msg = '您下注了<strong>'+ "" + '</strong>的'+gameName+'，共<strong>'+totals+'</strong>元，是否下注？';

        $.typebox({
            'title' : '温馨提示',
            'width': '360',
            'height' : '150',
            'content' : msg,
            'padding' : 10,
            'type' : 'text',
            'call' :function(){
                $('#typeboxSubmit').attr('disabled',true).html('数据提交中...');
                $.ajax({type: "POST",
                    //url: baseUrl+"/index.php?m=ssc&c=index&a=sendCode&rand="+Math.random() + "&lottery_type="+lottery_type,
                    url: "/6helotteryBetting?rand=" + Math.random() + "&lottery_type=" + lottery_type,
                    data:"playType="+pt+'&zhushu='+zhushu+'&proName='+proName+'&totals='+totals+'&codes='+encodeURIComponent(codes),
                    dataType: "json" ,
                    cache : false,
                    success: function(json){
                        $.typebox.close();
                        switch(json.tip){
                            case 'login':
                                window.location.href=loginUrl;
                                break;
                            case 'timeout':
                                alert(json.msg);
                                window.location.href=baseUrl + "/index.php/Ssc/index/init?&lottery_type="+lottery_type;
                                break;
                            case 'success':
                                Common.tip('您的投注信息已经成功提交，请等待开奖！【<a href="/userLotteryBetting">查看我的购买信息</a>】');
                                clearAll();
                                //if($('.enter_digital').size()>0){
                                //    $('.enter_digital').text(json.points);
                                //}
                                break;
                            case 'error' :
                                alert(json.msg);
                                //window.location.href=baseUrl + "/index.php/Ssc/index/init?&lottery_type="+lottery_type;
                                break;
                            default:
                                alert(json.msg);
                        }
                    }
                });
            }
        });
        $(".submit_btn").removeAttr("disabled");
    }
}

//页面初始化
$(document).ready(function () {


    GameType = $("#GameType").val();

    //$('#betContent').dialog({
    //    autoOpen: false,
    //
    //    buttons: {
    //        "取消": function () {
    //            $(this).dialog("close");
    //        },
    //        "确认": function () {
    //            $(".ui-dialog").block({ message: "数据处理中..." });
    //            if (submitResult()) {
    //                $(this).dialog("close");
    //            }
    //
    //        }
    //    },
    //    draggable: true,
    //    resizable: false,
    //
    //    open: function () {
    //        $(".ui-dialog-buttonpane button").eq(1).attr("disabled", false).html("确认");
    //
    //    },
    //    close: function (event, ui) {
    //        $("#betContent table tbody").html("");
    //        $("tfoot #allbettotle").text("0");
    //        $("tfoot #allbettotleje").text("0");
    //        $("tfoot #allbettotlekyje").text("0");
    //        $("#quicklybetnum").val("");
    //    },
    //    width: 850
    //});
    $("#flushButtons").bind('click', function () {
        flusheds();
    });
    $("#flushButtons").css({"color": "white", "cursor": "pointer"});


});
function getGameType() {
    if (GameType === "")
        GameType = $("#GameType").val();
    return GameType;
}

function setKjState(onoff) {
    if (onoff === "on") {
        if (!isKj) {
            isKj = true;
            var qs = $(".time_qs label").text();
            $("#KjQs").val(qs);
            $("#DropDate").html(qs);
            $("#KjStatus").html("开奖中...");
            $(".time_qs p").html("开奖中");
            donghua("on");
            clearResult();
            getLastResult(ResultEnter);
            initGame(GameEnter);
        }
    } else {

        isKj = false;
        $("#KjStatus").html("");
        $("#KjQs").val("");
        kjTimes = 0;
        initGame(GameEnter);
    }
}
function flusheds() {
    $("#flushButtons").unbind('click');
    $("#flushButtons").css({"color": "#7d7d7d", "cursor": ""});
    TenSeconds();
    getSYED();
}

var _flashSeconds = 10;
function TenSeconds() {

    if (_flashSeconds > 0) {
        _flashSeconds--;
        setTimeout(TenSeconds, 1000);
    } else {
        _flashSeconds = 10;
        $("#flushButtons").unbind('click').bind('click', function () {
            flusheds();
        })
        $("#flushButtons").css({"color": "white", "cursor": "pointer"});
    }
}


//取剩余额度
function getSYED() {
    $.ajax({
        type: "post",
        dataType: "text",
        url: "/UserInfo/GetCredit",
        async: true,
        error: function (str) {
            //showMassage('网络连接超时，请重试');
        },
        success: function (str) {
            var result = $.parseJSON(str);
            if (!result.Success) {
                showMassage(result.Massage);
                return;
            }
            $("#ueseIDL").html(result.Data.UserName);
            $("#userBalance2").html(result.Data.Credit);
            $("#userBalance1").html(result.Data.Credit);


        }
    });
}
//获取当期下注注单内容
function getThisTermBet() {

    if (Current_Term == "") {
        return false;
    }

    $.ajax({

        type: "post",

        dataType: "json",

        async: true,

        url: "/BET/GetBETLastRecord?GameType=" + getGameType() + "&qs=" + Current_Term,

        error: function (result) {

        },
        success: function (result) {
            var json = result; //$.parseJSON(result);

            if (!json.Success) {
                showMassage(json.Massage);
                return;
            }

            $("#currentTermBetList tbody").html("");

            if (json.Data.length < 1) {
                $("#currentTermBetList tbody").html("<tr><td colspan=3 align=center>本期无下注记录</td></tr>");
            }
            else {
                var data = $.parseJSON(json.Data);


                $.each(data, function (key, val) {


                    list = "<tr><td class='ThisMassageTd'><a rowmassage='" + val.drop_type + "<br>下注内容:" + val.drop_content + "<br>下注金额：" + val.drop_money + "<br>赔率：" + val.drop_rate + "' class='showThisMassage'>" + val.drop_content + "<br>" + val.drop_type + "</a></td>";
                    list += "<td>" + val.drop_money + "</td>";
                    list += "<td>" + val.drop_rate + "</td></tr>";
                    $("#currentTermBetList tbody").append(list);

                });
                $("#currentTermBetList .showThisMassage").mouseover(function () {
                    showThisTermBetList(this);
                });

                $("#currentTermBetList .showThisMassage").mouseout(function () {
                    hideThisTermBetList(this);
                });
                changeLeftContentHeight();
            }
        }
    });

}

//当期注单 left 悬浮窗位置内容
function showThisTermBetList(obj) {

    $("#RowMassageContent").html($(obj).attr('rowmassage'));
    $("#RowMassageContent").show();
    xbox = $(obj).position();
    $("#RowMassageContent").css("top", xbox.top - $("#RowMassageContent").height() - 4);
    $("#RowMassageContent").css("left", xbox.left);
}

//隐藏当期注单 left 悬浮窗
function hideThisTermBetList(obj) {
    $("#RowMassageContent").hide();
}

//取赔率
function getpl() {

    block("");
    var data = {"GameType": getGameType(), "WF": getWF(), "t": new Date()};
    if (kg == 1) {
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
                bindpl(dt);
                unBlock();

            }
        });
    }

}

function getLastResult(callback) {
    //获取最新开奖数据
    $.ajax({
        type: "post",
        dataType: "text",
        url: "/GameInit/GetLastResult?GameType=" + getGameType(),
        async: true,
        error: function (result) {
            //showMassage("请求失败")
            //setTimeout(function () { getLastResult() }, 1000);
        },
        success: function (result) {
            callback(result);
        }
    });
}
function getLastResultAndCloseSecond(callback) {
    //获取最新开奖数据
    $.ajax({
        type: "post",
        dataType: "text",
        url: "/GameInit/GetLastResultAndCloseSecond?GameType=" + getGameType(),
        async: true,
        error: function (result) {
            //showMassage("请求失败")
            //setTimeout(function () { getLastResult() }, 1000);
        },
        success: function (result) {
            callback(result);
        }
    });
}
function initGame(callback) {

    //初始化
    $.ajax({
        type: "post",
        dataType: "text",
        url: "/GameInit/GetGameOpenInfo?GameType=" + getGameType(),
        async: true,
        error: function (result) {
            //showMassage("请求失败");
            // setTimeout(function () { initGame() }, 1000);
        },
        success: function (result) {
            callback(result);
        }
    });


}

//得到排列组合
function getZH(arr, num) {
    var result = new Array();

    for (var i = 0; i < Math.pow(2, arr.length); i++) {
        var a = 0;
        var zh = "";
        for (var j = 0; j < arr.length; j++) {
            if (i >> j & 1) {
                a++;
                if (zh === "")
                    zh += arr[j];
                else
                    zh += "," + arr[j];
            }
        }

        if (a == num) {

            result.push(zh);

        }
    }
    return result;

}
function TotleRegNumber(obj) {

    var tempValue = obj.value;

    if (tempValue != "" && tempValue != " ") {
        if (parseInt(tempValue.replace(/[^0-9]/gi, ""), 10).toString() != "NaN") {

            obj.value = parseInt(tempValue.replace(/[^0-9]/gi, ""), 10).toString();

            $("#betContent table tbody tr input").each(function () {

                this.value = tempValue;

                inputadd(this, parseInt(tempValue.replace(/[^0-9]/gi, ""), 10), parseInt($(this).attr("zds"), 10));

            });

        }
        else {

            obj.value = "0";

            $("#betContent table tbody tr input").each(function () {

                this.value = tempValue;

                inputadd(this, 0, 0, 0);

            });

        }
    }
    else {
        obj.value = "0";

        $("#betContent table tbody tr input").each(function () {

            this.value = tempValue;

            inputadd(this, 0, 0);

        });
    }

}

function regNumber(obj, bs) {

    var tempValue = obj.value;

    if (tempValue != "" && tempValue != " ") {
        if (parseInt(tempValue.replace(/[^0-9]/gi, ""), 10).toString() != "NaN") {
            obj.value = parseInt(tempValue.replace(/[^0-9]/gi, ""), 10).toString();

            inputadd(obj, parseInt(tempValue.replace(/[^0-9]/gi, ""), 10), bs);

            $($(obj).parent().parent()).find(".zxzje").html(bs * parseInt(tempValue.replace(/[^0-9]/gi, ""), 10));

        }
        else {

            obj.value = "0";
            inputadd(obj, 0, 0);
        }
    }
    else {
        obj.value = "0";
        inputadd(obj, 0, 0);
    }

}

//长字符串换行 插入br
//splitStr 要分割的字符串
//splitSignal 分割的符号
//strLength 分割后的最大长度

function splitLongStr(splitStr, splitSignal, strLength) {

    var tempReturnStr = "";

    var tempStrBr = "";

    if (splitStr.indexOf("|") > -1) {

        if (splitStr.length > 30) {

            var tempArry1 = splitStr.split("|")

            $.each(tempArry1, function (i, n) {

                var tempArry = this.split(splitSignal);

                var tempSplitStr = "";

                if (this.length > strLength) {
                    $.each(tempArry, function (i, n) {
                        if (i != strLength) {
                            tempReturnStr += tempSplitStr + n;
                        }
                        else {
                            tempReturnStr += "<br>" + n;
                        }

                        tempSplitStr = "*";

                    });

                    tempStrBr = "<br>";

                    tempReturnStr = tempReturnStr + tempStrBr;

                }
                else {

                    tempReturnStr += this + "<br>";

                }

            });

        }
        else {
            tempReturnStr = splitStr;
        }

    }
    else {

        var tempArry = splitStr.split(splitSignal);

        var tempSplitStr = "";

        if (tempArry.length > strLength) {
            $.each(tempArry, function (i, n) {
                if (i != strLength) {
                    tempReturnStr += tempSplitStr + n;
                }
                else {
                    tempReturnStr += "<br>" + n;
                }

                tempSplitStr = "*";

            });
        }
        else {

            tempReturnStr += tempArry.toString();

        }
    }
    return tempReturnStr;
}

//下注
function submitResult(str) {

    $(".ui-dialog-buttonpane button").eq(1).attr("disabled", true).html("提交中...");

    var result = "";
    var tempKyED = parseInt($("#userBalance2").html(), 10);
    var tempXzje = parseInt($("#allbettotleje").text(), 10);
    if (tempXzje > tempKyED) {
        showMassage("剩余额度不足,请调整下注金额");
        $(".ui-dialog-buttonpane button").eq(1).attr("disabled", false).html("确认");
        $(".ui-dialog").unblock();
        return false;
    }
    var has0 = false;
    $("#betContent table tbody tr").each(function () {
        var xzje = $(this).find(".betXzje").val();  //下注金额
        if (xzje != "0") {
            result += $(this).find(".Contents").html() + "@" + xzje + ";";
        }
        else {
            has0 = true;

        }

    });
    if (has0) {
        showMassage("请输入下注金额");
        $(".ui-dialog-buttonpane button").eq(1).attr("disabled", false).html("确认");
        $(".ui-dialog").unblock();
        return false;
    }
    bet(result);
}
//提交注单
function bet(str) {

    var data = {"GameType": getGameType(), "Content": str};
    $.ajax({
        type: "post",
        dataType: "text",
        url: "/BET/BET",
        data: data,
        async: true,
        error: function () {
            showMassage("网络连接超时,请重试!");
            $(".ui-dialog-buttonpane button").eq(1).attr("disabled", false).html("确认");
            $(".ui-dialog").unblock();
        },
        success: function (ds) {
            $(".ui-dialog").unblock();
            betRetuen(ds);
            getSYED();
            getThisTermBet();
        }
    });
}
function betRetuen(obj) {
    var rst = $.parseJSON(obj);
    if (!rst.Success) {
        showMassage(rst.Massage);
        $(".ui-dialog-buttonpane button").eq(1).attr("disabled", false).html("确认");
        $(".ui-dialog").unblock();
        return;
    }
    $("#betContent").dialog("close");

    var rejson = $.parseJSON(rst.Data); // 

    if (rejson.errcode == "200") {
        showMassage("注单投注成功!");
        return;
    }

    //部分成功  errcode=5;


    if ($("#showdilog_div").length <= 0) {

        creatDivDilog("部分注单下注超时，请重试");
        $("#showdilog_div").dialog("option", "width", 480);
    }

    var arr_errCheckDropType = new Array(),
        arr_errCheckBillContent = new Array(),
        arr_VoidCheckDropType = new Array(),
        arr_VoidCheckBillContent = new Array();
    if (rejson.errCheckDropType) {
        arr_errCheckDropType = rejson.errCheckDropType.split("、");
        arr_errCheckBillContent = rejson.errCheckBillContent.split("、");
    }
    if (rejson.VoidCheckDropType) {
        arr_VoidCheckDropType = rejson.VoidCheckDropType.split("、");
        arr_VoidCheckBillContent = rejson.VoidCheckBillContent.split("、");
    }


    var rowshtml = "";


    if (arr_errCheckDropType.length > 0) {
        for (var i = 0; i < arr_errCheckDropType.length; i++) {

            var tp3 = arr_errCheckDropType[i];
            if (tp3 != "") {
                var content = arr_errCheckBillContent[i];
                content = splitLongStr(content, "*", 10);

                rowshtml += "<tr><td>" + tp3 + "</td>";
                rowshtml += "<td>" + content + "</td>";
                rowshtml += "<td>赔率错误</td></tr>";
            }
        }

    }
    if (arr_VoidCheckDropType.length > 0) {
        for (var i = 0; i < arr_VoidCheckDropType.length; i++) {

            var tp3 = arr_VoidCheckDropType[i];
            if (tp3 != "") {
                var content = arr_VoidCheckBillContent[i];
                content = splitLongStr(content, "*", 10);
                rowshtml += "<tr><td>" + tp3 + "</td>";
                rowshtml += "<td>" + content + "</td>";
                rowshtml += "<td>非法注单</td></tr>";
            }

        }

    }


    if (rowshtml != "") {


        if ($("#showdilog_div table.falt").length == 0) {
            $("#showdilog_div").append("<table class='falt'><td>类型</td><td>内容</td> <td>下注状态</td></tr></table>");
        }

        $("#showdilog_div table.falt").append(rowshtml);
    }


}

function addzero(str) {

    if (str.length < 2) {
        return str = "0" + str;
    }

    return str;

}
//添加下注内容
//(玩法,内容,显示内容,赔率,下注倍数)
function addBETContentRow(tp3, content, disContent, PL, BetTotle) {
    if (!PL || PL == 0) {
        $('#betContent').dialog('close');
        showMassage("赔率为 0 ,无法下注.");
        return false;
    }
    addToBETContent(tp3, content, disContent, PL, BetTotle);
    return true;
}
function addBETContentRow2(tp3, content, disContent, PL, BetTotle, je) {
    if (!PL || PL == 0) {
        //$('#betContent').dialog('close');
        alert("赔率为 0 ,无法下注.");
        return false;
    }
    addToBETContent2(tp3, content, disContent, PL, BetTotle, je);
    return true;
}
function addToBETContent(tp3, content, disContent, PL, BetTotle) {

    addToBETContent2(tp3, content, disContent, PL, BetTotle, 0);

}
function addToBETContent2(tp3, content, disContent, PL, BetTotle, je) {

    var rowid = encodeURI(tp3 + content).replace(/%/g, "").replace(/\*/g, "").replace(/,/g, "");
    if ($("#KFB_" + rowid).html() == null && content != "" && content != null) {
        var row = getBETRowString(rowid, tp3, content, disContent, PL, BetTotle, je);
        render({type: tp3, zhushu: 1, code: content, odd: PL, value: je}, content, tp3);

        //$(row).appendTo($("#betList"));

        var bs = (parseInt($("#allbettotle").text(), 10) + parseInt(BetTotle)).toString();

        //$("#betContent #allbettotle").text(bs);
        //$("#betList input").get(0).focus();

    }


}
//选加入到下注列表
function addToBetList(tp3, tp2, rate) {
    //$('#betContent').dialog('open');
    addBETContentRow(tp3, tp2, tp2, rate, 1);


}
function addToBETContentByArray(tp3, contentArray, pl, betTotle, je) {
    if (!pl || pl == 0) {
        showMassage("赔率为 0 ,无法下注.");
        return false;
    }

    for (var i = 0; i < contentArray.length; i++) {
        var content = contentArray[i];
        var rowid = encodeURI(tp3 + content).replace(/%/g, "").replace(/\*/g, "").replace(/,/g, "");
        if ($("#KFB_" + rowid).html() == null && content != "" && content != null) {
            var row = getBETRowString(rowid, tp3, content, content, pl, betTotle, je);
            $(row).appendTo($("#betList"));

        }
    }
    countAllBet();
    $('#betContent').dialog('open');
    //$("#betList input").get(0).focus();

}
function getBETRowString(rowid, tp3, content, disContent, pl, betTotle, je) {
    var row = "<tr id='KFB_" + rowid + "'><td  width='100'><span class='betTotle' style='display:none'>" + betTotle + "</span><span class='Contents' style='display:none'>" + Current_Term + "@" + tp3 + "@" + content + "@" + pl + "</span> "
    row += Current_Term + "</td>"
    row += "<td width='100'>" + tp3 + "</td>"
    row += "<td width='180' class='nr'>" + disContent + "</td>"
    row += "<td width='70' class='pl'>" + pl + "</td>"

    row += "<td width='190' class='nr' title='点击对应金额,下注金额可以累加.'><a class='a10' onclick='add(this,10," + betTotle + ")'></a><a class='a100' onclick='add(this,100," + betTotle + ")'></a><a class='a500' onclick='add(this,500," + betTotle + ")'></a><a class='a1000' onclick='add(this,1000," + betTotle + ")'></a><input class='betXzje' type='text' value='" + je + "' onchange='regNumber(this," + betTotle + ")' maxlength='5' zds='" + betTotle + "'></td>"

    row += "<td width='80'><span  class='zxzje'>" + je + "</span></td>"
    row += "<td width='90' class='kyje'>" + (je * pl) + "</td>"
    row += "<td width='50'>"
    row += "<a class='delthisrow' href='#' onclick='delThisRow(this)'></a></td></tr>";
    return row;
}
//删除选中注单
function delThisRow(obj_row) {
    $(obj_row).parent().parent().remove();
    if ($("#betContent table tbody tr").length < 1) {
        $('#betContent').dialog('close');
        return;
    }


    countAllBet();

}

function add(obj_je, num, bs) {

    var input_xzje = parseInt($($(obj_je).parent()).find("input")[0].value, 10);
    if (!input_xzje)
        input_xzje = 0;

    $($(obj_je).parent()).find("input")[0].value = input_xzje + num;

    $($(obj_je).parent().parent()).find(".zxzje").html((input_xzje + num) * bs);

    oneBetky(obj_je, bs);//单注可赢金额

    allBetky(); //总可赢金额   

    allBetJe();
}
function addQuicklybetnum(num) {
    var obj = $("#quicklybetnum");
    var input_xzje = parseInt(obj.val(), 10);
    if (!input_xzje)
        input_xzje = 0;
    var je = input_xzje + num;
    if (je > 99999)
        return;
    obj.val(je);

    TotleRegNumber(document.getElementById("quicklybetnum"));

}

function inputadd(obj_je, num, bs) {

    var input_xzje = parseInt($($(obj_je).parent()).find("input")[0].value, 10);

    $($(obj_je).parent()).find("input")[0].value = num;

    $($(obj_je).parent().parent()).find(".zxzje").html(num * bs);

    oneBetky(obj_je, bs);//单注可赢金额

    allBetky(); //总可赢金额   

    allBetJe();
}

function countAllBet() {
    allBetky();
    allBettotle();
    allBetJe();
}
function oneBetky(obj, bs) {

    var xzje = parseInt($($(obj).parent()).find("input")[0].value, 10);

    var pl = parseFloat($("#" + $(obj).parent().parent()[0].id + " .pl").html()) - 1;

    var kyje = (xzje * pl * bs).toFixed(2);

    $("#" + $(obj).parent().parent()[0].id + " .kyje").html(kyje);

}
function allBetky() {

    var totle = 0;

    $("#betContent table tbody .kyje").each(function () {

        totle += parseFloat($(this).html());
    });

    $("#betContent table tfoot #allbettotlekyje").text(totle.toFixed(2));

}

//下注总笔数

function allBettotle() {
    var totle = 0;

    $("#betContent table tbody .betTotle").each(function () {

        totle += parseInt($(this).html());

    });

    $("#betContent table tfoot #allbettotle").text(totle);
}

//总下注金额
function allBetJe() {

    var totle = 0;

    $("#betContent table tbody .zxzje").each(function () {

        totle += parseFloat($(this).html());

    });

    $("#betContent table tfoot #allbettotleje").text(totle);
}

function resetAll() {
    $("#quicklybetnum").val("0");
    $("#betContent table tfoot #allbettotleje, #betContent table tfoot #allbettotlekyje").text("0");

    $("#betContent table tbody tr").find("input").val(0);

    $("#betContent table tbody tr .zxzje").html("0");

    $("#betContent table tbody .kyje").html("0");
}

//动画显示开奖结果
//results as String :2,3,4,5,7
var result_lis = null;
var result_arr = null;
function displayResult(results) {
    result_lis = $(".kj_result .result_content .result .result_number_result ul li");
    result_arr = results.split(",");
    displayResultRe(0, result_arr.length);
}

function displayResultRe(index, len) {
    if (index < len) {
        if (kg == 2) {//开奖状态
            clearResult();
            donghua("on");
        } else {
            setResult(result_lis[index], result_arr[index]);
            index++;
            setTimeout("displayResultRe(" + index + "," + len + ")", resultDisplayTime);
        }

    }


}
function setResult(result_li, result_num) {
    $(result_li).css("background", "url('" + imgurl_result_bg + "')");
    $(result_li).css("background-size", "100% 100%");
    $(result_li).css("background-position", "center");
    $(result_li).text(result_num);
}
function clearResult() {
    $(".kj_result .result_content .result .result_number_result ul li").text("");
    $(".result_other_result span").html("");
}

function donghua(onoff) {

    var lis = $(".kj_result .result_content .result .result_number_result ul li");
    if (onoff = "on")
        lis.css("background", "url('" + imgurl_an_result_bg + "')");
    else
        lis.css("background", "url('" + imgurl_result_bg + "')");

    lis.css("background-size", "100% 100%");
    lis.css("background-position", "center");


}

function toggleSelected(object) {

    $(object).toggleClass("selected");

}

function toggleSingleSelected(object) {
    $(object).siblings().removeClass("selected");
    $(object).toggleClass("selected")


}
function singleSelected(object) {
    $(object).siblings().removeClass("selected");
    $(object).addClass("selected");


}
function changeLeftContentHeight() {

    var rightHeight = $(".content").outerHeight();
    var lefttopHeight = $("#left_content_top").height();
    var hght = rightHeight - lefttopHeight;
    if (hght < 271) {
        hght = 271;
    }
    var scrollcontent_hght = hght - 50;

    $("#left_content_bottom").outerHeight(hght);
    $(".scrollcontent").height(scrollcontent_hght);

}
function loadRecent() {
    if ($("#awardNumBody").has("tr").length == 0) {
        loadRecentResult()
    }
}

function loadRecentResult(){
    var csrf_token = $("input[name=_token]").val();
    if (typeof (recentNum) == "undefined") {
        recentNum = 15
    }
    var url = "/loadRecentResult?lottery_type=" + lottery_type + "&recentNum=" + recentNum;
    $.ajax({
        type: "GET",
        data: "_token=" + csrf_token,
        url: url,
        dataType: "json",
        data:{},
        cache : false,
        success: function(json){
            if(json){
                html='';
                if( typeof(recentNum) == "undefined" ) recentNum = 15;
                for(var w=0;w<json.length && w< recentNum ;w++){
                    var data = json[w];
                    html += '<tr data-period="' + data.proName + '"><td align="center">'+data.proName + '</td> <td align="center"> <span class="c_red">'+ data.codes + "</span></td></tr>";
                }
                $('#awardNumBody').html(html);
            }
        }
    });
}
