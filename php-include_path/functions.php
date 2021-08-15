<?php
function get_token_from_code($oauthendpoint,$code,$a0cid,$a0csec,$red_uri){
    $ch = curl_init();
    $data_json = json_encode(array("client_id"=>$a0cid
                                  ,"client_secret"=>$a0csec
                                  ,"grant_type"=>"authorization_code"
                                  ,"code"=>$code
                                  ,"redirect_uri"=>$red_uri));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $oauthendpoint);
    //var_dump($data_json);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}
