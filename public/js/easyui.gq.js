(function ($) {
    $.extend($.fn.datebox.defaults.rules, {
        date: {
            validator: function (value) {
                // debugger;
                //格式yyyy-MM-dd或yyyy-M-d 
                var c = /^(?:(?!0000)[0-9]{4}([-]?)(?:(?:0?[1-9]|1[0-2])\1(?:0?[1-9]|1[0-9]|2[0-8])|(?:0?[13-9]|1[0-2])\1(?:29|30)|(?:0?[13578]|1[02])\1(?:31))|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468]|[048]|[13579][26])00)([-]?)0?2\2(?:29))$/i.test(value);

                //return /^(?:(?!0000)[0-9]{4}([-]?)(?:(?:0?[1-9]|1[0-2])\1(?:0?[1-9]|1[0-9]|2[0-8])|(?:0?[13-9]|1[0-2])\1(?:29|30)|(?:0?[13578]|1[02])\1(?:31))|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468]|[048]|[13579][26])00)([-]?)0?2\2(?:29))$/i.test(value);

                return c;
            }
        },
        message: '请输入正确的日期格式'
    });

    //全局系统对象
    window['GQ'] = {};
    GQ.datagrid = function (dgID, options) {
        var grid = $('#' + dgID).datagrid({
            url: options.url,
            title: options.title,
            width: options.width,
            height: options.height,
            fitColumns: options.fitColumns != null ? options.fitColumns : true,
            singleSelect: options.singleSelect != null && options.singleSelect ? true : false, //是否单选        
            pagination: options.pagination != null ? options.pagination : true, //分页控件
            rownumbers: options.rownumbers != null && options.rownumbers ? true : false, //行号 
            sortOrder: options.sortOrder || 'desc',
            sortName: options.sortName,
            remoteSort: options.remoteSort != null ? options.remoteSort : true, //默认是发送远程服务器排序的，如果只是客户端排序，则设置为false,2013-11-25
            striped: true, //交替显示行背景
            method: 'post', //请求远程的方法，默认就是post
            nowrap: true, //
            data: options.data,
            idField: options.idField,
            // fit: true,
            frozenColumns: options.frozenColumns,
            pageSize: options.pageSize || 20, //默认页设置，只能设置10、20、30，不能设置15、25、35。。。
            pageList: options.pageList || [10, 20, 30, 50,100,300], //可设置每页记录的条数 ， 第一个就是默认页，可以自己设置，比用pageSize方便
            columns: options.columns,
            onHeaderContextMenu: function (e, field) {

                e.preventDefault();
                if (!cmenu) {
                    createColumnMenu();
                }
                cmenu.menu('show', {
                    left: e.pageX,
                    top: e.pageY
                });
            },
            onRowContextMenu: function (e, rowIndex, rowData) {
                if (options.onRowContextMenu)
                    options.onRowContextMenu(e, rowIndex, rowData);
            },
            onClickRow: function (rowIndex, rowData) {
                if (options.onClickRow)
                    options.onClickRow(rowIndex, rowData);
            },
            onDblClickCell: function (rowindex, field, value) {
                if (options.onDblClickCell)
                    options.onDblClickCell(rowindex, field, value);
            },
            onClickCell: function (rowindex, field, value) {
                if (options.onClickCell)
                    options.onClickCell(rowindex, field, value);
            },
            onBeforeLoad: function(param) {
                if (options.onBeforeLoad)
                    options.onBeforeLoad(param);
            },
            onMouseOverRow: function (e, rowIndex, rowData) {
                if (options.onMouseOverRow)
                    options.onMouseOverRow(e, rowIndex, rowData);
            },
            onMouseOutRow: function (e, rowIndex, rowData) {
                if (options.onMouseOutRow)
                    options.onMouseOutRow(e, rowIndex, rowData);
            },
            view: options.view,
            loadFilter: function (data) {
                if (options.loadFilter != null) {
                    options.loadFilter(data); //有回调函数的时候,需要调用回调函数
                }
                var total = 0, rows = [];
                if (data != null && data.total != null && data.rows != null && data.rows.length > 0) {
                    total = data.total;
                    rows = data.rows;
                }
                var d = { total: total, rows: rows };
                return d;
            },
            onLoadError:function() {
                GQ.alert("载入失败");
            },
            onLoadSuccess: function (data) {
                if (!data.rows || data.rows.length == 0) {
                    var body = $(this).data().datagrid.dc.body2;
                    body.find('table tbody').append('<tr><td width="' + body.width() + '" style="height: 25px; text-align: center;">没有数据</td></tr>');
                }
                if (typeof data.Message != "undefined") {
                    GQ.alert(data.Message);
                }
                //添加高亮显示查询到得参数
                var ops = grid.datagrid('options');
                var queryParams = ops.queryParams;
                if (queryParams != null) {
                    GQ.GridHighlight(queryParams);
                }

                //回调函数
                if (options.onLoadSuccess) {//成功的时候需要调用的函数
                    options.onLoadSuccess(data);
                }
            }
        });

        //分页设置 
        GQ.pagination(dgID, options.pageSize, options.pageList);

        //显示列头
        var cmenu;
        function createColumnMenu() {
            cmenu = $('<div/>').appendTo('body');
            cmenu.menu({
                onClick: function (item) {
                    if (item.iconCls == 'icon-ok') {
                        $('#dg').datagrid('hideColumn', item.name);
                        cmenu.menu('setIcon', {
                            target: item.target,
                            iconCls: 'icon-empty'
                        });
                    } else {
                        $('#dg').datagrid('showColumn', item.name);
                        cmenu.menu('setIcon', {
                            target: item.target,
                            iconCls: 'icon-ok'
                        });
                    }
                }
            });
            var fields = $('#dg').datagrid('getColumnFields');
            for (var i = 0; i < fields.length; i++) {
                var field = fields[i];
                var col = $('#dg').datagrid('getColumnOption', field);
                cmenu.menu('appendItem', {
                    text: col.title,
                    name: field,
                    iconCls: !col.hidden ? 'icon-ok' : 'icon-empty'
                });
            }
        }

        function getWidth(percent) {
            return $(window).width() * percent;
        }

        return grid;
    }

    ///后面两个分页参数主要是由于使用queryParams查询时，分页效果失效，
    GQ.pagination = function (dgID, pageSize, pageList) {
        //分页设置

        var p = $("#" + dgID).datagrid('getPager');
        $(p).pagination({
            pageSize: pageSize || 20,
            pageList: pageList || [10, 20, 30, 50],
            beforePageText: '第', //页数文本框前显示的汉字
            afterPageText: '页    共 {pages} 页'
            //displayMsg: '当前显示 {from} - {to} 条记录   共 {total} 条记录'
        });
    };

    ///获取选中的行
    GQ.getSelections = function (dgID, callback) {
        var rows = $('#' + dgID).datagrid('getSelections');
        if (callback) {
            callback(rows);
        } else {
            return rows;
        }
        //for (var i = 0; i < rows.length; i++) {
        //}
    };

    ///Grid搜索
    GQ.datagridSearch = function (dgID, options, pageSize, pageList) {
        $('#' + dgID).datagrid({ 'queryParams': options });
        GQ.pagination(dgID, pageSize, pageList); //需要重新加载页面，否则自定义的页面失效

    };

    //高亮显示,要放在Grid加载完成之后的事件里
    GQ.GridHighlight = function (cols) {
        for (var a in cols) {
            if (a.indexOf('[Contains]') != -1 || a.indexOf('[Equal]') != -1) {
                var c = a.replace('[Contains]', "").replace('[Equal]', "").replace(/\{.*?\}/g, "");
                var tds = $(".datagrid-row>td[field='" + c + "']>div");
                var keyword = cols[a];
                if (keyword == null || keyword == "") continue;

                $.each(tds, function (i, obj) {
                    var h = $(this).text();
                    var reg = new RegExp("(" + keyword + ")", "gi");

                    //                    var v = h.replace(reg, function (m, p1) {
                    //                        var args = arguments;
                    //                        return p1 + h;
                    //                    });
                    var v = h.replace(reg, "<span style='color:red;background:yellow'>$1</span>");
                    $(this).html(v);
                });
            }
        }
    };

    GQ.treegridSearch = function (dgID, options, pageSize, pageList) {
        $('#' + dgID).treegrid({ 'queryParams': options });
        GQ.pagination(dgID, pageSize, pageList); //需要重新加载页面，否则自定义的页面失效
    };

    ///Grid刷新
    GQ.reload = function (dgID) {
        $('#' + dgID).datagrid("reload");
    };

    //显示loading
    GQ.showLoading = function (message, targetID) {
        var target = 'body';
        if (targetID != null) {
            target = '#' + targetID;
        }
        message = message || "正在加载中...";
        $(target).append("<div class='jloading datagrid-mask' style='display:block;z-index:9999'></div>");
        $(target).append("<div class=\"jloading datagrid-mask-msg\" style=\"display:block;left:50%\">" + message + "</div>");
        /*   var win = $.messager.progress({
        title: '请稍后...',
        msg: message
        }); */

    };
    //隐藏loading
    GQ.hideLoading = function (targetID) {
        var target = 'body';
        if (targetID != null) {
            target = '#' + targetID;
        }
        $(target + ' > div.jloading').remove();
        /*$.messager.progress('close');*/
    };


    ///弹出提示框
    GQ.alert = function (message, callback) {
        $.messager.alert('信息提示', message, 'info', callback);
    };

    //显示成功提示窗口
    GQ.showSuccess = function (message, callback) {
        if (typeof (message) == "function" || arguments.length == 0) {
            callback = message;
            message = "操作成功!";
        }
        $.messager.alert('信息提示', message, 'info', callback);
    };
    //显示失败提示窗口
    GQ.showError = function (message, callback) {
        if (typeof (message) == "function" || arguments.length == 0) {
            callback = message;
            message = "操作失败!";
        }
        $.messager.alert('错误提示', message, 'error', callback);
    };
    //ajax提交
    GQ.ajax = function (options) {
        var p = options || {};
        //  var ashxUrl = options.ashxUrl || "/Admin/User/";
        //   var url = p.url || ashxUrl + $.param({ method: p.method });
        var targetID = options.loadingParentID; //表示加载进度条的父类节点

        $.ajax({
            cache: false,
            async: options.async == null || options.async ? true : false,
            url: p.url,
            data: p.data,
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                GQ.loading = true;
                if (p.beforeSend)
                    p.beforeSend();
                else
                    GQ.showLoading(p.loading, targetID);
            },
            complete: function () {
                GQ.loading = false;
                if (p.complete)
                    p.complete();
                else
                    GQ.hideLoading(targetID);
            },
            success: function (result) {
                if (!result) return;
                if (!result.IsError) {
                    if (p.success)
                        p.success(result.Data, result.Message);
                    else {
                        GQ.showSuccess(result.Message);
                    }
                } else {
                    if (p.error)
                        p.error(result.Message);
                    else {
                        GQ.showError('错误提示：' + result.Message);
                    }
                }
            },
            error: function (result, b) {
                GQ.showError('发现系统错误 <BR>错误码：' + result.status);
            }
        });
    };

    GQ.loadForm = function (mainform, options, callback) {
        options = options || {};
        if (!mainform) {
            mainform = $("form:first");
        }
        var p = $.extend({
            beforeSend: function () {
                GQ.showLoading("正在加载表单数据中...");
            },
            complete: function () {
                GQ.hideLoading();
            },
            success: function (data) {
                //data = data.toString().replace(new RegExp('(^|[^\\\\])\\"\\\\/Date\\((-?[0-9]+)\\)\\\\/\\"', 'g'), "$1new Date($2)");
                //easyui默认有加载表单数据的方法，不需要重新写
                mainform.form('load', data);
                //                var preID = options.preID || "";
                //                for (var d in data) {
                //                    var p = d.replace('$', '');
                //                    var ele = $("[name=" + (preID + p) + "]", mainform);
                //                    //针对复选框和单选框 处理
                //                    if (ele.is(":checkbox,:radio")) {
                //                        ele[0].checked = data[p] ? true : false;
                //                    }
                //                    else {
                //                        ele.val(data[p]);
                //                    }
                //                }

                if (callback)
                    callback(data);
            },
            error: function (message) {
                GQ.showError("数据加载失败！<BR>错误信息：" + message);
            }
        }, options);
        GQ.ajax(p);
    };
    //cookie
    GQ.cookies = (function () {
        var fn = function () {
        };
        fn.prototype.get = function (name) {
            var cookieValue = "";
            var search = name + "=";
            if (document.cookie.length > 0) {
                offset = document.cookie.indexOf(search);
                if (offset != -1) {
                    offset += search.length;
                    end = document.cookie.indexOf(";", offset);
                    if (end == -1) end = document.cookie.length;
                    cookieValue = decodeURIComponent(document.cookie.substring(offset, end))
                }
            }
            return cookieValue;
        };
        fn.prototype.set = function (cookieName, cookieValue, DayValue) {
            var expire = "";
            var day_value = 1;
            if (DayValue != null) {
                day_value = DayValue;
            }
            expire = new Date((new Date()).getTime() + day_value * 86400000);
            expire = "; expires=" + expire.toGMTString();
            document.cookie = cookieName + "=" + encodeURIComponent(cookieValue) + ";path=/" + expire;
        }
        fn.prototype.remvoe = function (cookieName) {
            var expire = "";
            expire = new Date((new Date()).getTime() - 1);
            expire = "; expires=" + expire.toGMTString();
            document.cookie = cookieName + "=" + escape("") + ";path=/" + expire;
            /*path=/*/
        };

        return new fn();
    })();

    //打开对话框
    GQ.OpenWindow = function (winID, options) {
        $("#" + winID).window({
            title: options.title, //对话框标题
            href: options.href, //链接地址
            width: options.width,
            height: options.height,
            modal: options.modal, //是否是模态对话框
            closable: options.closable,
            collapsible: options.collapsible,
            minimizable: false,
            maximizable: false,
            cache: false,
            //center: "",
            tools: [{
        }],
        onBeforeClose: function () {
            if (options.callback != null) {
                options.callback();
            }
            //$('#win').window('close', true); //这里调用close 方法，true 表示面板被关闭的时候忽略onBeforeClose 回调函数。
        }
        });
};
//关闭对话框
GQ.CloseWindow = function (winID) {
    $("#" + winID).window('close');
};
GQ.RefreshWin = function (winID) {
    $("#" + winID).window('refresh');
};

})(jQuery);


