var betTime = 0;
var _ALL_TIMER_;
function loadNextTime(){
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=five&c=index&a=getServerTime&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){
            $('#theCur').html(json.issuse);
            $('#proName').val(json.issuse);
            betTime = json.bettime;
            var theIssuse = $.cookie('theIssuse');
            if(betTime<1){
                //CP.tip('您好，'+json.issuse+' 期已截止，请等待下一期投注开始。');
                var nextPro = json.issuse.split('-');
                var nextIssuse = 0 ,msg;
                if(nextPro[1] < 91){ //每天82期
                    nextIssuse = nextPro[0]+'-'+(parseInt(nextPro[1])+1);
                    msg = nextIssuse+'投注已开始。';
                    $('#proName').val(nextIssuse);
                    $.cookie('nowSetIssuse',nextIssuse);
                }else{
                    msg = '今天的投注已经结束！';
                }
                $('#tipEndProName').html('您好，'+json.issuse+' 期已截止，'+msg);
                gameHasEnd = 0;
                $.cookie('theIssuse' ,json.issuse);
            }else{
                $('#proName').val(json.issuse);
            }
            	setTimeout("loadWinInfo()", (betTime + awardSeconds - 600) * 1000 );
            } else {
            setTimeout("setOutTime()", 1000);
        }
    });
}
function setOutTime(){
    if(betTime<1){
        loadNextTime();
        waitAward();
    }else{
        betTime = betTime - 1;
        if( betTime < 1){
        	setTimeout("refresh()", 5000);
        }  
        gameHasEnd = 0;
        setTimeout("setOutTime()", 1000);
        var str = betTime.toLeftTimeString();
        if($('#countDownTime').size()>0) $('#countDownTime').html(str);
    }
}
	if($('#awerdNum_balls').size()	>0) $('#awerdNum_balls').html('<div class="opening" id="is_opennig"></div>');
}
var firstTime = 1;
function loadWinInfo(){
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=five&c=index&a=getAwardInfo&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){
            $('#prevWin').html(json.pre);
                var args = json.win.split(',');
                html='';
                for(var w=0;w<args.length;w++){
//                    html+='<em class="num'+args[w]+'" title="'+args[w]+'">'+args[w]+'</em>';
                }
                if( json.win != awardIssuse){
                    if(user.isLogin == '1'){
                        loadWinForUser(json.win,json.pre);
                    }else{
                        loadForAllUser(json.win,json.pre);
                    }  
                } else if( awardIssuse == json.win ) {
        }
    });
}
function loadWinForUser(win,pre ,clear,timer){
    if(!timer) timer = 60000;
    var url = baseUrl+'/index.php?m=five&c=index&a=win&lottery_type='+lottery_type;
    if(win){
        url+='&winCode='+encodeURIComponent(win);
    }
    if(pre){
        url+='&winPre='+encodeURIComponent(pre);
    }
    if(user.isLogin == '1'){
        $.ajax({type: "POST",
            url: url,
            dataType: "json" ,
            data:'userId='+user.uid+'&uPoints='+user.points,
            cache : false,
            success: function(json){
                if(json){
                    if(json.tip!='login'){
                        var winIssuse = $.cookie('theIssuse');
                        if(json.tip=='success' && winIssuse == json.issuse){
                            win_tips('恭喜您，您在<stong>'+json.issuse+'</stong>期中已经中奖');
                            if($('.enter_digital').size()>0){
                                $('.enter_digital').text(json.amount);
                            }
                            $.cookie('winIssuse' ,json.issuse);
                        }
                    }
                }
            }
        });
    }
}
function loadForAllUser(win,pre,timer){
    if(!timer) timer = 60000;
    var url = baseUrl+'/index.php?m=five&c=index&a=allWins&lottery_type='+lottery_type;
    if(win){
        url+='&winCode='+encodeURIComponent(win);
    }
    if(pre){
        url+='&winPre='+encodeURIComponent(pre);
    }
    $.ajax({type: "POST",
        url: url,
        dataType: "json" ,
        data:'',
        cache : false,
        success: function(json){
//            _ALL_TIMER_ = setTimeout("loadForAllUser()", timer);
        }
    });
}
function win_tips(content){
    $.typebox({
        'title' : '温馨提示',
        'width': '400',
        'height' : '150',
        'content' : content,
        'padding' : 10,
        'type' : 'text',
        'call' :function(){
            window.location.reload();
        }
    });
    $.typebox.display('cancel',0);
    $('#typeboxContent').css({
        'text-align':'center'
    });
    $('#typeboxClose').click(function(){
        window.location.reload();
    });
}