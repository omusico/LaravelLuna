


var betTime = 0;
var awardIssuse = null;
var awardSeconds = 0;

var _ALL_TIMER_;

function refresh(){
	window.location.reload();
}

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

function waitAward(){
	if($('#awerdNum_balls').size()	>0) $('#awerdNum_balls').html('<div class="opening" id="is_opennig">正在开奖，请稍后...</div>');
}



function loadWinInfo(){

    $.ajax({type: "POST",

        url: baseUrl+'/index.php?m=common&c=index&a=getLotteryDataForQt&lottery_type='+lottery_type,

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
	      
	      /*if( issuse != null && issuse != ''){
          	var p = issuse.split('-')[1];
          	$('#curperiod').html(p-1);
          	$('#remainperiod').html(num-p+1);
          }*/

        	// 已经开奖 
        	if( status == 0  ){     
        	      $('#prevWin').html(data.preTerm);
        	      var args = data.preOpenResult.split(',');
                  html='';
                  var hz = 0;
                  for(var w=0;w<args.length;w++){
                	  html+= '<em class="awardBallten' + (w+1) +'">' +  args[w] + '</em>';
                	  hz = hz + parseInt(args[w],10);
                  }
                  
                  var d = hz >= 30 ? '<span class="da_ico"> 大</span>' : '<span class="xiao_ico"> 小</span>';
                  var e = hz%2 == 0 ? '<span class="shuang_ico">双</span>':'<span class="dan_ico">单</span>';

                  if( $('#kjxthz').size() > 0 ){
                  	var h = '和值：<span id="lottery_hz">' + hz + '</span> 型态：' + d + '&nbsp;&nbsp;' + e;
                  	$('#kjxthz').html(h);
                  }

                  if($('#awerdNum_balls').size()>0) $('#awerdNum_balls').html(html);
                  setTimeout("loadRecentResult()", 2000 );
                  
        	} else if( status == 1){ // 正在派奖
        		 $('#prevWin').html(data.preTerm);
        		 
        		 if( betTime > 300 - awardSeconds && betTime <=300){
                 	setTimeout("loadWinInfo()", (betTime + awardSeconds - 300) * 1000 );
                 } else if( betTime <= 300 - awardSeconds ){
                	 setTimeout("loadWinInfo()", 5000 );
                 }
        	} else if(status == -1 ) { // 接口异常
        		setTimeout("refresh()", 5000);
        	}
        	
           
        }

    });

}

function loadRecentResult(){
	var url = baseUrl + "/index.php?m=common&c=index&a=loadRecentResult&lottery_type="+lottery_type;
    $.ajax({type: "POST",
        url: url,
        dataType: "json" ,
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


// 移动版走势图
function loadRecentResultForMobile(){
	var url = baseUrl + "/index.php?m=common&c=index&a=loadRecentResult&lottery_type="+lottery_type;
    $.ajax({type: "POST",
        url: url,
        dataType: "json" ,
        data:{},
        cache : false,
        success: function(json){
            if(json){
                	 html='';
                	 if( typeof(recentNum) == "undefined" ) recentNum = 15;
                	 for(var w=0;w<json.length && w< recentNum ;w++){
                		 var data = json[w];
                		 // 二星和值及形态
                		 
                		 var codes = data.codes.split(",");
                		 
                		 var exhz =  parseInt(codes[3],10)  + parseInt(codes[4],10);
						 var exsd = exhz%2 == 0  ? '双' : '单';
						 var cls5 = exhz%2 == 0 ? 'shuang_ico' : 'dan_ico';
								
						 var exdx = exhz > 9 ? '大' : '小';
						 var cls6 = exhz > 9 ? 'da_ico' : 'xiao_ico';
                		 
	                	html += 
	                	   '<tr data-period="' + data.proName + 
	                	   '"><td align="center">'+data.proName + 
	                	   '</td> <td align="center"> <span class="c_red">'+  data.codes + 
	                	   "</span></td>" +
	                	   "<td>  "  + exhz + "</td>"  +
	                	   "<td> <span class='" + cls5 + "' > "  + exsd + "</span> | <span class='" + cls6 + "'>" + exdx + "</span></td>"  +
	                	   "</tr>"; 
 	                }
                	 $('#awardNumBody').html(html); 
                   }
            }
    });
}


function loadWinForUser(win,pre ,clear,timer){


    var url = baseUrl+'/index.php?m=che&c=index&a=win&lottery_type='+lottery_type;

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

