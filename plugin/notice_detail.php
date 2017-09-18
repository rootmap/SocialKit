<?php
$sqlbio_notice = $obj->FlyQuery("SELECT * FROM dostums_bio_notice WHERE id='" . $_GET['notice'] . "'");
if (!empty($sqlbio_notice)) {
    ?>
    <div class="panel panel-default  panel-customs-post">
        <div class="panel-heading" style="padding-top: 20px;">
            <div class="col-md-3">
                <img class="img-responsive" style="margin-top: -10px;" src="<?php echo $obj->baseurl("formula/upload/" . $sqlbio_notice[0]->photo); ?>" />
            </div>
            <h3 class="col-md-7">
                <span style="color: #000;">Biography Detail of :</span> <?php echo $sqlbio_notice[0]->name; ?> <br>
                <h5><?php echo $sqlbio_notice[0]->date_of_birth; ?> | <?php echo $sqlbio_notice[0]->date_of_dead; ?></h5>

            </h3>
        </div>
        <div class="panel-body">
            <?php echo html_entity_decode($sqlbio_notice[0]->detail); ?>
        </div>
    </div>
<?php } else {
    ?>
    <div class="panel panel-default  panel-customs-post">
        <div class="panel-body">
            <h3 class="text-center text-danger">No Biography Found</h3>
        </div>
    </div>
    <?php }
?>
            