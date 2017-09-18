<?php
$sqladds = $obj->FlyQuery("SELECT * FROM dostums_ads ORDER BY RAND() LIMIT 2");
if (!empty($sqladds)) {
    foreach ($sqladds as $adds):
        ?>
        <div class="panel panel-default  panel-customs-post">
            <div class="panel-body text-center no-padding">
                <img src="<?php echo $obj->baseurl("formula/upload/" . $adds->ads_image); ?>" alt="s" class="img-responsive">
            </div>
        </div>
        <?php
    endforeach;
}
?>