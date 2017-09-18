
<!-- Modal edit start-->
<script>
$(document).on("click", "#blockButton", function () {
   var toblockID = $(this).data('id');
   $("#blockID").val( toblockID );
});
</script>
<div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:60px; ">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#99CA3C;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" >Write Your Blocking Reason!</h4>
            </div>

            <div class="modal-body">
                  <input type="text" id="blockID" style="display:none;">
                  <textarea id="reason" name="reason" rows="8" cols="70"></textarea>
                  <!-- <button data-dismiss="modal" class="btn btn-info" onclick="FriendsBlock('<?php //echo $noti->uid; ?>', '<?php //echo $new_user_id;?>')" type="button" name="button">Submit</button> -->
                  <button data-dismiss="modal" class="btn btn-info" onclick="FriendsBlock('<?php echo $new_user_id;?>')" type="button" name="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit end-->


<div class="mikes-modal global-modal" id="myModal">
        <?php
        if (!in_array($obj->filename(), array("signup.php","login.php"))) {
        include('load_full_image.php');
        }
        ?>
</div>
<footer>
    <div class="footer-bottom">
        <div class="container text-center">
            <p class="text-align-center">
                Copyright © 2015 Systech Unimax Ltd. All Rights Reserved : Product Code - SULSocial </p>
        </div>
    </div>
</footer>
<script src="lib/jquery.cookie.js"></script>
<span id="chwin1"></span>
<span id="chwin2"></span>
<span id="chwin3"></span>


<!-- [script for tag friend start] -->
<script src="assets/js/select2.js"></script>
<script>
$(document).ready(function() {
$("#e1").select2();
});

// [script for show hide tag friend field]
jQuery(document).ready(function(){
    jQuery('#hideshow').on('click', function(event) {
         jQuery('#content').toggle('show');
    });
});
// [script for show hide tag friend field]
</script>
<!-- [script for tag friend end] -->
