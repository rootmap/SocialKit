
<?php  
include('../class/auth.php');
extract($_POST);

 if($st==1)
{
//    $obj->update('dostums_user',array('id'=>$user_id,'name'=>$profile_name,'email'=>$mail,'phone_number'=>$phone_number,'present_address'=>$address,'blood_group'=>$blood_group,'school'=>$school,' college'=>$college,'university1'=>$university1,'university2'=>$university2,'occupation'=>$Current_Job));
//    echo 1;
    
    //$sql="UPDATE dostums_user SET name=$profile_name,mail=$mail,phone_number=$phone_number,present_address=$address,blood_group=$blood_group,school=$school,college=$college,university1=$university1,university2=$university2  WHERE id=63;";
    //$sql .="UPDATE dostums_educational_institutions SET school=jsdkj,college=sonm,university1=jbhjb,university2=scgdfsg WHERE user_id=63;";
   // $sql .="UPDATE dostums_user_about SET occupation=businessman,company=mycompany WHERE user_id=63;";
//    
    $obj->updateUsingMultiple("dostums_user",array("first_name"=>$first_name,"last_name"=>$last_name, "email"=>$mail, "dob"=>$dob, "phone_number"=>$phone_number, "present_address"=>$present_address,"permanent_address"=>$permanent_address, 'blood_group'=>$blood_group, 'interest'=>$interest),array("id"=>$user_id));
    $obj->updateUsingMultiple("dostums_user_about",array("occupation"=>$occupation,"company"=>$company),array("user_id"=>$user_id));
    $obj->updateUsingMultiple("dostums_educational_institutions",array("school"=>$school,"college"=>$college,"university1"=>$university1,"university2"=>$university2),array("user_id"=>$user_id));

    echo 1;
}
else
{
	echo "Failed!";
	echo 0;	
}
?>








