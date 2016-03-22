<?php

    $response = new Response();
    $url = AppletInstance::getValue('url');
    $message_format = AppletInstance::getValue('message_format');
    $from = normalize_phone_to_E164($_REQUEST['From']);
    $message = str_replace(array('%caller%'), array($from), $message_format);
    $next = AppletInstance::getDropZoneUrl('next');

    $payload = <<<EOT
payload={"username":"OpenVBX","text":"$message","icon_emoji":":telephone_receiver:"}
EOT;

    $curl_handle=curl_init();
    curl_setopt($curl_handle,CURLOPT_URL,$url);
    curl_setopt($curl_handle,CURLOPT_POST,true);
    curl_setopt($curl_handle,CURLOPT_POSTFIELDS,$payload);
    curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
    curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($curl_handle);
    curl_close($curl_handle);

    $response->addRedirect($next);
    $response->Respond();

?>
