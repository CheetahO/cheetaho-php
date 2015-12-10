<?php

require_once ("../../cheetaho-php/lib/cheetaho.php");

$api = new CheetahO("API-KEY");

$params = array(
    "url" => "http://yourdomain.com/image.jpg",
    "lossy" => 1
);

$data = $api->url($params);

if (!isset($data["error"])) {
    echo "Success. Image URL: " . $data['data']["destURL"];
} else {
    echo "Failed: " . $data["error"]["message"];
}

?>