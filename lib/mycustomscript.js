//[ remove tag function start]
function removetag(userID, postID){
  var userID = userID;
  var postID = postID;

  // alert(userID);
  // alert(postID);
  $.ajax({
        type: "POST",
        // url: baseUrl + "ajax/onePageRequest.php",
        url: "lib/status.php",
        dataType: "json",
        data: {
            'st': 45,
            'userID': userID,
            'postID': postID
        },
        success: function (responsed) {
            var obj = responsed;
            if (obj.output == "success") {
                // success(obj.msg);
                swal("Thanks!", obj.msg, "success");
                setTimeout(function () {
                    window.location.reload(true);
                }, 1000);
            } else {
                error(obj.msg);
            }

        }
    });
}
//[ remove tag function end]


function seenMsg(userid){
    var userid = userid;
    
    $.ajax({
        type: "POST",
        // url: baseUrl + "ajax/onePageRequest.php",
        url: "lib/shout.php",
        dataType: "json",
        data: {
            'st': 43,
            'userID': userid
        },
        success: function (responsed) {
            var obj = responsed;
            if (obj.output == "success") {
                // success(obj.msg);
//                swal("Thanks!", obj.msg, "success");
//                setTimeout(function () {
//                    window.location.reload(true);
//                }, 1000);
            } else {
//                error(obj.msg);
            }

        }
    });
}