function success(msg) {
    // $.simplyToast('<i class="fa fa-check-circle"></i>&nbsp;&nbsp;' + msg, 'success');
    swal("Thanks!", msg, "success");
}

function error(msg) {
    // $.simplyToast('<i class="fa fa-times-circle"></i>&nbsp;&nbsp;' + msg, 'danger');
    swal("Thanks!", msg, "error");
}

function warning(msg) {
    // $.simplyToast('<i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;' + msg, 'info');
    swal("Sorry!", msg, "warning");
}
//tostar message end

// JavaScript Document
$(document).ready(function () {

    $("#add_location").click(function () {

        $('#add_location').html("Loading...");
        $.get("http://ipinfo.io", function (response) {

            load_notification = {'st': 9, 'country_code': response.country};

            $.post('lib/status.php', load_notification, function (data) {
                if (data == 1)
                {
                    //$(this).val(response.country);
                    document.getElementById('add_location').innerHTML = response.country;
                }
                else
                {
                    alert("Something Went Wrong Please retry Again");
                    location.reload();
                }
            });
            //console.log(response.country);
        }, "jsonp");


    });

    $("#statusPermission").change(function () {
        var status = $(this).val();
        load_notification = {'st': 8, 'post_permission': status};
        $.post('lib/status.php', load_notification, function (data) {

        });
    });

    function UrlFilter(msg)
    {
        if (msg.indexOf('[url') >= 0 ||
                msg.match(/^http([s]?):\/\/.*/) ||
                msg.match(/^www.[0-9a-zA-Z',-]./)) {
            return true;
        }
        else
        {
            return false;
        }

    }



    $("#btnPostStatusedit_update").click(function () {
        var post_id=$('#post_id').val();
        var msg = $('#status_message').val();
        var permission = $('#statusPermission').val();
        var names = $('.frind_names').val();
        // console.log(permission);
        // load_notification = {'st': 91, 'msg': msg,'post_id':post_id,'permission': permission, 'names': names};
        // $.post('lib/status.php', load_notification, function (data) {
        //     window.location.reload();
        // });

        if(names != null){
            load_notification = {'st': 91, 'msg': msg,'post_id':post_id,'permission': permission, 'names': names};

          $.post('lib/status.php', load_notification, function (data)
           {
            // alert('with names');
              //  $('#imagestatusboxshow').hide();
              //  $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
               swal("Thanks!", "Your Post Updated Successfully!", "success");
              //  setInterval('window.location.reload()', 2000);
           });
        } else{
            load_notification = {'st': 92, 'msg': msg,'post_id':post_id,'permission': permission, 'names': names};
            $.post('lib/status.php', load_notification, function (data)
             {
              //  alert('without names');
                //  $('#imagestatusboxshow').hide();
                //  $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
                 swal("Thanks!", "Your Post Updated Successfully!", "success");
                // setInterval('window.location.reload()', 2000);
             });
        }
    });




    $("#btnPostStatus").click(function () {
        var msg = $('#status_message').val();
        var names = $('.frind_names').val();
        // alert(names);
        var permission = $('#statusPermission').val();

        var pageName = $('#pageName').val();
        var pageIdNumber = $('#pageIdNumber').val();
        var groupIdNumber = $('#groupIdNumber').val();

        if(names != null){
          load_notification = {'st': 1, 'msg': msg,
                               'names': names, 'permission': permission,
                               'pageName':pageName, 'pageIdNumber':pageIdNumber, 'groupIdNumber':groupIdNumber};
          if (msg == "")
          {
              swal("Sorry!", "Failed to Post", "warning")
          }
          else
          {
              swal("Thanks!", "Your Post Submitted Successfully!", "success");
              $.post('lib/status.php', load_notification, function (data) {
                  setInterval('window.location.reload()', 2000);
              });
          }
        } else{
          load_notification = {'st': 1, 'msg': msg,
                               'permission': permission,
                               'pageName':pageName, 'pageIdNumber':pageIdNumber, 'groupIdNumber':groupIdNumber};
          if (msg == "")
          {
              swal("Sorry!", "Failed to Post", "warning")
          }
          else
          {
              swal("Thanks!", "Your Post Submitted Successfully!", "success");
              $.post('lib/status.php', load_notification, function (data) {
                  setInterval('window.location.reload()', 2000);
              });
          }
        }


    });

     //  [old]
    // $("#btnPostStatus").click(function () {
    //     var msg = $('#status_message').val();
    //
    //     load_notification = {'st': 1, 'msg': msg};
    //     if (msg == "")
    //     {
    //         swal("Sorry!", "Failed to Post", "warning")
    //     }
    //     else
    //     {
    //         //  alert("heheheehe paici mama tora");
    //         swal("Thanks!", "Your Post Submitted Successfully!", "success");
    //         $.post('lib/status.php', load_notification, function (data) {
    //             window.location.reload();
    //         });
    //     }
    // });



    $("#btnPostGroupStatus").click(function () {
        var group_id = $('#grp-id-postbox').val();
        var msgs = $('#group_status_message').val();
        load_notification = {'st': 36, 'msg': msgs, 'group_id': group_id};
        $.post('lib/status.php', load_notification, function (data) {
            location.reload();
        });
    });

    $("#btnPagePostStatus").click(function () {
        var page_id = $('#page-id-postbox').val();
        var msgsp = $('#page_status_message').val();
        load_notification = {'st': 38, 'msg': msgsp, 'page_id': page_id};
        $.post('lib/status.php', load_notification, function (data) {
            location.reload();
        });
    });

    $("#btnPostStatus_other").click(function () {
        var msg = $('#status_message').val();
        var to_user = $(this).attr('name');
        load_notification = {'st': 11, 'msg': msg, 'to_user': to_user};
        $.post('lib/status.php', load_notification, function (data) {
            location.reload();
        });
    });

    
    
    
//    $(".sp-like").on('click', (function (e) {
//        var post_id = $(this).attr('id');
//        var place = "postlike" + post_id;
//        var placeicon = "posticon" + post_id;
//        load_data_like = {'st': 2, 'post_id': post_id};
//        $.post('lib/status.php', load_data_like, function (data) {
//            if (data == 1)
//            {
//                $('#' + place).fadeIn('slow');
//                $('#' + place).html("Unlike");
//                $('#' + placeicon).html("<i class='fa fa-thumbs-down'></i>");
//                loadcommentautoload(post_id);
//            }
//            else if (data == 0)
//            {
//                $('#' + place).fadeIn('slow');
//                $('#' + place).html("Like");
//                $('#' + placeicon).html("<i class='fa fa-thumbs-up'></i>");
//                loadcommentautoload(post_id);
//            }
//        });
//
//    }));

    $(".sp-unlike").on('click', (function (e) {
        var post_id = $(this).attr('id');
        var place = "postunlike" + post_id;
        $('#placeiconinlike').html("<i class='fa fa-thumbs-up'></i>");
        // var placeiconunlike = "placeiconinlike" + post_id;
        load_data_unlike = {'st': 90, 'post_id': post_id};
        $.post('lib/status.php', load_data_unlike, function (data) {
            if (data == 1)
            {
              // console.log('1');
                $('#' + place).fadeIn('slow');
                $('#' + place).html("Like");
                // $('#' + placeiconunlike).html("<i class='fa fa-thumbs-up'></i>");
                loadcommentautoload(post_id);
                success("successfully Unliked.");
            }
            else if (data == 0)
            {
              // console.log('2');
                $('#' + place).fadeIn('slow');
                $('#' + place).html("Unlike");
                // $('#' + placeiconunlike).html("<i class='fa fa-thumbs-down'></i>");
                loadcommentautoload(post_id);
            }
        });

    }));

    $(".sp-mike-like").on('click', (function (e) {

        var post_id = $(this).attr('name');
        //alert('success'+post_id);
        var place = "mike-like-place";
        load_data_mike_like = {'st': 2, 'post_id': post_id};
        $.post('lib/status.php', load_data_mike_like, function (data) {
            if (data == 1)
            {
                $('#' + place).fadeIn('slow');
                $('#' + place).html("Unlike");
            }
            else if (data == 0)
            {
                $('#' + place).fadeIn('slow');
                $('#' + place).html("Like");
            }
            /*else
             {
             window.location.reload();
             }*/
        });

    }));



    $(".sp-share").on('click', (function (e) {
        var post_id = $(this).attr('id');
        load_data_share = {'st': 4, 'post_id': post_id};
        $.post('lib/status.php', load_data_share, function (data) {
            if (data == 1)
            {
                window.location.reload();
            }
            else
            {
                alert("Something Went Wrong Please retry Again");
            }
        });

    }));

    $(".dostums-post-delete").on('click', (function (e) {
        var post_id = $(this).attr('id');
        post_delete = {'st': 6, 'post_id': post_id};
        $.post('lib/status.php', post_delete, function (data) {
            if (data == 1)
            {
                window.location.reload();
            }
            else
            {
                alert("Something Went Wrong Please retry Again");
            }
        });

    }));




    $(".post-type").on('click', (function (e) {
        $('.post-types li').attr('class', "post-type");
        $(this).attr("class", "post-type active");
    }));

    $("#uploadImage").on('click', (function (e) {
        e.preventDefault();
        $('#uploadStatusImage').trigger('click');
    }));

    $("#uploadGroupImage").on('click', (function (e) {
        e.preventDefault();
        $('#uploadGroupStatusImage').trigger('click');
    }));

    $("#uploadPageImage").on('click', (function (e) {
        e.preventDefault();
        $('#uploadPageStatusImage').trigger('click');
    }));




});


// [post into wall with photo start]
function UploadImageString(time)
{
      var msg = $('#status_message').val();
      var names = $('.frind_names').val();
      var permission = $('#statusPermission').val();
      var img = $('#img' + time).attr('src');

      if(names != null){
          load_data_image = {'st': 3, 'img': img, 'msg': msg, 'names':names, 'permission': permission};

        $.post('lib/image.php', load_data_image, function (data)
         {
             $('#imagestatusboxshow').hide();
             $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
             swal("Thanks!", "Your Post Submitted Successfully!", "success");
             setInterval('window.location.reload()', 2000);
         });
      } else{
          load_data_image = {'st': 12, 'img': img, 'msg': msg, 'permission': permission};
          $.post('lib/image.php', load_data_image, function (data)
           {
               $('#imagestatusboxshow').hide();
               $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
               swal("Thanks!", "Your Post Submitted Successfully!", "success");
              setInterval('window.location.reload()', 2000);
           });
      }


    // var post_message = $('#status_message').val();
    // load_data_image = {'st': 3, 'img': img, 'post': post_message};
    // $.post('lib/image.php', load_data_image, function (data)
    // {
    //     $('#imagestatusboxshow').hide();
    //     $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
    //     location.reload();
    // });


    // if(names != null){
    //   load_notification = {'st': 1, 'msg': msg, 'names': names, 'permission': permission};
    //   if (msg == "")
    //   {
    //       swal("Sorry!", "Failed to Post", "warning")
    //   }
    //   else
    //   {
    //       swal("Thanks!", "Your Post Submitted Successfully!", "success");
    //       $.post('lib/status.php', load_notification, function (data) {
    //           window.location.reload();
    //       });
    //   }
    // } else{
    //   load_notification = {'st': 1, 'msg': msg, 'permission': permission};
    //   if (msg == "")
    //   {
    //       swal("Sorry!", "Failed to Post", "warning")
    //   }
    //   else
    //   {
    //       swal("Thanks!", "Your Post Submitted Successfully!", "success");
    //       $.post('lib/status.php', load_notification, function (data) {
    //           window.location.reload();
    //       });
    //   }
    // }

}
// [post into wall with photo end]


// [Edit post with photo start]
function EditUploadImageString(time)
{
      var post_id=$('#post_id').val();
      var msg = $('#status_message').val();
      var names = $('.frind_names').val();
      var permission = $('#statusPermission').val();
      var img = $('#img' + time).attr('src');
      // alert(names);
      if(names != null){
          load_data_image = {'st': 13, 'img': img, 'msg': msg, 'names':names, 'permission': permission, 'post_id': post_id};

        $.post('lib/image.php', load_data_image, function (data)
         {   //alert('with names');
            //  $('#imagestatusboxshow').hide();
            //  $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
             swal("Thanks!", "Your Post Updated Successfully!", "success");
            //  setInterval('window.location.reload()', 2000);
         });
      } else{
          load_data_image = {'st': 14, 'img': img, 'msg': msg, 'permission': permission, 'post_id': post_id};
          $.post('lib/image.php', load_data_image, function (data)
           {
            //  alert('without names');
              //  $('#imagestatusboxshow').hide();
              //  $('#post_button').html("<input type='button' id='btnPostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
               swal("Thanks!", "Your Post Updated Successfully!", "success");
              // setInterval('window.location.reload()', 2000);
           });
      }

}
// [Edit post with photo end]





// [post action buttons end]


function UploadImageStringOther(time, to_user)
{
    var img = $('#img' + time).attr('src');
    var post_message = $('#status_message').val();
    load_data_image = {'st': 4, 'to_user': to_user, 'img': img, 'post': post_message};
    $.post('lib/image.php', load_data_image, function (data)
    {
        $('#imagestatusboxshow').hide();
        $('#post_button').html("<input type='button' id='btnPostStatus_other' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
        location.reload();
    });
}


/*Here goes image upload from postbox for group timeline*/
function UploadGroupImageString(time)
{
    var img = $('#img' + time).attr('src');
    var group_id = $('#grp-id-postbox').val();
    var post_message = $('#group_status_message').val();
    load_data_image = {'st': 9, 'img': img, 'post': post_message, 'group_id': group_id};
    $.post('lib/image.php', load_data_image, function (data)
    {
        $('#imagestatusboxshow').hide();
        $('#group_post_button').html("<input type='button' id='btnGroupImagePostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
        window.location.reload();
    });
}

/*function UploadGroupImageStringOther(time, to_user)
 {
 var img = $('#img' + time).attr('src');
 var post_message = $('#status_message').val();
 load_data_image = {'st': 4, 'to_user': to_user, 'img': img, 'post': post_message};
 $.post('lib/image.php', load_data_image, function (data)
 {
 $('#imagestatusboxshow').hide();
 $('#post_button').html("<input type='button' id='btnPostStatus_other' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
 location.reload();
 });
 }*/
/*Here ends image upload from postbox for group timeline*/

/*Here goes image upload from postbox for page timeline*/
function UploadPageImageString(time)
{
    var img = $('#img' + time).attr('src')
    var page_id = $('#page-id-postbox').val();
    var post_message = $('#page_status_message').val();
    load_data_image = {'st': 10, 'img': img, 'post': post_message, 'page_id': page_id};
    $.post('lib/image.php', load_data_image, function (data)
    {
        $('#imagestatusboxshow').hide();
        $('#page_post_button').html("<input type='button' id='btnPageImagePostStatus' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
        location.reload();
    });
}

/*function UploadGroupImageStringOther(time, to_user)
 {
 var img = $('#img' + time).attr('src');
 var post_message = $('#status_message').val();
 load_data_image = {'st': 4, 'to_user': to_user, 'img': img, 'post': post_message};
 $.post('lib/image.php', load_data_image, function (data)
 {
 $('#imagestatusboxshow').hide();
 $('#post_button').html("<input type='button' id='btnPostStatus_other' class='btn btn-post btn-success pull-right no-margin' value='Post' name='submit'>");
 location.reload();
 });
 }*/
/*Here ends image upload from postbox for page timeline*/

function frndrequest(user_id, statusplace, reqtype)
{
    load_data_like = {'st': reqtype, 'usrid': user_id};
    $.post('lib/friend.php', load_data_like, function (data) {
        if (data == 1)
        {
            alert(reqtype);
            if (reqtype == 1)
            {
                $('#' + statusplace).html("<span class='btn btn-sm btn-warning'><i class='fa fa-close'></i> Cancel</span>");
                $('#suggest' + user_id).hide();
            }
            else if (reqtype == 2)
            {
                $('#' + statusplace).html("<span class='btn btn-sm btn-success'><i class='fa fa-close'></i> Friend</span>");
                $('#suggest' + user_id).hide();
            }
            else if (reqtype == 3)
            {
                $('#' + statusplace).html("<span class='btn btn-sm btn-info'><i class='fa fa-user-plus'></i> Request</span>");
                $('#suggest' + user_id).hide();
            }
        }

    });
}

function frndsearch(user_id, reqtype)
{
    load_data_like = {'st': reqtype, 'usrid': user_id};
    $.post('lib/friend.php', load_data_like, function (data) {
        if (data == 1)
        {
            if (reqtype == 1)
            {
                $('#searchfrnd_' + user_id).html("<i class='fa fa-user-times margin-right10'></i>Cancel Request");
                $('#searchfrnd_' + user_id).attr("onclick", "frndsearch(" + user_id + ",3)");
            }
            else if (reqtype == 2)
            {
                $('#searchfrnd_' + user_id).html("<i class='fa fa-user margin-right10'></i>Friends");
                $('#searchfrnd_' + user_id).attr("onclick", "frndsearch(" + user_id + ",3)");
            }
            else if (reqtype == 3)
            {
                $('#searchfrnd_' + user_id).html("<i class='fa fa-user-plus margin-right10'></i>Add Friend");
                $('#searchfrnd_' + user_id).attr("onclick", "frndsearch(" + user_id + ",1)");
            }
        }

    });
}

function frndconfirm(user_id, reqtype)
{

    load_data_like = {'st': reqtype, 'usrid': user_id};
    $.post('lib/friend.php', load_data_like, function (data) {
      // alert(data);
        if (data == 1)
        {
            if (reqtype == 1)
            {
                $('#ff_' + user_id).hide('slow');
                setTimeout(function(){ location.reload(); }, 2000);
            }
            else if (reqtype == 0)
            {
                $('#ff_' + user_id).hide('slow');
                swal("", "Successfully unfriend!", "success");
                setTimeout(function(){ location.reload(); }, 2000);
            }
            else if (reqtype == 2)
            {
                $('#ff_' + user_id).hide('slow');
                swal("Thanks!", "Thank you for accept friend request!", "success");
                setTimeout(function(){ location.reload(); }, 2000);
            }
            else if (reqtype == 3)
            {
                $('#ff_' + user_id).hide('slow');
                setTimeout(function(){ location.reload(); }, 2000);
            } else if (reqtype == 4)
            {
                $('#ff_' + user_id).hide('slow');
                swal("", "Successfully canceled friend request!", "success");
                // setTimeout(function(){ location.reload(); }, 2000);
            }
        }

    });
}

function frndrequest_Profile(user_id, statusplace, reqtype, type)
{
  // alert(type);
    load_data_like = {'st': reqtype, 'usrid': user_id, 'requestType': type};
    $.post('lib/friend.php', load_data_like, function (data) {

        if (reqtype == 1 && data == 1)
        {
            //  alert('added');
            $('#' + statusplace).html("<i class='fa fa-check'></i> Request sent");
            $('#' + statusplace).attr("onclick", "frndrequest_Profile('" + user_id + "','profile_request_status_" + user_id + "','3')");
             swal("Success!", "Successfully send friend request", "success")
        }
    //     else if (reqtype == 2)
    //     {
    //         $('#' + statusplace).html("<i class='fa fa-user'></i> Friend");
    //         $('#' + statusplace).attr("onclick", "frndrequest_Profile('" + user_id + "','profile_request_status_" + user_id + "','3')");
    //     }
        else if (reqtype == 0 && data == 1)
        {
          // alert('canceled');
            $('#' + statusplace).html("<i class='fa fa-user-plus'></i> Successfully canceled");
            // $('#' + statusplace).attr("onclick", "frndrequest_Profile('" + user_id + "','profile_request_status_" + user_id + "','1')");
            swal("Success!", "Successfully canceled friend request", "success");
            setTimeout(function(){ location.reload(); }, 1000);
        }


    });
}

function likeComment(comment_id, post_id)
{
    load_data_like = {'st': 5, 'comment_id': comment_id, 'post_id': post_id};
    $.post('lib/status.php', load_data_like, function (data) {
        //console.log(data);
        var datacl = jQuery.parseJSON(data);
        var std = datacl.status;
        var like = datacl.like;
        var place = "bcomlikes" + post_id + "_" + comment_id;
        var places = "comlikes" + post_id + "_" + comment_id;
        if (std == 1)
        {
            if (like != 0)
            {
                $('#' + places).fadeIn('slow');
                $('#' + places).html("Unlike");
                $('#' + place).attr("title", like + " People Likes.");
            }
            else
            {
                $('#' + places).fadeIn('slow');
                $('#' + places).html("Unlike");
                $('#' + place).attr("title", "");
            }
        }
        else
        {
            if (like != 0)
            {
                $('#' + places).fadeIn('slow');
                $('#' + places).html("Like");
                $('#' + place).attr("title", like + " People Likes.");
            }
            else
            {

                $('#' + places).fadeIn('slow');
                $('#' + places).html("Like");
                $('#' + place).attr("title", "");

            }
        }

    });
}

function deleteComment(comment_id, post_id)
{
    load_data_delete = {'st': 7, 'comment_id': comment_id};
    $.post('lib/status.php', load_data_delete, function (data) {
        if (data == 1)
        {
            $('#com' + comment_id).fadeOut('slow');
            loadcommentautoload(post_id);
        }
        else
        {
            alert("Something Went Wrong Please retry Again");
            loadcommentautoload(post_id)
        }
    });
}



function loadcommentautoload(post_id)
{
    load_new_comment = {'st': 1, 'post_id': post_id};
    $.post('lib/comment.php', load_new_comment, function (comment) {
        if (comment)
        {
            $('#comment_list_instant_load_' + post_id).fadeIn('slow');
            $('#comment_list_instant_load_' + post_id).html(comment);
        }
        else
        {
            window.location.refresh();
        }
    });

    load_count_comment = {'st': 3, 'post_id': post_id};
    $.post('lib/comment.php', load_count_comment, function (commentc) {

        var globaldataconds = false;
        var datacl = jQuery.parseJSON(commentc);
        var like = datacl.likes;
        var commentd = datacl.comment;
        var globalcomlik = (like - 0) + (commentd - 0);
        if (globalcomlik != 0)
        {
            globaldataconds = true;
        }

        if (globaldataconds)
        {

            if (globalcomlik != 0)
            {


                $('#loadallcomment' + post_id).css('display', 'inline-block');
                $('#mcc' + post_id).fadeIn('slow');
                if (like == 0)
                {
                    $('#mcc' + post_id).html(commentd + " comments");
                }
                else if (commentd == 0)
                {
                    $('#mcc' + post_id).html(like + " likes");
                }
                else if (like != 0 && commentd != 0)
                {
                    $('#mcc' + post_id).html(like + " likes and " + commentd + " comments");

                }
                else
                {
                    $('#loadallcomment' + post_id).css('display', 'none');
                    $('#mcc' + post_id).fadeIn('slow');
                }

                if (commentd != 0)
                {
                    $('#postcomment' + post_id).html(commentd);
                }
                else
                {
                    $('#postcomment' + post_id).html(" ");
                }


            }
            else
            {
                $('#loadallcomment' + post_id).fadeOut('slow');
                $('#loadallcomment' + post_id).css('display', 'none');
            }

        }
        else
        {
            //location.reload();
            $('#loadallcomment' + post_id).fadeOut('slow');
            $('#loadallcomment' + post_id).css('display', 'none');
        }



    });
}

function comment(post_id)
{
    var msg = $('#content' + post_id).val();
    load_data_comment = {'st': 3, 'post_id': post_id, 'msg': msg};
    load_new_comment = {'st': 1, 'post_id': post_id};
    $.post('lib/status.php', load_data_comment, function (data) {
        if (data == 1)
        {
            $("#cancel" + post_id).click();
            $.post('lib/comment.php', load_new_comment, function (comment) {
                if (comment)
                {
                    loadcommentautoload(post_id);
                }
                else
                {
                    window.location.refresh();
                }
            });
        }
        else
        {
            alert("Something Went Wrong Please retry Again");
        }
    });

}

function loadallcomment(post_id)
{

    load_data_comment = {'st': 2, 'post_id': post_id};
    $.post('lib/comment.php', load_data_comment, function (comment) {
        if (comment)
        {
            $('#comment_list_instant_load_' + post_id).html(comment);
            $('#loadallcomment' + post_id).css("display", "none");
        }
        else
        {
            alert("Something Went Wrong Please retry Again");
            window.location.refresh();
        }
    });

}



//[Function of share button start]
// $(document).on("click", "#shareButtons", function () {
//     var postid = document.getElementById('postidforsahre').value;
//     console.log(postid);
// });

function share_button(postid){

    var postid = postid;
    // console.log(postid);
  //  $("#shareButton_"+postid).trigger('click');


     $('#postedid').val(postid);
    //  $('#postedides').html('4');
    //  document.getElementById('postedides').value = '12';

    $.ajax({
            type: "POST",
            url: "./lib/shout.php",
            dataType: "json",
            data: {
              st:33,
              postID:postid
            },
            success: function (response) {
              var obj = response;
              if (obj.output == "success") {
                var userimg = obj.userimage;
                var username = obj.username;
                var postContent = obj.postContent;
                $('#userimg').html(userimg);
                $('#userName').html(username);
                $('#contented').html(postContent);

                 $( "#shareButtons_"+postid ).trigger( "click" );
                // success(obj.msg);
                //setInterval('window.location.reload()', 2000);
              } else {
                // error(obj.msg);
              }
            }
          });


}

function shareOption(sel){
  var selectedvalue = sel.value;

  if(selectedvalue == '1'){
    document.getElementById('permi').style.display = 'inline';
    document.getElementById('name').style.display = 'none';
  } else if (selectedvalue == '2') {
    $('#feildname').html('Friend:');
    document.getElementById('name').style.display = 'inline';
    document.getElementById('keyFriendName').style.display = 'inline';
    // document.getElementById('keyGroupName').style.display = 'none';
    // document.getElementById('keyPageName').style.display = 'none';

    document.getElementById('permi').style.display = 'none';
  } else if(selectedvalue == '3'){
    $('#feildname').html('Group:');
    document.getElementById('name').style.display = 'inline';
    document.getElementById('keyGroupName').style.display = 'inline';
    // document.getElementById('keyFriendName').style.display = 'none';
    // document.getElementById('keyPageName').style.display = 'none';

    document.getElementById('permi').style.display = 'none';
  } else if(selectedvalue == '4'){
    $('#feildname').html('Page:');
    //document.getElementById('name').style.display = 'inline';
    document.getElementById('keyPageName').style.display = 'inline';
    // document.getElementById('keyGroupName').style.display = 'none';
    // document.getElementById('keyFriendName').style.display = 'none';

    document.getElementById('permi').style.display = 'none';
  } else {
    document.getElementById('permi').style.display = 'inline';
  }
}

function shareElementgroupClick(){
alert('123');
}



function shareElementClick(fid){
  //  alert(fid);
  // console.log(fid);
  $('#keyFriendName').hide();
  // $('#keyGroupName').hide();
  var element_id = fid;

  if(element_id == 0){
   $('#keyFriendName').show();
  //  $('#keyGroupName').show();
   $('#element_name').hide();
   document.getElementById('user_id').innerHTML = '';
  } else{
    $('#element_name').show();
    $.ajax({
            type: "POST",
            url: "./lib/shout.php",
            dataType: "json",
            data: {
              st:37,
              element_id:element_id
            },
            success: function (response) {
              var obj = response;
              if (obj.output == "success") {
                var returnvalue = obj.return;
                $('#element_name').html(returnvalue);
              } else {
              }
            }
          });
  }



}
function myBlurFunction() {
    document.getElementById("keyFriendName").value = "";
    // document.getElementById("keyGroupName").value = "";
    // document.getElementById("keyPageName").value = "";
    $('#shareloading').hide('slow');
    $('#sharesuggestions').hide('slow');
}
function keyFriendNames(){
    $('#shareloading').show('slow');
    $('#sharesuggestions').show();
    var keyFriendName = $('#keyFriendName').val();

    // if(keyFriendName.length >= 2 )
    if(keyFriendName.length > 0 )
    {
      $.ajax({
              type: "POST",
              url: "./lib/shout.php",
              dataType: "json",
              data: {
                st:34,
                keyFriendName:keyFriendName
              },
              success: function (response) {
                var obj = response;
                if (obj.output == "success") {
                  var returnvalue = obj.return;
                  // console.log(returnvalue);
                  $('#sharesuggestions').html(returnvalue);
                  $('#shareloading').hide();
                  $.ajaxSetup({cache: false});
                } else {
                }
              }
            });

    }
    else if(keyFriendName.length == 0)
    {
      $('#sharesuggestions').hide();
      $('#shareloading').hide();
    }
    else
    {
      $('.friends').hide();
    }

}



function keyGroupNames(){
    $('#shareloading').show('slow');
    $('#sharesuggestions').show();
    var keyGroupName = $('#keyGroupName').val();

    // // if(keyFriendName.length >= 2 )
    if(keyGroupName.length > 0 )
    {
      $.ajax({
              type: "POST",
              url: "./lib/shout.php",
              dataType: "json",
              data: {
                st:35,
                keyGroupName:keyGroupName
              },
              success: function (response) {
                var obj = response;
                if (obj.output == "success") {
                  var returnvalue = obj.return;
                  // alert(returnvalue);
                  // console.log(returnvalue);
                  $('#sharesuggestions').html(returnvalue);
                  $('#shareloading').hide();
                  $.ajaxSetup({cache: false});
                } else {
                }
              }
            });

    }
    else if(keyGroupName.length == 0)
    {
      $('#sharesuggestions').hide();
      $('#shareloading').hide();
    }
    else
    {
      $('.friends').hide();
    }

}

function keyPageNames(){
    $('#shareloading').show('slow');
    $('#sharesuggestions').show();
    var keyFriendName = $('#keyFriendName').val();

    // if(keyFriendName.length >= 2 )
    if(keyFriendName.length > 0 )
    {
      $.ajax({
              type: "POST",
              url: "./lib/shout.php",
              dataType: "json",
              data: {
                st:34,
                keyFriendName:keyFriendName
              },
              success: function (response) {
                var obj = response;
                if (obj.output == "success") {
                  var returnvalue = obj.return;
                  // console.log(returnvalue);
                  $('#sharesuggestions').html(returnvalue);
                  $('#shareloading').hide();
                  $.ajaxSetup({cache: false});
                } else {
                }
              }
            });

    }
    else if(keyFriendName.length == 0)
    {
      $('#sharesuggestions').hide();
      $('#shareloading').hide();
    }
    else
    {
      $('.friends').hide();
    }

}
//[Function of share button end]

//[share post function start]
function sharepost(){
var sharetext = $('#sharetext').val();
var user_id = $('#user_id').text();
var permission = $('#statusPermissions').val();
var postID = $('#postedid').val();
$.ajax({
        type: "POST",
        url: "./lib/shout.php",
        dataType: "json",
        data: {
          st:38,
          sharetext:sharetext,
          user_id:user_id,
          permission:permission,
          postID:postID
        },
        success: function (response) {
          var obj = response;
          if (obj.output == "success") {
            var message = obj.msg
            success(message);
            setInterval('window.location.reload()', 2000);


            // var returnvalue = obj.return;
            // console.log(returnvalue);
            // $('#sharesuggestions').html(returnvalue);
            // $('#shareloading').hide();
            // $.ajaxSetup({cache: false});


          } else {
          }
        }
      });

}
//[share post function end]
