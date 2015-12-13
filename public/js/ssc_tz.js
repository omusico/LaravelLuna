/**
 * @namespace 彩票
 * @name 北京快车
 * @author 
 */

var Ssc = {};
var $dom={
    playType : $('#playType'),
    gameName : $('#gameName'),
    has_add_box : $('#has_add_ball'),
    box_ball_EXHZ : $('#box_ball_EXHZ_num li'), // 二星和值
    box_ball_SXHZ : $('#box_ball_SXHZ_num li'), // 三星和值
    box_ball_SWHZ : $('#box_ball_SWHZ_num li'), // 首尾和值
    countDownTime : $('#countDownTime')
};
var $data = {
    codes:[],
    price : 2
}
Ssc.init = function(){
    var t;
    $('#myTab3 li').click(function(){
        $('#myTab3 li').removeClass('active').addClass('normal');
        $(this).removeClass('normal').addClass('active');
        t = $(this).attr('val');
        $('.all_box').hide();
        $('#box_ball_'+t).show();
        Ssc.core.clearAll();
        $dom.playType.val(t);
        
        var name = $(this).text();
        $dom.gameName.val(name);
    });
    
   
    
     // 前三直选
    
    var box_ball_qszx = [{'name':'#box_ball_TABSXZHIX_QSZHIX_0 li','codeArray':[]},
          	           {'name':'#box_ball_TABSXZHIX_QSZHIX_1 li','codeArray':[]},
          	           {'name':'#box_ball_TABSXZHIX_QSZHIX_2 li','codeArray':[]},
          	           ];
    Ssc.core.registerZx({
              	'name':'前三直选',
              	'boxBall':box_ball_qszx,
              	'type' : 'TABSXZHIX_QSZHIX'
              	});
    
    
    
    // 中三直选
    var box_ball_zszx = [{'name':'#box_ball_TABSXZHIX_ZSZHIX_0 li','codeArray':[]},
            	           {'name':'#box_ball_TABSXZHIX_ZSZHIX_1 li','codeArray':[]},
            	           {'name':'#box_ball_TABSXZHIX_ZSZHIX_2 li','codeArray':[]},
            	           ];
    Ssc.core.registerZx({
                	'name':'中三直选',
                	'boxBall':box_ball_zszx,
                	'type' : 'TABSXZHIX_ZSZHIX'
                	});
    
    var box_ball_hszx = [{'name':'#box_ball_TABSXZHIX_HSZHIX_0 li','codeArray':[]},
          	           {'name':'#box_ball_TABSXZHIX_HSZHIX_1 li','codeArray':[]},
          	           {'name':'#box_ball_TABSXZHIX_HSZHIX_2 li','codeArray':[]},
          	           ];
   Ssc.core.registerZx({
              	'name':'后三直选',
              	'boxBall':box_ball_hszx,
              	'type' : 'TABSXZHIX_HSZHIX'
              	});
  
  	// 前三组选
  	/*	Ssc.core.registerZuX({'name':'前三组选',
			'type' : 'TABSXZUX_QSZUX',
			'num':3});
  	// 中三组选	
  		Ssc.core.registerZuX({'name':'中三组选',
			'type' : 'TABSXZUX_ZSZUX',
			'num':3});*/
  
   Ssc.core.registerZL(
 		  {'name':'前三组选',
     		'type':'TABSXZUX_QSZUX',
     		'num':2});
   
    // 中三组选
    Ssc.core.registerZL(
 		  {'name':'中三组选',
     		'type':'TABSXZUX_ZSZUX',
     		'num':2});
  		
  	// 后三组选	
     Ssc.core.registerZL(
	    		  {'name':'后三组选',
	        		'type':'TABSXZUX_HSZUX',
	        		'num':2});
  		
  		
    
      // 五星直选
      var box_ball_wxzx = [{'name':'#box_ball_TABWX_WXZHIX_0 li','codeArray':[]},
                	           {'name':'#box_ball_TABWX_WXZHIX_1 li','codeArray':[]},
                	           {'name':'#box_ball_TABWX_WXZHIX_2 li','codeArray':[]},
                	           {'name':'#box_ball_TABWX_WXZHIX_3 li','codeArray':[]},
                	           {'name':'#box_ball_TABWX_WXZHIX_4 li','codeArray':[]},
                	               ];
  /*   Ssc.core.registerQS({
                    	'name':'五星直选',
                    	'boxBall':box_ball_wxzx,
                    	'type' : 'TABWX_WXZHIX'
                    	});
    */
      // 直选
      Ssc.core.registerZx({
      	'name':'五星直选',
      	'boxBall':box_ball_wxzx,
      	'type' : 'TABWX_WXZHIX'
      	});
     // 五星通选
   /*  Ssc.core.registerTX({'name':'五星通选',
			'type' : 'TABWX_WXTX',
			'num':5});*/
      
      
      var box_ball_wxtx = [{'name':'#box_ball_TABWX_WXTX_0 li','codeArray':[]},
            	           {'name':'#box_ball_TABWX_WXTX_1 li','codeArray':[]},
            	           {'name':'#box_ball_TABWX_WXTX_2 li','codeArray':[]},
            	           {'name':'#box_ball_TABWX_WXTX_3 li','codeArray':[]},
            	           {'name':'#box_ball_TABWX_WXTX_4 li','codeArray':[]},
            	           	];
      Ssc.core.registerZx({
        	'name':'五星通选',
        	'boxBall':box_ball_wxtx,
        	'type' : 'TABWX_WXTX'
        	});
    
     Ssc.core.registerHZ({
    	 'name':'二星和值',
    	 'type':'TABHZ_EXHZ',
    	 'hasDw' : false
     });
     
     Ssc.core.registerHZ({
    	 'name':'三星和值',
    	 'type':'TABHZ_SXHZ',
    	 'hasDw' : false
     });
     
     Ssc.core.registerHZ({
    	 'name':'首尾和值',
    	 'type':'TABHZ_SWHZ',
    	 'hasDw' : true
     });
     

     

     // 前二直选
     var box_ball_qezx = [{'name':'#box_ball_TABEX_QEZHIX_0 li','codeArray':[]},
              	          {'name':'#box_ball_TABEX_QEZHIX_1 li','codeArray':[]}];
      Ssc.core.registerZx({
                  	'name':'前二直选',
                  	'boxBall':box_ball_qezx,
                  	'type' : 'TABEX_QEZHIX'
                  	});
      
      // 后二直选
      var box_ball_hezx = [{'name':'#box_ball_TABEX_HEZHIX_0 li','codeArray':[]},
               	          {'name':'#box_ball_TABEX_HEZHIX_1 li','codeArray':[]}];
       Ssc.core.registerZx({
                   	'name':'后二直选',
                   	'boxBall':box_ball_hezx,
                   	'type' : 'TABEX_HEZHIX'
                   	});
      
       
       
      
      // 组三包选
      
      var box_ball_zsbx = [{'name':'#box_ball_ZSBX_num li','codeArray':[]}];
      Ssc.core.registerBx({
    	  'name' : '组三包选',
    	  'type' : 'ZSBX',
    	  'boxBall' :box_ball_zsbx,
    	  'num' : 2
      });
      
      // 组六包选
      var box_ball_zlbx = [{'name':'#box_ball_ZLBX_num li','codeArray':[]}];
      Ssc.core.registerBx({
    	  'name' : '组六包选',
    	  'type' : 'ZLBX',
    	  'boxBall' :box_ball_zlbx,
    	  'num' : 2
      });
      
      // 牛牛
      Ssc.core.registerNN({
    		  'name':'牛牛',
    		  'type':'TABNN_NN'}
      );
      
      // 前三组六
      Ssc.core.registerZL(
    		  {
        		  'name':'前三组六',
        		  'type':'TABSXZUX_QSZUL',
        		'num':3});
      
      // 中三组六
		Ssc.core.registerZL(
	    		  {
	        		  'name':'中三组六',
	        		  'type':'TABSXZUX_ZSZUL',
	        		'num':3});
      // 后三组六
		Ssc.core.registerZL(
	    		  {
	        		  'name':'后三组六',
	        		  'type':'TABSXZUX_HSZUL',
	        		'num':3});
      
	    // 前二组二
	/*	Ssc.core.registerZL(
	    		  {
	        		  'name':'前二组二',
	        		  'type':'TABEX_QEZUE',
	        		'num':2});*/
	    // 后二组二
	/*	Ssc.core.registerZL(
	    		  {
	        		  'name':'后二组二',
	        		  'type':'TABEX_HEZUE',
	        		'num':2});*/
	   // 组三直选
	   
		Ssc.core.registZsZx();
		
/*		// 一星直选
		 var box_ball_qyzx = [{'name':'#box_ball_TABYX_QYZHIX_0 li','codeArray':[]}
	              	          ];
	      Ssc.core.registerZx({
	                  	'name':'前一直选',
	                  	'boxBall':box_ball_qyzx,
	                  	'type' : 'TABYX_QYZHIX'
	                  	});
		
	      var box_ball_hyzx = [{'name':'#box_ball_TABYX_HYZHIX_0 li','codeArray':[]}
	          ];
			Ssc.core.registerZx({
			  	'name':'后一直选',
			  	'boxBall':box_ball_hyzx,
			  	'type' : 'TABYX_HYZHIX'
			  	});*/
		
		
	     var playType2 = [{'name':'第一位','type':'TABDW_YI'},
	                      {'name':'第二位','type':'TABDW_ER'},
	                      {'name':'第三位','type':'TABDW_SAN'},
	                      {'name':'第四位','type':'TABDW_SI'},
	                      {'name':'第五位','type':'TABDW_WU'},
	                      ];
	     
	     for(var i=0;i< playType2.length;i++){
	    	 Ssc.core.registerZL(
		    		  {
		        		  'name':playType2[i].name,
		        		  'type':playType2[i].type,
		        		'num':1});
	     }
		

  
}

Ssc.core = {
    getCodes : function(){
        var has_len = $data.codes.length;
        var code = [];
        if(has_len>0){
/*            $.each($data.codes,function(i){
//                var arr = $data.codes[i].split('|');
//                code.push(arr[1]);
            		
            });*/
        }
        return $data.codes;
    },
    clearAll:function(){
        $data.codes.length = 0;
//        $dom.box_ball_BX.removeClass('OneNum_active');
        $("#box_ball_SWHZ_num").find(".num").removeClass('OneNum_active');
        $("#box_ball_QSHZ_num").find(".num").removeClass('OneNum_active');
        
        $('.select_big li').removeClass('OneNum_active');
        $('.redBallBox li').removeClass('OneNum_active');
        $('.select_num1 li').removeClass('OneNum_active');
        $('.hmList li').find(".num").removeClass('OneNum_active');
        $('.mono li').removeClass('OneNum_active');
        $('.mony li').removeClass('OneNum_active');
        $dom.has_add_box.empty();
    },
    addBall:function(code,v,t){
        $data.codes.push(t+'|'+v);
        code.push(v);
        return code;
    },
    removeBall:function(code,v,t){

        if(code) code.splice($.inArray(v,code),1);
        
        $data.codes.splice($.inArray(t+'|'+v,$data.codes),1);
        return code;
    },
    initCount:function(){
        Ssc.core.bindDelete();
    },
    
 // 注册直选
    registerZx : function(obj){
    	var _name = obj.name;  // 顺序一样
    	var box_ball = obj.boxBall;
        var _type = obj.type;
        var btn = '#ball_add_btn_' + obj.type;
        var _get_odds;
        var code = [];
        
        $.each(box_ball,function(n,ball){
            	
            	$(ball.name).each(function(i){
            		var curId = '#'+$(this).parent().parent().attr('id') + " li";
            		
            		$(this).bind('click',function(){
            			v = $(this).text();
            			// 去掉同行中的其他元素
            			/*if(ball.codeArray.length > 0 && ball.codeArray[0] != v){
            				$(curId).removeClass('OneNum_active');
            				ball.codeArray  = [];
            			}*/
            			if($(this).hasClass('OneNum_active')){
            				 $(this).removeClass('OneNum_active');
            				 ball.codeArray.splice($.inArray(v,ball.codeArray),1);
            			} else {
            				$(this).addClass('OneNum_active');
            				ball.codeArray.push(v);
            			}

            		});
            	});
            });
//        { name:xt[i].name,type:xt[i].type}
           for(var j=0;j<box_ball.length;j++){
        	   $("#"+ obj.type + "_help_" + j).find(".all").bind("click",{xh:j},function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").addClass('OneNum_active');
        		   box_ball[xh].codeArray = [];
        		   box_ball[xh].codeArray = ['0','1','2','3','4','5','6','7','8','9'];
        	   });
        	   
        	   
        	   $("#"+ obj.type + "_help_" + j).find(".large").bind("click",{xh:j},function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
        		   $("#box_ball_" + obj.type + "_" +xh + " li:gt(4)").addClass('OneNum_active');
        		   
        		   box_ball[xh].codeArray = [];
        		   box_ball[xh].codeArray = ['5','6','7','8','9'];
        		   
        		   
        	   });
        	   
        	   $("#"+ obj.type + "_help_" + j).find(".small").bind("click",{xh:j}, function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
        		   $("#box_ball_" + obj.type + "_" +xh + " li:lt(5)").addClass('OneNum_active'); 
        		   box_ball[xh].codeArray = [];
        		   box_ball[xh].codeArray = ['0','1','2','3','4'];
        	   });
        	   
        	   // 奇数
        	   $("#"+ obj.type + "_help_" + j).find(".odd").bind("click",{xh:j},function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
        		   $("#box_ball_" + obj.type + "_" +xh + " li:odd").addClass('OneNum_active'); 
        		   box_ball[xh].codeArray = [];
        		   box_ball[xh].codeArray = ['1','3','5','7','9'];
        	   });
        	   
        	   // 偶数
        	   $("#"+ obj.type + "_help_" + j).find(".even").bind("click",{xh:j},function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
        		   $("#box_ball_" + obj.type + "_" +xh + " li:even").addClass('OneNum_active'); 
        		   
        		   box_ball[xh].codeArray = [];
        		   box_ball[xh].codeArray = ['0','2','4','6','8'];
        	   });
        	   
        	   $("#"+ obj.type + "_help_" + j).find(".clearBtn").bind("click",{xh:j},function(event){
        		   var xh = event.data.xh;
        		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
        		   box_ball[xh].codeArray = [];
        	   });
           }
           
           
           var xt = [{'type':'dan','name':'单'},{'type':'shuang','name':'双'},{'type':'xiao','name':'小'},{'type':'da','name':'大'}];
           for(var i=0;i<xt.length;i++){
       	   $('#box_ball_'+obj.type+'_'+xt[i].type).click({ name:xt[i].name,type:xt[i].type},function(event){

                  var val = event.data.name;
                  var type = event.data.type;
                  
                  if(Ssc.checkRepeatCodes(val ,_type)){
                      if($(this).hasClass('OneNum_active')){
                      	$(this).removeClass('OneNum_active');
                      } else { 
                      	_get_odds = $('#'+ _type + '_getodds_' + type).text();
                  	   $(this).addClass('OneNum_active');
                  	   Ssc.core.addBall(code,val,_type);
                  	   Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,'box_ball_'+obj.type+'_' + type);
                  	   Ssc.core.initCount();
                         $('#getOdds').val(_get_odds);
                      }
                  }
              });
           };
            
           
            $(btn).bind('click',function(){
              	
                var isCorrect = true;
                $.each(box_ball,function(n,value){
                	if(value.codeArray.length <= 0 ){
                		Common.tip('您选的方案不足1注，请参考玩法说明选满1注后进行投注。');
                		isCorrect = false;
                		return;
                	}
                });
                
                if(!isCorrect){
                	return;
                }
                
                
                $('#getOdds').val($('#'+obj.type+'_getodds').text());
                _get_odds=$('#getOdds').val();
                var tmp = ""
                var zhushu=1;
                $.each(box_ball,function(n,ball){
                	zhushu = zhushu * ball.codeArray.length;
                	var h = "";
                	$.each(ball.codeArray,function(i,hm){
                		h = h+ hm + "*";
                	});
                	h = h.substr(0,h.length-1);
                	tmp = tmp + h + ",";
                	$(ball.name).removeClass('OneNum_active');
                	ball.codeArray = [];
                	
                });
                tmp = tmp.substr(0,tmp.length-1);
                Ssc.core.render({type:_type,zhushu:zhushu,code:tmp,odd:_get_odds} ,tmp, _name);

                Ssc.core.bindDelete();

        });
    },
   
    
    //组三直选
    registZsZx : function(){
    var _name = '组三直选';
    var _type = 'TABSXZUX_ZUSZHIX';
    var code = [];
    var single = [];
    var sli,li,sv,v;
    var _get_odds;
    var box_ball_2THDX = $("#box_ball_TABSXZUX_ZUSZHIX_0 li");
    var box_ball_2THDX_single = $("#box_ball_TABSXZUX_ZUSZHIX_1 li");
    box_ball_2THDX.each(function(i){
        sli = box_ball_2THDX_single.eq(i);
        $(this).bind('click' ,function(){
            v = $(this).text();
            sv = $(this).text();

            if($(this).hasClass('OneNum_active')){
                $(this).removeClass('OneNum_active');
                code.splice($.inArray(v,code),1);
            }else{
                $(this).addClass('OneNum_active');
                code.push(v);
            }
            if(sli.hasClass('OneNum_active')){
                sli.removeClass('OneNum_active');
                single.splice($.inArray(sv,single),1);
            }
        });
        sli.bind('click',function(){
            li = box_ball_2THDX.eq($(this).index()-1);
            v = li.text();
            sv = $(this).text();
            if(li.hasClass('OneNum_active')){
                li.removeClass('OneNum_active');
                code.splice($.inArray(v,code),1);
            }
            if($(this).hasClass('OneNum_active')){
                $(this).removeClass('OneNum_active');
                single.splice($.inArray(sv,single),1);
            }else{
                $(this).addClass('OneNum_active');
                single.push(sv);
            }
        });
       

    });
    var tmp ,zhushu=0;
    $('#ball_add_btn_TABSXZUX_ZUSZHIX').bind('click',function(){
        var len = code.length;
        var slen = single.length;

        if(len<=0 || slen<=0){
            Common.tip('您选的方案不足1注，请参考玩法说明选满1注后进行投注。');
            return false;
        }else{
        	 $('#getOdds').val($('#TABSXZUX_ZUSZHIX_getodds').text());
            _get_odds=$('#getOdds').val();
            for(var i=0;i<len;i++){
                for(var s=0;s<slen;s++){
                    tmp = code[i]+code[i]+'#'+single[s];
                    Ssc.core.render({type:_type,zhushu:1,code:tmp,odd:_get_odds},tmp,_name);
                    zhushu+=1;
                }
            }
            code.length=0;
            single.length = 0;
            box_ball_2THDX.removeClass('OneNum_active');
            box_ball_2THDX_single.removeClass('OneNum_active');
            Ssc.core.bindDelete();
        }
    });
    },
    // 注册组六
    registerZL:function(obj){
     	var _name = obj.name;  
        var _type = obj.type;
        var num  = obj.num;
        var btn = '#ball_add_btn_' + obj.type;
        var code=[];
        var _get_odds;
        
        $("#box_ball_"+obj.type + "_num li").each(function(){
            $(this).bind("click", function(){
                var val = $(this).text();
                if($(this).hasClass('OneNum_active')){
                    $(this).removeClass('OneNum_active');
                    Ssc.core.removeBall(code,val,_type);
                }else{
                    $(this).addClass('OneNum_active');
                    Ssc.core.addBall(code,val,_type);
                }
            });
        });
        
        var j=0;
        
        $("#"+ obj.type + "_help_" + j).find(".all").bind("click",{xh:j},function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").addClass('OneNum_active');
 		  code = [];
 		  code = ['0','1','2','3','4','5','6','7','8','9'];
 		  $data.codes = [_type+'|'+0,_type+'|'+1,_type+'|'+2,_type+'|'+3,_type+'|'+4,_type+'|'+5,
 		                _type+'|'+6,_type+'|'+7,_type+'|'+8,_type+'|'+9];
 	   });
 	   
 	   
 	   $("#"+ obj.type + "_help_" + j).find(".large").bind("click",{xh:j},function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
 		   $("#box_ball_" + obj.type + "_" +xh + " li:gt(4)").addClass('OneNum_active');
 		   
 		   code = [];
 		   code= ['5','6','7','8','9'];

 		  $data.codes = [_type+'|'+5,_type+'|'+6,_type+'|'+7,_type+'|'+8,_type+'|'+9];
 	   });
 	  
 	   $("#"+ obj.type + "_help_" + j).find(".small").bind("click",{xh:j}, function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
 		   $("#box_ball_" + obj.type + "_" +xh + " li:lt(5)").addClass('OneNum_active'); 
 		   code = [];
 		  code = ['0','1','2','3','4'];
 		  $data.codes = [_type+'|'+0,_type+'|'+1,_type+'|'+2,_type+'|'+3,_type+'|'+4];
 	   });
 	   
 	   // 奇数
 	   $("#"+ obj.type + "_help_" + j).find(".odd").bind("click",{xh:j},function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
 		   $("#box_ball_" + obj.type + "_" +xh + " li:odd").addClass('OneNum_active'); 
 		   code = [];
 		  code = ['1','3','5','7','9'];
 		  $data.codes = [_type+'|'+1,_type+'|'+3,_type+'|'+5,_type+'|'+7,_type+'|'+9];
 	   });
 	   
 	   // 偶数
 	   $("#"+ obj.type + "_help_" + j).find(".even").bind("click",{xh:j},function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
 		   $("#box_ball_" + obj.type + "_" +xh + " li:even").addClass('OneNum_active'); 
 		   
 		  code = [];
 		 code = ['0','2','4','6','8'];
 		 $data.codes = [_type+'|'+0,_type+'|'+2,_type+'|'+4,_type+'|'+6,_type+'|'+8];
 	   });
 	   
 	   $("#"+ obj.type + "_help_" + j).find(".clearBtn").bind("click",{xh:j},function(event){
 		   var xh = event.data.xh;
 		   $("#box_ball_" + obj.type + "_" +xh + " li").removeClass('OneNum_active'); 
 		   code = [];
 		   box_ball[xh].codeArray = [];
 		   $data.codes = [];

 	   });
        
        
        $(btn).bind('click',function(){
            var c=Common.math.Cs(code,num);
            var getcodes = Ssc.core.getCodes();
            if(code.length < num){
            	Common.tip('您选的方案不足1注，请至少选择'+num + '个号码进行投注');
                return false;
            }
 
            	$('#getOdds').val($('#'+ _type + '_getodds').text());
                _get_odds=$('#getOdds').val();
                Ssc.core.render({type:_type,zhushu:c.length,code:code,odd:_get_odds} ,code,_name);
                $("#box_ball_"+obj.type + "_num li").removeClass('OneNum_active');
                Ssc.core.bindDelete();
            code.length=0;
        });
    },
    
    // 注册牛牛
    registerNN : function(obj){
    	var _name = obj.name;  
        var _type = obj.type;
        var num  = obj.num;
        var code = [];
        var _get_odds;
        $("#box_ball_"+ _type +"_num li").each(function(){
            $(this).click(function(){
                var val = $(this).find(".num").text().trim(); 
                var _id = $(this).attr("id");
                if(Ssc.checkRepeatCodes(val ,_type)){
                	
                	if($(this).hasClass('OneNum_active')){
                    	$(this).removeClass('OneNum_active');
                    } else {
                    	_get_odds = $(this).find(".peilv").text();
                    	$(this).addClass('OneNum_active');
                    	Ssc.core.addBall(code,val,_type);
                        Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,_id);
                        Ssc.core.initCount();
                        $('#getOdds').val(_get_odds);             	
                    }
                }
            });
        });
        
    },
    
    // 注册包选
    registerBx : function(obj){
    	var _name = obj.name;  // 顺序一样
        var _type = obj.type;
        var btn = '#ball_add_btn_' + obj.type;
        var num  = obj.num;
        var code = [];
        var _get_odds;
        $("#box_ball_"+obj.type + "_num li").each(function(){
            $(this).bind("click", function(){
                var val = $(this).text();
                if($(this).hasClass('OneNum_active')){
                    $(this).removeClass('OneNum_active');
                    Ssc.core.removeBall(code,val,_type);
                }else{
                    $(this).addClass('OneNum_active');
                    Ssc.core.addBall(code,val,_type);
                   
                }
            });
        });
        $(btn).bind('click',function(){
            var c=Common.math.Cs(code,num);
//            var getcodes = Ssc.core.getCodes();
            if(code.length < num){
            	Common.tip('您选的方案不足1注，请参考玩法说明选满1注后进行投注。');
                return false;
            }
 
            	$('#getOdds').val($('#'+ _type + '_getodds').text());
                _get_odds=$('#getOdds').val();
//                Ssc.core.render({type:_type,zhushu:1,code:c[i],odd:_get_odds} ,c[i],_name);
              /*  for(var i=0,_max=c.length;i<_max;i++){
                	Ssc.core.render({type:_type,zhushu:1,code:c[i],odd:_get_odds} ,c[i],_name);
                }*/
                Ssc.core.render({type:_type,zhushu:c.length,code:code,odd:_get_odds} ,code,_name);
                $("#box_ball_"+obj.type + "_num li").removeClass('OneNum_active');
                Ssc.core.bindDelete();
            code.length=0;
        });
    },
    
    // 注册通选
    registerTX:function(obj){
    	
       	var _name = obj.name;  // 顺序一样
        var _type = obj.type;
        var btn = '#ball_add_btn_' + obj.type;
        var num  = obj.num;
        var code = [];
        var _get_odds;

        $("#box_ball_"+obj.type + "_num li").each(function(){
            $(this).bind("click", function(){
                var val = $(this).text();
                if($(this).hasClass('OneNum_active')){
                    $(this).removeClass('OneNum_active');
                    Ssc.core.removeBall(code,val,_type);
                }else{
                    $(this).addClass('OneNum_active');
                    Ssc.core.addBall(code,val,_type);
                }
            });
        });
        $(btn).bind('click',function(){
            var c=Common.math.Cs(code,num);
//            var getcodes = Ssc.core.getCodes();
            if(code.length < num){
            	Common.tip('您选的方案不足1注，请参考玩法说明选满1注后进行投注。');
                return false;
            }
 
            	$('#getOdds').val($('#'+ _type + '_getodds').text());
                _get_odds=$('#getOdds').val();
                for(var i=0,_max=c.length;i<_max;i++){
                	Ssc.core.render({type:_type,zhushu:1,code:c[i],odd:_get_odds} ,c[i],_name);
                }
                $("#box_ball_"+obj.type + "_num li").removeClass('OneNum_active');
                Ssc.core.bindDelete();
            code.length=0;
        });
    },
    
    
    registerHZ : function(obj){
    	var code=[];
        var _name = obj.name;
        var _type = obj.type;
        var _get_odds;
        $("#box_ball_"+ obj.type +"_num li").each(function(){
            $(this).click(function(){
                var val = $(this).find(".num").text().trim(); 
                var _id = $(this).find(".num").attr("id");
                if(Ssc.checkRepeatCodes(val ,_type)){
                	
                	if($(this).find(".num").hasClass('OneNum_active')){
                    	$(this).find(".num").removeClass('OneNum_active');
                    } else {
                    	_get_odds = $('#'+ obj.type + '_getodds_'+val).text();
                    	$(this).find(".num").addClass('OneNum_active');
                    	Ssc.core.addBall(code,val,_type);
                        Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,_id);
                        Ssc.core.initCount();
                        $('#getOdds').val(_get_odds);             	
                    }
                }
            });
        });
        var xt = [{'type':'dan','name':'单'},{'type':'shuang','name':'双'},{'type':'xiao','name':'小'},{'type':'da','name':'大'}];
        for(var i=0;i<xt.length;i++){
    	   $('#box_ball_'+obj.type+'_'+xt[i].type).click({ name:xt[i].name,type:xt[i].type},function(event){

               var val = event.data.name;
               var type = event.data.type;
               
               if(Ssc.checkRepeatCodes(val ,_type)){
                   if($(this).hasClass('OneNum_active')){
                   	$(this).removeClass('OneNum_active');
                   } else { 
                   	_get_odds = $('#'+ _type + '_getodds_' + type).text();
               	   $(this).addClass('OneNum_active');
               	   Ssc.core.addBall(code,val,_type);
               	   Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,'box_ball_'+obj.type+'_' + type);
               	   Ssc.core.initCount();
                      $('#getOdds').val(_get_odds);
                   }
               }
           });
        };
        // 有定位逻辑
        var dw = [{'type':'dwdan','name':'单'},{'type':'dwshuang','name':'双'},{'type':'dwxiao','name':'小'},{'type':'dwda','name':'大'}];
        if(obj.hasDw ){
        	 for(var i=0;i<dw.length;i++){
          	   $('#box_ball_'+obj.type+'_'+dw[i].type + " li").each(function(j){
          		   $(this).click({ name:dw[i].name,type:dw[i].type}, function(event){
          			 var v = event.data.name;
                     var type = event.data.type;
                 	var array = ['第1位','第2位','第3位','第4位','第5位'];
                 	var val = array[j-1]+"#"+ v; 
                   var _id = $(this).find(".num").attr("id");
                   if(Ssc.checkRepeatCodes(val ,_type)){
                 	if($(this).find(".num").hasClass('OneNum_active')){
                     	$(this).find(".num").removeClass('OneNum_active');
                     } else {
                    	 _get_odds = $('#'+ _type + '_getodds_' + type).text();
                     	$(this).find(".num").addClass('OneNum_active');
                     	Ssc.core.addBall(code,val,_type);
                     	Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,_id);
                     	Ssc.core.initCount();
                        $('#getOdds').val(_get_odds);             	
                     }
          		   }
          	   });
             });
        }
        }
        

    },
    registerQS:function(obj){
    	var _name = obj.name;  // 顺序一样
    	var box_ball = obj.boxBall;
        var _type = obj.type;
        var btn = '#ball_add_btn_' + obj.type;
        var _get_odds;
        
        if(box_ball.length == 1){
        	
        	$(box_ball[0].name).each(function(i){
        		$(this).click(function(){
            	  var val = $(this).text();
                  if(Ssc.checkRepeatCodes(val ,_type)){
                      var _id = $(this).attr("id");
                      if($(this).hasClass('OneNum_active')){
                      	$(this).removeClass('OneNum_active');
                      } else {
                    	  _get_odds = $('#'+obj.type+'_getodds').text();
                    	  $(this).addClass('OneNum_active');
	                      Ssc.core.addBall(box_ball[0].codeArray,val,_type);
	                      Ssc.core.render({type:_type,zhushu:1,code:val,odd:_get_odds} ,val,_name,_id);
	                      Ssc.core.initCount();
	                      $('#getOdds').val(_get_odds);
                      }
                  }
              });
        	});
        	
        } else {
        	
            $.each(box_ball,function(n,ball){
            	
            	$(ball.name).each(function(i){
            		var curId = '#'+$(this).parent().parent().attr('id') + " li";
            		
            		$(this).bind('click',function(){
            			v = $(this).text();
            			// 去掉同行中的其他元素
            			if(ball.codeArray.length > 0 && ball.codeArray[0] != v){
            				$(curId).removeClass('OneNum_active');
            				ball.codeArray  = [];
            			}
            			if($(this).hasClass('OneNum_active')){
            				 $(this).removeClass('OneNum_active');
            				 ball.codeArray.splice($.inArray(v,ball.codeArray),1);
            			} else {
            				$(this).addClass('OneNum_active');
            				ball.codeArray.push(v);
            			}

            			// 判断其他行上是否已经被选择了.同时只有一个.
            			for(var j=0;j<box_ball.length;j++){
            				if( curId != box_ball[j].name){

            					otherLi = $(box_ball[j].name).eq($(this).index()-1);
            					sv = otherLi.text();
            					if( otherLi.hasClass('OneNum_active') ){
            						otherLi.removeClass('OneNum_active');
            						box_ball[j].codeArray.splice($.inArray(sv,box_ball[j].codeArray),1);
            					}
            				}
            			}
            		});
            	});
            });
            
            var zhushu=0;
            $(btn).bind('click',function(){
              	
                var isCorrect = true;
                $.each(box_ball,function(n,value){
                	if(value.codeArray.length <= 0 ){
                		Common.tip('您选的方案不足1注，请参考玩法说明选满1注后进行投注。');
                		isCorrect = false;
                		return;
                	}
                });
                
                if(!isCorrect){
                	return;
                }
                
                
                $('#getOdds').val($('#'+obj.type+'_getodds').text());
                _get_odds=$('#getOdds').val();
                var tmp = ""
                $.each(box_ball,function(n,ball){
                	tmp = tmp + ball.codeArray[0] + ",";
                	$(ball.name).removeClass('OneNum_active');
                	ball.codeArray = [];
                });
                tmp = tmp.substr(0,tmp.length-1);
                Ssc.core.render({type:_type,zhushu:1,code:tmp,odd:_get_odds} ,tmp, _name);
             	
                Ssc.core.bindDelete();

        });
        	
        }

    },
    
  render:function(obj,name,LeName,_id){
        var _out=[];
        _out.push('<li id="li_'+obj.type+'_'+obj.code+'" data-type="'+obj.type+'" data-zhushu="'+obj.zhushu+'" data-code="'+obj.code+ '" data-id="'+_id + '">');
        _out.push('<span class="zhushu">注数:'+obj.zhushu+'</span>');
        _out.push('<span class="txt-betsName">['+LeName+']</span>');
        _out.push('<span title="'+obj.code+'" class="txt-num js-code">'+name+'</span>');
        _out.push('<span class="txt-amount js-money" style="width:230px;float:none">下注金额<input type="number" onkeyup="Ssc.formatIntVal(this)" data-odd="'+obj.odd+'" onafterpaste="Ssc.formatIntVal(this)" name="totals[]" class="totalsVal" size="6" />元&nbsp;&nbsp;<em></em></span>');
        _out.push('<a href="javascript:void(0);" class="txt-delNum js-del">删除</a>');
        var val = obj.code+'|'+obj.type+'|'+name + "|" + obj.zhushu;
        _out.push('<input type="hidden" name="tmpCodes[]" class="tmpCodes" value="'+val+'" />');
        _out.push('</li>');
        var row = $(_out.join(''));
        
        $dom.has_add_box.prepend(row);

        $(row.find('.totalsVal')).keyup({obj:obj},function(event){
        	var o = event.data.obj;
            Ssc.core.showGetPrice($(this),o);
        }).keydown({obj:obj},function(event){
        	var o = event.data.obj;
            Ssc.core.showGetPrice($(this),o);
        }).blur(function(){
            Ssc.core.checkSingleBuy($(this));
        });
/*        $(_out.join('')).find('.totalsVal').each(function(){
            $(this).keyup({obj:obj},function(event){
            	var o = event.data.obj;
            	console.log(o);
                Ssc.core.showGetPrice($(this),o);
            }).keydown({obj:obj},function(event){
            	var o = event.data.obj;
            	console.log(o);
                Ssc.core.showGetPrice($(this),o);
            }).blur(function(){
                Ssc.core.checkSingleBuy($(this));
            });
        })*/
    },
    checkSingleBuy:function(that){
        var val = parseInt(that.val(),10),l = parseInt(user.lowest),h=parseInt(user.highest);
        if(l>0 && val<l){
            Ssc.core.checkSingleTip('您的单注最低投注额为“'+user.lowest+'”元，但您目前的投注金额为“'+val+'”元，请修改！',that);
            return false;
        }
        if(h>0 && val > h){
            Ssc.core.checkSingleTip('您的单注最高投注额为“'+user.highest+'”元，但您目前的投注金额为“'+val+'”元，请修改！',that);
            return false;
        }
    },
    checkSingleTip:function(msg,that){
        $.typebox({
            'title' : '温馨提示',
            'width': '400',
            'height' : '150',
            'content' : msg,
            'padding' : 10,
            'type' : 'text',
            'call' :function(){
                that.val('');
                $.typebox.close();
                that.parent().find('em').html('');
            },
            'closeAfter':function(){
                that.val('');
                that.parent().find('em').html('');
            }
        });
        $.typebox.display('cancel',0);
        $('#typeboxContent').css({
            'text-align':'center'
        });
    },
    showGetPrice:function(that ,json){
        //var odds = $('#getOdds').val();
        //odds  = odds / 100;
        var odds = that.attr('data-odd');
        //if(!odds) odds = $('#getOdds').val();
        var val = that.val();
        switch (json.type){
            case 'BX': //和值的赔率好麻烦。。。
                var _key;
                if(json.code == '单'){
                    _key = 19;
                }else if(json.code == '双'){
                    _key = 20;
                }else if(json.code == '小'){
                    _key = 21;
                }else if(json.code == '大'){
                    _key = 22;
                }else{
                    _key = json.code;
                }
                //odds = $('#BX_getodds_'+_key).text();
                //odds = odds / 100;
                val = val * odds;
                val = Ssc.core.formatPrice(val);
                that.parent().find('em').html('可赢金额：<span class="bingoMoney">'+val+'</span> 元');
                break;
            default:
                val = val * odds / json.zhushu;
                val = Ssc.core.formatPrice(val);
                that.parent().find('em').html('可赢金额：<span class="bingoMoney">'+val+'</span> 元');
        }
    },
    formatPrice:function(val){
        val = Number(val);
        val = val.toFixed(1);
        return val;
    },
    bindDelete:function(){
        var c = t = id = '';
        $dom.has_add_box.find('a').each(function(){
            $(this).click(function(){
                c = $(this).attr('data-code');
                t = $(this).attr('data-type');
                id= $(this).parent().attr('data-id');
                Ssc.core.removeBall([],c,t);
                $(this).parent().remove();
                if( $('#'+id).hasClass('OneNum_active')){
               	 $('#'+id).removeClass('OneNum_active');
               }
            });
        });
    },
    getTotals:function(){
        var totals = 0 ,v = 0 ,_error = 0;
        $('.totalsVal').each(function(){
            v = $.trim($(this).val());
            if(v=='' || v <= 0){
                _error+=1;
            }else{
                totals = parseInt(totals,10)+parseInt(v,10);
            }
        });
        if(_error > 0){
            return false;
        }
        return totals;
    }
}
Ssc.formatIntVal = function(obj){
    obj.value=obj.value.replace(/\D+/g,'');
}
Ssc.submit = function(){
    if(user.isLogin != '1'){
        Common.tip('您还没有登录，请登录以后再进行投注！');
        return false;
    }
    var tmpCodes = $('.tmpCodes');
    if(tmpCodes.size()<=0){
        Common.tip('您还没有选择任何号码呀~~~');
    }else{
        if(user.agency == '3' || user.agency=='1'){
            Common.tip('代理不可以投注！');
            return false;
        }
        var countDownTime = $dom.countDownTime.text();
        /*if(gameHasEnd == 1 || countDownTime == '00:00:00'){
            Le.tip('您好，'+$.cookie('theIssuse')+' 期已截止，请等待下一期投注开始。');
            return false;
        }*/
        var pt = $dom.playType.val(),
            proName = $('#proName').val();
        var codes = '';
        var totals = Ssc.core.getTotals();
        if(!totals){
            Common.tip('每一注都需要您输入投注金额！');
            return false;
        }
        if(totals > user.points ){
            Common.tip('您的余额不足，请充值！');
            return false;
        }
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
        var msg = '您下注了<strong>'+ gameProvince + '</strong>的'+gameName+'，共<strong>'+totals+'</strong>元，是否下注？';
        
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
                    url: baseUrl+"/index.php?m=ssc&c=index&a=sendCode&rand="+Math.random() + "&lottery_type="+lottery_type,
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
                                Common.tip('您的投注信息已经成功提交，请等待开奖！【<a href="'+myLotteryUrl+'">查看我的购买信息</a>】');
                                Ssc.core.clearAll();
                                if($('.enter_digital').size()>0){
                                    $('.enter_digital').text(json.points);
                                }
                                break;
                            case 'error' :
                            	alert(json.msg);
                            	window.location.href=baseUrl + "/index.php/Ssc/index/init?&lottery_type="+lottery_type;
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

/*
 * 检查重复投注号码
 * return true:无重复投注号码 false:有重复投注号码
 * 和值，二不同号，二同号复选，三同号通选，三连号通选5个玩法有重号限制
 * 三同号单选、二同号单选、三不同号没有重号限制
 */
Ssc.checkRepeatCodes = function(_code ,t ,val){
    if($data.codes.length<=0) return true;
    var codes_ary=Ssc.core.getCodes();
//    console.log("_code"+ _code );
    switch(t){
        case '3THDX':
        case '3BTH':
        case '2THDX':
            return true;
            break;
        default:
            var _t=[];
            for(var s in codes_ary){
                for(var x in _code){
                    if(codes_ary[s]==_code[x] && typeof codes_ary[s] == 'string'){
                        _t.push(codes_ary[s]);
                    }
                }
            }

            if(val){
                if($.inArray(val ,_t) > -1){
                	Common.tip('投注列表内含有重复选号，系统暂不支持，请重新选号');
                    return false;
                }
            }else{
//            	 console.log(codes_ary);
            	 if($.inArray(_code ,codes_ary) > -1){
            		 Common.tip('投注列表内含有重复选号，系统暂不支持，请重新选号');
                     return false;
                }
            }
            return true;
            break;
    }
}


Ssc.getQsObj = function(t){
	var array = new Array();
	for(var i=0;i<t;i++){
		var obj = {
			'name':'#box_ball_Q'+t+'_'+i+ " li",
		    'codeArray' : []
		}
		array.push(obj);
	}
	return array;
	
}

Ssc.getPlayName = function(i){
	var array = ['冠军','亚军','季军','最后'];
	return array[i];
}


$(function(){
	Ssc.init();
});

