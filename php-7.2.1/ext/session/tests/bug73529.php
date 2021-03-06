<?php

ini_set("session.serialize_handler", "php_serialize");
session_start();

$result1 = session_decode(serialize(["foo" => "bar"]));
$session1 = $_SESSION;
session_destroy();

ini_set("session.serialize_handler", "php");
session_start();

$result2 = session_decode(serialize(["foo" => "bar"]));
$session2 = $_SESSION;
session_destroy();

var_dump($result1);
var_dump($session1);
var_dump($result2);
var_dump($session2);

?>
