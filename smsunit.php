<?php
    // auth call
	$url = "https://smartsmssolutions.com/api/?checkbalance=1&token=MODx5rfhRzFTNWGQMP0Jp7PRYSk43wqyP02KLEgdJWgxAiYoGtqM6itJdpRZUHoaIv4rRmC5QjBTSQpc7D0llgPAduROyU8TL3u0&";

 //MODx5rfhRzFTNWGQMP0Jp7PRYSk43wqyP02KLEgdJWgxAiYoGtqM6itJdpRZUHoaIv4rRmC5QjBTSQpc7D0llgPAduROyU8TL3u0
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") {
 
        $sess_id = trim($sess[1]); // remove any whitespace
       // $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
 
        // do sendmsg call
        $ret = file($url);
        $send = explode(":",$ret[0]);
 
        if ($send[0] == "ID") {
            echo "successnmessage ID: ". $send[1];
        } else {
            echo "send message failed";
        }
    } else {
        echo "Message: ". $ret[0];
    }
	echo "<h2><a href='sendsms.php'>Go Back</a></h2>";
?>
