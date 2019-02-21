<?php
header("Access-Control-Allow-Origin: *");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{ \"data\": {\n    \"score\": \"5x1\",\n    \"time\": \"15:10\"\n  },\n  \"to\" : \"cbTnvR5th0o:APA91bEzM6VaOdP-AIwZJdKImApuU2dKbeKVzh511ZLimEx70mUA6L5BuO2NZrmTYgjorNNZaSuDt64-obMbGahJvzkG-i82r54FGQ-XSJcpDaeFzHA5VCCsK5W7jy6-efoi0izBM0l0\"\n}\n",
  CURLOPT_HTTPHEADER => array(
    "Authorization: key=AIzaSyBhRdplJsvsNgiiTSQ-homAHPna5Qu23FE",
    "Content-Type: application/json",
    "Postman-Token: 3270be53-9eae-4a76-bca5-119f87419655",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
