--TEST--
curl_setopt basic tests.
--CREDITS--
Paul Sohier
#phptestfest utrecht
--INI--
safe_mode=On
--SKIPIF--
<?php if (!extension_loaded("curl") || false === getenv('PHP_CURL_HTTP_REMOTE_SERVER')) print "skip"; ?>
--FILE--
<?php

$host = getenv('PHP_CURL_HTTP_REMOTE_SERVER');

// start testing
echo "*** Testing curl_setopt with CURLOPT_FOLLOWLOCATION in safemode\n";

$url = "{$host}/";
$ch = curl_init();

ob_start(); // start output buffering
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$curl_content = curl_exec($ch);
curl_close($ch);

var_dump( $curl_content );
?>
--EXPECTF--
PHP Warning:  Directive 'safe_mode' is no longer supported in PHP 6 and greater in Unknown on line 0
*** Testing curl_setopt with CURLOPT_FOLLOWLOCATION in safemode
bool(false)
