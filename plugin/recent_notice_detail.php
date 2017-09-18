<?php
if (isset($_GET['notice'])) {
    $sqlbio_notice = $obj->FlyQuery("SELECT * FROM dostums_notice WHERE id='" . $_GET['notice'] . "'");
} else {
    $sqlbio_notice = $obj->FlyQuery("SELECT * FROM dostums_notice");
}
if (!empty($sqlbio_notice)) {
    foreach ($sqlbio_notice as $notice):
        ?>
        <div class="panel panel-default  panel-customs-post">
            <div class="panel-heading" style="padding-top: 20px; padding: 20px;">
                <div class="col-md-3">
                    <img class="img-responsive" style="margin-top: -10px;" src="<?php echo $obj->baseurl("formula/upload/" . $notice->notice_image); ?>" />
                </div>
                <h3 class="col-md-7">
                    <?php echo $notice->notice_title; ?> <br>
                    <h5><?php echo $notice->notice_date; ?></h5>

                </h3>
                <!-- <p>dvfdsvfdsv<?php //echo html_entity_decode($notice->notice_details); ?></p> -->
            </div>
            <!-- <div class="panel-body"> -->
            <div class="panel-body">
              <?php
              $text1 = $notice->notice_details;
              echo $text2 = html_entity_decode($text1, ENT_QUOTES, "utf-8");
              //  $text2 = html_entity_decode($text1);
              ?>
                <!-- <p><?php //echo $text2; ?></p> -->
                <!-- ঢাকা: লিবিয়ায় বাংলাদেশি নাগরিকদের সফর না করার পরামর্শ দিয়েছে পররাষ্ট্র মন্ত্রণালয়। পরবর্তী ঘোষণা না দেয়া পর্যন্ত সেদেশে বসবাসকারী বাংলাদেশি নাগরিকদের চলাচলের ওপর সতর্কতা জারি করা হয়েছে।


আজ বৃহস্পতিবার সকালে বাংলাদেশের পররাষ্ট্র মন্ত্রণালয় এই সতর্কতা জারি করেছে।
- See more at: http://www.dhakatimes24.com/2015/10/08/86140/%E0%A6%B2%E0%A6%BF%E0%A6%AC%E0%A6%BF%E0%A7%9F%E0%A6%BE%E0%A7%9F-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%A8%E0%A6%BE-%E0%A6%AF%E0%A6%BE%E0%A6%93%E0%A7%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A6%B0%E0%A7%8D%E0%A6%B6#sthash.e7xRi9XG.dpuf
গত কয়েক বছর ধরে লিবিয়ায় সংঘাত চলছে। সাম্প্রতিক সময়ে পরিস্থিতি আরও খারাপ আকার ধারণ করায় মন্ত্রণালয় এই সতর্কতা আরোপ করেছে। - See more at: http://www.dhakatimes24.com/2015/10/08/86140/%E0%A6%B2%E0%A6%BF%E0%A6%AC%E0%A6%BF%E0%A7%9F%E0%A6%BE%E0%A7%9F-%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A6%BF%E0%A6%A6%E0%A7%87%E0%A6%B0-%E0%A6%A8%E0%A6%BE-%E0%A6%AF%E0%A6%BE%E0%A6%93%E0%A7%9F%E0%A6%BE%E0%A6%B0-%E0%A6%AA%E0%A6%B0%E0%A6%BE%E0%A6%AE%E0%A6%B0%E0%A7%8D%E0%A6%B6#sthash.e7xRi9XG.dpuf -->
            </div>
        </div>
        <?php
    endforeach;
} else {
    ?>
    <div class="panel panel-default  panel-customs-post">
        <div class="panel-body">
            <h3 class="text-center text-danger">No Recent Found</h3>
        </div>
    </div>
<?php }
?>
