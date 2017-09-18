<div class="panel panel-default">
    <div class="panel-heading">
        <!-- <h4><i class="mdi-action-account-circle"></i> Intro</h4> -->
        <h4><i class="fa fa-globe" style="color:#2c99ce;"></i> Intro</h4>
    </div>
    <div class="panel-body">

        <div class="panel-content profile-content">
            <?php
                 $userdata = $obj->FlyQuery("SELECT
du.id,
CONCAT(du.first_name,' ',du.last_name) AS fullname,
du.gender AS gender,
du.email AS email,
du.marital_status as mstatus,
du.blood_group as bloodgroup,
du.interest as interest,
du.passion as passion,
du.phone_number as phone,
du.city_id as city_id,
du.country_id as country_id,
du.present_address as present_addr,
du.permanent_address AS permanent_addr


FROM dostums_user AS du

WHERE du.id = '".$new_user_id."' AND (du.`status` = '1' AND du.`user_permission` = '1')
                 ");

                 if(!empty($userdata)){
                     foreach ($userdata as $userdatavalue) {
                           $ufullname = $userdatavalue->fullname;
                           $ugender = $userdatavalue->gender;
                           $uemail = $userdatavalue->email;
                           $umstatus = $userdatavalue->mstatus;
                           $ubloodgroup = $userdatavalue->bloodgroup;
                           $uinterest = $userdatavalue->interest;
                           $upassion = $userdatavalue->passion;
                           $uphone = $userdatavalue->phone;
                           $upresent_addr = $userdatavalue->present_addr;
                           $upermanent_addr = $userdatavalue->permanent_addr;
                           $ucity = $userdatavalue->city_id;
                           $ucountry = $userdatavalue->country_id;


            ?>

            <!-- [full name] -->
            <?php
               if($ufullname != '' OR $ufullname != null){
            ?>
                  <h4><i class="fa fa-user"></i> <?php echo $ufullname;?></h4>
            <?php
               }else{

               }
            ?>
            <!-- [full name] -->


            <!-- [mail address] -->
            <?php
               if($uemail != '' OR $uemail != null){
            ?>
                  <h5><i class="fa fa-envelope"></i> <?php echo $uemail;?></h5>
            <?php
               }else{

               }
            ?>
            <!-- [mail address] -->

            <!-- [Blood group] -->
            <?php
               if($ubloodgroup != '' OR $ubloodgroup != null){
            ?>
                  <h5><i class="fa fa-tint"></i> Blood group: <?php echo $ubloodgroupname = $obj->SelectAllByVal("dostums_blood_group", 'id',$ubloodgroup, 'name' );?></h5>
            <?php
               }else{

               }
            ?>
            <!-- [Blood group] -->


            <!-- [interest in] -->
            <?php
               if($uinterest != '' OR $uinterest != null){
            ?>
                  <h5><i class="fa fa-ils"></i> Interest In: <?php echo $uinterest;?></h5>
            <?php
               }else{

               }
            ?>
            <!-- [interest in] -->

            <!-- [Passion] -->
            <?php
               if($upassion != '' OR $upassion != null){
            ?>
                  <h5><i class="fa fa-ils"></i> Passion: <?php echo $upassion;?></h5>
            <?php
               }else{

               }
            ?>
            <!-- [Passion] -->

            <!-- [city] -->
            <?php
               if($ucity != '' OR $ucity != null){
            ?>
                  <h5><i class="fa fa-street-view"></i> Live in: <?php echo $ucity;?>, <?php echo $countryname = $obj->SelectAllByVal("dostums_country", 'id',$ucountry, 'country_name' ); ;?></h5>
            <?php
               }else{

               }
            ?>
            <!-- [city] -->



            <?php



                     }
                 }

            ?>


            <!--<div class="row profile-info-graph">
                <div class="col-md-4">
                    <i class="fa fa-bullhorn c1  fa-2x"></i>
                    <h5><span><?php
                    //169
                    //echo $obj->exists_multiple("dostums_post_view",array("user_id"=>$new_user_id));
                     ?></span> Posts</h5>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-users fa-2x c2 "></i>
                    <h5><span>28</span> Following</h5>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-bar-chart-o c3 fa-2x"></i>
                    <h5><span>240</span> Followers</h5>
                </div>
            </div>
            <div class="user-button">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-sm btn-block" type="button"><i
                                class="fa fa-envelope"></i> Message
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-sm btn-block" type="button"><i
                                class="fa fa-thumbs-o-up"></i> Follow
                        </button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
