
var betTime = 0;
var _ALL_TIMER_;
function loadNextTime(){
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=lottery&c=index&a=getServerTime&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){
        		loadWinInfo();
            $('#theCur').html(json.issuse);
            $('#proName').val(json.issuse);
            betTime = json.bettime;
            var theIssuse = $.cookie('theIssuse');
            if(betTime<1){
                //CP.tip('您好，'+json.issuse+' 期已截止，请等待下一期投注开始。');
                var nextPro = json.issuse.split('-');
                var nextIssuse = 0 ,msg;
                if(nextPro[1]<82){ //每天82期
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
            //$('#awerdNum_balls').html('<div class="wait_open" id="wait_open">请等待开奖！</div>');
            setTimeout("setOutTime()", 1000);
            
        }
    });
}
function setOutTime(){
    if(betTime < 1){
    	betTime = 10; //防止在未返回数据前不断重复执行
        loadNextTime();
    }else{
        betTime = betTime - 1;
        gameHasEnd = 0;
        setTimeout("setOutTime()", 1000);
        var str = betTime.toLeftTimeString();
        if($('#countDownTime').size()>0) $('#countDownTime').html(str);
    }
}
var firstTime = 1;
function loadWinInfo(){
    $.ajax({type: "POST",
        url: baseUrl+'/index.php?m=lottery&c=index&a=getAwardInfo&lottery_type='+lottery_type,
        dataType: "json" ,
        cache : false,
        success: function(json){
        		setTimeout("loadWinInfo()",10000);
        	
        	setTimeout("loadRecentResult()", 2000);
            $('#prevWin').html(json.pre);
                html='';
                for(var w=0;w<args.length;w++){
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
function loadRecentResult(){
	
	
	var url = baseUrl + "/index.php?m=lottery&c=index&a=loadRecentResult&lottery_type="+lottery_type + "&recentNum=" + recentNum;;
    $.ajax({type: "POST",
        url: url,
        dataType: "json" ,
        data:{},
        cache : false,
        success: function(json){
            if(json){
                	 html='';
                	 for(var w=0;w<json.length;w++){
                		 var data = json[w];
                		 
	                		 html += '<tr data-period="' + data.proName + '"><td align="center">'+data.proName + '</td> <td align="center"> <span class="c_red">'+ data.codes + "</span></td>"; 
	                		 
                		 var args = data.codes.split(',');
                		 var hz = 0;
                		 for(var i=0;i<args.length;i++){
	 	                	var value = args[i];
	 	                	hz = hz+parseInt(value,10);
	 	                	
	 	                  }
                		
 	                }
                	 $('#awardNumBody').html(html); 
                   }
            }
    });
}
function loadWinForUser(win,pre ,clear,timer){
    var url = baseUrl+'/index.php?m=lottery&c=index&a=win&lottery_type='+lottery_type;
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
    var url = baseUrl+'/index.php?m=lottery&c=index&a=allWins&lottery_type='+lottery_type;
    if(win){
        url+='&winCode='+encodeURIComponent(win);
    }
    if(pre){
        url+='&winPre='+encodeURIComponent(pre);
    }
    $.ajax({type: "POST",
        url: url,
        dataType: "json" ,
        data:'userId='+user.uid+'&uPoints='+user.points,
        cache : false,
        success: function(json){
            _ALL_TIMER_ = setTimeout("loadForAllUser()", timer);
        }
    });
}