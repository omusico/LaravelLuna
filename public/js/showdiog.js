function creatDivDilog(titleStr){
    
    var boardDiv = "<div id='showdilog_div'></div>"   

    $(document.body).append(boardDiv); 
    
    $('#showdilog_div').dialog({
		autoOpen: true,
		draggable: false,
		modal: true,
		close: function(event, ui) {
		    $( "#showdilog_div" ).remove(); 
		},
		buttons: {			
		    "关闭": function() { 
			    $(this).dialog("close");    				
		    }			 
		},
		width:906		
	});
	
	$("#showdilog_div").dialog( "option", "title",titleStr );
}

function creatXhDivDilog(titleStr){
    
    var boardDiv = "<div id='showXhdilog_div'></div>"   

    $(document.body).append(boardDiv); 
    
    $('#showXhdilog_div').dialog({
		autoOpen: true,
		draggable: false,
		modal: true,
		close: function(event, ui) {
		    $( "#showXhdilog_div" ).remove(); 
		},
		buttons: {			
		    "关闭": function() { 
			    $(this).dialog("close");    				
		    }			 
		},
		width:820		
	});
	
	$("#showXhdilog_div").dialog( "option", "title",titleStr );
}

function creatOtherDilog(titleStr,widthStr,heightStr){
    
    var boardDiv = "<div id='showOtherlog_div'></div>"   

    $(document.body).append(boardDiv); 
    
    $('#showOtherlog_div').dialog({
		autoOpen: true,
		draggable: false,
		modal: true,
		close: function(event, ui) {
		    $( "#showOtherlog_div" ).remove(); 
		}		
	});
	
	$("#showOtherlog_div").dialog( "option", "title",titleStr );
	
	$("#showOtherlog_div").dialog( "option", "width",widthStr );
	
	$("#showOtherlog_div").dialog( "option", "height",heightStr + 50 );
}
function openPages(title, url) {
   
    if ($("#open_pages").length <= 0) {
        var boardDiv = "<div id='open_pages' title=''  style='display:none'>"
                  + " <iframe   name='mainframe' width='100%'  height='99%'  frameborder='0' scrolling='auto' allowtransparency='ture' "
                       + "src=''></iframe> </div>";
        $(document.body).append(boardDiv);
        $('#open_pages').dialog({
            width: 840,
            height: 620,
            autoOpen: false,
            draggable: true,
            modal: true,
            close: function (event, ui) {
                $("#open_pages").remove();
            } 

        });
    }
    $("#open_pages").dialog("option", "title", title);
    $("#open_pages iframe").attr("src", url);
    $("#open_pages").dialog("open");

  
    

}
function showMassage(massage)
{
   

    if ($("#dialog_message").length <= 0) {
        $(document.body).append("<div id='dialog_message' title='提示信息' style='display:none'><p></p> </div> ");
        $('#dialog_message').dialog({
            autoOpen: false,
            draggable: true,
            modal: true,
            close: function (event, ui) {
                $("#dialog_message").remove();
            },
            buttons: {
                "确定": function () {
                    $(this).dialog("close");
                }
            }

        });
    }
     
    $("#dialog_message p").html(massage);
    $("#dialog_message").dialog("open");

    //$("#dialog-message").dialog("option", "title", "提示信息");
}
