var betTime = 0;var nextRequest = false;var awardIssuse = null;var awardSeconds = 0;
var _ALL_TIMER_;
function loadNextTime(){
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=five&c=index&a=getServerTime&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){        	        	// 返回数据有问题,在不在处理        	if( json.issuse == '' || json.bettime == ''){        		setTimeout("refresh()", 60000);        		return;        	}
            $('#theCur').html(json.issuse);            var period = json.issuse;            if( period != null && period != ''){            	var p = period.split('-')[1];            	$('#curperiod').html(p );            	$('#remainperiod').html(num-p);            }            
            $('#proName').val(json.issuse);                        awardSeconds = json.awardSeconds;
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
            }            if( (betTime > 600 - awardSeconds) && betTime <=600 ){
            	setTimeout("loadWinInfo()", (betTime + awardSeconds - 600) * 1000 );
            } else {            	loadWinInfo();            }
            setTimeout("setOutTime()", 1000);
        }
    });
}function refresh(){	window.location.reload();}
function setOutTime(){
    if(betTime<1){    	betTime = 10; //防止在未返回数据前不断重复执行
        loadNextTime();//        nextRequest = true
        waitAward();
    }else{    	
        betTime = betTime - 1;        // 下一期自动刷新页面
        if( betTime < 1){
        	setTimeout("refresh()", 5000);        	// 您好，第 15010923 期已截止，当前期是第 15010924 期，投注时请确认您选择的期号，祝您投注愉快，谢谢！        	/*var curPeriod = $('#theCur').text();        	var nextPeriod = Common.getNext(curPeriod);        	Common.tip("您好，第 "+ curPeriod + " 期已截止，当前期是第 " + nextPeriod +" 期，投注时请确认您选择的期号，祝您投注愉快，谢谢！");*/        	
        }  
        gameHasEnd = 0;
        setTimeout("setOutTime()", 1000);
        var str = betTime.toLeftTimeString();
        if($('#countDownTime').size()>0) $('#countDownTime').html(str);
    }
}function waitAward(){
	if($('#awerdNum_balls').size()	>0) $('#awerdNum_balls').html('<div class="opening" id="is_opennig"></div>');
}
var firstTime = 1;
function loadWinInfo(){	
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=five&c=index&a=getAwardInfo&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){        	        	setTimeout("loadRecentResult()", 2000);        	        	if( json.pre == "" && firstTime > 1){        		setTimeout("loadWinInfo()", 5000);        		return;        	}
            $('#prevWin').html(json.pre);
                var args = json.win.split(',');
                html='';                var hz = 0;
                for(var w=0;w<args.length;w++){
//                    html+='<em class="num'+args[w]+'" title="'+args[w]+'">'+args[w]+'</em>';                	 html+= '<em class="awardBall' + (w+1) +'">' +  args[w] + '</em>';//                	 html+= '<span class="hm_'+ args[w] + '">'+ args[w] + '</span>&nbsp;&nbsp;';                 	 hz = hz + parseInt(args[w],10);
                }                                var d = hz >= 30 ? '<span class="da_ico"> 大</span>' : '<span class="xiao_ico"> 小</span>';                                var e = hz%2 == 0 ? '<span class="shuang_ico">双</span>':'<span class="dan_ico">单</span>';                                if( $('#kjxthz').size() > 0 ){                	var h = '和值：<span id="lottery_hz">' + hz + '</span> 型态：' + d + '&nbsp;&nbsp;' + e;                	$('#kjxthz').html(h);                }                
                if( json.win != awardIssuse){                	if($('#awerdNum_balls').size()>0) $('#awerdNum_balls').html(html);                	awardIssuse = json.win;
                    if(user.isLogin == '1'){
                        loadWinForUser(json.win,json.pre);
                    }else{
                        loadForAllUser(json.win,json.pre);
                    }  
                } else if( awardIssuse == json.win ) {//                	setTimeout("loadWinInfo()", 10000);                }                if( awardIssuse == null){ awardIssuse = json.win; }                
        }
    });        firstTime ++;	
}function loadRecentResult(){		if( typeof(recentNum) == "undefined" ) recentNum = 15;	var url = baseUrl + "/index.php?m=five&c=index&a=loadRecentResult&lottery_type="+ lottery_type + "&recentNum=" + recentNum;    $.ajax({type: "POST",        url: url,        dataType: "json" ,        data:{},        cache : false,        success: function(json){            if(json){                	 html='';                	 for(var w=0;w<json.length;w++){                		 var data = json[w];                		 	                	 html += '<tr data-period="' + data.proName + '"><td align="center">'+data.proName + '</td> <td align="center"> <span class="c_red">'+ data.codes + "</span></td>"; 	                		                 		 var args = data.codes.split(',');                		 var hz = 0;                		 for(var i=0;i<args.length;i++){	 	                	var value = args[i];	 	                	hz = hz+parseInt(value,10);	 	                		 	                  }                		 var d= '';                		 if( hz <= 29){                			 d = '<span class="xiao_ico"> 小</span>';                 		 } else if( hz > 29 ){ d = '<span class="da_ico"> 大</span>'; } ;                		                 		 var e = hz%2 == 0 ? '<span class="shuang_ico">双</span>':'<span class="dan_ico">单</span>';                		                 		 html += '<td align="center"  >'+ hz + '</td><td align="center">  ' + d + '&nbsp;|&nbsp;' + e + '</td></tr>' 	                }                	 $('#awardNumBody').html(html);                    }            }    });}
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
