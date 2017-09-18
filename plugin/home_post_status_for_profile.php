
<span id="results"> </span>



<script type="text/javascript">

(function($){
    
    
	$.fn.loaddata = function(options) {
        // Settings start
		var settings = $.extend({ 
			loading_gif_url	: "./images/spinner/486.gif", //url to loading gif
			end_record_text	: 'No more records found!', //no more records to load
			data_url 		: './plugin/home_post_status_for_profile_data.php', //url to PHP page
			start_page 		: 1 //initial page
		}, options);
        // Settings end
		
		var el = this;	
		loading  = false; 
		end_record = false;
		contents(el, settings); //initial data load
		
        //detact scroll start
		$(window).scroll(function() { 
			if($(window).scrollTop() + $(window).height() >= $(document).height()){ 
                //scrolled to bottom of the page
				contents(el, settings); //load content chunk 
			}
		});		
        //detact scroll end
	}; 
    
	//Ajax load function
	function contents(el, settings){
		var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('loading-image').css("margin-left", "35%");; //create load image
		var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info panel panel-default panel-body'); //end record text
        
		if(loading == false && end_record == false){
			loading = true; //set loading flag on
			el.append(load_img); //append loading image
            
			$.post( settings.data_url, {'page': settings.start_page}, function(data){
                //jQuery Ajax post
				if(data.trim().length == 0){ //no more records
					el.append(record_end_txt); //show end record text
					load_img.remove(); //remove loading img
					end_record = true; //set end record flag on
					return; //exit
				}
				loading = false;  //set loading flag off
				load_img.remove(); //remove loading img 
				el.append(data);  //append content 
				settings.start_page ++; //page increment
                
                
			})
            
		}
        
        
	}

})(jQuery);

$("#results").loaddata();


function like(pid){
    var post_id = pid;
      $.ajax({
           type: "POST",
           url: "./lib/status.php",
           dataType: "json",
           data: {
             st:2,
             post_id:post_id
           },
           success: function (response) {
             var obj = response;
             var totalLikes = obj.totalLikes;
             
             if (obj.output == "success") {
                 document.getElementById("like_unlike_button_"+post_id).innerHTML= obj.button;
                 if(totalLikes >= 1){
                    document.getElementById("likers_"+post_id).style.display = "block";
                 }
                 document.getElementById("likers_"+post_id).innerHTML= obj.response;
             } else {
               error(obj.msg);
             }
           }
    });
    
}

function un_like(pid){
    var post_id = pid;
    
    $.ajax({
           type: "POST",
           url: "./lib/status.php",
           dataType: "json",
           data: {
             st:90,
             post_id:post_id
           },
           success: function (response) {
             var obj = response;
             var totalLikes = obj.totalLikes;
             if (obj.output == "success") {
                 document.getElementById("like_unlike_button_"+post_id).innerHTML= obj.button;
                 if(totalLikes < 1){
                    document.getElementById("likers_"+post_id).style.display = "none";
                 }
                 document.getElementById("likers_"+post_id).innerHTML= obj.response;
             } else {
               error(obj.msg);
             }
           }
    });

}


// [action function for hide a post start]
function PostActionButton1_hide(postid){
   var postid = postid;
   var type = 'hide';
     load_data = {'st': 31, 'postid': postid, 'buttonType': type};
     $.post('lib/shout.php', load_data, function (data)
     {
       swal("Thanks!", "Successfully Hide From Timeline!", "success");
       setInterval('window.location.reload()', 5000);
    });
}
// [action function for hide a post end]

// [action function for delete a post start]
function PostActionButton1_delete(postid){
   var postid = postid;
   var type = 'del';
       load_data = {'st': 31, 'postid': postid, 'buttonType': type};
       $.post('lib/shout.php', load_data, function (data)
       {
         swal("Thanks!", "Successfully deleted!", "success");
         setInterval('window.location.reload()', 5000);
      });
}
// [action function for delete a post end]

// [action function for remove tag from post start]
function PostActionButton2(postid, userid){

   var postID = postid;
   var userid = userid;

    $.ajax({
           type: "POST",
           url: "./lib/shout.php",
           dataType: "json",
           data: {
             st:32,
             postID:postID,
             userid:userid
           },
           success: function (response) {
             var obj = response;
             if (obj.output == "success") {
               success(obj.msg);
               setInterval('window.location.reload()', 5000);
             } else {
               error(obj.msg);
             }
           }
    });

}
// [action function for remove tag from post end]
 
 
// [for clear textarea value start]
 function clearFields(pid) {
     var postid = pid;
    document.getElementById("content"+postid).value=""
}
// [for clear textarea value end]


</script>



