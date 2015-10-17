


var betTime = 0;
var awardIssuse = null;
var awardSeconds = 0;
var canOrder = true;


var _ALL_TIMER_;

function refresh(){
	window.location.reload();
}

Number.prototype.toLeftTimeString = function() {

    var a = parseInt(this / 60 / 60 / 24, 10);

    var b = parseInt(this / 60 / 60 % 24, 10);

    var c = parseInt(this / 60 % 60, 10);

    var f = this % 60;

    var e = [];

    e.push(a.toString());

    e.push(b > 9 ? b.toString() : "0" + b.toString());

    e.push(c > 9 ? c.toString() : "0" + c.toString());

    e.push(f > 9 ? f.toString() : "0" + f.toString());

    return e[0] > 0 ? e[0] + "天" + parseInt(e[1], 10) + "小时": e[1] + ":" + e[2] + ":" + e[3]

};

function setOutTime(){
    if(betTime < 1){
    	$("#theCur").html("");
    	betTime = 600; // 防止在未返回数据前不断重复执行
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

function waitAward(){
	
	if($('#awerdNum_balls').size()	>0) $('#awerdNum_balls').html('<div class="opening" id="is_opennig">正在开奖，请稍后...</div>');
}



function loadWinInfo(){
    var csrf_token = $('input[name=_token]').val();
    $.ajax({type: "POST",

        url: '/getLotteryData?lottery_type='+lottery_type,
        data: '_token='+csrf_token,
        dataType: "json" ,
        cache : false,
        success: function(json){
        
          var status = json.status;
        	
  		  var data = json.data;
		  
		  $('#theCur').html(data.currentPeriod);
		  $('#proName').val(data.currentPeriod);
		  issuse = data.currentPeriod;
		  awardSeconds = data.kjTime;
	      betTime = data.leftTime;

	      if( issuse != null && issuse != '' && lottery_type != 'beijin'){
	          	var p = issuse.split('-')[1];
	          	$('#curperiod').html(p-1);
	          	$('#remainperiod').html(num-p+1);
	       }
	      
        	// 已经开奖 
        	if( status == 0  ){     
        	      $('#prevWin').html(data.preTerm);
        	      var args = data.preOpenResult.split(',');
                  html='';
                  var hz = 0;
                  for(var w=0;w<args.length;w++){
                	  html+= '<span class="hm_'+ args[w] + '"></span>'; 
                 	  hz = hz + parseInt(args[w],10);
                  }
                  
                  var d = hz > 10 ? '<span class="da_ico"> 大</span>' : '<span class="xiao_ico"> 小</span>';
                  
                  var e = hz%2 == 0 ? '<span class="shuang_ico">双</span>':'<span class="dan_ico">单</span>';

                  
                  if( $('#kjxthz').size() > 0 ){
                  	var h = '和值：<span id="lottery_hz">' + hz + '</span> 型态：' + d + '&nbsp;&nbsp;' + e;
                  	$('#kjxthz').html(h);
                  }
                  if($('#awerdNum_balls').size()>0) $('#awerdNum_balls').html(html);
                  setTimeout("loadRecentResult()", 2000 );
        	} else if( status == 1){ // 正在派奖
        		 $('#prevWin').html(data.preTerm);
        		 
        		 if( betTime > 600 - awardSeconds && betTime <=600){
                 	setTimeout("loadWinInfo()", (betTime + awardSeconds - 600) * 1000 );
                 } else if( betTime <= 600 - awardSeconds ){
                	 setTimeout("loadWinInfo()", 10000 );
                 }
        	} else if(status == -1 ) { // 接口异常
        		setTimeout("refresh()", 5000);
        	}
        }
    });

}
function loadRecent(){
    if( $("#awardNumBody").has("tr").length == 0 ){
        loadRecentResult();
    }
}

function loadRecentResult(){
    var csrf_token = $('input[name=_token]').val();
	if( typeof(recentNum) == "undefined" ) recentNum = 15;

	var url = "/loadRecentResult?lottery_type="+lottery_type  + "&recentNum=" + recentNum;

    $.ajax({type: "GET",
        data: '_token='+csrf_token,
        url: url,

        dataType: "json" ,

        data:{},

        cache : false,

        success: function(json){

            if(json){

                	 html='';
                	
                	 for(var w=0;w<json.length && w< recentNum;w++){

                		 var data = json[w];

	                		 html += '<tr data-period="' + data.proName + '"><td align="center">'+data.proName + '</td> <td align="center"> <span class="c_red">'+ data.codes + "</span></td>"; 

                		 var args = data.codes.split(',');

                		 var hz = 0;

                		 for(var i=0;i<args.length;i++){

	 	                	var value = args[i];

	 	                	hz = hz+parseInt(value,10);

	 	                  }
                		 
                		 var d= '';
                		 if( hz <= 10 ){
                			 d = '<span class="xiao_ico"> 小</span>'; 
                		 } else if( hz > 10 ){ d = '<span class="da_ico"> 大</span>'; } ;
                		 
                		 var e = hz%2 == 0 ? '<span class="shuang_ico">双</span>':'<span class="dan_ico">单</span>';
                		 
                		 html += '<td align="center"  >'+ hz + '</td><td align="center">  ' + d + '&nbsp;|&nbsp;' + e + '</td></tr>'
                		 
                		
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

