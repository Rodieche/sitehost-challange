<?php
$apiServer = "https://api.demo.sitehost.co.nz";
$apiVersion = "1.0";
$apiKey = "d17261d51ff7046b760bd95b4ce781ac";
$clientID = 293785;
$format = "json";

$apiEndpoint = "$apiServer/$apiVersion/srs/list_domains.$format?client_id=$clientID&apikey=$apiKey";

$response = file_get_contents($apiEndpoint);

if ($response === false) {
    die("Failed to fetch data from the API.");
}

$data = json_decode($response, true);

if ($data === null) {
    die("Failed to decode JSON response.");
}

if (isset($data['status']) && $data['status']) {
    echo "<h1>List of Domains for Customer #$clientID:</h1>";
    echo "<ul>";
    foreach ($data['return']['data'] as $domain) {
        echo "<li>{$domain['domain']}</li>";
    }
    echo "</ul>";
} else {
    echo "No domains found for Customer #$clientID.";
}
?>