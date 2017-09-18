/**
 * Created by Tanim on 8/1/2015.
 */


// CHAT TOGGLE CLICK


/*
 * Sidebar
 */
(function () {

    //When clicking outsid
    //Toggle
    $('body').on('click', ' #chat-trigger', function (e) {
        e.preventDefault();
        var x = $(this).data('trigger');
        $(this).toggleClass('open');
        $('#chat').toggleClass('toggled');
        $('#chat-trigger .fa').toggleClass('fa-comment fa-times');
    })

})();

$('a.chat_close').click(function(e) {
    var windowcl=$(this).attr("name");
	$('#'+windowcl).hide('slow');
	if(windowcl=='chat_window_1')
	{
		$.cookie("count","0");	
		$.cookie("chat_window_1_user","0");
		$.cookie("windowchat1","");
	}
	else if(windowcl=='chat_window_2')
	{
		$.cookie("count2","0");	
		$.cookie("chat_window_2_user","0");
		$.cookie("windowchat2","");
	}
	else if(windowcl=='chat_window_3')
	{
		$.cookie("count3","0");	
		$.cookie("chat_window_3_user","0");
		$.cookie("windowchat3","");
	}
	
	if($.cookie("count")=="0" && $.cookie("count2")==1 && $.cookie("count3")==0)
	{
		$('#chat_window_2').css("margin-left","10px");	
		$('#chat_window_3').css("margin-left","575px");	
	}
	else if($.cookie("count")=="0" && $.cookie("count2")==1 && $.cookie("count3")==1)
	{
		$('#chat_window_2').css("margin-left","10px");	
		$('#chat_window_3').css("margin-left","575px");	
	}
	else if($.cookie("count2")=="0" && $.cookie("count")==1 && $.cookie("count3")==1)
	{
		$('#chat_window_1').css("margin-left","10px");	
		$('#chat_window_2').css("margin-left","0px");	
		$('#chat_window_3').css("margin-left","290px");	
	}
	else if($.cookie("count")==1 && $.cookie("count2")==1 && $.cookie("count3")=="0")
	{
		$('#chat_window_1').css("margin-left","10px");	
		$('#chat_window_2').css("margin-left","290px");	
		$('#chat_window_3').css("margin-left","575px");	
	}
	else if($.cookie("count")=="0" && $.cookie("count2")=="0" && $.cookie("count3")==1)
	{
		$('#chat_window_1').css("margin-left","575px");	
		$('#chat_window_2').css("margin-left","290px");	
		$('#chat_window_3').css("margin-left","10px");	
	}
	
	
	
	/*if(windowcl=="chat_window_1")
	{
		//alert("Got IT");
		$('#chwin1').attr("class","");
		var getchone=$('#chwin1').attr("class");
		var getchtwo=$('#chwin2').attr("class");
		var getchthree=$('#chwin3').attr("class");
		if(getchone=="")
		{
			$('#'+windowcl).css("margin-left","10px");
		}
		
		if(getchtwo==2)
		{
			$('#chat_window_2').css("margin-left","10px");	
		}
		
		if(getchthree==3)
		{
			$('#chat_window_3').css("margin-left","290px");	
		}
		
		
	}
	else if(windowcl=="chat_window_2")
	{
		//alert("Got IT 2");
		$('#chwin2').attr("class","");
		var getchthree=$('#chwin3').attr("class");
		var getchone=$('#chwin1').attr("class");
		var getchtwo=$('#chwin2').attr("class");
		if(getchtwo=="")
		{
			$('#'+windowcl).css("margin-left","290px");
		}
		
		if(getchone!='')
		{
			if(getchthree==3)
			{
				$('#chat_window_3').css("margin-left","290px");	
			}
		}
		else
		{
			if(getchthree==3)
			{
				$('#chat_window_3').css("margin-left","10px");	
			}
		}
	}
	else
	{
		//alert("Not Got IT");
		$('#chwin3').attr("class","");
		$('#chat_window_3').css("margin-left","575px");
	}*/
	
});

 


/// demo
$('a.lv-item').click(function (e) 
{	
	var uid=$(this).attr("name");
	//alert('Success');
	var current_window="";
	var cnt1=$.cookie("count");
	var cnt2=$.cookie("count2");
	var cnt3=$.cookie("count3");
	//alert($.cookie("count")+"-"+$.cookie("count2")+"-"+$.cookie("count3"));

	if(cnt1==0 && cnt2==0 && cnt3==1)
	{
		$.cookie("count","1");	
		$('#chat_window_1').show('slow');
		$('#chat_window_3').css("margin-left","290px");
		$('#chat_window_1').css("margin-left","10px");
		current_window="chat_window_1";
		$.cookie("chat_window_1_user",uid);
		$.cookie("windowchat1","chat_window_1");
		//$('#chat_window_2').css("margin-left","575px");
	}
	else if(cnt1==1 && cnt2==0 && cnt3==1)
	{
		$.cookie("count","1");	
		$('#chat_window_2').show('slow');
		$('#chat_window_1').css("margin-left","10px");
		$('#chat_window_2').css("margin-left","290px");
		$('#chat_window_3').css("margin-left","575px");
		current_window="chat_window_2";
		$.cookie("chat_window_2_user",uid);
		$.cookie("windowchat2","chat_window_2");
		
	}
	else if(cnt1==0 && cnt2==0 && cnt3==0)
	{
		$.cookie("count","1");	
		$('#chat_window_1').show('slow');
		$('#chat_window_1').css("margin-left","10px");
		$('#chat_window_2').css("margin-left","290px");
		$('#chat_window_3').css("margin-left","575px");
		current_window="chat_window_1";
		$.cookie("chat_window_1_user",uid);
		$.cookie("windowchat1","chat_window_1");
	}
	else
	{
		if(cnt2==0)
		{
			$.cookie("count2","1");
			$('#chat_window_2').show('slow');
			$('#chat_window_1').css("margin-left","10px");
			$('#chat_window_2').css("margin-left","290px");
			$('#chat_window_3').css("margin-left","575px");
			current_window="chat_window_2";
			$.cookie("chat_window_2_user",uid);
			$.cookie("windowchat2","chat_window_2");
		}
		else 
		{
			if(cnt3==0)
			{
				$.cookie("count3","1");
				$('#chat_window_3').show('slow');
				$('#chat_window_1').css("margin-left","10px");
				$('#chat_window_2').css("margin-left","290px");
				$('#chat_window_3').css("margin-left","575px");
				current_window="chat_window_3";
				$.cookie("chat_window_3_user",uid);
				$.cookie("windowchat3","chat_window_3");
			}
			else
			{
				$.cookie("count3","1");
				$('#chat_window_3').show('slow');
				$('#chat_window_1').css("margin-left","10px");
				$('#chat_window_2').css("margin-left","290px");
				$('#chat_window_3').css("margin-left","575px");
				current_window="chat_window_3";
				$.cookie("chat_window_3_user",uid);
				$.cookie("windowchat3","chat_window_3");
			}
		}
	}
	
	//alert('#'+current_window+'_activity');
	
	//var chatwindow=$(this).attr("id");
		
	$('#'+current_window+'_submit').attr("name",uid);
	$('#'+current_window+'_submit').attr("onKeydown","Javascript: if (event.keyCode == 13) sendchatmessage('"+uid+"',this.value,'"+current_window+"_activity','"+current_window+"_scroll','"+current_window+"_submit');");
	$('#'+current_window+'_activity').html("Loading Content Please Wait..");
    e.preventDefault();
	var param={'st':1,'uid':uid};
	$.post("lib/chat.php",param,function(data)
	{
		$('#'+current_window+"_chat_user_name").html(data);
		//alert(current_window+"_chat_user_name");
		$.post('lib/chat.php',{'st':3,'for_uid':uid},function(chatdata){ 
			$('#'+current_window+'_activity').html(chatdata); 
			var scrolltoh = $('#'+current_window+'_scroll')[0].scrollHeight;  
			$('#'+current_window+'_scroll').scrollTop(scrolltoh); 
		});
	});
});

$('li.lv-item').click(function (e) 
{	
	var uid=$(this).attr("name");
	//alert('Success');
	var current_window="";
	var cnt1=$.cookie("count");
	var cnt2=$.cookie("count2");
	var cnt3=$.cookie("count3");
	//alert($.cookie("count")+"-"+$.cookie("count2")+"-"+$.cookie("count3"));

	if(cnt1==0 && cnt2==0 && cnt3==1)
	{
		$.cookie("count","1");	
		$('#chat_window_1').show('slow');
		$('#chat_window_3').css("margin-left","290px");
		$('#chat_window_1').css("margin-left","10px");
		current_window="chat_window_1";
		$.cookie("chat_window_1_user",uid);
		$.cookie("windowchat1","chat_window_1");
		//$('#chat_window_2').css("margin-left","575px");
	}
	else if(cnt1==1 && cnt2==0 && cnt3==1)
	{
		$.cookie("count","1");	
		$('#chat_window_2').show('slow');
		$('#chat_window_1').css("margin-left","10px");
		$('#chat_window_2').css("margin-left","290px");
		$('#chat_window_3').css("margin-left","575px");
		current_window="chat_window_2";
		$.cookie("chat_window_2_user",uid);
		$.cookie("windowchat2","chat_window_2");
		
	}
	else if(cnt1==0 && cnt2==0 && cnt3==0)
	{
		$.cookie("count","1");	
		$('#chat_window_1').show('slow');
		$('#chat_window_1').css("margin-left","10px");
		$('#chat_window_2').css("margin-left","290px");
		$('#chat_window_3').css("margin-left","575px");
		current_window="chat_window_1";
		$.cookie("chat_window_1_user",uid);
		$.cookie("windowchat1","chat_window_1");
	}
	else
	{
		if(cnt2==0)
		{
			$.cookie("count2","1");
			$('#chat_window_2').show('slow');
			$('#chat_window_1').css("margin-left","10px");
			$('#chat_window_2').css("margin-left","290px");
			$('#chat_window_3').css("margin-left","575px");
			current_window="chat_window_2";
			$.cookie("chat_window_2_user",uid);
			$.cookie("windowchat2","chat_window_2");
		}
		else 
		{
			if(cnt3==0)
			{
				$.cookie("count3","1");
				$('#chat_window_3').show('slow');
				$('#chat_window_1').css("margin-left","10px");
				$('#chat_window_2').css("margin-left","290px");
				$('#chat_window_3').css("margin-left","575px");
				current_window="chat_window_3";
				$.cookie("chat_window_3_user",uid);
				$.cookie("windowchat3","chat_window_3");
			}
			else
			{
				$.cookie("count3","1");
				$('#chat_window_3').show('slow');
				$('#chat_window_1').css("margin-left","10px");
				$('#chat_window_2').css("margin-left","290px");
				$('#chat_window_3').css("margin-left","575px");
				current_window="chat_window_3";
				$.cookie("chat_window_3_user",uid);
				$.cookie("windowchat3","chat_window_3");
			}
		}
	}
	
	//alert('#'+current_window+'_activity');
	
	//var chatwindow=$(this).attr("id");
		
	$('#'+current_window+'_submit').attr("name",uid);
	$('#'+current_window+'_submit').attr("onKeydown","Javascript: if (event.keyCode == 13) sendchatmessage('"+uid+"',this.value,'"+current_window+"_activity','"+current_window+"_scroll','"+current_window+"_submit');");
	$('#'+current_window+'_activity').html("Loading Content Please Wait..");
    e.preventDefault();
	var param={'st':1,'uid':uid};
	$.post("lib/chat.php",param,function(data)
	{
		$('#'+current_window+"_chat_user_name").html(data);
		//alert(current_window+"_chat_user_name");
		$.post('lib/chat.php',{'st':3,'for_uid':uid},function(chatdata){ 
			$('#'+current_window+'_activity').html(chatdata); 
			var scrolltoh = $('#'+current_window+'_scroll')[0].scrollHeight;  
			$('#'+current_window+'_scroll').scrollTop(scrolltoh); 
		});
	});
});


function sendchatmessage(uid,valuemess,showplace,scrtext,emptyplace)
{			
	$.post("lib/chat.php",{'for_uid':uid,'st':2,'mess':valuemess},function(data)
	{
		$('#'+emptyplace).val("");
		var new_html="<script>window.setInterval(function(){$.post('lib/chat.php',{'st':3,'for_uid':"+uid+"},function(chatdata){ $('#"+showplace+"').html(chatdata); var scrolltoh = $('#"+scrtext+"')[0].scrollHeight;  $('#"+scrtext+"').scrollTop(scrolltoh); }); },5000); </script>"+data;
		$('#'+showplace).html(new_html);
		//$('#'+emptext).val();	
	});
}

function loadchathistory(uid,place)
{
	$.post("lib/chat.php",{'for_uid':uid,'st':3},function(data)
	{
		alert("Success");
		//$('#'+place).html(data);	
	});
}

/// CHAT

$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $(".chat-window:last-child").css("margin-left");
    size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $("#chat_window_1").clone().appendTo(".container");
    clone.css("margin-left", size_total);
});

