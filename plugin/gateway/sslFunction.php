<?php

function SendSSLSMSADDMember($mobile, $member_id) {

    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = "QKSYS e apnar registration somponno hoyeche. Apnar member ID QKS" . $member_id;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

function SSLDutyScheduleSMS($mobile, $sms) {
    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = $sms;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

function SSLBulkSMS($mobile, $sms) {
    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = $sms;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    @preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    @preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    @preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    @preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    @preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    @preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

function SSLGroupSMS($mobile, $sms) {
    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = $sms;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

function SSLRecharge($mobile, $sms) {
    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = $sms;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

function ResendSMS($mobile, $sms) {
    $user = urlencode("SUL");
    $pass = urlencode("@SystechUnimax#2010.");
    $sid = "QKSYS";
    $phone = urlencode("88" . $mobile);
    $sms = $sms;


    $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
    $param = "user=" . $user . "&pass=" . $pass . "&sms[0][0]=" . $phone . " &sms[0][1]=" . $sms . "&sms[0][2]=" . time() . "&sid=$sid";
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_HEADER, 0);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST, 1);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
    $response = curl_exec($crl);
    curl_close($crl);

    $sslResponse = $response;


    preg_match("'<PARAMETER>(.*?)</PARAMETER>'si", $sslResponse, $parameter);
    preg_match("'<STAKEHOLDERID>(.*?)</STAKEHOLDERID>'si", $sslResponse, $stakeholder);
    preg_match("'<PERMITTED>(.*?)</PERMITTED>'si", $sslResponse, $permitted);
    preg_match("'<LOGIN>(.*?)</LOGIN>'si", $sslResponse, $login);
    preg_match("'<PUSHAPI>(.*?)</PUSHAPI>'si", $sslResponse, $pushapi);
    preg_match("'<MSISDNSTATUS>(.*?)</MSISDNSTATUS>'si", $st, $invalidno);


    @$str_parameter = str_replace("<PARAMETER>", "", $parameter[0]);
    @$str_parameter2 = str_replace("</PARAMETER>", "", $str_parameter);

    @$str_stakeholder = str_replace("<STAKEHOLDERID>", "", $stakeholder[0]);
    @$str_stakeholder2 = str_replace("</STAKEHOLDERID>", "", $str_stakeholder);

    @$str_permitted = str_replace("<PERMITTED>", "", $permitted[0]);
    @$str_permitted2 = str_replace("</PERMITTED>", "", $str_permitted);

    @$str_login = str_replace("<LOGIN>", "", $login[0]);
    @$str_login2 = str_replace("</LOGIN>", "", $str_login);

    @$str_pushapi = str_replace("<PUSHAPI>", "", $pushapi[0]);
    @$str_pushapi2 = str_replace("</PUSHAPI>", "", $str_pushapi);

    @$str_invalidno = str_replace("<MSISDNSTATUS>", "", $invalidno[0]);


    $not_invalid = 0;
    if ($str_invalidno == 'Invalid Mobile No') {
        // invalid mobile number
    } else {
        $sms_status = 0;
        if ($str_parameter2 == "OK") {
            $sms_status+=1;
        }
        if ($str_stakeholder2 == "OK") {
            $sms_status+=1;
        }
        if ($str_permitted2 == "OK") {
            $sms_status+=1;
        }
        if ($str_login2 == "SUCCESSFULL") {
            $sms_status+=1;
        }
        if ($str_pushapi2 == "ACTIVE") {
            $sms_status+=1;
        }


        if ($sms_status == 5) {
            $not_invalid = 1;
        }
    }

    if ($not_invalid == 1) {
        return 1;
    } else {
        return 0;
    }
}

?>
