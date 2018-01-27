<?php

include "include.inc";

$logfile = __DIR__.'/php-fpm.log.tmp';
$srcfile = __DIR__.'/bug75212.php';
$inifile = __DIR__.'/.user.ini';
$port = 9000+PHP_INT_SIZE;

$cfg = <<<EOT
[global]
error_log = $logfile
[unconfined]
listen = 127.0.0.1:$port
pm = dynamic
pm.max_children = 5
pm.start_servers = 1
pm.min_spare_servers = 1
pm.max_spare_servers = 3
php_admin_value[memory_limit]=32M
php_value[date.timezone]=Europe/London
EOT;

$code = <<<EOT
<?php
echo "Test Start\n";
var_dump(ini_get('memory_limit'), ini_get('date.timezone'));
echo "Test End\n";
EOT;
file_put_contents($srcfile, $code);

$ini = <<<EOT
memory_limit=64M
date.timezone=Europe/Paris

EOT;
file_put_contents($inifile, $ini);

$fpm = run_fpm($cfg, $tail);
if (is_resource($fpm)) {
    fpm_display_log($tail, 2);
    try {
		$req = run_request('127.0.0.1', $port, $srcfile);
		echo strstr($req, "Test Start");
		echo "Request ok\n";
	} catch (Exception $e) {
		echo "Request error\n";
	}
    proc_terminate($fpm);
    fpm_display_log($tail, -1);
    fclose($tail);
    proc_close($fpm);
}

?>
Done
