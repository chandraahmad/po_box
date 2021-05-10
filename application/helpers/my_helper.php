<?php 
function GetTokenBriApi() {
    $url ="https://sandbox.partner.api.bri.co.id/oauth/client_credential/accesstoken?grant_type=client_credentials";
    $data = "client_id=L4xAwRxsBlirngpsPnGyxYGBdBZQcXFq&client_secret=N28p1JOkVAtQFtRY";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  //for updating we have to use PUT method.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $response = json_decode($result);

    return $response;
}

function GetInquiry() {
    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/sandbox/v2/inquiry/".$NoRek;
    $verb = "GET";
    $body="";
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    // $payload = "path=$path&verb=$verb&token=Bearer $token".$htmlspecialchars."$timestamp&body=$body";
    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $urlGet ="https://partner.api.bri.co.id/sandbox/v2/inquiry/".$NoRek;
    $chGet = curl_init();
    curl_setopt($chGet,CURLOPT_URL,$urlGet);

    $request_headers = array(
                        "Authorization:Bearer ".$token,
                        "BRI-Timestamp:".$timestamp,
                        "BRI-Signature:".$base64sign
                    );
    curl_setopt($chGet, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chGet, CURLINFO_HEADER_OUT, true);


    // curl_setopt($chGet, CURLOPT_CUSTOMREQUEST, "GET");  //for updating we have to use PUT method.
    curl_setopt($chGet, CURLOPT_RETURNTRANSFER, true);

    $resultGet = curl_exec($chGet);
    $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
    // $info = curl_getinfo($chGet);
    // print_r($info);
    curl_close($chGet);

    $jsonGet = json_decode($resultGet, true);
    return $resultGet;
}

function AccountValidation() {
    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/sandbox/v3/transfer/internal/accounts";
    $verb = "GET";
    $body="";
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $urlGet ="https://partner.api.bri.co.id/sandbox/v3/transfer/internal/accounts?sourceAccount=".$NoRek;
    $chGet = curl_init();
    curl_setopt($chGet,CURLOPT_URL,$urlGet);

    $request_headers = array(
                        "Authorization:Bearer " . $token,
                        "BRI-Timestamp:" . $timestamp,
                        "BRI-Signature:" . $base64sign
                    );
    curl_setopt($chGet, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chGet, CURLINFO_HEADER_OUT, true);


    // curl_setopt($chGet, CURLOPT_CUSTOMREQUEST, "GET");  //for updating we have to use PUT method.
    curl_setopt($chGet, CURLOPT_RETURNTRANSFER, true);

    $resultGet = curl_exec($chGet);
    $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
    // $info = curl_getinfo($chGet);
    // print_r($info);
    curl_close($chGet);

    $jsonGet = json_decode($resultGet, true);
    return $resultGet;
}
function BrivaGetStatus() {
    $institutionCode = "J104408";
    $brivaNo = "77777";
    $custCode = "123456789115";

    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/v1/briva/status/".$institutionCode."/".$brivaNo."/".$custCode;
    $verb = "GET";
    $body="";
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    // $payload = "path=$path&verb=$verb&token=Bearer $token".$htmlspecialchars."$timestamp&body=$body";
    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $request_headers = array(
                        "Authorization:Bearer " . $token,
                        "BRI-Timestamp:" . $timestamp,
                        "BRI-Signature:" . $base64sign,
                    );

    $urlPost ="https://sandbox.partner.api.bri.co.id/v1/briva/status/".$institutionCode."/".$brivaNo."/".$custCode;
    $chPost = curl_init();
    curl_setopt($chPost, CURLOPT_URL,$urlPost);
    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "GET"); 
    curl_setopt($chPost, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
    $resultPost = curl_exec($chPost);
    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
    curl_close($chPost);

    $jsonPost = json_encode($resultPost, true);

    return $jsonPost;
}
function BrivaCreate() {
    $institutionCode = "J104408";
    $brivaNo = "77777";
    $custCode = "123456789115";
    $nama = "Sabrina";
    $amount="100000";
    $keterangan="Testing BRIVA Chandra Ahmad Rizki";
    $expiredDate=date('Y-m-d H:i:s');

    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/v1/briva";
    $verb = "POST";
    $datas = array(
        'institutionCode' => $institutionCode ,
        'brivaNo' => $brivaNo,
        'custCode' => $custCode,
        'nama' => $nama,
        'amount' => $amount,
        'keterangan' => $keterangan,
        'expiredDate' => $expiredDate
    );
    $body=json_encode($datas, true);
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    // $payload = "path=$path&verb=$verb&token=Bearer $token".$htmlspecialchars."$timestamp&body=$body";
    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $request_headers = array(
                        "Content-Type:"."application/json",
                        "Authorization:Bearer " . $token,
                        "BRI-Timestamp:" . $timestamp,
                        "BRI-Signature:" . $base64sign,
                    );

    $urlPost ="https://sandbox.partner.api.bri.co.id/v1/briva";
    $chPost = curl_init();
    curl_setopt($chPost, CURLOPT_URL,$urlPost);
    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($chPost, CURLOPT_POSTFIELDS, $body);
    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
    $resultPost = curl_exec($chPost);
    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
    curl_close($chPost);


    $jsonPost = json_encode($resultPost, true);

    return $jsonPost;
}
function BrivaGet() {
    $institutionCode = "J104408";
    $brivaNo = "77777";
    $custCode = "123456789115";

    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/v1/briva/".$institutionCode."/".$brivaNo."/".$custCode;
    $verb = "GET";
    $body="";
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    // $payload = "path=$path&verb=$verb&token=Bearer $token".$htmlspecialchars."$timestamp&body=$body";
    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $request_headers = array(
        "Authorization:Bearer " . $token,
        "BRI-Timestamp:" . $timestamp,
        "BRI-Signature:" . $base64sign,
    );

    $urlPost ="https://sandbox.partner.api.bri.co.id/v1/briva/".$institutionCode."/".$brivaNo."/".$custCode;
    $chPost = curl_init();
    curl_setopt($chPost, CURLOPT_URL,$urlPost);
    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "GET"); 
    curl_setopt($chPost, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
    $resultPost = curl_exec($chPost);
    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
    curl_close($chPost);

    $jsonPost = json_encode($resultPost, true);

    return $jsonPost;
}
function BrivaUpdateStatus() {
    $institutionCode = "J104408";
    $brivaNo = "77777";
    $custCode = "123456789115";
    $statusBayar = "Y";
    $keterangan="Testing BRIVA Chandra Ahmad Rizki";

    $GetTokenBriApi = GetTokenBriApi();

    $NoRek = "888801000157508";
    $secret = "N28p1JOkVAtQFtRY";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $token = $GetTokenBriApi->access_token;
    $path = "/v1/briva/status";
    $verb = "PUT";
    $datas = array(
        'institutionCode' => $institutionCode ,
        'brivaNo' => $brivaNo,
        'custCode' => $custCode,
        'statusBayar'=> $statusBayar,
        'keterangan' => $keterangan
    );
    $body=json_encode($datas, true);
    $htmlspecialchars = htmlspecialchars('&timestamp=');

    // $payload = "path=$path&verb=$verb&token=Bearer $token".$htmlspecialchars."$timestamp&body=$body";
    $payload = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$body";
    $base64sign = base64_encode(hash_hmac('sha256', $payload, $secret, true));

    $request_headers = array(
        "Content-Type:"."application/json",
        "Authorization:Bearer " . $token,
        "BRI-Timestamp:" . $timestamp,
        "BRI-Signature:" . $base64sign,
    );
            
    $urlPost ="https://sandbox.partner.api.bri.co.id/v1/briva/status";
    $chPost = curl_init();
    curl_setopt($chPost, CURLOPT_URL,$urlPost);
    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "PUT"); 
    curl_setopt($chPost, CURLOPT_POSTFIELDS, $body);
    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
    $resultPost = curl_exec($chPost);
    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
    curl_close($chPost);

    $jsonPost = json_encode($resultPost, true);

    return $jsonPost;
}
?>