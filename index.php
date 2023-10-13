<?php
// API Configuration
$apiServer = "https://api.demo.sitehost.co.nz";
$apiVersion = "1.0";
$apiKey = "d17261d51ff7046b760bd95b4ce781ac";
$clientID = 293785;
$format = "json";

// API Endpoint
$apiEndpoint = "$apiServer/$apiVersion/srs/list_domains.$format?client_id=$clientID&apikey=$apiKey";

// Fetch data from the API
$response = file_get_contents($apiEndpoint);

if ($response === false) {
    die("Failed to fetch data from the API.");
}

// Decode the JSON response
$data = json_decode($response, true);

if ($data === null) {
    die("Failed to decode JSON response.");
}

// Display the list of domains
if (isset($data['domains'])) {
    echo "<h1>List of Domains for Customer #$clientID:</h1>";
    echo "<ul>";
    foreach ($data['domains'] as $domain) {
        echo "<li>{$domain['name']}</li>";
    }
    echo "</ul>";
} else {
    echo "No domains found for Customer #$clientID.";
}
?>