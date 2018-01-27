<?php
$domains = array('php.net', 'doc.php.net', 'wiki.php.net');
foreach ($domains as $domain) {
    if (getmxrr($domain, $hosts, $weights)) {
        echo "Hosts: " . count($hosts) . ", weights: " . count($weights) . "\n";
    }
}
?>
