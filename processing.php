<?php
session_start();

include './class/db_Class.php';
$obj=new db_class();
$totalAmount = 0;
$orderID = 0;

$sessionID=$obj->GenerateUniqueTransaction(@$_SESSION['SESS_DONATION'], "DONATION", 0);

if (isset($_GET['total'])) {
    $totalAmount =$_GET['total'];
    $orderID = $sessionID;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fav and touch icons -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <title>Ticket </title>
    </head>
    <body class="home">
        <div class="main-container page-404">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container" style="padding: 15px 0 !important;">
                        <div class="text-center">
                            <h4 style="text-transform: uppercase; font-weight: bold;">Please wait while we redirect you to payment gateway.</h4>
                            <h1 class="title-404"><img src="<?php echo $obj->LbaseUrl(); ?>images/redirect.gif"></h1>
                        </div>
<!--                        <form action="https://www.sslcommerz.com.bd/process/index.php" method="post" name="form1" id="sslform">-->
                            
                         <form action="https://securepay.sslcommerz.com/gwprocess/v3/process.php" method="post" name="form1" id="sslform">    
                            <input type="hidden" name="store_id" value="ticketchailive001"> 
                            <input type="hidden" id="total_amount_ssl" name="total_amount" value="<?php echo $totalAmount; ?>">
                            <input type="hidden" id="trans_id_ssl" name="tran_id" value="<?php echo $orderID; ?>">
                            <input type="hidden" id="notify_url" name="success_url" value="<?php echo $obj->LbaseUrl(); ?>confirmation.php?oid=<?php echo $orderID; ?>&status=success">
                            <input type="hidden" id="fail_url" name="fail_url" value = "<?php echo $obj->LbaseUrl(); ?>confirmation.php?oid=<?php echo $orderID; ?>&status=fail">
                            <input type="hidden" id="cancle_url" name="cancel_url" value = "<?php echo $obj->LbaseUrl(); ?>confirmation.php?oid=<?php echo $orderID; ?>&status=cancel">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function(){
           $('#sslform').submit(); 
        });
        </script>
    </body>
</html>
<!--
//https://www.sslcommerz.com.bd/process/index.php
//ticketchailive001
//systechunimaxtest001
-->