<?php

require_once ("../../cheetaho-php/lib/cheetaho.php");

$api = new CheetahO("API-KEY");

$params = array(
    "url" => "http://domain.com/image.jpg",
    "lossy" => 1
);

$data = $api->url($params);

if (!isset($data["error"])) {
    echo "Success: <pre>";
    print_R($data['data']);
    echo "</pre>";
} else {
    echo "Failed: " . $data["error"]["message"];
}

?>