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
        //$dom.box_ball_BX.removeClass('OneNum_active');
        //$(".tab-content .tab-pane")
        $("#box_ball_TABHZ_SWHZ_num").find(".num").removeClass('OneNum_active');
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
        //var val = parseInt(that.val(),10),l = parseInt(user.lowest),h=parseInt(user.highest);
        //if(l>0 && val<l){
        //    Ssc.core.checkSingleTip('您的单注最低投注额为“'+user.lowest+'”元，但您目前的投注金额为“'+val+'”元，请修改！',that);
        //    return false;
        //}
        //if(h>0 && val > h){
        //    Ssc.core.checkSingleTip('您的单注最高投注额为“'+user.highest+'”元，但您目前的投注金额为“'+val+'”元，请修改！',that);
        //    return false;
        //}
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
    //if(user.isLogin != '1'){
    //    Common.tip('您还没有登录，请登录以后再进行投注！');
    //    return false;
    //}
    var tmpCodes = $('.tmpCodes');
    if(tmpCodes.size()<=0){
        Common.tip('您还没有选择任何号码呀~~~');
    }else{
        //if(user.agency == '3' || user.agency=='1'){
        //    Common.tip('代理不可以投注！');
        //    return false;
        //}
        if ($("#isLogin").val() == undefined) {
            $('#myModal').modal('show');
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
                    url: "/ssclotteryBetting?rand=" + Math.random() + "&lottery_type=" + lottery_type,
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
                                Ssc.core.clearAll();
                                if($('.enter_digital').size()>0){
                                    $('.enter_digital').text(json.points);
                                }
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

Common.tip = function (content) {
    $.typebox({
        'title': '温馨提示',
        'width': '360',
        'height': '150',
        'content': content,
        'padding': 10,
        'type': 'text',
        'call': function () {
            $.typebox.close();
        }
    });
    $.typebox.display('cancel', 0);
    $('#typeboxContent').css({
        'text-align': 'center'
    });
}
function typeboxHtml() {
    return '	<div id="typebox" style="display:none"><div id="typeboxWrapper">         <div id="typeboxHeader"> 			<span id="typeboxClose"></span><span id="typeboxTitle"></span> 		</div> 		<div id="typeboxContent"></div> 		<div id="typeboxFooter"> 			<button class="button" value="true" id="typeboxSubmit"> 			' + $.typebox.settings.buttonText.submit + ' 			</button>             <button class="button" value="false" id="typeboxCancel"> 			' + $.typebox.settings.buttonText.cancel + " 			</button> 		</div> 			</div></div>"
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
}
;


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

        url: "/getLotteryData?lottery_type=" + lottery_type,

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
