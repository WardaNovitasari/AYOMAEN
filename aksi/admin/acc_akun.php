<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id=$_GET['id'];
$status=$_GET['acc'];
require_once('../../koneksi/koneksi.php');

if($status=='pengajuan'){
	$admin 			= mysqli_query($config,"SELECT * FROM tb_akun WHERE id_akun=1");
	$user 			= mysqli_query($config,"SELECT * FROM tb_akun WHERE id_akun='$id'");
	$user2 			= mysqli_fetch_array($user);
	$server 		= mysqli_fetch_array($admin);

	$serveremail 	= $server['email'];
	$email 			= $user2['email'];
	$no 			= $user2['no_hp'];
	$hash 			= md5(rand(0,1000));
	$validemail     = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";

	$query 			= mysqli_query($config,"UPDATE tb_akun SET status_akun='belum_verifikasi', hint='$hash' WHERE id_akun='$id'");
	$query2   		= mysqli_query($config,"SELECT * FROM tb_apisms");
	$data 			= mysqli_fetch_array($query2);
	if($query){
		if(!preg_match($validemail, $email)){
    	// Return Error - Invalid Email
    	echo "<script>alert('Invalid Email')</script>";
		}else{
			require_once "/usr/share/pear/Mail.php";
			$recipients = $email;

			$headers['From'] = $serveremail;
			$headers['To'] = $email;
			$headers['Subject'] = 'Verifikasi Akun';

			$body = "klik link berikut untuk validasi Akun http://202.169.224.206/~magang/aksi/user/verify.php?id=".$hash;
			$body .= "&id2=".$id;
			$params['sendmail_path'] = '/usr/lib/sendmail';

			$mail = Mail::factory('smtp', array(
      		'host' => 'smtp.gmail.com',
      		'SMTPSecure'=>'TLS',
      		'port' => 587,
      		'auth' => true,
      		'username' => $serveremail,
      		'password' => 'rangopirakfresh1'
      		));
			$result = $mail->send($recipients, $headers, $body);
			if (PEAR::isError($result)) {
      			echo('<p>' . $result->getMessage() . '</p>');
  			}else {
  				/*mengirim pesan sms
    				$curl = curl_init();
    				curl_setopt_array($curl, array(
        			CURLOPT_RETURNTRANSFER => 1,
        			CURLOPT_URL => $data['url_api'],
        			CURLOPT_POST => true,
        			CURLOPT_POSTFIELDS => array(
            			'user' => $data['username_api'],
            			'password' => $data['password_api'],
            			'SMSText' => $body,
            			'GSM' => $no
        			)
    			));
    $resp = curl_exec($curl);
    if (!$resp) {
        die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    } else {
        //header('Content-type: text/xml'); /*if you want to output to be an xml
        echo $resp;
    }
    curl_close($curl);
*/
      			echo '<script>alert("data berhasil diterima"); window.location.href="../../admin/pengajuan_akun.php";</script>';
  			}
  		}
	}else{
		echo 'gagal';
	}
}
?>
