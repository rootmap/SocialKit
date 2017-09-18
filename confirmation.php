<?php
include('class/auth.php');
$new_user_id = $input_by;
$chkdonation=$obj->exists_multiple("dostums_donate",array("donation_id"=>$_GET['oid']));
if($chkdonation==0)
{
    $obj->insert("dostums_donate",array("donation_id"=>$_GET['oid'],"donation_status"=>$_GET['status'],"date"=>date('Y-m-d'),"status"=>1));
}
else
{
    $obj->update("dostums_donate",array("donation_id"=>$_GET['oid'],"donation_status"=>$_GET['status'],"date"=>date('Y-m-d'),"status"=>1));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Home </title>
        <?php include('plugin/header_script.php'); ?>
    </head>
    <body class="home">
        <header>
            <div class="header-wrapper">

                <div class="header-nav">
                    <?php include('plugin/header_nav.php'); ?>
                </div>
            </div>
        </header>
        
        <?php
        //chat box script
        include('plugin/chat_box.php');
//chat box script 
        ?>

        <?php
        //chat user list
        include('plugin/chat_box_head_list.php');
//chat user list 
        ?>

        <div class="main-container cart-container">
            <div class="container well" style="border-radius: 3px;">
                <div class="cart-page-head">
                    <?php 
                    if(isset($_GET['status']))
                    {
                        if($_GET['status']=="success")
                        {
                    ?>
                    <h1 class="text-success"><i class="fa fa-check"></i>Your Order is Successfully Confirm.</h1>
                    <?php
                        }
                        elseif($_GET['status']=="cancel")
                        {
                    ?>
                    <h1 class="text-danger"><i class="fa fa-check"></i> Your Order is cancel</h1>
                    <?php
                        }elseif($_GET['status']=="fail")
                        {
                    ?>
                    <h1 class="text-warning"><i class="fa fa-check"></i> Your Order is Fail To Process</h1>
                    <?php
                        }
                        
                    
                        } ?>
                </div>


                <div class="common-box">
                    <article class="success-content">
                        <h2 class="text-center text-success" style="margin-top: 30px;">Thank You For Your Wonderful Participation.</h2>
                        <?php if ($_GET['status'] == "success") : ?>
                            <p>We've sent a message to your email with donation details.</p>
                            <p>Don't see it? Please check your spam folder.</p>
                            <a href="<?php echo $obj->LbaseUrl(); ?>home.php" class="btn btn-primary btn-sm margin-top-10 margin-bottom-20">I Want To Donate Again ?</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $obj->LbaseUrl(); ?>home.php" class="btn btn-primary btn-sm margin-top-10 margin-bottom-20">Back To Home</a>
                        <?php endif; ?>

                        <?php if ($_GET['status'] == "fail" OR $_GET['status'] == "cancel") : ?>
                            <p>We've are sorry for this inconvenience. But you can donate again.</p>
                             <a href="<?php echo $obj->LbaseUrl(); ?>home.php" class="btn btn-primary btn-sm margin-top-10 margin-bottom-20">I Want To Donate Again ?</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo $obj->LbaseUrl(); ?>home.php" class="btn btn-primary btn-sm margin-top-10 margin-bottom-20">Back To Home</a>
                        <?php endif; ?>
                    </article>
                </div>


            </div>
        </div>
<?php include('plugin/fotter.php'); ?>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
        <script src="assets/material/js/ripples.min.js"></script>
        <script src="assets/material/js/material.min.js"></script>
        <script src="assets/js/jquery.scrollto.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script type="text/javascript">
            $(function () {

                $(".livefeed-slider").bootstrapNews({
                    newsPerPage: 4,
                    autoplay: true,
                    navigation: false,
                    pauseOnHover: true,
                    direction: 'up',
                    newsTickerInterval: 2500,
                    onToDo: function () {
                        //console.log(this);
                    }


                });
                $(".news-slider").bootstrapNews({
                    newsPerPage: 4,
                    autoplay: false,
                    navigation: true,
                    pauseOnHover: true,
                    direction: 'down',
                    newsTickerInterval: 4000,
                    onToDo: function () {
                        //console.log(this);
                    }
                });


            });


        </script>

        <script src="assets/js/script.js"></script>
        <script src="assets/js/chat.js"></script>

    </body>
</html>