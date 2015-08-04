<?php

include '2.php';
header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_18604');
define('CORE_API_HTTP_PWD', '18604q7nOZ8vtH8gob3Nws4e3UYJf4yijkX');

$bk = 'https://www.baokim.vn/the-cao/restFul/send';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';

$user ="OfflinePlayer:".$_POST['txtuser'];
       
	if($mang=='MOBI'){
			$ten = "Mobifone";
		}
	else if($mang=='VIETEL'){
			$ten = "Vietel";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
		}
	else if($mang=='Vietnamobile'){
			$ten = "vnm";
		}
	else $ten ="Vinaphone";
         //Mã MerchantID dang kí trên Bảo Kim
$merchant_id = '18604';
//Api username 
$api_username = 'vminemccom';
//Api Pwd d
$api_password = 'vminemccomsfh234sdg';
//Mã TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = '0b4055ceca951b38';

$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$mang,
	'pin_field'=>$sopin,
	'seri_field'=>$seri,
	'algo_mode'=>'hmac'
);

ksort($arrayPost);

$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

$arrayPost['data_sign'] = $data_sign;

$curl = curl_init($bk);

curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($data,true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
//$time = time();
if($status==200){
    $amount = $result['amount'];
	switch($amount) {
		case 10000: $xu = 10; break;
		case 20000: $xu = 20; break;
		case 30000: $xu = 30; break;
		case 50000: $xu= 50; break;
		case 100000: $xu = 100; break;
		case 200000: $xu = 200; break;
		case 300000: $xu = 300; break;
		case 500000: $xu = 500; break;
		case 1000000: $xu = 1000; break;
	}
    // Xu ly thong tin tai day
	$file = "carddung.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Loai the: ".$ten.", Menh gia: ".$amount.", loai: ".$loai.", mang: ".$mang.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
	echo '<script>alert("Bạn đã thanh toán thành công thẻ '.$ten.' mệnh giá '.$amount.' ");
	
	window.location.href = "http://vminemc.com/";
	
	</script>';

}
else{ 
$val = md5($user, true);
    $byte = array_values(unpack('C16', $val));

    $tLo = ($byte[0] << 24) | ($byte[1] << 16) | ($byte[2] << 8) | $byte[3];
    $tMi = ($byte[4] << 8) | $byte[5];
    $tHi = ($byte[6] << 8) | $byte[7];
    $csLo = $byte[9];
    $csHi = $byte[8] & 0x3f | (1 << 7);

    if (pack('L', 0x6162797A) == pack('N', 0x6162797A)) {
        $tLo = (($tLo & 0x000000ff) << 24) | (($tLo & 0x0000ff00) << 8) | (($tLo & 0x00ff0000) >> 8) | (($tLo & 0xff000000) >> 24);
        $tMi = (($tMi & 0x00ff) << 8) | (($tMi & 0xff00) >> 8);
        $tHi = (($tHi & 0x00ff) << 8) | (($tHi & 0xff00) >> 8);
    }

    $tHi &= 0x0fff;
    $tHi |= (3 << 12);
 
    $uuid = sprintf(
        '%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
        $tLo, $tMi, $tHi, $csHi, $csLo,
        $byte[10], $byte[11], $byte[12], $byte[13], $byte[14], $byte[15]
    );
$dbhost="localhost";
    $dbuser="root";
    $dbpass="tuanblack107";
    $dbname="points";
    $db = mysql_connect($dbhost,$dbuser,$dbpass) or die("cant connect db");
	mysql_select_db($dbname,$db) or die("cant select db");

	mysql_query("UPDATE playerpoints SET points =points  +$xu WHERE playername ='$uuid';");
	mysql_query("INSERT INTO playerpoints( playername, points) VALUES( '".$uuid."', ".$xu.")");
//echo "UPDATE playerpoints SET points =points  +$xu WHERE playername ='$uuid';";die;

	
	


	echo 'Status Code:' . $status . '<hr >';   
    $error = $result['errorMessage'];
	echo $error;
    $file = "cardsai.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
	echo '<script>alert("Thong tin the cao khong hop le!");
	
	window.location.href = "http://vminemc.com/";
	
	</script>';
}

