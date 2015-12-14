var Common = {};
Date.prototype.toFormatString = function(a) {

    var g = this.getFullYear();

    var e = parseInt(this.getMonth() + 1, 10);

    var b = this.getDate() > 9 ? this.getDate() : "0" + this.getDate();

    var c = this.getHours() > 9 ? this.getHours() : "0" + this.getHours();

    var d = this.getMinutes() > 9 ? this.getMinutes() : "0" + this.getMinutes();

    var f = this.getSeconds() > 9 ? this.getSeconds() : "0" + this.getSeconds();

    a = !a ? "yyyy-MM-dd HH:mm:ss": a;

    return a.replace("yyyy", g).replace("MM", e).replace("dd", b).replace("HH", c).replace("mm", d).replace("ss", f)

};

Date.prototype.addDays = function(b) {

    var c = this.getTime() + (b * 24 * 60 * 60 * 1000);

    var a = new Date();

    a.setTime(c);

    return a

};

String.prototype.trim = function() {

    return this.replace(/(^\s*)|(\s*$)/g, "")

};

String.prototype.ltrim = function() {

    return this.replace(/(^\s*)/g, "")

};

String.prototype.rtrim = function() {

    return this.replace(/(\s*$)/g, "")

};

String.prototype.contains = function(a) {

    return (this.indexOf(a) > -1)

};

String.prototype.IsChinese = function() {

    var a = /^[\u4E00-\u9FA5]*$/;

    return a.test(this)

};

String.prototype.toNumber = function(b, a) {

    var c = this.replace(/[^\d]/g, "");

    if (b && c < b) {

        c = b

    } else {

        if (a && c > a) {

            c = a

        }

    }

    return c

};

Number.prototype.toMoney = function() {

    return "￥" + this

};

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

Number.prototype.toLeftTimeStringCN = function() {

    var a = parseInt(this / 60 / 60 / 24, 10);

    var b = parseInt(this / 60 / 60 % 24, 10);

    var c = parseInt(this / 60 % 60, 10);

    var f = this % 60;

    var e = [];

    e.push(a.toString());

    e.push(b > 9 ? b.toString() : "0" + b.toString());

    e.push(c > 9 ? c.toString() : "0" + c.toString());

    e.push(f > 9 ? f.toString() : "0" + f.toString());

    return e[0] + "天" + e[1] + "小时" + e[2] + "分" + e[3] + "秒"

};

Number.prototype.toLottery = function() {

    var a = this.toString();

    if (this < 10) {

        a = "0" + a

    }

    return a

};

Array.prototype._indexOf = function(b) {

    if ("indexOf" in this) {

        return this["indexOf"](b)

    }

    for (var a = 0; a < this.length; a++) {

        if (b === this[a]) {

            return a

        }

    }

    return - 1

};

Array.prototype.distinctN = function() {

    var a = this.concat().sort();

    for (var b = 0; b < a.length; b++) {

        var c = a[b];

        a.splice(b, 1, null);

        if (a._indexOf(c) < 0) {

            a.splice(b, 1, c)

        } else {

            a.splice(b, 1)

        }

    }

    return a

};

Array.prototype.distinct = function() {

    for (var a = 0; a < this.length; a++) {

        var b = this[a];

        this.splice(a, 1, null);

        if (this._indexOf(b) < 0) {

            this.splice(a, 1, b)

        } else {

            this.splice(a, 1)

        }

    }

    return this

};

Array.prototype.random = function() {

    var a = parseInt(Math.random() * this.length, 10);

    return this[a]

};



Array.prototype.max = function() {

    return Math.max.apply({},
        this)
};

Array.prototype.min = function() {

    return Math.min.apply({},
        this)

};

Math.guid = function() {

    var a = "";

    for (var b = 1; b <= 12; b++) {

        var c = Math.floor(Math.random() * 16).toString(16);

        a += c

    }

    return a

};

Math.randome = function(c, b, a) {

    var d = parseInt(Math.random() * (b - c) + c, 10);

    if (a && d < 10) {

        return a + d

    }

    return d

};

Math.nCr = function(a, b) {

    if (b > a) {

        return 0

    }

    if ((a - b) < b) {

        return this.nCr(a, (a - b))

    }

    var c = 1;

    for (i = 0; i < b; i++) {

        c = c * (a - i) / (i + 1)

    }

    return c

};

Math.nPr = function(a, b) {

    if (b > a) {

        return 0

    }

    if (b) {

        return a * (this.nPr(a - 1, b - 1))

    } else {

        return 1

    }

};

Math.C = function(a, c) {

    var d = []; (function b(j, e, h) {

        if (h == 0) {

            return d.push(j)

        }

        for (var f = 0,

                 g = e.length; f <= g - h; f++) {

            b(j.concat(e[f]), e.slice(f + 1), h - 1)

        }

    })([], a, c);

    return d

};

Math.P = function(a, c) {

    var d = []; (function b(j, e, h) {

        if (h == 0) {

            return d.push(j)

        }

        for (var f = 0,

                 g = e.length; f < g; f++) {

            b(j.concat(e[f]), e.slice(0, f).concat(e.slice(f + 1)), h - 1)

        }

    })([], a, c);

    return d

};

Math.arrange = function(b, c) {

    function a(f, g, j, k) {

        var l = f[j];

        for (var h = 0; h < l.length; h++) {

            g[j] = l[h];

            if (j >= f.length - 1) {

                k(g)

            } else {

                a(f, g, j + 1, k)

            }

        }

    }

    var d = b.length;

    if (d < 1) {

        return

    }

    var e = new Array();

    a(b, e, 0, c)

};

Math.arrangeC = function(c, d) {

    function b(j, k, m, n) {

        var o = j[m];

        for (var l = 0; l < o.length; l++) {

            k[m] = o[l];

            if (m >= j.length - 1) {

                n(k)

            } else {

                b(j, k, m + 1, n)

            }

        }

    }

    function e(k, l) {

        for (var j = 0; j < k.length; j++) {

            if (f(k[j], l)) {

                return true

            }

        }

        return false

    }

    function f(m, n) {

        var j = n.concat().sort();

        for (var k = 0; k < m.length; k++) {

            var l = j._indexOf(m[k]);

            if (l >= 0) {

                j.splice(l, 1)

            } else {

                return false

            }

        }

        return true

    }

    var g = c.length;

    if (g < 1) {

        return

    }

    var h = new Array();

    var a = new Array();

    b(c, h, 0,

        function(k) {

            var j = k.concat().sort();

            if (!e(a, j)) {

                a.push(j);

                d(j)

            }

        })

};

Math.formatFloat = function(b, a) {

    return Math.round(b * Math.pow(10, a)) / Math.pow(10, a)

};


Common.math = {
    /**
     * @description 排列总数
     * @param {Int} n 总数
     * @param {Int} m 组合位数
     * @author classyuan
     * @return {Int}
     * @example Le.math.C(6,5);
     * @memberOf Le.math
     */
    C : function(n, m) {
        var n1 = 1, n2 = 1;
        for (var i = n, j = 1; j <= m; n1 *= i--, n2 *= j++) {}
        return n1 / n2;
    },
    /**
     * @description 组合总数
     * @param {Int} n 总数
     * @param {Int} m 组合位数
     * @author classyuan
     * @return {Int}
     * @example Le.math.P(5,3); 60
     * @memberOf Le.math
     */
    P : function(n, m) {
        var n1 = 1, n2 = 1;
        for (var i = n, j = 1; j <= m; n1 *= i--, n2 *= j++) {}
        return n1;
    },
    /**
     * @description 枚举数组算法
     * @param {Int} n 数组长度
     * @param {Int|Array} m 枚举位数
     * @author classyuan
     * @return {Int}
     * @example Le.math.Cs(4,3);  [[1,2,3],[1,2,4],[1,3,4],[2,3,4]]
     * @memberOf Le.math
     */
    Cs : function (len, num){
        var arr=[];
        if(typeof(len)=='number'){
            for(var i=0;i<len;i++){
                arr.push(i+1);
            }
        }else{
            arr=len;
        }
        var r=[];
        (function f(t,a,n){
            if (n==0) return r.push(t);
            for (var i=0,l=a.length; i<=l-n; i++){
                f(t.concat(a[i]), a.slice(i+1), n-1);
            }
        })([],arr,num);
        return r;
    },
    /**
     * @description 获取竞彩N串1注数
     * @param {Array} spArr [2,2,1] 每一场选中的个数
     * @param {Int} n n串1
     * @author classyuan
     * @return {Int}
     * @example Le.math.N1([2,2,1],3);
     * @memberOf Le.math
     */
    N1:function(spArr,n){
        var zhushu=0;
        var m=spArr.length;//场次
        var arr=Le.math.Cs(m,n);
        for(var i=0;i<arr.length;i++){
            var iTotal=1;//每场注数
            for(var j=0;j<arr[i].length;j++){
                iTotal*=spArr[arr[i][j]-1]
            }
            zhushu+=iTotal
        }
        return zhushu;
    },
    /**
     * @description 获取竞彩N串1胆拖注数
     * @param {Array} spArrd [[3,3,3,1,2],[1,1,1,1,0]] 选中5场，4场胆拖
     * @param {Int} n n串1
     * @author classyuan
     * @return {Int}
     * @example Le.math.N1d([[3,3,3,1,2],[1,1,1,1,0]],5); 选中5场，4场胆拖，5串1玩法  return 54
     * @example Le.math.N1d([[3,3,3,1,2],[1,0,0,0,0]],3); 选中5场，1场胆拖，3串1玩法  return 87
     * @memberOf Le.math
     */
    N1d:function(spArrd,n){
        var nArr=[],dArr=[];
        try{
            for(var i=0;i<spArrd[1].length;i++){
                if(spArrd[1][i]==1){
                    dArr.push(spArrd[0][i]);
                }else{
                    nArr.push(spArrd[0][i]);
                }
            }
        }catch(e){
            return 0;
        }
        if(dArr.length<=n){
            return Le.math.N1(nArr,n-dArr.length)*Le.math.N1(dArr,dArr.length);
        }else{
            return 0;
        }
    },
    /**
     * 枚举二维数组元素组合
     * @param {Array<Array>} oriArr 二维数组
     * @param {Number} comQty 组合数
     * @param {Array<Array>=} fixedArr 固定二维数组
     * @return {Array<Array>}
     * @example 二维数组
     *           [
     *              [a1,b1],
     *              [a2]
     *           ],
     *           组合数2，
     *           可得到：
     *           [
     *              [a1,a2],
     *              [b1,a2]
     *           ]
     */
    enumCom:function(oriArr, comQty, fixedArr){
        var comArr = [];

        //存储二维数组第一个元素的数组
        var firstArr = [];
        for (var i = 0, l = oriArr.length; i < l; i++) {
            firstArr.push(oriArr[i][0]);
        }

        comArr = Le.math.Cs(firstArr, comQty);

        var oriItem;
        for (var i = 0, l = oriArr.length; i < l; i++) {
            oriItem =oriArr[i];
            if (oriItem.length>1) {
                //组合数组
                var comItem;
                for (var j = 0; j < comArr.length; j++) {
                    var addedArr =[];
                    comItem = comArr[j];
                    var index = Le.Util.indexOf(comItem,oriItem[0]);
                    if (index!==-1) {
                        for(var k = 1;k<oriItem.length;k++){
                            var cloneComItem = comItem.slice();
                            cloneComItem.splice(index, 1, oriItem[k]);
                            addedArr.push(cloneComItem);
                        }
                    }
                    comArr = comArr.concat(addedArr);
                }
            }
        }

        if (fixedArr && fixedArr.length>0) {
            var fixedComArr = Le.math.enumCom(fixedArr, fixedArr.length);
            var comComArr = [];
            var comItem;
            for (var i = 0, l = comArr.length; i < l; i++) {
                comItem = comArr[i];
                var fixedItem;
                for (var j = 0, k = fixedComArr.length; j < k; j++) {
                    fixedItem = fixedComArr[j];
                    comComArr.push(comItem.concat(fixedItem));
                }
            }
            comArr = comComArr;
        }

        return comArr;
    },
    /**
     * @description N串M算法 注意最多支持15场多余的会被截断，不符合规定的串法一律返回0
     * @author classyuan
     * @param {Array} arr 选中场次
     * @param {String} str N串M
     * @return {Number}
     * @example
     Le.math.NM([1,1,2,2,1,1,1,2,1],'4_5')
     Le.math.NM([1,1,2,2,1,1,1,2,1],'8_1')
     * @memberOf Le.math
     */
    NM:function(arr,str,isDan){
        if(!/^\d{1,2}_\d{1,2}$/.test(str)){return false;}
        if(arr.length>15){arr.length=15;}//超过15场则截断

        var len=arr.length,//数组长度 场次数
            result=[],//保存各种
            n1Arr=[],//计算各种串法注数
            cacheArr=[],//临时数组
            y=Number(str.split('_')[0])||0,//N值
            x=len-(y-1);//曲线公式变量

        switch(str){//不同串法前面补0
            case '6_7':
                cacheArr=[0,0,0,0];break;
            case '6_22':case '5_6':
            cacheArr=[0,0,0];break;
            case '6_42':case '5_16':case '4_5':
            cacheArr=[0,0];break;
            case '6_57':case '5_26':case '4_11':case '3_4':
            cacheArr=[0];break;
        }
        switch(str){
            case '6_63':
                result.push(x*(x+1)*(x+2)*(x+3)*(x+4)/120);
            case '5_31':case '6_57':
            result.push(x*(x+1)*(x+2)*(x+3)/24);
            case '4_15':case '5_26':case '6_42':
            result.push(x*(x+1)*(x+2)/6);
            case '3_7':case '4_11':case '5_16':case '6_22':
            result.push(x*(x+1)/2);
            case '2_3':	case '3_4':	case '4_5':	case '5_6':	case '6_7':
            result.push(x);
            result.push(1);
            for(var i = 0; i < y && i < 6; i++){//计算N串1保存到数组
                n1Arr[i]=Le.math.N1(arr,i+1);
            }
            cacheArr=cacheArr.concat(result);
            result=0;
            for(var i=0, _l = n1Arr.length; i < 6 && i < _l;i++){
                result+=n1Arr[i]*cacheArr[i];
            }
            break;
            default :
                if(/\d+\_1/.test(str)){
                    result=Le.math.N1(arr,y);
                }else{
                    result=0;//非规定串法一律返回0
                }
        }
        return result;
    },
    /**
     * @description 机选号码
     * @param {Int} startNum   起始值
     * @param {Int} totalNum   总数长度
     * @param {Int} len        机选个数或者数组
     * @param {Int} a          是否重复，缺省不重复
     * @param {Array} rep      删除不需要的元素，定胆机选用
     * @author classyuan
     * @return {Array}
     * @example Le.math.random(1,35,5); 机选1-35之间5不重复个数字 return [4,12,16,8,34,9]
     * @example Le.math.random(1,12,2,true); 机选 return [4,4]
     * @memberOf Le.math   1 10 5
     */
    random:function(startNum, totalNum, len, a ,rep) {
        var absNum = Math.abs(startNum - totalNum) + 1;
        var repL=0
        if(typeof(rep)=='object'){
            repL=rep.length;
        }
        if (typeof len == "undefined" || len > absNum||len < 1|| len > absNum-repL) {
            return [];
        }
        var o = {}, _r = new Array(len), i = 0, s;
        while (i < len) {
            s=parseInt(Math.random() * absNum + startNum);
            if(!a){
                s=function(a,s){
                    for(var i=0;i<a.length;){
                        if(a[i++]==s)return null;
                        if(typeof(rep)=='object'){
                            for(var j=0;j<repL;j++){
                                if(s==rep[j])return null;
                            }
                        }
                    }
                    return s
                }(_r,s);
                s!==null&&(_r[i++]=s);
            }else{
                _r[i++] =s;
            }
        }
        return _r;
    }
};


Common.formatIntVal = function(obj){
    obj.value=obj.value.replace(/\D+/g,'');
}


//您好，第 15010923 期已截止，当前期是第 15010924 期，投注时请确认您选择的期号，祝您投注愉快，谢谢！

Common.tip = function(content){
    $.typebox({
        'title' : '温馨提示',
        'width': '360',
        'height' : '150',
        'content' : content,
        'padding' : 10,
        'type' : 'text',
        'call' :function(){
            $.typebox.close();
        }
    });
    $.typebox.display('cancel',0);
    $('#typeboxContent').css({
        'text-align':'center'
    });
}

function loadRecent(){
    if( $("#awardNumBody").has("tr").length == 0 ){
        loadRecentResult();
    }
}

