(function ($) {
    var _isMax = false;
    $.fn.panel.defaults = $.extend({}, $.fn.panel.defaults, {
        onBeforeDestroy: function () {
            var frame = $('iframe', this);
            if (frame.length > 0) {
                frame[0].contentWindow.document.write('');
                frame[0].contentWindow.close();
                frame.remove();
                if ($.browser.msie) {
                    CollectGarbage();
                }
            }
        }
    });
    $.createFrame = function (src, name) {
        return '<iframe scrolling="auto" frameborder="0" name="' + name + '" src="' + src + '" style="width:100%;height:99%;"></iframe>';
    }
    $.addTab = function (jq, name, title, url) {

        if ($(jq).tabs('exists', title)) {
            $(jq).tabs('select', title);
            var currTab = $(jq).tabs('getSelected');
            $(jq).tabs('update', {
                tab : currTab,
                options : {
                    content : $.createFrame(url)
                }
            });
        } else {
            if (url == "" || url == null || url == "undefined") {
                $.messager.show({
                    title: "信息提醒",
                    msg: "该菜单地址还没维护，现在无法访问",
                    timeout: 3000,
                    showType: 'slide',
                    style: {
                        right: '',
                        top: document.body.scrollTop + document.documentElement.scrollTop,
                        bottom: ''
                    }
                });
                return false;
            }
            if (parent.$("#tabXG").length > 0) {
                var getTabs = parent.$("#tabXG").tabs("tabs");
                if (getTabs.length > 15) {
                    $.messager.show({
                        title: "信息提醒",
                        msg: "您打开太多的界面，请关掉一些界面后重新再试",
                        timeout: 3000,
                        showType: 'slide',
                        style: {
                            right: '',
                            top: document.body.scrollTop + document.documentElement.scrollTop,
                            bottom: ''
                        }
                    });
                } else {
                    if (parent.shouldChangeTime == true) {
                        parent.shouldChangeTime = false;
                        //$(jq).tabs('getTab', title)
                    }
                    //GQ.showLoading("正在加载界面...");
                    $(jq).tabs('add', {
                        title: title,
                        content: $.createFrame(url, name),
                        closable: true
                    });
                }
            }
        }

    }
    $.addTopTab = function (id, name, title, url) {
        var jq = top.jQuery;
        top.$.addTab(jq(id), name, title, url);
    }
    $.fn.refreshTab = function () {
        $(this).tabs({
            onSelect: function (title) {
                var currTab = $(this).tabs('getTab', title);
                var iframe = $(currTab.panel('options').content);
                var src = iframe.attr('src');
                var name = iframe.attr('name');
                $(this).tabs('update', {
                    tab: currTab, options: {content: $.createFrame(src, name)}
                });
            }
        });
    }

    // 防止window、dialog拖动超出父元素界限
    $.easyuiWindowOnMove = function (left, top) {
        if (left < 0) {
            $(this).window('move', {
                "left": 1
            });
        }
        if (top < 0) {
            $(this).window('move', {
                "top": 1
            });
        }
        var width = 500;
        var height = 400;
        var parentWidth = 1055;
        var parentHeight = 1000;


        if (left > parentWidth - width) {
            $(this).window('move', {
                "left": parentWidth - width
            });
        }
        if (top > parentHeight - height) {
            $(this).window('move', {
                "top": parentHeight - height
            });
        }
    }
    $.fn.window.defaults.onMove = $.easyuiWindowOnMove;
    $.easyuiDialogOnMove = function (left, top) {
        if (left < 0) {
            $(this).dialog('move', {
                "left": 1
            });
        }
        if (top < 0) {
            $(this).dialog('move', {
                "top": 1
            });
        }
        var width = $(this).dialog('options').width;
        var height = $(this).dialog('options').height;
        var parentWidth = 1055;
        var parentHeight = 1000;


        if (left > parentWidth - width) {
            $(this).dialog('move', {
                "left": parentWidth - width
            });
        }
        if (top > parentHeight - height) {
            $(this).dialog('move', {
                "top": parentHeight - height
            });
        }


    }
    $.fn.dialog.defaults.onMove = $.easyuiDialogOnMove;

    $.winOpen = function (jq, datas, callback) {
        $(jq).window({
            title: datas.title,
            width: datas.width,
            height: datas.height,
            content: $.createFrame(datas.url, datas.name),
            collapsible: true,
            minimizable: false,
            modal: true,
            onClose: function () {
                $(this).window("destroy");
            }
        });
        if (jQuery.isFunction(callback)) {
            callback.call(jq);
        }
    }
    $.winTopOpen = function (id, datas, callback) {
        var jq = top.jQuery;
        top.$.winOpen(jq(id).clone(), datas);
    }
    $.fn.maxRestore = function (layoutId) {
        var icon = 'icon-max';
        var text = '全屏';
        if (!_isMax) {
            //$(layoutId).layout('collapse', 'south');
            $(layoutId).layout('collapse', 'north');
            $(layoutId).layout('collapse', 'west');
            $("#headinfo").hide();
            icon = 'icon-restore';
            text = '还原';
        } else {
            //$(layoutId).layout('expand', 'south');
            $(layoutId).layout('expand', 'north');
            $(layoutId).layout('expand', 'west');
            $("#headinfo").show();
            icon = 'icon-max';
            text = '全屏';
        }
        $(this).linkbutton({'iconCls': icon, 'text': text});
        _isMax = !_isMax;
    }

    $.initDG = function (seletor) {
        $(seletor).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            }
        });
    }

    $.initDGWithEdit = function (seletor) {
        $(seletor).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            },
            onClickRow: function (rowIndex) {
                $(seletor).datagrid('beginEdit', rowIndex);
            }
        });
    }

    $.initDGH = function (seletor) {
        $(seletor).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            },
            onClickRow: function (rowIndex) {
                var row = $(seletor).datagrid('getSelected');
                if (row) {
                    for (var key in row) {
                        if ($("[name='" + key + "']")) {
                            $("[name='" + key + "']").val(row[key]);
                        }
                    }
                }
            }
        });
    }

    $.initDGMS = function (master, slave, filedName) {
        $(master).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            },
            onClickRow: function (rowIndex) {
                var row = $(master).datagrid('getSelected');
                if (row) {
                    $(slave).datagrid('rejectChanges');
                    var rows = $(slave).datagrid('getRows');
                    for (var i = 0; i < rows.length; i++) {
                        if (row[filedName] != rows[i][filedName]) {
                            $(slave).datagrid("deleteRow", i);
                            i--;
                        }
                    }
                }
            }
        });

        $(slave).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            }
        });
    }

    $.initDGMSArrys = function (master, slaveArry, fieldName) {
        $(master).datagrid({
            onBeforeLoad: function () {
                $(this).datagrid('rejectChanges');
            },
            onClickRow: function (rowIndex) {
                var row = $(master).datagrid('getSelected');
                if (row) {
                    for (var j = 0; j < slaveArry.length; j++) {
                        $(slaveArry[j]).datagrid('rejectChanges');
                        var rows = $(slaveArry[j]).datagrid('getRows');
                        for (var i = 0; i < rows.length; i++) {
                            if (row[fieldName] != rows[i][fieldName]) {
                                $(slaveArry[j]).datagrid("deleteRow", i);
                                i--;
                            }
                        }
                    }
                }
            }
        });
        for (var i = 0; i < slaveArry.length; i++) {
            $(slaveArry[i]).datagrid({
                onBeforeLoad: function () {
                    $(this).datagrid('rejectChanges');
                }
            });
        }
    }

    $.initIfrForm = function (iframename, goal) {
        var row = self.parent.frames[iframename].$(goal).datagrid('getSelected');
        if (row) {
            for (var key in row) {
                if ($("[name='" + key + "']")) {
                    $("[name='" + key + "']").val(row[key]);
                }
            }
        }
    }

    $.initIfrFormMS = function (iframename, goal, master, slave) {
        var row = self.parent.frames[iframename].$(goal).datagrid('getSelected');
        var rows = self.parent.frames[iframename].$(master).datagrid('getRows');
        if (row) {
            for (var key in row) {
                if ($("[name='" + key + "']")) {
                    $("[name='" + key + "']").val(row[key]);
                }
            }
        }
        if (rows) {
            $(slave).datagrid('loadData', rows);
        }
    }

    $.doComAdd = function (seletor) {
        var lastIndex;
        $(seletor).datagrid('endEdit', lastIndex);
        $(seletor).datagrid('insertRow', {index: 0, row: {}});
        lastIndex = 0;
        $(seletor).datagrid('selectRow', lastIndex);
        $(seletor).datagrid('beginEdit', lastIndex);
    }

    $.doComDel = function (seletor) {
        var row = $(seletor).datagrid('getSelected');
        if (row) {
            var index = $(seletor).datagrid('getRowIndex', row);
            $(seletor).datagrid('deleteRow', index);
        }
    }

    $.doComSave = function (seletor) {
        $(seletor).datagrid('acceptChanges');
    }

    $.doComReject = function (seletor) {
        $(seletor).datagrid('rejectChanges');
    }

    $.doCopy = function (seletor) {
        var row = $(seletor).datagrid('getSelected');
        if (row) {
            var index = $(seletor).datagrid('getRowIndex', row);
            $(seletor).datagrid('endEdit', index);
            $(seletor).datagrid('insertRow', {index: 0, row: row});
            $(seletor).datagrid('selectRow', 0);
            $(seletor).datagrid('beginEdit', 0);
        }
    }

    $.doComEdit = function (seletor) {
        var row = $(seletor).datagrid('getSelected');
        if (row) {
            var index = $(seletor).datagrid('getRowIndex', row);
            $(seletor).datagrid('beginEdit', index);
        }
    }

    $.doIfrEdit = function (iframename, seletor, goal) {
        var row1 = self.parent.frames[iframename].$(goal).datagrid('getSelected');
        var index = self.parent.frames[iframename].$(goal).datagrid('getRowIndex', row1);
        var row = "";
        row = "({";
        $(seletor).find("[name]").each(function () {
            row += '"' + $(this).attr("name") + '"';
            row += ":";
            row += '"' + $(this).val() + '"';
            row += ",";
        });
        row = row.substr(0, row.length - 1);
        row += "})";
        var json = eval(row);
        self.parent.frames[iframename].$(goal).datagrid('updateRow', {index: index, row: json});
        $(seletor).find("[name]").each(function () {
            $(this).val("");
        });
    }

    $.doAdd = function (seletor, goal) {
        var rowJson = "";
        rowJson = "({";
        $(seletor).find("[name]").each(function () {
            rowJson += '"' + $(this).attr("name") + '"';
            rowJson += ":";
            rowJson += '"' + $(this).val() + '"';
            rowJson += ",";
        });
        rowJson = rowJson.substr(0, rowJson.length - 1);
        rowJson += "})";
        var json = eval(rowJson);
        $(goal).datagrid('insertRow', {index: 0, row: json});
        $(seletor).find("[name]").each(function () {
            $(this).val("");
        });
    }

    $.doIfrAdd = function (seletor, goal, iframename, rowIndex) {
        var row = "";
        row = "({";
        $(seletor).find("[name]").each(function () {
            row += '"' + $(this).attr("name") + '"';
            row += ":";
            row += '"' + $(this).val() + '"';
            row += ",";
        });
        row = row.substr(0, row.length - 1);
        row += "})";
        var json = eval(row);
        self.parent.frames[iframename].$(goal).datagrid('insertRow', {index: rowIndex, row: json});
        $(seletor).find("[name]").each(function () {
            $(this).val("");
        });
    }

    $.doIfrAddMS = function (seletor, targetGoal, masterGoal, slaveGoal, iframename, rowIndex) {
        var row = "";
        row = "({";
        $(seletor).find("[name]").each(function () {
            row += '"' + $(this).attr("name") + '"';
            row += ":";
            row += '"' + $(this).val() + '"';
            row += ",";
        });
        row = row.substr(0, row.length - 1);
        row += "})";
        var json = eval(row);
        self.parent.frames[iframename].$(masterGoal).datagrid('insertRow', {index: rowIndex, row: json});
        $(seletor).find("[name]").each(function () {
            $(this).val("");
        });

        var rows = $(targetGoal).datagrid('getRows');
        for (var i = 0; i < rows.length; i++) {
            self.parent.frames[iframename].$(slaveGoal).datagrid('insertRow', {index: rowIndex, row: rows[i]});
        }
    }

    $.doEdit = function (seletor, goal) {
        var row = $(goal).datagrid('getSelected');
        if (row) {
            var index = $(goal).datagrid('getRowIndex', row);
            var rowJson = "";
            rowJson = "({";
            $(seletor).find("[name]").each(function () {
                rowJson += '"' + $(this).attr("name") + '"';
                rowJson += ":";
                rowJson += '"' + $(this).val() + '"';
                rowJson += ",";
            });
            rowJson = rowJson.substr(0, rowJson.length - 1);
            rowJson += "})";
            var json = eval(rowJson);
            $(goal).datagrid('updateRow', {index: index, row: json});
            $(seletor).find("[name]").each(function () {
                $(this).val("");
            });
        }
    }

    $.doIfrEditMS = function (iframename, seletor, goal, masterGoal, slaveGoal, fieldName) {
        var row1 = self.parent.frames[iframename].$(goal).datagrid('getSelected');
        var index = self.parent.frames[iframename].$(goal).datagrid('getRowIndex', row1);
        var row = "";
        row = "({";
        $(seletor).find("[name]").each(function () {
            row += '"' + $(this).attr("name") + '"';
            row += ":";
            row += '"' + $(this).val() + '"';
            row += ",";
        });
        row = row.substr(0, row.length - 1);
        row += "})";
        var json = eval(row);
        self.parent.frames[iframename].$(goal).datagrid('updateRow', {index: index, row: json});
        $(seletor).find("[name]").each(function () {
            $(this).val("");
        });

        //更新从表信息
        var srows = $(slaveGoal).datagrid("getRows");
        var mrows = self.parent.frames[iframename].$(masterGoal).datagrid("getRows");
        var addArry = new Array();
        for (var i = 0; i < srows.length; i++) {
            var isExist = false;
            var index = 0;
            for (var j = 0; j < mrows.length; j++) {
                if (srows[i][fieldName] == mrows[j][fieldName]) {
                    index = j;
                    isExist = true;
                    break;
                }
            }
            if (isExist) {
                self.parent.frames[iframename].$(masterGoal).datagrid("updateRow", {index: index, row: srows[i]});
            }
            else {
                addArry.push(i);
            }
        }

    }

})(jQuery);
