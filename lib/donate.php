<?php

include('../class/auth.php');
extract($_POST);
//condition start
if ($st == 1) {
    $chkdonation=$obj->exists_multiple("dostums_donate",array("donation_id" =>$donation_id));
    if($chkdonation==0)
    {
    $obj->insert("dostums_donate", array("why_donation" =>$why_donation,"donation_id" =>$donation_id, "Select_money_symbol" =>$Select_money_symbol, "amount_pay" =>$amount_pay, "first_name" =>$first_name,
    "last_name" =>$last_name, "address" =>$address, "city_town" =>$City_Town, "select_city" =>$useselect_cityr, "email_address" =>$Email_Address,
    "personal" =>$Personal, "phone_number" =>$Phone_Number, "select_home" =>$select_Home, "name_on_card" =>$NameOnCard, "card_number" =>$CardNumber,
    "month" =>$month, "select_year" =>$year, "group_type" =>$Group_Type, "group_or_business_name" =>$Group_Or_Business_Name));
    }
    else
    {
       $obj->update("dostums_donate", array("donation_id" =>$donation_id,"why_donation" =>$why_donation, "Select_money_symbol" =>$Select_money_symbol, "amount_pay" =>$amount_pay, "first_name" =>$first_name,
    "last_name" =>$last_name, "address" =>$address, "city_town" =>$City_Town, "select_city" =>$useselect_cityr, "email_address" =>$Email_Address,
    "personal" =>$Personal, "phone_number" =>$Phone_Number, "select_home" =>$select_Home, "name_on_card" =>$NameOnCard, "card_number" =>$CardNumber,
    "month" =>$month, "select_year" =>$year, "group_type" =>$Group_Type, "group_or_business_name" =>$Group_Or_Business_Name)); 
    }
    echo 1;
} 
else {
    echo 0;
}
//condition end
?>