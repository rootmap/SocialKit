<?php

class SiteExtra {

    public function emotion($comment) {
        $spdatacheck = $comment;
        $strrep_d = str_replace(":D", "<span><img src='images/icon/emotion/d_16.gif'></span>", $spdatacheck);
        $strrep_s = str_replace(":S", "<span><img src='images/icon/emotion/sad_16.gif'></span>", $strrep_d);
        $strrep_a = str_replace(":A", "<span><img src='images/icon/emotion/angry_16.gif'></span>", $strrep_s);
        $strrep_ldm = str_replace(":LDM", "<span><img src='images/icon/emotion/dumb_16.gif'></span>", $strrep_a);
        $strrep_love = str_replace(":LOVE", "<span><img src='images/icon/emotion/love_16.gif'></span>", $strrep_ldm);
        return $strrep_love;
    }

    public function duration($d1,$d2='') {
        date_default_timezone_set('Asia/Dhaka');
        $date1 = strtotime($d1);
        $date2 = time();
        $subTime = $date2 - $date1;
        $y = intval($subTime / (60 * 60 * 24 * 365));
        $d = intval($subTime / (60 * 60 * 24)) % 365;
        $h = intval($subTime / (60 * 60)) % 24;
        $m = intval($subTime / 60) % 60;

        //echo "Difference between ".date('Y-m-d H:i:s',$date1)." and ".date('Y-m-d H:i:s',$date2)." is:\n";
        if ($y != 0) {
            $result=(int) $y . " years ago.";
        } elseif ($d != 0) {
            $result=(int) $d . " days ago.";
        } elseif ($h != 0) {
            $result=(int) $h . " hours ago.";
        } elseif ($m != 0) {
            $result=(int) $m . " minutes ago.";
        } else {
            $result=" seconds ago.";
        }

        return $result;

    }

}

?>
