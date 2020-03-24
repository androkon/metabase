<?php
  
$user = $_GET['user'];
$pass = $_GET['pass'];

if (empty($user) || empty($pass)) {
        exit();
}

$curl = curl_init();

curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mb.phenomen.org/api/session',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{"username":"' . $user . '","password":"' . $pass . '"}',
        CURLOPT_HTTPHEADER => array('content-type: application/json'),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
        echo 'cURL Error #:' . $err;
} else {
        $json = json_decode($response);
        header('Set-Cookie: metabase.SESSION=' . $json->id . ';SameSite=Lax;HttpOnly;Path=/;Max-Age=' . (time() + 86400 * 365 * 3) . ';Secure');
        header('Location: ' . 'https://mb.phenomen.org/');
        exit();
}
?>
